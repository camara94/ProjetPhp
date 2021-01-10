<?php
	
	function Connexion($host = 'localhost', $user = 'root', $password = '', $database = 'miniprojetphp')
	{
		
		try {
			$db = new PDO('mysql:host='.$host.';dbname='.$database.';charset=UTF8', $user, $password);
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $db;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

?>