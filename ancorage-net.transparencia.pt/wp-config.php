<?php
/** 
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information by
 * visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
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
define('DB_NAME', 'tiac_ancorage_ne');

/** MySQL database username */
define('DB_USER', 'admin_tiac');

/** MySQL database password */
define('DB_PASSWORD', 'Tiac_2013**');

/** MySQL hostname */
define('DB_HOST', 'localhost:3306');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link http://api.wordpress.org/secret-key/1.1/ WordPress.org secret-key service}
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '3Ko7vCwaMUG(wAelryZCvZcyOEOdmvikXH8FzB)c9@bJnJ67HYrfsu41X3T(P@^o');
define('SECURE_AUTH_KEY',  '52z&Om90f32wKe9Pw!KlzgOoUZx60#5A9Y!HI(FO8OWb*7n$MncWdS#f9*E)93eD');
define('LOGGED_IN_KEY',    'dQ^!yUNA3j2RJJXXZOenH8CUUKRXOg5o@!sJ&aPMkCdvhdhRajAC%*$pGJ)SawMA');
define('NONCE_KEY',        '(dH0MP#cUUbBwZ!pb6JcOz9&2^x!#u&M^h5eJ@keP1tjzUFzimyX0k3ZH7*Rf(Ie');
define('AUTH_SALT',        '277GWkRDW6a$ePAQfti9c7eZyZLD!8*2s4e!pCvd8G23zTYKxg$TpXNXzInXgF*V');
define('SECURE_AUTH_SALT', 'X@Npl74RlgTBn&aW0nM^ud#lN%xgzZL$pc9EVx!uRNR&omq%LGconI6mh8imGVzO');
define('LOGGED_IN_SALT',   '%RJgrNx#OJhL#xryynUe3hWDIU792Z#o$wsW6yOZHnRDxmXK$P1SRiE#%S2%Es!q');
define('NONCE_SALT',       ')K3Cw0b2JcqK6vp)7aUPV70wFd4DGf73T8xf1q7KhWJeO#eBsmoKmN6lD3cE8HS#');
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
 * Change this to localize WordPress.  A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de.mo to wp-content/languages and set WPLANG to 'de' to enable German
 * language support.
 */
define ('WPLANG', 'en_US');

define ('FS_METHOD', 'direct');

define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

//--- disable auto upgrade
define( 'AUTOMATIC_UPDATER_DISABLED', true );



?>
