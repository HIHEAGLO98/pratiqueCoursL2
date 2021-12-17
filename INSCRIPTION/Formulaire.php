<!DOCTYPE html>
<html>

<head>
	<title>Formulaire d'inscription</title>
	<link href="bootstrap_v45/css/bootstrap.css" rel="stylesheet">
	<script src="bootstrap_v45/js/jquery_v351.js"></script>
	<script src="bootstrap_v45/js/bootstrap.js"></script>
	<script type="text/javascript">
		function validation() 
		{
			var mot1 = document.getElementById("passe");
			var mot2 = document.getElementById("confirmation");
			if(mot2 != mot1)
			{
					document.getElementById("message").innerHTML="Invalide";
				    document.getElementById("message").style.color = "red";
			}
			else
			{
				document.getElementById("message").innerHTML="Valide";
				document.getElementById("message").style.color = "green";
			}
		}
	</script>

</head>

<body> 
	
	<form style="margin-left: 50px " method="POST" action="">
		<p>
		<h1>Formulaire d'inscription</h1>
		</p>
		
		<table class="table table-hover table-bordered table-stripped">
			<tr>
				<td>Nom</td>
				<td><input type="text" class="form-control" name="nom" autofocus require title="le nom doit être en majuscule" pattern="[A-Z]*" ></td>
			</tr>
			<tr>
			<tr>
				<td>Prénom</td>
				<td><input type="text" class="form-control" name="prenom" required="true" pattern="[A-Z]{1}[a-z]*" require title="La première lettre du Prénom doit être en majuscule">*</td>
			</tr>
			<tr>
				<td>Date de Naissance</td>
				<td><input type="date" class="form-control" name="dateNaiss" required="true">*</td>
			</tr>
			<tr>
				<td>Mot de Passe</td>
				<td><input type="password" class="form-control" name="motpass" required="true" id="passe">*</td>

			</tr>
			<tr>
				<td>Confirmer le Mot de Passe</td>
				<td><input type="password" class="form-control" name="conf" id="confirmation" required="true" oninput="validation()">*</td>
				<td><label id="message"></label></td>
			</tr>
		</table>
		<button type="submit" class="btn btn-primary" name="enregistrer">VALIDER</button>
		<button type="reset" class="btn btn-primary" name="annuler">ANNULER</button>
        
	</form>
</body>

</html>