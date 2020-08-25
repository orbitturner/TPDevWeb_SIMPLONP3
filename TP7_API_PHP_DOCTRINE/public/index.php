<?php
require "../bootstrap.php";
use Orbit\Services\ClientServices;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode( '/', $uri );

// all of our endpoints start with /person
// everything else results in a 404 Not Found
if ($uri[1] !== 'client') {
    header("HTTP/1.1 404 Not Found");
    exit();
}


// the user id is, of course, optional and must be a number:
$methodParams = null;
if (isset($uri[2])) {
    $methodParams = (int) $uri[2];
}

$requestMethod = $_SERVER["REQUEST_METHOD"];

// pass the request method and user ID to the ClientServices and process the HTTP request:
$services = new ClientServices($entityManager, $requestMethod, $methodParams);
$services->processRequest();