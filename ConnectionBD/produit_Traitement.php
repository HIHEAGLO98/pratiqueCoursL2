<?php 
    require_once("test.php");
    $designation = $_POST["designation"];
    $prix = $_POST["prix"];
    $stock = $_POST["stock"];
   
$requette = $db->prepare("INSERT INTO produit(designation,prix,stock)VALUES('$designation','$prix','$stock')");

$requette->execute(array($_POST["designation"], $_POST["prix"], $_POST["stock"]));
	echo "<script type='text/javascript'>
	alert('Produit bien enrégistré');
	document.location(formulaire_produit.php);
	</script>"
	

?>