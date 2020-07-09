<?php
/* === WELCOME TO ORBIT NEXT FRAMEWORK  ===
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
// namespace Orbit;

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
      // $actualClass = str_replace('Orbit'. '\\', '', $actualClass);

      (strpos($actualClass, 'Orbit') !== false) ? $actualClass = str_replace('Orbit'. '\\', '', $actualClass) : '';
      // var_dump($actualClass);
      /** 
     * autoloader of system
     * 20/03/2019
     */
    if(file_exists("libs/core/".$actualClass.".lib.class.php")) {
        require_once "libs/core/".$actualClass.".lib.class.php";
      }
      /** 
       * autoload of developers classes
       **/
      else if(file_exists("src/entities/".$actualClass.".class.php")) {
        require_once "src/entities/".$actualClass.".class.php";
      } else if(file_exists("src/controller/".$actualClass.".class.php")) {
        require_once "src/controller/".$actualClass.".class.php";
      } else if(file_exists("src/model/".$actualClass.".class.php")) {
        require_once "src/model/".$actualClass.".class.php";
  
      } else if(file_exists("src/entities/".$actualClass.".php")) {
        require_once "src/entities/".$actualClass.".php";
      } else if(file_exists("src/controller/".$actualClass.".php")) {
        require_once "src/controller/".$actualClass.".php";
      } else if(file_exists("src/model/".$actualClass.".php")) {
        require_once "src/model/".$actualClass.".php";
      /** 
       * for namespaces
       **/
      } else if(file_exists(str_replace("\\", "/", $actualClass.".class.php"))) {
        require_once str_replace("\\", "/", $actualClass.".class.php");
      } else if(file_exists(str_replace("\\", "/", $actualClass.".php"))) {
        require_once str_replace("\\", "/", $actualClass.".php");
      } else if(file_exists(str_replace("\\", "/", $actualClass.".lib.class.php"))) {
        require_once str_replace("\\", "/", $actualClass.".lib.class.php");
      } else
      {
        echo "Le namespace <b>".$actualClass."</b> ne correspond pas à un chemin valide
                    dans votre application.
                    <br/> Ou encore vous vous êtes trompés sur l'orthographe!!!!";
        // require_once "libs/system/SM_Error.lib.class.php";
        // $error = new SM_Error();
        // $error->messageError($message);
      }
    }
}
Autoloader::register();
?>
