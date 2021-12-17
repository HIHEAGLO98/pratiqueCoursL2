<?php
    require_once "test.php";
   /* $reference = $_POST["reference"];
    $client = $_POST["client"];
    $quantite = $_POST["quantite"];
    $date = $_POST["date"];
    var_dump($reference);
    var_dump($client);
    var_dump($quantite);
    var_dump($date);
    $requette = $db->prepare("INSERT INTO vente(refProd,numClient,qte,datev) VALUES('?','?','?','?')");

    $requette->execute(array($_POST["reference"], $_POST["client"], $_POST["quantite"], $_POST["date"]));*/

$info = array(
        'ref' => $_POST['reference'], 
        'num' =>  $_POST['client'],
        'qte' =>  $_POST['quantite'],
        'dates' =>  $_POST['date']
    );

    $requete = $db->prepare('INSERT INTO vente (refProd, numClient, qte, dateV) VALUES (:ref, :num , :qte, :dates)');
    $requete->execute($info)or die (print_r($requete->errorInfo()));
    echo "Vente bien enregistré.";