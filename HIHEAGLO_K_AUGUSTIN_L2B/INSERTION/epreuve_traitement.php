<?php
	require_once('Connect.php');
		$info = array(
			'dateE' => $_POST['date'], 
			'lieu' =>  $_POST['lieu'],
			'cod'  =>$_POST['code']		


		);

		$requete = $db->prepare('INSERT INTO epreuve (datepreuve, lieu,codemat) VALUES (:dateE, :lieu,:cod )');
		$requete->execute($info) or die (print_r($requete->errorInfo()));
		echo "Epreuve bien enregistré.";
		

?>