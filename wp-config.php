<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'u0618804_uae' );

/** Database username */
define( 'DB_USER', 'u0618_uae' );

/** Database password */
define( 'DB_PASSWORD', 'i3fh94T^3' );

/** Database hostname */
define( 'DB_HOST', 'localhost:3306' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '%RNw[[Anc.7_C]VQLm3nO{h= RKQ#1AXPW?PV^%zH:4q26%<QC]FVpJkQZ_:LjQM' );
define( 'SECURE_AUTH_KEY',  '>BS,ASK=3n@?y.xoi>Mw0TOB~xO1u/E?PDovQ01;U;@fVku.IG=JLg/e^lk[tr}T' );
define( 'LOGGED_IN_KEY',    ')(F/z[I32C$~Li@lM.*eVn>%]:O}3V&xTIE0w?d%AU)oBUJ[$q(tjx|.TInKC5n?' );
define( 'NONCE_KEY',        '=^zJ8u/+uVLapL .hsp5>foyswplXUT=Dmtkez}$Q4+pjyn]vil/<Bvz_(Ko!|o+' );
define( 'AUTH_SALT',        'hthJxUCM:cId:AJU7[k44j1+(zQ,3L{aC?FWH,h(o%e.4%xCpw.@vR&_`)uZ)!+7' );
define( 'SECURE_AUTH_SALT', 'q7/[Y_3a8Ml3Efs|?x%ts>p?+sz1WB8e!ZXrt,ySk?(dn9uC qi8B 0po<S2tY~e' );
define( 'LOGGED_IN_SALT',   'DzSb**EG%}6LX@~|4iT P!Z@n:BU$1w?fY+t$O<gd-u20KG]w{*4AWRA.XbFz^8u' );
define( 'NONCE_SALT',       'p/};G+NHE[}We&)c6+|{n2*AXrnN/isWYOHneuUZ|z=#j+8cl=,[W1g~LNj0iR()' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
