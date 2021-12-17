<?php
    $jour = $_POST["jour"];
	$mois = $_POST["mois"];
	$annee = $_POST["annee"];

	if ($jour <1 || $jour>31 )
	 {
			echo "<script type='text/javascript'>
			alert('Le jour doit être compris entre 1 et 31');
			document.location('Formulaire.php');
			</script>";
	}
				

?>
<!DOCTYPE html>
<html>
<head>
	<title>Formulaire de saisie</title>
	<meta charset="utf-8">
</head>
<body>
	<form  method="POST" action="Formulaire.php">
	<table  border="2">
			<tr>
				<td>Jour</td>
				<td><input type="number"  name="jour"  value="<?php echo $jour?>"></td>
			</tr>
			<tr>
			<tr>
				<td>Mois</td>
				<td><select name="mois">
                        <optgroup>
                            <option> Janvier</option>
                            <option>Février</option>
                            <option> Mars</option>
                            <option> Avril</option>
                            <option> Mai </option>
                            <option> Juin </option>
                            <option> Juillet </option>
                            <option> Août </option>
                            <option> Septembre </option>
                            <option> Octobre </option>
                            <option> Novembre </option>
                            <option>Décembre</option>
                        </optgroup></td>
			</tr>
			<tr>
				<td>Année</td>
				<td><input type="number" name="annee" value="<?php echo $annee?>" ></td>
				
			</tr>
			
			<tr><td><button type="submit" name="valider">Valider</button></td></tr>
			<tr>
				<td>
				<td><input value="<?php

				if ($jour == 1) 
				{

				echo "Vous avez selectioné le 1er ".$mois." ".$annee;
			
			}else
			{
				echo "Vous avez selectionné le ".$jour." ".$mois." ".$annee;
			}
			

				?>"	  ></td>
			</tr>
		</table>
	</form>
</body>
</html>
