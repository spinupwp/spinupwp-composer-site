<?php

/**
 * Your base production configuration goes in this file. Environment-specific
 * overrides go in their respective config/environments/{{WP_ENV}}.php file.
 *
 * A good default policy is to deviate from the production config as little as
 * possible. Try to define as much of your configuration in this file as you
 * can.
 */

use \DeliciousBrains\SpinupWPComposerSite\App;

$root_dir    = dirname( __DIR__ );
$webroot_dir = $root_dir . '/public';

/**
 * Expose global env() function from oscarotero/env
 */
Env::init();

/**
 * Use Dotenv to set required environment variables and load .env file in root
 */
$dotenv = new Dotenv\Dotenv( $root_dir );
if ( file_exists( $root_dir . '/.env' ) ) {
	$dotenv->load();
	$dotenv->required( [ 'DB_NAME', 'DB_USER', 'DB_PASSWORD', 'WP_HOME', 'WP_SITEURL' ] );
}

/**
 * Set up our global environment constant and load its config first
 * Default: production
 */
App::define( 'WP_ENV', env( 'WP_ENV' ) ?: 'production' );
App::define( 'WP_HOME', env( 'WP_HOME' ) );
App::define( 'WP_SITEURL', env( 'WP_SITEURL' ) );
App::define( 'CONTENT_DIR', '/content' );
App::define( 'WP_CONTENT_DIR', $webroot_dir . CONTENT_DIR );
App::define( 'WP_CONTENT_URL', WP_HOME . CONTENT_DIR );

App::define('DB_NAME', env('DB_NAME'));
App::define('DB_USER', env('DB_USER'));
App::define('DB_PASSWORD', env('DB_PASSWORD'));
App::define('DB_HOST', env('DB_HOST') ?: 'localhost');
App::define('DB_CHARSET', 'utf8mb4');
App::define('DB_COLLATE', '');
$table_prefix = env('DB_PREFIX') ?: 'wp_';

// Set other constants from env file.
foreach( $dotenv->getEnvironmentVariableNames() as $key ) {
	App::define($key, env( $key ));
}

// Environment config
$env_config = __DIR__ . '/environments/' . WP_ENV . '.php';
if ( file_exists( $env_config ) ) {
	require_once $env_config;
}

App::define('AUTOMATIC_UPDATER_DISABLED', true);
App::define('DISABLE_WP_CRON', env('DISABLE_WP_CRON') ?: false);
// Disable the plugin and theme file editor in the admin
App::define('DISALLOW_FILE_EDIT', true);
// Disable plugin and theme updates and installation from the admin
App::define('DISALLOW_FILE_MODS', true);

// Secret keys
if ( ! file_exists( __DIR__ . '/keys.php' ) ) {
	$keys = file_get_contents( 'https://api.wordpress.org/secret-key/1.1/salt/' );
	file_put_contents( __DIR__ . '/keys.php', '<?php use ' . App::class . '; ' . str_replace( 'define(', 'App::define(', $keys ) );
}
include __DIR__ . '/keys.php';

/**
 * Bootstrap WordPress
 */
App::define( 'ABSPATH', $root_dir . '/wp/' );
