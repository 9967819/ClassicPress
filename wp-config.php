<?php
define('DB_NAME', 'ahnjournal_frontend');
define('DB_USER', 'wordpress');
define('DB_PASSWORD', '8fjf66df;0DD2');
define('DB_HOST', '127.0.0.1');
define('DB_CHARSET', 'utf8mb4');
define( 'DB_COLLATE', '' );
define('AUTH_KEY',         'gfc_;r;5c$MmXS&~GpS#n=/Hjv&yido?UCp[WO3[Z$Qm5lVvw|%KZ<#9rOV8Y$Yz');
define('SECURE_AUTH_KEY',  '`v^GC9i{v2+R}6W.zEzNxnV14Wpz;Gk(R/5DoX^VZ}]M!N8$gwc7zw~?GMY[8C9(');
define('LOGGED_IN_KEY',    'snBB!avSg_yno8S**,G+C5I,OrBdJ&nK?qSFm05p54#J [jzguw;wD`75B+h^9?h');
define('NONCE_KEY',        'JACoz)[8wv?vibUpE,:^U1&~DLLD38POUkyUtZbW-)jpf^7dv|;;V+t8F^)<td9s');
define('AUTH_SALT',        'Znm3=%$,7r!&6F3|3jZPGC!MzoLlj9MRned;1x~3+lk=a2JRj8+8PP`sXf)6n+HC');
define('SECURE_AUTH_SALT', 'FSc%7U6~LKUp/=V5>p<ca9s/V]47x2N$3$ TB%;-QU:y?su3kuuaSzbzxMOxuATa');
define('LOGGED_IN_SALT',   'eqw)?aIa^^Z|9WiAE>+8JAj`a/_bIa9)h;[`hVHd/ypT6Q~riWk|p8|*B`zVlIx+');
define('NONCE_SALT',       'srMd?CU2ha#)1Sm;oSJE#Q[gq5DIeyP!26GaM[#Oy}AB+G<ryA%t{ibK`TKb 46:');

$table_prefix  = 'wp_';

define( 'WP_DEBUG', false );
define( 'WP_CACHE', false );
define( 'WP_STAGING', false ); 
define( 'DISABLE_WP_CRON', true); #disable cron
define( 'WP_ALLOW_REPAIR', false );
# Enable core updates for minor releases (default):
define( 'WP_AUTO_UPDATE_CORE', false );

#define( 'OPENGRAPH_STRICT_MODE', true );


### Redis backend
define( 'WP_REDIS_ENABLE', true );
define( 'WP_REDIS_IS_LOCALHOST', WP_REDIS_ENABLE );

if (WP_REDIS_IS_LOCALHOST === true) {
	//global $redis;
	$redis = new Redis(); 
	$redis->connect('127.0.0.1', 6379);
} else { 
	$redis = false;
}

define('REDIS_CLIENT', $redis);


#define( 'IMPACT_SITE_ID', '121074d9-82d6-4e88-8376-5ae1064ad06d');

# Default locale for wordpress site
# define( 'WPLANG', 'fr' ); 

define( 'siteurl', 'http://pamela' );
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the ClassicPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up ClassicPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

