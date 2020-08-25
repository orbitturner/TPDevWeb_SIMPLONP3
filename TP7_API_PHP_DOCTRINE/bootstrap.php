<?php
/* === 🌌 WELCOME TO ORBIT API FRAMEWORK 🌌  ===
*                     
*	  By :
*
*     ██████╗ ██████╗ ██████╗ ██╗████████╗    ████████╗██╗   ██╗██████╗ ███╗   ██╗███████╗██████╗ 
*    ██╔═══██╗██╔══██╗██╔══██╗██║╚══██╔══╝    ╚══██╔══╝██║   ██║██╔══██╗████╗  ██║██╔════╝██╔══██╗
*    ██║   ██║██████╔╝██████╔╝██║   ██║          ██║   ██║   ██║██████╔╝██╔██╗ ██║█████╗  ██████╔╝
*    ██║   ██║██╔══██╗██╔══██╗██║   ██║          ██║   ██║   ██║██╔══██╗██║╚██╗██║██╔══╝  ██╔══██╗
*    ╚██████╔╝██║  ██║██████╔╝██║   ██║          ██║   ╚██████╔╝██║  ██║██║ ╚████║███████╗██║  ██║
*     ╚═════╝ ╚═╝  ╚═╝╚═════╝ ╚═╝   ╚═╝          ╚═╝    ╚═════╝ ╚═╝  ╚═╝╚═╝  ╚═══╝╚══════╝╚═╝  ╚═╝
*          
*  AUTHOR : MOHAMED GUEYE [Orbit Turner] - Linkedin: www.linkedin.com/in/orbitturner - Email: orbitturner@orbitturner.com - Country: Senegal
*                              GITHUB : Orbit Turner    -   Website: http://orbitturner.yj.fr/ 
*/
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager,
Doctrine\ORM\Configuration;
use Dotenv\Dotenv;

require 'vendor/autoload.php';

$dotenv = new DotEnv(__DIR__);
$dotenv->load();

// test code, should output:
// api://default
// when you run $ php bootstrap.php
echo getenv('OKTAAUDIENCE');

// ===================================================================
//  -->     DOCTRINE CONFIGURATION
// ===================================================================
/**
 * Dev Mode
 */
$cache = new \Doctrine\Common\Cache\ArrayCache;
/**
 * Prod Mode
 */
//$cache = new \Doctrine\Common\Cache\ApcCache;

$config = new Configuration;
$config->setMetadataCacheImpl($cache);
$driverImpl = $config->newDefaultAnnotationDriver(__DIR__."/src/Entities/");
$config->setMetadataDriverImpl($driverImpl);
$config->setQueryCacheImpl($cache);
$config->setProxyDir(__DIR__.'/cache/proxies/');
$config->setProxyNamespace('Orbit\Proxies');
/**
 * Dev Mode
 */
$config->setAutoGenerateProxyClasses(true);

/**
 * Prod Mode
 */
//$config->setAutoGenerateProxyClasses(false);

// CONNECTION PARAMS FROM ENV
$orm = array(
    'dbname' => getenv('DB_DATABASE'),
    'host' => getenv('DB_HOST'),
    'user'     => getenv('DB_USERNAME'),
    'password' => getenv('DB_PASSWORD'),
    'driver' => 'pdo_mysql',
);

$entityManager = EntityManager::create($orm, $config);

// try {
//     $entityManager->getConnection()->connect();
// } catch (\Throwable $err) {
//     $error = new Err_Manager();
//     $message = $err->getMessage();
//     $error->messageError($message);
// }