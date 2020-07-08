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
        var_dump($viewPath);
        ob_start();
        // require('../view/' . $viewPath . '.php');
        require($viewPath . '.php');
        $pageContent = ob_get_clean();
        // $_GET['page'] = 'accueil';
        
        // require($_SERVER["DOCUMENT_ROOT"].'/TPDevWeb_SIMPLONP3/TP4_PHP_POO_V2/src/view/templates/layout.html.php');
        require('templates/layout.html.php');
    }
}

?>