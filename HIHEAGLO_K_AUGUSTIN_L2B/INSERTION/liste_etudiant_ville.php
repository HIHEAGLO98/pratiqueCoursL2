<?php
    include_once("Connect.php");
    $tab = $db->query("SELECT * FROM etudiant WHERE ville = 'Lomé'" );
    $tab->execute();
    $donnees = $tab->fetchAll();
?>


 <table class="table table-hover table-bordered table-stripped" border="2">
         <thead>
        <tr>
            <th>Numéro</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>date Naissance</th>
            <th>Sexe</th>
            <th>Rue</th>
            <th>Code Postal</th>
            <th>Ville</th>
        </tr>
        </thead>
            <tbody>
        <?php foreach ($donnees as $value) {?>
        <tr>
            <td><?php echo $value['numetu'] ?></td>
            <td><?php echo $value['nom'] ?></td>
            <td><?php echo $value['prenom'] ?></td>
            <td><?php echo $value['datenaiss'] ?></td>
            <td><?php echo $value['sexe'] ?></td>
            <td><?php echo $value['rue'] ?></td>
            <td><?php echo $value['cp'] ?></td>
            <td><?php echo $value['ville'] ?></td>
        </tr>
        <?php } ?>
    </tbody>
        </table>