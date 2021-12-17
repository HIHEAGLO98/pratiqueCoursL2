<?php
	require_once('Connect.php');
		$info = array(
			'libelle' => $_POST['lib'], 
			'coeff' =>  $_POST['coefficient'],
		


		);

		$requete = $db->prepare('INSERT INTO matiere (libelle, coef) VALUES (:libelle, :coeff )');
		$requete->execute($info) or die (print_r($requete->errorInfo()));
		echo "Matière bien enregistré.";
		

?>