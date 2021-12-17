<?php
   require_once "test.php";

	$requete = $db->prepare("SELECT * FROM client WHERE numClient = ?");
	$requete->execute(array($_GET['id']));

	//var_dump(array($_GET['id']));
	//exit();
	$donnees= $requete->fetch();
	//print_r($donnees);
	//exit();
	

	if (isset($_POST['enregistrer'])) 
	{
	
		$info = array(
			'nom' => $_POST['Nom'], 
			'prenom' =>  $_POST['Prenom'],
			'ville' =>  $_POST['Ville'],
			'tel' =>  $_POST['Tel'],
			'id' => $_POST['numClient']
		);
	$requet = $db->prepare('UPDATE client SET nom=:nom,
											   prenom=:prenom ,
											   ville=:ville, 
											   telephone=:tel 
											WHERE numClient=:id');
	$requet->execute($info)or die (print_r($requet->errorInfo()));
	echo "Client '".$_POST['Nom']." ".$_POST['Prenom']."' bien modifié.";
		header('location:Afficher_client.php');
	}
	/*

	//$id = $_GET["id"];
	//var_dump($id);
	$requette = $db->prepare("SELECT * FROM client WHERE numClient  = ?");
	//var_dump($requette);
	$requete->execute(array($_GET['id']));
	//exit();
	//$requette->execute();
	$donnees= $requette->fetch();
	//print_r($donnees);

	if (isset($_POST['enregistrer']))
	 {
		# code...
		
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$ville = $_POST['ville'];
		$tel = $_POST['Tel'];
		$numero = $_POST['numclient'];

		$req = $db->prepare("UPDATE client SET nom = $nom,
											  prenom=$prenom,
											  ville = $ville,
											  telephone = $tel,
											  WHERE numClient = $numero");

		$req->execute();

		header('location:Afficher_client.php');
   }*/


  ?>

  <!DOCTYPE html>
<html>

<head>
	<title>Formulaire - Clients</title>
	<link href="bootstrap_v45/css/bootstrap.css" rel="stylesheet">
	<script src="bootstrap_v45/js/jquery_v351.js"></script>
	<script src="bootstrap_v45/js/bootstrap.js"></script>
</head>

<body>
	<div>
		<header>
			<nav id="menu">
				<!-- Placez ici le contenu du menu  de page -->
				<ul class="nav nav-tabs nav-justified flex-sm-row felx column navbar-nav bg-dark">
					<li class="nav-item"><a class="nav-link" href="index.php" target="blank">GESTION</a></li>
					<li class="nav-item"><a class="nav-link" href="formulaire.php" target="blank">CLIENTS</a></li>
					<li class="nav-item"><a class="nav-link" href="formulaire_produit.php" target="blank">PRODUITS</a></li>
					<li class="nav-item"><a class="nav-link" href="formulaire_vente.php" target="blank">VENTES</a></li>
					<li class="nav-item"><a class="nav-link" href="index.php" target="blank">A PROPOS</a></li>
				</ul>
			</nav>


		</header>

	</div>
	<form style="margin-left: 50px " method="POST" action="Modifier_Client.php">
		<p>
		<h1>ENREGISTRER UN CLIENT</h1>
		</p>

		<table class="table table-hover table-bordered table-stripped">
			<tr>
				<td>Numéro</td>
				<td><input type="hidden" class="form-control" name="numclient" value="<?php echo $donnees['numClient']  ?>"></td>
			</tr>
			<tr>
				<td>Nom</td>
				<td><input type="text" class="form-control" name="Nom" value="<?php echo $donnees['nom']  ?>"></td>
			</tr>
			<tr>
			<tr>
				<td>Prénom</td>
				<td><input type="text" class="form-control" name="Prenom" value="<?php echo $donnees['prenom']  ?>"></td>
			</tr>
			<tr>
				<td>Ville</td>
				<td><input type="text" class="form-control" name="Ville" value="<?php echo $donnees['ville']  ?>"></td>
			</tr>
			<tr>
				<td>Téléphone</td>
				<td><input type="number" class="form-control" name="Tel" value="<?php echo $donnees['telephone']  ?>"></td>
			</tr>
		</table>
		<button type="submit" class="btn btn-primary" name="enregistrer">ENREGISTRER</button>

        <a href="Afficher_client.php"><input type="button" class="btn btn-primary"value="CONSULTER"></a>
	</form>
</body>

</html>
