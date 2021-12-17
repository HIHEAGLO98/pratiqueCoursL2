<?php 
if (isset($_POST['ok'])) {

	require 'traitement/Connexion.php';

	$login = $_POST['Login'];
	$password = $_POST['Password'];
		$info = array(
			'login' => $login,
			'password' => $password
		);

	$requete = $db->prepare('SELECT login, password FROM admin WHERE  login = :login AND password = :password');
	$requete->execute($info) or die (print_r($requete->errorInfo()));
	$donnee = $requete->FETCHALL();
	foreach ($donnee as $key => $value) {
		$log = $value['login'];
		$pass = $value['password'];
		if ($log == $login && $pass == $password) {
			header("location:Consultation.php");
		}
		else{
			$i = 1234;
		}
	}
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
		<div class="col-3"></div>
		<div class="col-8 table">
		<form method="post" action="ConnectAdmin.php">		
			<h1>Connexion</h1>
				<table>
					<tr>
						<td>
							<label>Login *
						</td>
						<td>
							<input type="text" required="true"  placeholder="Nom d'utilisateur" name="Login"></label>
						</td>
					</tr>
					<tr>
						<td>
							<label>Mot de passe *
						</td>
						<td>
							<input type="Password" placeholder="Mot de passe" required="true" name="Password"></label>
						</td>
					</tr>	
					<tr>
						<td colspan="2" id="mdp"> </td>
					</tr>				
				</table>
				<?php if(isset($log)){?>
						<div class="alert alert-danger w-auto alert-dismissible fade show" role="alert">
							Login ou Mot de passe incorect
							<button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"> <i class="icofont-close-line"></i></button>
						</div>
				<?php } ?>
			
			<div class="row">
				<div class="col-2"></div>
				<div class="col-6">
					<input type="submit" value="Connexion">
					<input type="reset" value="Annuler">
				</div>
			</div>
		</form>
		</div>
	</div>
	<div class="foot">
		<?php include 'footer.php'; ?>
	</div>
	
</body>
</html>