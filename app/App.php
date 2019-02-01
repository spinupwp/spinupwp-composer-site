<?php

namespace DeliciousBrains\SpinupWPComposerSite;

class App {

	/**
	 * 	Load custom site code
	 */
	public function register() {
		$this->load_spinupwp_mu_plugin();
	}

	/**
	 * Bootstrap the SpinupWP mu-plugin.
	 */
	protected function load_spinupwp_mu_plugin() {
		if ( ! defined( 'SPINUPWP_CACHE_PATH' ) ) {
			return;
		}

		$vendor_dir = dirname( __DIR__ ) . '/vendor/deliciousbrains/spinupwp-mu-plugin';
		if ( file_exists( $vendor_dir ) ) {
			require_once $vendor_dir . '/src/spinupwp.php';
		}
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