<?php
/**
 * Class to initialize the application
 */

namespace DeliciousBrains\SpinupWPComposerSite;

/**
 * App class to initialize the application
 */
class App {

	/**
	 *  Load custom site code
	 */
	public function register() {
	}

	/**
	 * Helper for defining constants if not already defined.
	 *
	 * @param string $key    The name of the constant to define
	 * @param mixed  $value  The value to give the constant
	 */
	public static function define( $key, $value ) {
		if ( defined( $key ) ) {
			return;
		}

		define( $key, $value );
	}

	/**
	 * This allows the environment to be queried using magic methods like App::is_env_<environment>
	 *
	 * @param string $name       The name of the magic method
	 * @param array  $arguments  The arguments to the magic method
	 *
	 * @return bool
	 */
	public static function __callStatic( $name, $arguments ) {
		if ( 'is_env_' === substr( $name, 0, 7 ) ) {
			$env = substr( $name, 7 );
			return $env === env( 'WP_ENV' );
		}
	}
}
