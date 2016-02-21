<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'tiac_loby_wp');

/** MySQL database username */
define('DB_USER', 'admin_tiac');

/** MySQL database password */
define('DB_PASSWORD', 'Tiac_2013**');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'eNlKaepvPbGzBYVSVNPFH7XmYnQ6zKlQmT9gPWw2zPbi0lFujNC9ayNOdenJvJZN');
define('SECURE_AUTH_KEY', 'yupd5leIKNaaV6yAom4sHNlMIr9pE7ODZfYggZkBp58anlYDWxdUBiRIojim6yNh');
define('LOGGED_IN_KEY', 'fcBVwoPdNz5cM2aDW9qWCUASDrTGPwfsybuYUOjtswAxhkmrrVMrWnk0wYnFJdxz');
define('NONCE_KEY', 'YKYJcGwx3lsfU1w6iFMU9B290HBcVRtggCfvHLZDJWVhKnsqi1erTh1C0kRCCu3Y');
define('AUTH_SALT', 'fuP4TiB2YZ9IVNcrZQkCledyhyucZZCHhSF95vBxBrlTgx0DPWyt5WFRNDlrY22I');
define('SECURE_AUTH_SALT', 'PbQaLs3mTK4lWaCkZ25b2tdmxaDPpXYMPzrW0BrYaP53rqsjaoiVti4BqdgUMADU');
define('LOGGED_IN_SALT', 'Y0vJ6UwIuwDJ0MFYyHvGrulDH9vK17JeTVLwNuvvVBLDsuDqR7NQWVJpJjP6FIvJ');
define('NONCE_SALT', '05u5DL77kxtiKwn1kn5S3NlutJnGzH2iAkuBUV9PM1Lt5t4zFiRF0a4duUjtMj4l');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
