<?php
  if ((($_FILES["file"]["type"] == "application/pdf")))
    {
	    if ($_FILES["file"]["error"] > 0)
	    {
	      $Msg = "Return Code: " . $_FILES["file"]["error"] . "<br/>";
	    }
	    else
	    {
	      /*echo "Fichier à télécharger : " . $_FILES["file"]["name"]."<br />";
	      echo "Type: " . $_FILES["file"]["type"] . "<br />";
	      echo "Taille: " . ($_FILES["file"]["size"] / 1024) . "Kb<br />";
	      echo "Fichier temporaire : " . $_FILES["file"]["tmp_name"]."<br />";*/
	   
	      if (file_exists("/home/lamiye/www/IAI-Concours/Diplomes/".$_FILES["file"]["name"]))
	        {
	       		$Msg = "Le fichier" .$_FILES["file"]["name"] ."  existe déjà à cette emplacement. ";
	        }
	      else
	        {
		        move_uploaded_file($_FILES["file"]["tmp_name"],"/home/lamiye/www/IAI-Concours/Diplomes/" . $_FILES["file"]["name"]);
		       // echo "Enregistré dans : " . "/home/lamiye/www/IAI-Concours/Diplomes/".$_FILES["file"]["name"];
		        require 'Connexion.php';

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
				$Msg = "Etudiant  '".$_POST['Nom']."  ".$_POST['Prenom']."' bien enregistré.";
	        }
	    }
	}
	else
	{
		$Msg = "Chemin invalide !!";
	}
	header("location:../Inscription.php?pif=2415&t=$Msg");
  ?>