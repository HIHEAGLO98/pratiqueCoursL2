<?php
    include_once("test.php");
    $tab = $db->query("SELECT * FROM client ORDER BY numClient ASC");
    $tab->execute();
    $donnees = $tab->fetchAll();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Liste des clients</title>
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
            <th>Nom</th>
            <th>Prénom</th>
            <th>Ville</th>
            <th>Téléphone</th>
             <th>Action</th>
        </tr>
        </thead>
            <tbody>
        <?php foreach ($donnees as $value) {?>
        <tr>
            <td><?php echo $value['numClient'] ?></td>
            <td><?php echo $value['nom'] ?></td>
            <td><?php echo $value['prenom'] ?></td>
            <td><?php echo $value['ville'] ?></td>
            <td><?php echo $value['telephone'] ?></td>
            <td>
                <a href="Modifier_Client.php?id=<?php echo $value['numClient']?>" >Modifier</a>|
                <a href="Supprimer_Client.php?id=<?php echo $value['numClient']?>">Supprimer</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
        </table>

</body>

</html>