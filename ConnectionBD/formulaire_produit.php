
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Formulaire des Produits</title>
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
    <form style="margin-left: 50px " method="POST" action="produit_Traitement.php">
        <p>
        <h1>ENREGISTRER UN PRODUIT</h1>
        </p>
        <table class="table table-hover table-bordered table-stripped">
            <tr>
                <td>Désignation</td>
                <td><select name="designation">
                        <optgroup>
                            <option> ARMOIRE</option>
                            <option>CONGELATEUR</option>
                            <option> TELEVISEUR</option>
                            <option> TABLE</option>
                            <option> ONDULEUR </option>
                            <option> RADIO </option>
                            <option> RIDEAU </option>
                            <option> AMPOULE </option>
                            <option> ACCESSOIRES </option>
                            <option> TELEPHONE </option>
                            <option> CHARGEURS </option>
                        </optgroup>

                        <optgroup>
                            <option> PANTALON</option>
                            <option>CULOTTE</option>
                            <option> SLIP</option>
                            <option> CALECON</option>
                            <option> STRING </option>
                            <option> PULL </option>
                            <option> CHEMISE </option>
                            <option> HABIT </option>
                            <option> CHAUSSURES </option>
                            <option> JEANS </option>
                            <option> VESTES </option>
                        </optgroup>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Prix</td>
                <td><input type="number" class="form-control" name="prix"></td>
            </tr>
            <tr>
                <td>Stock</td>
                <td><input type="number" class="form-control" name="stock"></td>
            </tr>
        </table>
        <button type="submit" class="btn btn-primary" name="enregistrer">ENREGISTRER</button>

         <a href="Afficher_produit.php"><input type="button" class="btn btn-primary"value="CONSULTER"></a>
    </form>
</body>

</html>