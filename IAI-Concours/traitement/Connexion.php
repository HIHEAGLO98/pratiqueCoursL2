<?php 
	try{
		$db = new PDO('mysql:host=localhost;dbname=inscription', 'root', '123456');
	}catch(PDOExeption $e){
		echo "Error : ".$e->getMessage();
	}
 ?>