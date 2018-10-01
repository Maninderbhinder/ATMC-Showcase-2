<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wp');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '.NIg^7}oZT2$y]QzhU?e!IWUQ-D0Qr/!~b%bTxl9LjbDB@ v~MU=;HsaYoNe+kN/');
define('SECURE_AUTH_KEY',  '@UQmmh92;Wcd;}2?9_osG(:W$,D?(:h%nE0}XWBJ,A/xhmivt7.}d4m4R2P-nZRa');
define('LOGGED_IN_KEY',    'vgw)LX/yEU!fjO3watVn(?`.e |J^,xB/ixr;L8!~C)kco}eBaNU9}B]jdv1C6X~');
define('NONCE_KEY',        '_WTNz{s.w?pk2:,2X^XUbFk[ec{.vC$tE^%e1vn~L78bhk;uGkGb9<cU4|}ZrZRc');
define('AUTH_SALT',        'jiw]2-GG^YMM5oK1.ING^~~vSeay}-uKrN:Xl>/k[g]K!jTEfyHcmpov9jv7WAw^');
define('SECURE_AUTH_SALT', 'l@+ob.>/(j2-vkz.W_Z8VdG{RC/8yrYUg0*-_RAcK*Ua`3Vx$~8L<OeGvOa_6X@v');
define('LOGGED_IN_SALT',   'Y6HHKd%LM!gj)~w=>@uEp2*U]R+KR-8oPPC*]>CY}9+@;2s9|^Ufdr-53[pY(NA_');
define('NONCE_SALT',       'bv$q6]2Tc.]&_w!eK5<YrPGg}VUHn*h|zD{`4}5%yaSs<PCC&D#]^Y1rMVzgaMBm');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
