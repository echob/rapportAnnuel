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
define('DB_NAME', 'rapportAnnuel2016');

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
define('AUTH_KEY',         '<qbKX=.l}XM-?H{E|;3#j|{(A&45ie Y-:Guc|1S[^-|s>b~hx@|{E|*K{.0p-1V');
define('SECURE_AUTH_KEY',  'gD$M2Klu1C diqaXSY&{-+:|A$i&[d$C{_e[wP2EY,nAp$o+Aim08^c@I:QnAcr/');
define('LOGGED_IN_KEY',    'LxENTnV>C$.BJ$nW>#H94C+ou/E8vDn$Hm)0/*HiM-q%QN$_WnhB%T.Yns/oNHWw');
define('NONCE_KEY',        'Z]Mt%Pe.8WFxBo6~g1#c2q?~$Ikjl-=D.J-gR0BudbV$hMZ3nx]89VwA3AYS=Aqt');
define('AUTH_SALT',        'a&_j9_3pW>n@@T!Or}n0cgiej^$f_bRrVup9(;y#-5YL5EuKwW]]N:hJ-PPn9o4%');
define('SECURE_AUTH_SALT', 'dId1Vz4f%[K#lLXI6?=j/nEgi*:6S|~/]3LIlstff,E#b.q7>P`R*t.}`3Z[*&@A');
define('LOGGED_IN_SALT',   '{|O T_NNv%PDDA rz kt}[l!1|__NE=6`4)V>)cXAD,.vZ^*3M=c0?9jh,7xKxrg');
define('NONCE_SALT',       '__/J3sRc,.Gm=B.2(]TVc[>?<m%K0W# EAA)Qb6hGOItIbsV!VO i#m~~4;NgoQ%');

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
