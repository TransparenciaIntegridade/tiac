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
define('DB_NAME', 'tiac_soccer_wp');

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
define('AUTH_KEY',         '1hKGNX!@p6S3)N!ol%x0lMODMOzak*15ISX&@4s1pY9rJ6%X4K49XLXGxWI$mM)Y');
define('SECURE_AUTH_KEY',  'vaQ^b6sHI8T9)V!vdWsQWNd%uwolXL&OH#ua*pUJGpp%jcBh#U0LVKZe)@rHU7Mk');
define('LOGGED_IN_KEY',    'K402^8CIm1c6HrA#GwRLmB0cZ#KYnsLfKI)WPSyGi)XlKJJ98qj*YtkS30sTDUI6');
define('NONCE_KEY',        '@I0%zeVoplPi@e8MVh$^1IhusEkxoDtCM3iF%Am%3FeTQIq$KkCG)tY89VnIfNc9');
define('AUTH_SALT',        'wxu22g2COUvH6kT!oVst2OB%c$Tq*3btuUq(3ASF@eMk3d9QtL&Ydppn$Jt(ZqDz');
define('SECURE_AUTH_SALT', 'YeDdRtsG(lOkh1Fd0pi7l6Xa!VuTWpK4Bvw2tC2q^ftNgru5&$sYEMDZr0)vx6At');
define('LOGGED_IN_SALT',   'v4kXRZQ8&jYle^3odkVJBePwiwptgKv6hIMj!(oSoaQhj!8VK*whpVeJIg5YgqsW');
define('NONCE_SALT',       '4F@yU)CA1L%@KRmmE0a3e)3eC6jviX4N94W1m)7cf1YSmKqjhu5WhhisfE*vR*Q6');
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
