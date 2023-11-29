<?php
/**
 * The base configuration for ClassicPress
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
 * @package ClassicPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for ClassicPress */
define('DB_NAME', 'ahnjournal_frontend');

/** MySQL database username */
define('DB_USER', 'wordpress');

/** MySQL database password */
define('DB_PASSWORD', '8fjf66df;0DD2');

/** MySQL hostname */
/** never use 'localhost' here or you will run in problems. (smart)
 **/
define('DB_HOST', '127.0.0.1');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.classicpress.net/secret-key/1.0/salt/ ClassicPress.net secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since WP-2.6.0
 */
define('AUTH_KEY',         'gfc_;r;5c$MmXS&~GpS#n=/Hjv&yido?UCp[WO3[Z$Qm5lVvw|%KZ<#9rOV8Y$Yz');
define('SECURE_AUTH_KEY',  '`v^GC9i{v2+R}6W.zEzNxnV14Wpz;Gk(R/5DoX^VZ}]M!N8$gwc7zw~?GMY[8C9(');
define('LOGGED_IN_KEY',    'snBB!avSg_yno8S**,G+C5I,OrBdJ&nK?qSFm05p54#J [jzguw;wD`75B+h^9?h');
define('NONCE_KEY',        'JACoz)[8wv?vibUpE,:^U1&~DLLD38POUkyUtZbW-)jpf^7dv|;;V+t8F^)<td9s');
define('AUTH_SALT',        'Znm3=%$,7r!&6F3|3jZPGC!MzoLlj9MRned;1x~3+lk=a2JRj8+8PP`sXf)6n+HC');
define('SECURE_AUTH_SALT', 'FSc%7U6~LKUp/=V5>p<ca9s/V]47x2N$3$ TB%;-QU:y?su3kuuaSzbzxMOxuATa');
define('LOGGED_IN_SALT',   'eqw)?aIa^^Z|9WiAE>+8JAj`a/_bIa9)h;[`hVHd/ypT6Q~riWk|p8|*B`zVlIx+');
define('NONCE_SALT',       'srMd?CU2ha#)1Sm;oSJE#Q[gq5DIeyP!26GaM[#Oy}AB+G<ryA%t{ibK`TKb 46:');

/**#@-*/

/**
 * ClassicPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: ClassicPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );
define( 'WP_CACHE', false );

/* Set this if we are in development mode. (smart) */
define( 'WP_STAGING', false ); 
define( 'WP_ALLOW_REPAIR', false );



# Enable core updates for minor releases (default):
define( 'WP_AUTO_UPDATE_CORE', false );

define( 'OPENGRAPH_STRICT_MODE', true );

define( 'IMPACT_SITE_ID', '121074d9-82d6-4e88-8376-5ae1064ad06d');

# Default locale for wordpress site
define( 'WPLANG', 'fr' ); 

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the ClassicPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up ClassicPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

