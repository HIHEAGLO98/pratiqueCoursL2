
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Formulaire-Matière</title>
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
					<li class="nav-item"><a class="nav-link" href="form_etudiant.php" target="blank">ETUDIANTS</a></li>
					<li class="nav-item"><a class="nav-link" href="form_matiere.php" target="blank">MATIERES</a></li>
					<li class="nav-item"><a class="nav-link" href="saisie_epreuve.php" target="blank">EPREUVES</a></li>
				
				</ul>
			</nav>


		</header>
	

	</div>
	

	</div>
	<form style="margin-left: 50px " method="POST" action="matiere_traitement.php">
		<p>
		<h1>ENREGISTRER UNE MATIERE</h1>
		</p>

		<table class="table table-hover table-bordered table-stripped">
			<tr>
				<td>Libelle</td>
				<td><input type="text" class="form-control" name="lib" ></td>
			</tr>
			<tr>
			<tr>
				<td>Coef</td>
				<td><input type="number" class="form-control" name="coefficient"></td>
			</tr>
		</table>
		<button type="submit" class="btn btn-primary" name="enregistrer">ENREGISTRER</button>

        <button type="reset" class="btn btn-primary" name="annuler" value="ANNULLER">ANNULER</button>
	</form>
</body>

</html>
