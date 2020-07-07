<?php
namespace Orbit\src\routes;
// 
function getProjectRoot(){
    return "/TPDevWeb_SIMPLONP3/TP4_PHP_POO_V2/";
}
function getProjectPath(){
    return "/TPDevWeb_SIMPLONP3/TP4_PHP_POO_V2/src/";
}

function getPublicPath(){
    return "/TPDevWeb_SIMPLONP3/TP4_PHP_POO_V2/public/";
}

function getControllerPath(String $controllerName){
    return "/TPDevWeb_SIMPLONP3/TP4_PHP_POO_V2/src/controller/"+$controllerName;
}

function getModelPath(String $modelName){
    return "/TPDevWeb_SIMPLONP3/TP4_PHP_POO_V2/src/controller/"+$modelName;
}

?>