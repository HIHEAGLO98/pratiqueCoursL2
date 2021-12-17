<?php 
// EXO1

	/*$pass = $_POST['password'];
	$nom = $_POST['nom'];
	header('location:acceuil.php?pass='.$pass.'&nom='.$nom); */
// EXO2
/*
	if (isset($_POST['vendeur']) AND isset($_POST['produit']) AND isset($_POST['nb'])) 
	{
		if ($_POST['nb']==1) {
			echo "Vous avez commandé " .$_POST['nb']. " " .$_POST['produit']. " auprès de " .$_POST['vendeur'];
		}
		elseif ($_POST['nb']>1) {
			echo "Vous avez commandé " .$_POST['nb']. " " .$_POST['produit']. "s auprès de " .$_POST['vendeur'];
		}
		else
		{
			echo "Vous n'avez pas passé de commande";
		}
	}
*/
// EXO3
/*if (isset($_POST['Nom']) AND isset($_POST['choix'])) 
{
	echo $_POST['Nom']. " est " .$_POST['choix'];
}*/
/*$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$age = $_POST['age'];
$langue = $_POST['langue'];
echo $nom." " .$prenom. " agé de " .$age. " ans.<br/>Langues: <br/>";
foreach ($langue as $value) {
	echo $value."<br/>";
}
*/
// EXO4
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$adr = $_POST['adresse'];
$vil = $_POST['ville'];
$code = $_POST['code'];
if (empty($nom)) {
	echo "<script type='text/javascript'>
			alert('Remplissez les champs vides');
			document.location('Exercices.php');
	</script>";
}
else{
	echo " <table border='1'>
		<tr>
			<td>Nom</td>
			<td>Prenom</td>
			<td>Adresse</td>
			<td>Ville</td>
			<td>Code postal</td>
		</tr>
		<tr>
			<td>".$nom."</td>
			<td>".$prenom."</td>
			<td>".$adr."</td>
			<td>".$vil."</td>
			<td>".$code."</td>
		</tr>
	</table> ";
}

?>