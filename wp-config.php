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
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp_marcmartha22' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

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
define('AUTH_KEY',         '-k+N,)n[x.Kq-G/BI@$@](P%nZjxi30lz`@K?|R8aezn 3|<IzQYRMc~-4v>+/KW');
define('SECURE_AUTH_KEY',  '{;m09>4o#$pZ~i@/4EwKAOm18`JC-^+ivbGK.x)G|zOT)_8wu$f=;ckV|V*UC[)0');
define('LOGGED_IN_KEY',    'd||3j09Cg}OM`.xPu}Ir9>,T*+O-JR4c+44%jTE]:O2KWsXt_wY`>|T+}%Fu#A? ');
define('NONCE_KEY',        'z[[H|n1{A Yflj.^(7%QN4me1vB^w4V/?R!%=MMW>W&MSU)<8zo>2vctI(oTDk|a');
define('AUTH_SALT',        '7W+}wWot+xR61@f*|nv8fhdd17WD:BuIkkVZd(Km;mOcMS6 t?y.<FLz/6Vm~;-W');
define('SECURE_AUTH_SALT', '}nmNbOc=A$xiIiw8R4jeH#DC(u:o|kX#!a!gT/^t@|TcsMDsXiAY@Pk%y?-)*5hA');
define('LOGGED_IN_SALT',   'Z4Wp7PS+NfMi@<F3JYD:H9+s1c||4||r=cSy2{(<MqbG2<JB^Qxd$a#0gG6f*aWA');
define('NONCE_SALT',       '-b1}wgZb,O4eCZ%99wQAG>EkE$5%[trC3)Xi|K 3b0+F&y35$F;(LN[`o-]B&=>w');

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
