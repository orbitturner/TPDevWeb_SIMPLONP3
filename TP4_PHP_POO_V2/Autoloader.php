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
namespace Orbit;

class Autoloader{
    static function register(){
        /**
         * JE RECUPERE LA CLASSE INSTANCIEE ET J'LA PASSE A LA FONCTION OAL
         */
        spl_autoload_register([
            __CLASS__,'orbitautoload'
        ]);
    }
    //CHARGEUR AUTOMATIQUE DES CLASSES INSTANCIEES DEPUIS
     // UN NAMEPACE`
    static function orbitautoload($actualClass){
        /*ON RECUPERE LE CHEMIN ET ON ENLEVE LE ORBIT */
        $actualClass = str_replace(__NAMESPACE__. '\\', '', $actualClass);

        // ON CONVERTIT LES \ EN / 
        $actualClass = str_replace('\\','/', $actualClass);

        //LOADING 
        require_once __DIR__ .'/'. $actualClass . '.php';
    }
}

?>
