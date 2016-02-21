<?php
/** Enable W3 Total Cache */
 //Added by WP-Cache Manager

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
define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', '/var/www/vhosts/transparencia.pt/httpdocs/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('FS_METHOD', 'direct');

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'tiac_civicrm_fin');

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
define('AUTH_KEY',       'TtUodeAPvYMV4ZF6sk1MyGRIFqG%b%IBw7c&7*Hc1e!lQaXASWls9qe8vzXuidK2');
define('SECURE_AUTH_KEY',       ')QjeWmP*6pNuv^8t2XAEYa*Pn%Rspc#7h*(y7EeS3241@N^IvP6SEQnSsS%1J1!h');
define('LOGGED_IN_KEY',       'h0HtCv(RYenIU^QLSBU55OX)Wo@sTdDpyBszi#&F3AwMSOmPjpNR(6D!YkFsY%vH');
define('NONCE_KEY',       '3gr*DgmNAbBb@0)lqCozZT@MQO%ENsXZabKPB#ff0h2qIBOstS9P0tEu@LXbLt4N');
define('AUTH_SALT',       'TmtXJ*!Y0bG6vTj08MY&VCYqb7IwZvTFcgQ97BRxgXx3Jo#87l%&yzC)&#Dn(IG!');
define('SECURE_AUTH_SALT',       '04EvKI()G!@JWAE34lZm9%J0jpZPUZd)wX7ZksKgxFmLsUuxnefkQb8Npqve*dDs');
define('LOGGED_IN_SALT',       'JCnz%ADHm4)DE%ugrnaJMpaaKzzstZ6IkIqGTo!SUco82IOYDaRJg%AsCic5QF5a');
define('NONCE_SALT',       'gGmSnnI33sno1j3eFdMKpaBFD8thbd0*q330ZZPvtLpbqMCvXgK*QrcaEn^!&fmy');
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
define('WPLANG',       'pt_PT');

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
