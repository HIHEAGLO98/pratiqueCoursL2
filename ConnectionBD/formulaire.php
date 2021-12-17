<!DOCTYPE html>
<html>

<head>
	<title>Formulaire des clients</title>
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
	<form style="margin-left: 50px " method="POST" action="client_Traitement.php">
		<p>
		<h1>ENREGISTRER UN CLIENT</h1>
		</p>

		<table class="table table-hover table-bordered table-stripped">
			<tr>
				<td>Nom</td>
				<td><input type="text" class="form-control" name="nom" ></td>
			</tr>
			<tr>
			<tr>
				<td>Prénom</td>
				<td><input type="text" class="form-control" name="prenom"></td>
			</tr>
			<tr>
				<td>Ville</td>
				<td><input type="text" class="form-control" name="ville" ></td>
			</tr>
			<tr>
				<td>Téléphone</td>
				<td><input type="number" class="form-control" name="Tel"></td>
			</tr>
		</table>
		<button type="submit" class="btn btn-primary" name="enregistrer">ENREGISTRER</button>

        <a href="Afficher_client.php"><input type="button" class="btn btn-primary"value="CONSULTER"></a>
	</form>
</body>

</html>