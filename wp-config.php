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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wpassesment' );

/** MySQL database username */
define( 'DB_USER', 'admin' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', '127.0.0.1' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'JP 6K+AxN~pGEUXj,&8!?a|!au s.A*M|, S*e:XMPhB:e=~/e$[LAF|W&*i!,*Y' );
define( 'SECURE_AUTH_KEY',  '|]sfh9T/}LLc;;tg_GhL]NrMN%a!t9Dr]20v$O5dp-Y%UMX-VFLWDI@mlRZUYnhN' );
define( 'LOGGED_IN_KEY',    '6vZ8p+&z9C4=C%|]:PDCnsYG[EeLCWl5U]$@#h%],c*q-/U3[{H>Siw9@?:&.Qr.' );
define( 'NONCE_KEY',        'u/f!U4-c80TbUI>D;CsL5E_?WTDI+RhDphAjW*X.$Fe{Ip<nuZ/cf(unuO]FNF[#' );
define( 'AUTH_SALT',        ' UlJpsTMm<4y;!rx_P$sO5DTVxdFD7vK*up [/dhH<1sjm%0sBE.h=`0O1E{ZUP#' );
define( 'SECURE_AUTH_SALT', 'x9l}NjIm,>@AEPnUn}Apu$MUK!1`yj^F9IjTqy7PJWZJ{wf(n6-MU P7lMG^89(2' );
define( 'LOGGED_IN_SALT',   'A|]|2xxILXCkiO-ei650ox#EwV~8-Xb80vq*,WI/.sn^3}DF[N2wN@E/Cds<tjxP' );
define( 'NONCE_SALT',       'y#<!bd4&Dzg?<nO5Ex-_33&*-LRH[+TKI(dCH4zI`Jdz^%-!~ ^!0>~JFQh]PBGY' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'doms_';

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
