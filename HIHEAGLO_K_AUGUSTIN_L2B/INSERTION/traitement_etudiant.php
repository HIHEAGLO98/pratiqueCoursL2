<?php

	require_once('Connect.php');
	$info = array(
		'nom' => $_POST['nom'], 
		'prenom' =>  $_POST['prenom'],
		'ville' =>  $_POST['ville'],
		'sexe' =>  $_POST['sexe'],
		'daten'=> $_POST['naissance'],
		'rue'=> $_POST['rue'],
		'codep'=> $_POST['cp']


	);

	$requete = $db->prepare('INSERT INTO etudiant (nom, prenom, datenaiss,sexe,rue,cp,ville) VALUES (:nom, :prenom , :daten, :sexe,:rue,:codep,:ville)');
	$requete->execute($info) or die (print_r($requete->errorInfo()));
	echo "Etudiant  '".$_POST['nom']. "  ".$_POST['prenom']."' bien enregistré.";

  ?>