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
define( 'DB_NAME', 'mobiliftnc' );

/** MySQL database username */
define( 'DB_USER', 'mobiliftnc' );

/** MySQL database password */
define( 'DB_PASSWORD', 'V,ko5CJB-~RO' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         'JwP6FV-,+>=`m}9{Ra:_|Kwu#uRN|8gON/F_+K?Ca1,|;G,kRKqx=RuW,*CFgA.c' );
define( 'SECURE_AUTH_KEY',  'c([28VXZ?@yW`U@9g&h+}V14Rfl=Lu~H?t*J[2]PMt`7p#?$|.Sc9dbvAM0=r5WJ' );
define( 'LOGGED_IN_KEY',    'O|vU>0 6}Mbi0P{W[F,dMqNj7)E^*o$0Gw53M6c5z#]>W9!=Ry;Nmpp@C*BfiW5-' );
define( 'NONCE_KEY',        '+7F#]t-Tq2~VGaOc<;xb7^BD9=z}ixQKEp(Df6&=o[>+Ls.4$ 7-C{-!x&RPZm(q' );
define( 'AUTH_SALT',        '7#L^^j[{rmD{[<gbQWY^:IO.cRYe(&7L[4)u0;1iAqPiF:Q,v4 y6K)NDX^A}~{|' );
define( 'SECURE_AUTH_SALT', '4N#oiAxa@1 _{71~*Oj7ZIrEpE;f`DJ~W~nMkOr|s<#<wgxs!d}XC]eybTyPe6IZ' );
define( 'LOGGED_IN_SALT',   'OqHCmsOY(p1wR,Q_?~,n^*99-%gz>8Q6VOF=(tnT*dw.qiMGa^C{wwKQ7gYsYI^*' );
define( 'NONCE_SALT',       'Lmxq9ywQZC1fai$9DJWM_V;(>p.>V47A^o=/WP.rIOdFz`bAlgNC/QG!Y_TdzYN3' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
define( 'WP_DEBUG', true);

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
