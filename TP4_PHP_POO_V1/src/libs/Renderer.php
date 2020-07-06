<?php

class Renderer {
    // private $pageTitle;
    // private $viewPath;

    
    // public function __construct()
    // {
    //     $this->pageTitle = $pageTitle;
    //     $this->viewPath = $viewPath;

    // }

    /**
     * Fonction permettant de faire l'affichage selon le rendu 
     *
     * @param string $pageTitle
     * @param string $viewPath
     * @return void
     */
    public static function render(string $pageTitle, string $viewPath): void
    {
        // extract($variables);

        ob_start();
        require('../view/' . $viewPath . '.php');
        $pageContent = ob_get_clean();
        $_GET['page'] = 'accueil';
        
        require('../view/templates/layout.html.php');
    }
}

?>