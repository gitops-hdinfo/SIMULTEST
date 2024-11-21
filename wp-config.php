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
define( 'DB_NAME', 'wordpress_db' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         'gk||;=^[ZMtwS@BX.*u]a/l3w9<NR,/yU63Zwmzpg%sy$SnnT2AuFIsS&iV$_:Xp' );
define( 'SECURE_AUTH_KEY',  'F08<N{7y[hb.XxOT6/Ks=VR}I~6>o^zGMFZ?./C1fMlE+!t;lhvmGZr?Cg!@1u8F' );
define( 'LOGGED_IN_KEY',    'kj7$-I[AhnRP+`q11H1QpK>3-*6IYbB]ArfP7kU)HH^H8zg=4]j_Rc8V8A^mlXYm' );
define( 'NONCE_KEY',        '[8G9Ver09R^)Mp#~5~*O:*[wL8:Be2/5{mjI,h/%VBKC]~qJv5?zU?zG*YxX6=KY' );
define( 'AUTH_SALT',        'BAl87-NpG<[#4@CRTB0pb3}S$(;]lJU?O -(TO8rLB<9pCXR$:sd7WX/stf7K1L9' );
define( 'SECURE_AUTH_SALT', 'QqI{yjsTDbhOKCj5S15^E[FR5#ZP&T.rS1/x/WF?}NbjRaGmF*C%)w-68TP3<nw9' );
define( 'LOGGED_IN_SALT',   'PN?q0!tx7fM) 2,Evejs})e-sdby1Y^0GT*LGOYIsRD#dhsgj2%ynL%QF0I2!?^C' );
define( 'NONCE_SALT',       'hN|YZW>OCQL0g;[@Hooo:)*Bft- k{gcpM<U$c}Ef_<MjU8jr}mU2gr%hCVeY,yZ' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
