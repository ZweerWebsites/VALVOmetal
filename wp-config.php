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
define( 'DB_NAME', 'valvometal' );

/** MySQL database username */
define( 'DB_USER', 'valvometal' );

/** MySQL database password */
define( 'DB_PASSWORD', 'TK8vNynB7Vj70e26' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

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
define('AUTH_KEY',         '9e_{Fm>HAp|A7ZKXzm.XzNPQNk>|?g;7T97R-fPP=K3^Z|B-lP`Yt22TT#GGU.lY');
define('SECURE_AUTH_KEY',  'hn&0<bANhy_?R{*EAx>zL}n^@W 5#wr>=~!qJqW)p+O,m[.BVjTOe41]qafFVC2A');
define('LOGGED_IN_KEY',    'H`-tXv/O+^a?mi3f<%jB4F]kzC=V$^-Lm7@F)&:_jsIK7-mzP~U,8Qb$^y[l,TRi');
define('NONCE_KEY',        '[g!jzY) ^uoF51/`{-nRz#-0x/[.*XMp43Mw9d0wD)Vgr|tB2C@+Y}E6( 4$5~*Q');
define('AUTH_SALT',        'O>i5E~~-Ka?6Sz>(xQHnrzOU|;dco0z f?/=h:V^ EK`=+[e4/53qq%$BJ<|=+Dy');
define('SECURE_AUTH_SALT', '`}wk#$Kp-i5zX+,WNekNf|EBpB-!P-:sVp.*EMZ8rX}j`<TV1mKO4(Q-B[H!S]}J');
define('LOGGED_IN_SALT',   '.RJuc(6-.$Thz*$/$6z6<9~a+Zq/KmzdD/{;)MBo[T++eWaB0$)Eh@ aoH*>][Z|');
define('NONCE_SALT',       'JG.&6 NX^ gjwLo~,W%k.^t(NuTN{Pu4fI|KFM{&refio(n3z<^2$}Pm=M2 ViOL');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'vm';

define('WP_DEBUG', true);


/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
