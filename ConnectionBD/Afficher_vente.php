<?php
    require_once("test.php");
    $requete = $db->query('SELECT numVente, nom, prenom, designation, qte, dateV FROM produit p join client c 
        JOIN vente v ON p.refProd = v.refProd
         AND c.numClient = v.numClient');
    $requete->execute();
    $donnees = $requete->fetchAll();


?>
<!DOCTYPE html>
<html>

<head>
    <title>Liste des Ventes</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap-3.4.1\js\tests\vendor\jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>
<table class="table table-hover table-bordered table-stripped" border="2">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nom & Prénom</th>
            <th>Produit</th>
            <th>Quantité</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>

        <?php foreach ($donnees as $value) {?>
        <tr>
            <th><?php echo $value['numVente'] ?></th>
            <th><?php echo $value['nom'].' '.$value['prenom'] ?></th>
            <th><?php echo $value['designation'] ?></th>
            <th><?php echo $value['qte'] ?></th>
            <th><?php echo $value['dateV'] ?></th>
        </tr>
        <?php } ?>
    </tbody>
</table>

</body>

</html>

