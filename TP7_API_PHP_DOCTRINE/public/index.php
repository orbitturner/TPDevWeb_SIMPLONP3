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
//=============================================
require "../bootstrap.php";
//=============================================
use Orbit\Services\ClientServices;
use Orbit\Services\CompteEPSXServices;

//=============================================

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode( '/', $uri );

// all of our endpoints start with /person
// everything else results in a 404 Not Found
// if ($uri[1] !== 'client') {
//     header("HTTP/1.1 404 Not Found");
//     exit();
// }
if ($uri[1] === 'api') {
    switch ($uri[2]) {
        case 'client':
            // Getting The Method Parameter, of course, its optional and must be a number:
            $methodParams = null;
            if (isset($uri[3])) {
                $methodParams = $uri[3];
            }
            // Contains The Type of Request Used [GET-POST-PUT-DELETE]
            $requestMethod = $_SERVER["REQUEST_METHOD"];

            // pass the request method and user ID to the ClientServices and process the HTTP request:
            $services = new ClientServices($entityManager, $requestMethod, $methodParams);
            $services->processRequest();
            break;
        case 'compte':
            // Getting The Method Parameter, of course, its optional and must be a number:
            $methodParams = null;
            if (isset($uri[3])) {
                $methodParams = $uri[3];
            }
            // Contains The Type of Request Used [GET-POST-PUT-DELETE]
            $requestMethod = $_SERVER["REQUEST_METHOD"];

            // pass the request method and user ID to the ClientServices and process the HTTP request:
            $services = new CompteEPSXServices($entityManager, $requestMethod, $methodParams);
            $services->processRequest();
            break;
        default:
            echo("ENTITY DOESN'T EXIST !");
            exit();
            break;
    }
}else {
    header("HTTP/1.1 404 Not Found");
    exit();
}


