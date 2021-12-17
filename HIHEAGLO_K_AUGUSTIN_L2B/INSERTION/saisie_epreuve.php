<?php
require_once("Connect.php");
$consulter = $db->prepare("SELECT * FROM matiere");
$consulter->execute();
$listeMatiere = $consulter->fetchAll();

?>

<!DOCTYPE html>
<html>

<head>
    <title>Formulaire -Epreuve</title>
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
                    <li class="nav-item"><a class="nav-link" href="form_etudiant.php" target="blank">ETUDIANTS</a></li>
                    <li class="nav-item"><a class="nav-link" href="form_matiere.php" target="blank">MATIERES</a></li>
                    <li class="nav-item"><a class="nav-link" href="saisie_epreuve.php" target="blank">EPREUVES</a></li>
                
                </ul>
            </nav>


        </header>
    

    </div>
   
    <div id="container">
        <form style="margin-left: 50px " method="POST" action="epreuve_traitement.php">
            <p>
            <h1>ENREGISTRER LES EPREUVES</h1>
            </p>
            <table class="table table-hover table-bordered table-stripped">
                <tr>
                <tr>
                    <td>Numéro Epreuve</td>
                    <td><input type="hidden" class="form-control" name="epreuve"></td>
                </tr>
                 <tr>
                    <td>Date Epreuve</td>
                    <td><input type="date" class="form-control" name="date"></td>
                </tr>
                 <tr>
                    <td>Lieu</td>
                    <td><input type="text" class="form-control" name="lieu"></td>
                </tr>

                <tr>
                    <td>Code Matière</td>
                    <td>
                        <select name="code">
                            <?php
                            foreach ($listeMatiere as  $value) {
                                ?>
                                <option value = "<?php echo $value['codemat'];?>">
                                    <?php echo $value['libelle'];?>
                                </option>
                            <?php }?>

                        </select>

                     </td>
                </tr>


            </table>
            <button type="submit" class="btn btn-primary" name="enregistrer">ENREGISTRER</button>

        <button type="reset" class="btn btn-primary"value="annuler">ANNULER</a>
        </form>

    </div>

</body>

</html>