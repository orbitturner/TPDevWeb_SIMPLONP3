<?php
namespace Orbit\src\controller;
use Orbit\libs\core\Controller;
    // require_once('../libs/core/Controller.php');

class WelcomeController extends Controller{

    
    public function index(){

        $this->loader->render('ACCUEIL',"home");
    }

    
}
?>