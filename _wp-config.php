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

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wpassesment' );

/** MySQL database username */
define( 'DB_USER', 'admin' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', '127.0.0.1' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          ')iE{JCScinuL1m35QL=!H{Rti/|rG*T*}6_BD8`iEFw5vuc.ePWV4Ey9X[+6<4~3' );
define( 'SECURE_AUTH_KEY',   ':`Vej1*m@w7<S9=~9L1l<HNYrmMi$C6hO=^/~7P!!/@LPu+@EN!j(L>u;lH#DV1~' );
define( 'LOGGED_IN_KEY',     ',yy[w.%},eJ(^,^}y>|]8:mlkO2<&dnKoB:`Xa/+!Dd)(=}},XL2JX/@[A8J*&K%' );
define( 'NONCE_KEY',         't!/]:g4An}$oJm+Gsc:gjXI7tc%4-lpG{3|ds2 {k8v+1MbmO5x.A9?O]VT/MYB-' );
define( 'AUTH_SALT',         'fp4!+|jr7xLqWSD1<a7Dfdc =IUw& L!H[D^d=QXkI._c%NCx &8E> qu+#idGu*' );
define( 'SECURE_AUTH_SALT',  'Byiw]HR24>b(j(-?dCgKN6 -AztF<LC~/%=!HN%Sw<J|+)nuGn)zX/4)2+(5sy8d' );
define( 'LOGGED_IN_SALT',    '4V`p`2@XeyrFvU$5PqFf@W&XSX=bGrZAXeK!]56/Zsf[8)e^_3:@.Tz07hVADs.7' );
define( 'NONCE_SALT',        '|@v gC}QW*%BCZM%M9Z0jlWF]|c#`5c$teXo_RH-,07A<=,6a2t0x1{7=K^$_#rN' );
define( 'WP_CACHE_KEY_SALT', 'D6x7m-^-%~TH/fEZ^nL.u2/zyHqYYRA+qJbUTDZ#isvO~*Cp,%><eDl6;7,O%RJ7' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'doms_';




/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
