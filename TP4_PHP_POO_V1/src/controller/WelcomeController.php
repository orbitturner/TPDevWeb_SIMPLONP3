<?php
    require_once('../libs/core/Controller.php');

class WelcomeController extends Controller{

    
    public function index(){

        $this->loader->render('ACCUEIL',"home");
    }

    
}
?>