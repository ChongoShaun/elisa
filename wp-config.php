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
 
// Include local configuration
if (file_exists(dirname(__FILE__) . '/local-config.php')) {
	include(dirname(__FILE__) . '/local-config.php');
}

// Global DB config
if (!defined('DB_NAME')) {
	define('DB_NAME', 'casey_db');
}
if (!defined('DB_USER')) {
	define('DB_USER', 'root');
}
if (!defined('DB_PASSWORD')) {
	define('DB_PASSWORD', 'root');
}
if (!defined('DB_HOST')) {
	define('DB_HOST', 'localhost');
}

/** Database Charset to use in creating database tables. */
if (!defined('DB_CHARSET')) {
	define('DB_CHARSET', 'utf8');
}

/** The Database Collate type. Don't change this if in doubt. */
if (!defined('DB_COLLATE')) {
	define('DB_COLLATE', '');
}

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '.#n){3r<e/)/?Y1?AY0F*tMcm.j|%ySfO!a0~^#R[{yyU<h0mIf0ro-G)1Dqd!#/');
define('SECURE_AUTH_KEY',  ':6t|u/IeAnn>Q<M7S#IL]F>Z4znO(1,B{qdM/K-x sRPf(m*eYw-s^:c+)OyPRC{');
define('LOGGED_IN_KEY',    'B!S,dZ+&M}H_mTe{-l||OV)M8GA|X?naUgh+N;;j?QS+kB,vqQC!&e$-w|eW=wj&');
define('NONCE_KEY',        ' 8-Z0MxZTpB0..-Ldd_O7CA-8pR>+}Sz1K12UAmh{ia|dPb,dlG.HDAfHR|RMh/^');
define('AUTH_SALT',        'W{71|;3;~CQ1`(m>3EW.x2y`+gq.GwlQv-c-}{o*lo((NLpk#BGv ld^ku1sQ0r6');
define('SECURE_AUTH_SALT', ',9=SHlU7T]`7IgHY)-<|%Ck=T8{-@PfQhzVS=|Id-.kI3=pNeF.n#7R+3U(/o3I-');
define('LOGGED_IN_SALT',   'PgEF#kAW a>~(jk|[@Lx)&>D!5Q-FgJ` K)Q;2-n~kj%qsC?wzaP+kL)<xH)F@fY');
define('NONCE_SALT',       '_1-Hm6t!N*``-dbdB9+YGiVnt9z[gMGc-?_|&qXdRmTI4#%P2VJ9j+bp|)`KIu9J');

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
 * Set custom paths
 *
 * These are required because wordpress is installed in a subdirectory.
 */
if (!defined('WP_SITEURL')) {
	define('WP_SITEURL', 'http://' . $_SERVER['SERVER_NAME'] . '/core');
}
if (!defined('WP_HOME')) {
	define('WP_HOME',    'http://' . $_SERVER['SERVER_NAME'] . '');
}
if (!defined('WP_CONTENT_DIR')) {
	define('WP_CONTENT_DIR', dirname(__FILE__) . '/content');
}
if (!defined('WP_CONTENT_URL')) {
	define('WP_CONTENT_URL', 'http://' . $_SERVER['SERVER_NAME'] . '/content');
}


/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
if (!defined('WP_DEBUG')) {
	define('WP_DEBUG', false);
}

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
