<?php
require_once("test.php");
$tab = $db->query("SELECT * FROM produit");
$tab->execute();
$donnees = $tab->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Liste des Produits</title>
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
            <th>Désignation</th>
            <th>Prix</th>
            <th>Stock</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($donnees as $value) {?>
        <tr>
            <th><?php echo $value['refProd'] ?></th>
            <th><?php echo $value['designation'] ?></th>
            <th><?php echo $value['prix'] ?></th>
            <th><?php echo $value['stock'] ?></th>
        </tr>
        <?php } ?>
    </tbody>
</table>
</body>

</html>
