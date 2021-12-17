<?php

	require_once('test.php');
	$info = array(
		'nom' => $_POST['nom'], 
		'prenom' =>  $_POST['prenom'],
		'ville' =>  $_POST['ville'],
		'tel' =>  $_POST['Tel']
	);

	$requete = $db->prepare('INSERT INTO client (nom, prenom, ville, telephone) VALUES (:nom, :prenom , :ville, :tel)');
	$requete->execute($info) or die (print_r($requete->errorInfo()));
	echo "Client  '".$_POST['nom']."  ".$_POST['prenom']."' bien enregistré.";

  ?>