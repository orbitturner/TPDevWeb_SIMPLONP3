
<?php
	require_once ($_SERVER["DOCUMENT_ROOT"].'/tpdevweb_simplon_p3/TP4_FRONTBACK_PHP/src/routes/dir.php');
	function dbConnector(){
		$host = 'localhost';
		$dbName = 'tp4_bp_simplon';
		$user = 'shadowwalker';
		$password = '@webmaster1';

		try {
			$db = new PDO('mysql:host='.$host.';dbname='.$dbName, $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
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
?>