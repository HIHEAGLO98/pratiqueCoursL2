<?php
//On demarre les sessions
session_start();

/******************************************************
----------------Configuration Obligatoire--------------
Veuillez modifier les variables ci-dessous pour que l'
espace membre puisse fonctionner correctement.
******************************************************/


//On se connecte a la base de donnee
/*mysql_connect('locahost', 'root', '');
mysql_select_db('bdusers');*/


// Informations d'identification
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'bdusers');
 
// Connexion à la base de données MySQL 
//$conn = new mysqli_connect("localhost", "root", "123456", "registration");
$conn =  mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Vérifier la connexion
if($conn===false){
    die("Failed to connect to database " . mysqli_connect_error());
    exit();
}

//Email du webmaster
$mail_webmaster = 'hiheaugusto@gmail.com';

//Adresse du dossier de la top site
$url_root = 'http://www.example.com/';

/******************************************************
----------------Configuration Optionelle---------------
******************************************************/

//Nom du fichier de l'accueil
$url_home = 'index.php';

//Nom du design
$design = 'default';
?>