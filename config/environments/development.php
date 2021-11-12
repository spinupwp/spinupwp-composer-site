<?php
/**
 * This file contains a base config for a development environment.
 *
 * It can be overridden using a .env or .env.local file in the root directory
 * of the project.
 *
 * Always use App::define() to define new constants in this file.
 */

use \DeliciousBrains\SpinupWPComposerSite\App;

App::define('WP_DEBUG', true);
App::define('WP_DEBUG_LOG', true);
App::define('WP_DEBUG_DISPLAY', false);
App::define('SCRIPT_DEBUG', true);

@ini_set( 'display_errors', E_ALL );

App::define( 'DISALLOW_FILE_MODS', false );
