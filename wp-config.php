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
define('DB_NAME', 'hispanotravel');

/** MySQL database username */
define('DB_USER', 'hispanotravel');

/** MySQL database password */
define('DB_PASSWORD', 'wordpress$123');

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
define('AUTH_KEY',         '.Z|14KH/+0w|-KS~uYaLCpw-c9<s6[]%]xR5rA<n@x2{LV3[h6$,3#*F^oiI+/=a');
define('SECURE_AUTH_KEY',  '-..T&`JT+AEH5(r3,P7K|,mo~8-3X!fkqd>,4QQ|wNTc_i^&t:q?,%0uR.9_bwa|');
define('LOGGED_IN_KEY',    '>GA+$m;lw_oMp^xZ78L[ZA,tAw}wmo/-}Qh@ IuaKKzs=[+j*HwAC$|Ec8Vy0+*K');
define('NONCE_KEY',        '|tICF(~1-Ai9R(UhPD`q+N>T;  RAOY}<NfN9}8Q+q],|AfX&EnzPxD5o CIbd;|');
define('AUTH_SALT',        '|/A&qhHzX(uz)Km6*gZ_vqkuj4<(k.M!886N[3b_s3,Bq,!oXiL{I~4B9)y N2$!');
define('SECURE_AUTH_SALT', '*M;2Tm>zw_Jj|_iX,k2<YQ#zHR_)}?0)yfRNxhdR^*)e/Skbzeg6*2lK_)E04o$6');
define('LOGGED_IN_SALT',   '0D)a?$@c2:yVBrEzH6HCS;D6f!1FQND{[PhA@JF84T#^8zl)C3G@-;X 5i|$F7n+');
define('NONCE_SALT',       'o?B#rEJA6r.5X%c1u9 1|3.%P9-:v<AGq;J-i_,TU>-}as$/BRZ_Rd1HKTEnH4Ov');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'ht_';

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
