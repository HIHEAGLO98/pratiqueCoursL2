<!DOCTYPE html>
<html>
<head>
	<title>Formulaire</title>
</head>
<body>
	<form style="margin-left: 50px " method="POST" action="Traitement.php">
	

		<table border="2">
			<tr>
				<td>Nom</td>
				<td><input type="text"  name="nom" ></td>
			</tr>
			<tr>
			
			<tr>
				<td>Sexe</td>
				<td><select name="sexe">
					<optgroup>
						<option>Masculin</option>
						<option>Féminim</option>
					</optgroup>
				</select></td>
			</tr>
			<tr>
				<td>Age</td>
				<td><input type="number" name="age"></td>
			</tr>
		</table>
		<button type="submit"  name="send">Envoyer</button>

	</form>

</body>
</html>