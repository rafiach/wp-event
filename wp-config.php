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
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp-event' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '9~vg@VeNP8|fLn(Wk#MFio:dvRFU$vf}&O4yTC{2Sg4rO6.EyI]v;h6Mq^q]O<O$' );
define( 'SECURE_AUTH_KEY',  '%_2S*`gsR!R*~EWMw3}$B|5dfrIKL}w3[Lk55${pQtHz57v!U?*oTuOWe$kJ*EgZ' );
define( 'LOGGED_IN_KEY',    '{.3z+A.LkoSgqzM%)3p:K;q/-&26RvlFs.:QXWmPVZ-Oh|6T;:7e]@Cc@rH[<hI:' );
define( 'NONCE_KEY',        '1/CCJpKvt;L^<oW%2<HpTa>/IM6*Ube2i%fcTTpGl&6Kfrc!]|LO-+A5;lr>;Z3{' );
define( 'AUTH_SALT',        'mI=z0G4wHB3Veg<nMk~RMe,{v830Ca9=p_1Q:oG4k&ek6-JW:j*2+My^7A*/kj!P' );
define( 'SECURE_AUTH_SALT', 'e4QQ?DN:2$D}2qfjHVGjxCc:?e@UKayIZIMUI=4<p>`}-E?,Q;+3!ynE)_>D638n' );
define( 'LOGGED_IN_SALT',   ' M?g sJ_VR%vwuFsTfxrTaE^)<H0O4F=ekf`8tk9Y1u)~{unf7w2aq9YPq[vByyA' );
define( 'NONCE_SALT',       '[*]W..9-fWL7]!J3,ehz%LP;~ 61H[Hom?)++XaHUqJU)* !+Fo9J 7(>Fvvg:%B' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
