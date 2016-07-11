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
define('DB_NAME', 'zoopark');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         '.=6F7ez<D|9J(ltLGYl2=SdgTo7Q-cV0L`t*W,#f:R+xuZ%_u1g>kNr5l7_1+dcT');
define('SECURE_AUTH_KEY',  '%x}i2p*5FpY[Z6FM`%YEUYEn3hO`%)ek,%A:Fl`=mtiYJnTORjpGf]ra#@yXihwV');
define('LOGGED_IN_KEY',    '35t{lvrEexE67KInr(Vjz pbLb!HnJpyd/r*9dl?(t_n-A:]0274H|%:MH*}XzVI');
define('NONCE_KEY',        'Q{_j7V1wJ^&XVa[ayLZ|m3s!P{0,Ln`L6tCT#4v3:,`OYlF.&G,@!x6w$ppRkBQC');
define('AUTH_SALT',        '[JCTp7F!hkZA !~DRHG.sY}/5_:uWlo~pi/B$hh,e`:miKC?2fzad$?9;s/,+@lY');
define('SECURE_AUTH_SALT', '4*#+uLU%@8tzexX`Z~U(<7Z!<]Vt_SHC2#%4s5Kr:W*^O-S.7*zQL)[6SBQHG/&!');
define('LOGGED_IN_SALT',   'Li!qGq?cTtG#d@C*D*Mp{8=49{]r>WKn0@ R2s4LF!B.?CCh0k_3Me*(rii8f5}e');
define('NONCE_SALT',       'cs]vHP<JC~<M8j^I6(R,SlZ>4yc6Z<KW yZS{`wz1R7is)^hyAF^l6:pt`X{a|]?');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_zoo';

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
