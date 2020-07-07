<?php
/* === WELCOME TO THE CODE ===
 *                     
 *	  By :
 *
 *     ██████╗ ██████╗ ██████╗ ██╗████████╗    ████████╗██╗   ██╗██████╗ ███╗   ██╗███████╗██████╗ 
 *    ██╔═══██╗██╔══██╗██╔══██╗██║╚══██╔══╝    ╚══██╔══╝██║   ██║██╔══██╗████╗  ██║██╔════╝██╔══██╗
 *    ██║   ██║██████╔╝██████╔╝██║   ██║          ██║   ██║   ██║██████╔╝██╔██╗ ██║█████╗  ██████╔╝
 *    ██║   ██║██╔══██╗██╔══██╗██║   ██║          ██║   ██║   ██║██╔══██╗██║╚██╗██║██╔══╝  ██╔══██╗
 *    ╚██████╔╝██║  ██║██████╔╝██║   ██║          ██║   ╚██████╔╝██║  ██║██║ ╚████║███████╗██║  ██║
 *     ╚═════╝ ╚═╝  ╚═╝╚═════╝ ╚═╝   ╚═╝          ╚═╝    ╚═════╝ ╚═╝  ╚═╝╚═╝  ╚═══╝╚══════╝╚═╝  ╚═╝
 */
namespace Orbit\libs\core;
use Orbit\src\routes;

// require_once ($_SERVER["DOCUMENT_ROOT"].'/TPDevWeb_SIMPLONP3/TP4_PHP_POO_V1/src/routes/dir.php');
// require_once ($_SERVER["DOCUMENT_ROOT"].'/TPDevWeb_SIMPLONP3/TP4_PHP_POO_V1/src/libs/Renderer.php');
// echo dirname(dirname(__DIR__));

abstract class Controller 
{
    protected $loader;
    protected $modelName;
    protected $model;
    
    public function __construct()
    {
        if(!empty($this->modelName)) {
            require_once($_SERVER["DOCUMENT_ROOT"]."/TPDevWeb_SIMPLONP3/TP4_PHP_POO_V1/src/model/". $this->modelName.".php");
            $this->model = new $this->modelName;
            $this-> loader = new Renderer();
        } else {
            
            /* L'OBJET EN COURS */
            $this-> loader = new Renderer();
        }
        // echo "CONTROLLER LIBS";
    }
    
    
}


?>