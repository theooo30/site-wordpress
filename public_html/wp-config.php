<?php


/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'u212504761_5UAal' );

/** Database username */
define( 'DB_USER', 'u212504761_9DvfI' );

/** Database password */
define( 'DB_PASSWORD', 'mfZVvSNuvd' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          ':Btl(->U5tG-oZGAQ5$&nut;5qC;ip./?ggq1ZGS{WM}P}adIpalagr<n](10]h{' );
define( 'SECURE_AUTH_KEY',   'wUG_zM[;g&sf!EHkHslncW^nM,(Lu=6CzMTRv|`E<QQJ/Q`Dj<(u[E@W=o j_~kG' );
define( 'LOGGED_IN_KEY',     '%)ycAg[<rmW>Vj|>b$(xn(a)!U;2eI&&8Adlu/<[5%V9lgPw8kPQpOKb9bl[0^z7' );
define( 'NONCE_KEY',         'xx0+&;;MT$FJ04{E5r<Zv6EYKwK23(S6-A!tompxfCQ]KJidgPrU?3id]bW:Z@~>' );
define( 'AUTH_SALT',         'OE:ChzaS;dRTt}VJF5$`5TFC%0ptsw?z2WyKj?X,`4lRlCm^R^C&~+oBSQa:~+(#' );
define( 'SECURE_AUTH_SALT',  'F/.*fP)Nx4}!k:LF}R#TB$N4zda3D/R^pF<0Ow#H[x9Zk|dZLzve*ua$!_G{AAqe' );
define( 'LOGGED_IN_SALT',    'r]m]=Rb7v:?V~Lr,;|IQ!S)KUV0atgZe~VTvR3:Y<nx+F+-9_*Kfza9orhR!f6|h' );
define( 'NONCE_SALT',        'k)U* IVk0P8{65ykbELe1(u#_G)Do<U,_8Du?dc0)]Jj}3y|%LlaaL!+vipa%(dd' );
define( 'WP_CACHE_KEY_SALT', 'vP#@n]K%I`DZnM5kL[0Ubd6un)cb$9xAqQaeu{4f?w%2sj=Xvo3@L/cH87Dtwg#=' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'FS_METHOD', 'direct' );
define( 'COOKIEHASH', '79b77e5a6255371dae5c22802f5d1bd8' );
define( 'WP_AUTO_UPDATE_CORE', 'minor' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
