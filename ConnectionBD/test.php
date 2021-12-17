<?php 

try {

	$db = new PDO('mysql:host=localhost;dbname=venteprod', 'root', '123456',
		array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	//echo "Connection réussie";
	
} catch (PDOException $e) {
	die("Connexion non réussie : ".$e->getMessage());
	
}

?>


