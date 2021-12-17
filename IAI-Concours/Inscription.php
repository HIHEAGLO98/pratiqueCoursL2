<?php
  if ( isset($_FILES["file"]) && ($_FILES["file"]["type"] == "application/pdf"))
    {
	    if ($_FILES["file"]["error"] > 0)
	    {
	      $Msg = "Return Code: " . $_FILES["file"]["error"] . "<br/>Fichier erroné.";
	      $alert = "alert-danger";
	    }
	    else
	    {
	      /*echo "Fichier à télécharger : " . $_FILES["file"]["name"]."<br />";
	      echo "Type: " . $_FILES["file"]["type"] . "<br />";
	      echo "Taille: " . ($_FILES["file"]["size"] / 1024) . "Kb<br />";
	      echo "Fichier temporaire : " . $_FILES["file"]["tmp_name"]."<br />";*/
	   
	      if (file_exists("/home/lamiye/www/IAI-Concours/Diplomes/".$_FILES["file"]["name"]))
	        {
	       		$Msg = "Veuillez renommer votre fichier. ";
	       		$alert = "alert-warning";
	        }
	      else
	        {
		        move_uploaded_file($_FILES["file"]["tmp_name"],"/home/lamiye/www/IAI-Concours/Diplomes/" . $_FILES["file"]["name"]);
		       // echo "Enregistré dans : " . "/home/lamiye/www/IAI-Concours/Diplomes/".$_FILES["file"]["name"];
		        require 'traitement/Connexion.php';

			 	$info = array(
					'nom' => $_POST['Nom'], 
					'prenom' =>  $_POST['Prenom'],
					'sexe' =>  $_POST['Sexe'],
					'dateNaiss' =>  $_POST['Naissance'],
					'nationalite' => $_POST['Nationalite'],
					'serie' => $_POST['Serie'],
					'anBac' => $_POST['AnBac'],
					'attestation' => $_FILES["file"]["name"]
				);
				$requete = $db->prepare('INSERT INTO etudiant (nom, prenom, sexe, dateNaissance ,nationalite ,serie ,annee_Bac ,diplome ) VALUES (:nom, :prenom , :sexe, :dateNaiss,:nationalite,:serie,:anBac,:attestation)');

				$requete->execute($info) or die (print_r($requete->errorInfo()));
				$Msg = "Etudiant  ".$_POST['Nom']."  ".$_POST['Prenom']." bien enregistré.";
				$alert = "alert-success";
	        }
	    }
	}
	else
	{
		$Msg = "Veuillez choisir un fichier PDF !!";
		$alert = " alert-primary";
	}
  ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Inscription</title>
	<?php include 'links.php'; ?>
</head>
<body>
		<?php include 'nav.php'; ?>

	<div class="row">
		<div class="col-2"></div>
		<div class="table col-10">
		<form method="post" action="Inscription.php" enctype="multipart/form-data">		
			
			<h1 align="center">Formulaire d'inscription</h1>

				<table>
					<tr>
						<td>
							<label>Nom *
						</td>
						<td>
							<input type="text" maxlength="25" required="true"  placeholder="ton nom" name="Nom" pattern="[A-Z]*" autofocus="" title="Le nom doit être en majuscule"></label>
						</td>
					</tr>
					<tr>
						<td>
							<label>Prenom *
						</td>
						<td>
							<input type="text" placeholder="ton prenom" required="true" name="Prenom"pattern="[A-Z]{1}[a-z]*" autofocus="" title="Le premier caractère doit être en majuscule"></label>
						</td>
					</tr>
					<tr>
						<td>
							<label>Date de naissance *
						</td>
						<td>
							<input type="date" name="Naissance"></label> 
						</td>
					</tr>
					<tr>
						<td>
							<label>Sexe 
						</td>
						<td>
							<input type="radio" name="Sexe"/ value="F"> Féminin  
							<input type="radio" name="Sexe"  value="M"/> Masculin  
							</label>
						</td>
					</tr>
					<tr>
						<td>
							<label>Nationalité *
						</td>
						<td>
							<input type="text" name="Nationalite"></label>
						</td>
					</tr>
					<tr>
						<td>
							<label>Série 
						</td>
						<td>
							<input type="radio" name="Serie" value="D"/> D    
							<input type="radio" name="Serie" value="C" /> C  
							<input type="radio" name="Serie" value="F2"/> F2   
							<input type="radio" name="Serie" value="E" /> E  
						</label>
						</td>
					</tr>
					<tr>
						<td>
							<label>Annee du  diplôme *
						</td>
						<td>
							<input type="number" min="2019" max="2021" name="AnBac"></label>
						</td>
					</tr>
					<tr>
						<td>
							<label>Atestation ou diplôme du BAC (pdf) *
						</td>
						<td>
							<input type="file" name="file" accept=".pdf" autofocus="" title="Seul les fichiers PDF sont acceptés" /></label>
						</td>
					</tr>
				</table>
					<?php if(isset($alert)){ ?>
					<div class="row">
						<div class="col-2"></div>
						<div class="alert <?php echo $alert;?> w-auto alert-dismissible fade show" role="alert">
							<?php echo $Msg; ?>
							<button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"> <i class="icofont-close-line"></i></button>
						</div>
					</div>
				<?php } ?>
			<div class="row">
				<div class="col-3"></div>
				<div class="col-4">
					<input type="submit" value="S'inscrire">
					<input type="reset" value="Annuler">
				</div>
			</div>
			
			
			
		</form>
		</div>
	</div>


	<?php include 'footer.php'; ?>

</body>
</html>
