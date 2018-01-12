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
define('DB_NAME', 'casamona');

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
define('AUTH_KEY',         '`x|kWo8OET6}/ 0Dpekp*K;D>_D*+1ZeVZ?7}$p@pK*0bU AV+03PrB.AqOSgk; ');
define('SECURE_AUTH_KEY',  'FNa5GF!aRR3TMddhD$y`K6x<YA6(kycMY9W-VCy?12(xfT=NilVau?iST6O(k)) ');
define('LOGGED_IN_KEY',    '(p{N:|^Y9r8 &R]zFJA!SR<h1<e2:u+QT2o6Mb1EVB0[;SsX1n_lfwp+Nh.sd CT');
define('NONCE_KEY',        'Z&c:yWQE8D,#p$?{c^ytSO3K]wj/|DwP[aY-|l*Nb5w+. LCDw~x|a;T Q1$td((');
define('AUTH_SALT',        '=2~cXW:73{NaPrj?IyU!VWBK:bmh5WpI(AUx+,y8~evg8!on0~.V#b?}7JXE%Q9i');
define('SECURE_AUTH_SALT', 'zM)3(tQzU,++)?8|;ji<MN0o1u<I,vcpkgFlTo_dw6E>J!kxk;+p:km]7v!%`=2F');
define('LOGGED_IN_SALT',   'uyk%tH73|a cC<fTq.GXzZC%Qgue6|CB[AH1DOp_CE Hr,,+WOXJ2+%X}gj74  m');
define('NONCE_SALT',       'lY$q^l2;,p^:34+dYpFMg^yR%yX$teXBMJvEgdC$b*YzFKC:BL1-3xAe9:>iTh!o');

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
define('WP_ALLOW_REPAIR', true);
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
