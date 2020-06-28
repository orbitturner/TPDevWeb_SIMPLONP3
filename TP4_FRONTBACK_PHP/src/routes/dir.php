<?php
// 
function getProjectRoot(){
    return "/tpdevweb_simplon_p3/TP4_FRONTBACK_PHP/";
}
function getProjectPath(){
    return "/tpdevweb_simplon_p3/TP4_FRONTBACK_PHP/src/";
}

function getPublicPath(){
    return "/tpdevweb_simplon_p3/TP4_FRONTBACK_PHP/public/";
}

function getControllerPath(String $controllerName){
    return "/tpdevweb_simplon_p3/TP4_FRONTBACK_PHP/src/controller/"+$controllerName;
}

function getModelPath(String $modelName){
    return "/tpdevweb_simplon_p3/TP4_FRONTBACK_PHP/src/controller/"+$modelName;
}

?>