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
define( 'DB_NAME', 'districtcouncil' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         'm<d9?t?`M@Zu#?Ds/Wy7AJ*x*FrFuV-9Ix?lJhN>k>I).JBoma [$[{a7,@L8f;F' );
define( 'SECURE_AUTH_KEY',  '$!0ey|oU?`dJ6>@,kTd@E?%nmKGt/R9| A13}s$khng(9FA9#smH<^] i=zdejH:' );
define( 'LOGGED_IN_KEY',    '?X$9.v:-y(VJGB=7k35$tS%FT 2k1X&~psG4#<g>!;6NhbInmhVhOuGiquQo^b(o' );
define( 'NONCE_KEY',        '=cO69c~[KUCe_4/f9*HhA(?_L]947g/NALji?=xG~4K+0O%;X2U8N8aMEAZGz(!T' );
define( 'AUTH_SALT',        ',lH8ZR>6xRhx^ZR=t|H~_t9 a%G|?J]tg35U,nD6MS(aDBaTE@$y^^Q:p]OPxd+x' );
define( 'SECURE_AUTH_SALT', ',glPnAc3mMhO~XIx~n{yP^VR|A_BOLxYKSa_1=@ nZ%Oj! rx<n-Xv:r,Ii#(f w' );
define( 'LOGGED_IN_SALT',   'e/uv h_H<7[tF5[cB2tWL((LEt]{5dYB63KZd66y2SmRl:$]ULdJsVHu|TJy`KAT' );
define( 'NONCE_SALT',       '9())t3tnDf1v=/h4_@EmA$KMgd*P#Q|meQ)nB[+MW~cXBXE=S0XphmQ]K:&o 1:R' );

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
