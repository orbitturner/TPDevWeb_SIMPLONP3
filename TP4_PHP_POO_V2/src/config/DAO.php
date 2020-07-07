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
namespace Orbit\src\config;

use Exception;
use PDO;

// require_once ($_SERVER["DOCUMENT_ROOT"].'/TPDevWeb_SIMPLONP3/TP4_PHP_POO_V1/src/routes/dir.php');
	
	class DAO 
	{
		private $host;	
		private $dbName;
		private $user;
		private $password; 

		
		public function __construct()
		{
			$this->host = 'localhost';
			$this->dbName = 'tp4_bp_simplon';
			$this->user = 'shadowwalker';
			$this->password = '@webmaster1';
		}
		
		/** 
	* Database connector Function
	* @return PDO
	*/
		public function dbConnector(): PDO{
			try {
				$db = new PDO('mysql:host='.$this->host.';dbname='.$this->dbName, $this->user, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
				echo '<script>console.log("CONNECTED TO SERVER DB SUCCESSFULLY")</script>';

			} catch (Exception $e) {
				// echo '

				$itMsg = $e->getCode();
				// header('location:'.getProjectPath().'view/errors/db_error.php?error='.$itMsg);
				header('location:'.getProjectRoot().'dbAccessError?error='.$itMsg);
				// die("<b>ERREUR RETOURNE: </b> ".$e->getMessage());
				// die(var_dump($e));

			}
			return $db;
		}
	}
	
	
?>