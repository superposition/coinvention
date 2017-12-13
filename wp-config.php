<?php

define('DB_NAME', 'webapp');

define('DB_USER', 'webapp');

define('DB_PASSWORD', 'okpokp12');

define('DB_HOST', 'localhost');

define('DB_CHARSET', 'utf8');

define('DB_COLLATE', '');

define('AUTH_KEY',         'webapp');
define('SECURE_AUTH_KEY',  'webapp');
define('LOGGED_IN_KEY',    'webapp');
define('NONCE_KEY',        'webapp');
define('AUTH_SALT',        'webapp');
define('SECURE_AUTH_SALT', 'webapp');
define('LOGGED_IN_SALT',   'webapp');
define('NONCE_SALT',       'webapp');

$table_prefix  = 'wp_';

define('WP_DEBUG', false);

if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

require_once(ABSPATH . 'wp-settings.php');
