<!-- TRAITEMENT -->
<?php 
if (isset($_POST['nom'])) {
	$nom =  $_POST['nom'];
	$prenom = $_POST['prenom'];
	$dateNaiss = $_POST['dateNaiss'];
	$heureNaiss = $_POST['heureNaiss'];
	$sexe = $_POST['sexe'];
	$taille = $_POST['taille'];
	$pin = $_POST['pin'];
	$email = $_POST['email'];
	$teint = $_POST['teint'];

	echo "Nom et Prénom: " .$nom. " " .$prenom. "<br/>Date de naissance : " .$dateNaiss. "<br/>Sexe : " .$sexe. "<br/>Email : " .$email. "<br/>" ;
}
else
{
	echo "Renseignez le nom";
	echo ".BONJOUR....";
}
	

 ?>