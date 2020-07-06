<?php
// 
function getProjectRoot(){
    return "/TPDevWeb_SIMPLONP3/TP4_PHP_POO_V1/";
}
function getProjectPath(){
    return "/TPDevWeb_SIMPLONP3/TP4_PHP_POO_V1/src/";
}

function getPublicPath(){
    return "/TPDevWeb_SIMPLONP3/TP4_PHP_POO_V1/public/";
}

function getControllerPath(String $controllerName){
    return "/TPDevWeb_SIMPLONP3/TP4_PHP_POO_V1/src/controller/"+$controllerName;
}

function getModelPath(String $modelName){
    return "/TPDevWeb_SIMPLONP3/TP4_PHP_POO_V1/src/controller/"+$modelName;
}

?>