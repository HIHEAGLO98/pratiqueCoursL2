<?php

	$nom = $_POST["nom"];
	$sexe = $_POST["sexe"];
	$age = $_POST["age"];


	if (isset($_POST["nom"])&& $_POST["sexe"] =='Masculin')
	 {
		echo "Bienvenu Monsieur ".$nom.", vous avez ".$age." ans.";
	}
	else
	{
		echo "Bienvenu Madame ".$nom.", vous avez ".$age." ans.";
	}
?>