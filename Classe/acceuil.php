<?php 
	if($_GET['pass'] != 'mot')
	{
		echo "Mot de passe incorrect";
	}
	else
	{
		echo "Bienvenue " . $_GET['nom'];
	}
 ?>

