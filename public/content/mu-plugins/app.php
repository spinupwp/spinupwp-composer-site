<?php
// Bootstrap our site code
( new DeliciousBrains\SpinupWPComposerSite\App() )->register();

$spinupwp_file =  __DIR__ . '/spinupwp-mu-plugin/src/spinupwp.php';
if ( file_exists( $spinupwp_file ) && defined( 'SPINUPWP_CACHE_PATH' ) && ! empty( SPINUPWP_CACHE_PATH ) ) {
	require_once $spinupwp_file;
}