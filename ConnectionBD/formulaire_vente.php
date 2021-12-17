<?php
require_once("test.php");
$consulter = $db->prepare("SELECT * FROM produit");
$consulter->execute();
$listeProduit = $consulter->fetchAll();


$clientliste = $db->prepare("SELECT * FROM client");
$clientliste->execute();
$listeClient = $clientliste->fetchAll();

?>

<!DOCTYPE html>
<html>

<head>
    <title>Formulaire des ventes</title>
    <link href="bootstrap_v45/css/bootstrap.css" rel="stylesheet">
    <script src="bootstrap_v45/js/jquery_v351.js"></script>
    <script src="bootstrap_v45/js/bootstrap.js"></script>
</head>

<body>
    <div>
        <header>
            <nav id="menu">
                <!-- Placez ici le contenu du menu  de page -->
                <ul class="nav nav-tabs nav-justified flex-sm-row felx column navbar-nav bg-dark">
                    <li class="nav-item"><a class="nav-link" href="index.php" target="blank">GESTION</a></li>
                    <li class="nav-item"><a class="nav-link" href="formulaire.php" target="blank">CLIENTS</a></li>
                    <li class="nav-item"><a class="nav-link" href="formulaire_produit.php" target="blank">PRODUITS</a></li>
                    <li class="nav-item"><a class="nav-link" href="formulaire_vente.php" target="blank">VENTES</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php" target="blank">A PROPOS</a></li>
                </ul>
            </nav>


        </header>

    </div>
    <div id="container">
        <form style="margin-left: 50px " method="POST" action="vente_traitement.php">
            <p>
            <h1>ENREGISTRER LES VENTES</h1>
            </p>
            <table class="table table-hover table-bordered table-stripped">
                <tr>
                <tr>
                    <td>Référence</td>
                    <td><select name="reference">
                        <?php 
                        foreach ($listeProduit as  $value) {
                        ?>
                        <option value = "<?php echo $value['refProd'];?>">
                            <?php echo $value['designation'];?>
                        </option>
                     <?php }
                         ?>
                    </select></td>
                </tr>

                <tr>
                    <td>Nom Client</td>
                    <td>
                        <select name="client">
                            <?php
                            foreach ($listeClient as  $value) {
                                ?>
                                <option value = "<?php echo $value['numClient'];?>">
                                    <?php echo $value['nom']." ".$value['prenom'];?>
                                </option>
                            <?php }?>

                        </select>

                     </td>
                </tr>

                <tr>
                    <td>Quantité Commandée</td>
                    <td><input type="number" class="form-control" name="quantite"></td>
                </tr>

                <tr>
                    <td>Date</td>
                    <td><input type="date" class="form-control" name="date"></td>
                </tr>

            </table>
            <button type="submit" class="btn btn-primary" name="enregistrer">ENREGISTRER</button>

            <a href="Afficher_vente.php"><input type="button" class="btn btn-primary"value="CONSULTER"></a>
        </form>

    </div>

</body>

</html>