<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'mercerbell');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'T}fVD)RO1yxFk>]TT3h;;uB|,U|)|]>Z4*Vf&w^u=-NS4)ad<ndIX[YE#fC[nHqL');
define('SECURE_AUTH_KEY',  'qT6?QvFmPOz-efcxi~Mw?EgH2>Y`Y^zh69KkTH>_(VF3 d5>@KLZT|N,7;w@+2+n');
define('LOGGED_IN_KEY',    'uAjE4_TI+n:?},t:mWchYfx<U}FRVM5Cg<]U[oY&I lQ<]K,L,*/Wrc3p-0+D8f2');
define('NONCE_KEY',        'a0oc7Sa-#>7kcl%e7J&_<w/zr!r#QS,LIsAWe|<0w62Q{~B<vvn:EOTz|CZ%!vyB');
define('AUTH_SALT',        '4 Ya}U6qMZJei+:|FQ-m;ja)]y?`*990xHJ,tpU]wrcvWB%Qmm-%m`>i|q/O|7}V');
define('SECURE_AUTH_SALT', '=h!#:$,JiynX9)=Uuz^i.(tn=1Hm;W. BU0.RpM`[nhq[E>+Kfmw@9-mBOU_3YMJ');
define('LOGGED_IN_SALT',   '[Y@C:(cV{h; ty)5>sQOdVsnil(JcG,+ :Kn5-2q0@(lz9u9|Od`:^+xyB@rn26>');
define('NONCE_SALT',       '|<TZ47 )W^^=Wx8U~:gD<!||eDzIfz-T0FL7]OM~zT2g+dp@ww[-3/,;A)C_:n.u');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
