<?php 

try {

	$db = new PDO('mysql:host=localhost;dbname=gestnote', 'root', '',
		array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	
	
} catch (PDOException $e) {
	die("Connexion non réussie : ".$e->getMessage());
	
}

?>


