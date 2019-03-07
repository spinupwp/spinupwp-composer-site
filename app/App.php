<?php

namespace DeliciousBrains\SpinupWPComposerSite;

class App {

	/**
	 * 	Load custom site code
	 */
	public function register() {
	}

	/**
	 * Helper for defining constants if not already defined.
	 *
	 * @param string $key
	 * @param mixed  $value
	 */
	public static function define( $key, $value ) {
		if ( defined( $key ) ) {
			return;
		}

		define( $key, $value );
	}
}