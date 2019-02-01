<?php
$domain = parse_url( WP_HOME, PHP_URL_HOST );

define( 'WP_CACHE_KEY_SALT', $domain );
define( 'WP_REDIS_SELECTIVE_FLUSH', true );
define( 'SPINUPWP_CACHE_PATH', '/cache/' . $domain );