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
define('DB_NAME', 'samterhotel');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'fn>;?lA,1#N-Orz;|E,&JuN|cKRu=Y-.}Jw$P}ye[5OXJAo<H)n*DIKC+@m1e!CU');
define('SECURE_AUTH_KEY',  'wa;J[i~$j>l@:%e#Z-ex]R)fNLe{b?{P<ipP7i{iiI+E1u{NMn:>%*p/+fRl9x9S');
define('LOGGED_IN_KEY',    '_+Q22N<|AdO:ZqG)N9}?,+#l8F?#WhsZq?E`M@n}_JKp5+bf8I1**=df&Z!<+f)9');
define('NONCE_KEY',        'R:eFo]|< aIc+i7<-6=myP.8tnIss#c)8Fc--0o[sfN:l<yBs_P-k1f&@I/&r=35');
define('AUTH_SALT',        '[!rhSi`kd!13*oO|8qk7`fw6YkQ+|b;=k5FJ@2;?jF^j+PXR)gL=O#d#Iw[q-7LL');
define('SECURE_AUTH_SALT', 'w5~:HO=*r]QZk(V!+wZF10M=?~@:d%<|6<CWA=v12m[@QLX4kNNIQ!l+{8+ 4Pr1');
define('LOGGED_IN_SALT',   '9nR0DPEbo%a{t-Vh#y9ay?%voX1|=FbNgdv7ZD}Gx+$c47FD4MQ;rlZMtOZ*,|~t');
define('NONCE_SALT',       '49+(/=(ct%q-]rNd]k(,D:vmf*z;AvUSdXT+{/?TLDz28 8m ]CujG%m)?l)(xV|');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
