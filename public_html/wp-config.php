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
define('DB_NAME', 'bankpoal_db');

/** MySQL database username */
define('DB_USER', 'bankpoal_qsuser');

/** MySQL database password */
define('DB_PASSWORD', '1!qaz2@wsx');

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
define('AUTH_KEY',         '!n%M +KoW/e9Jau7}C1:)?nA$% fNUrqJ5P:h*[?i=iC4fCFnRF4aGX{7fQg2R:r');
define('SECURE_AUTH_KEY',  '&:X]p$V/%yC-VFFU$gf&?K,@Nd=ng(*XQR<NS*4bq55!=Wr;ML%/S Nuf`~,7_)L');
define('LOGGED_IN_KEY',    '0l.C{opqT3M48j!:r;fO!w6OT$[Fd^TM-+|%HrfGG{7*|?BF^1uT+?|d2$Xj{`m!');
define('NONCE_KEY',        'JHnfaQN~d<uc5:]#t?p{xA/KOjrBNn,wy2GH53r @5I]cnV{+5=$w.I48Hpb@%[g');
define('AUTH_SALT',        '3`K?pB|z7ER[q20!2Q[<Z pWa=KUt[J}|d{oGRe)%yd?bCh!,l`7AG]aP=Jy-g&!');
define('SECURE_AUTH_SALT', '|Qd2L+bM6]yi=bc6b`nL`;or^<OgR}8e4Y_Kp8$D0!,B^pCpt0i@)An!90HGG}5~');
define('LOGGED_IN_SALT',   ';-{ hiY>bfZ]T9:)!#X|[5&W)m<PNw?/-X30xgzL4byC{qFSL_ovdY{_X_rG,^{E');
define('NONCE_SALT',       '/w9-(~_tNZRzIk>ZXnEDp^A5nF0X[SB1z}8IK)S%-auQ2YMrcf4dHI1ar1ch!~oR');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'bp_';

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
define('WP_DEBUG', true);
define('WP_MEMORY_LIMIT','1060M');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
