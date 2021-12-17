<?php 
	include('traitement/Connexion.php');

	$requete = $db->query('SELECT * FROM etudiant');
	$donnee = $requete->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Candidats - Liste</title>
	<link rel="stylesheet" type="text/css" href="../icofont/icofont.min.css">
	<?php include 'links.php'; ?>
</head>

<body>
	<?php include 'nav.php'; ?>
	<div class="row">
		<div class="col-1"></div>
		<div class="col-10 tableau">
			<h1 align="center">Liste des candidats</h1>
			<table border="1" collapse>
				<thead>
					<tr>
						<td>Id</td>
						<td>Nom</td>
						<td>Prenom</td>
						<td>Sexe</td>
						<td>date de naissance</td>
						<td>Nationalité</td>
						<td>serie</td>
						<td>Année du BAC</td>
						<td>Diplôme</td>
						<td>Actions</td>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($donnee as $value) {?>
					<tr>
						<td><?php echo $value['id'] ?></td>
						<td><?php echo $value['nom'] ?></td>
						<td><?php echo $value['prenom'] ?></td>
						<td><?php echo $value['sexe'] ?></td>
						<td><?php echo $value['dateNaissance'] ?></td>
						<td><?php echo $value['nationalite'] ?></td>
						<td><?php echo $value['serie'] ?></td>
						<td><?php echo $value['annee_Bac'] ?></td>
						<td><?php echo $value['diplome'] ?></a></td>
						<td>
							<a href="<?php echo "/IAI-Concours/Diplomes/".$value['diplome'] ?>" target="_blank"><i class="icofont-eye"></i></a> / 
							<a href="<?php echo "/IAI-Concours/Diplomes/".$value['diplome'] ?>" download> <i class="icofont-download"></i></a>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>

	<?php include 'footer.php'; ?>
</body>
</html>
