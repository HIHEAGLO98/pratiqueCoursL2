<?php
// Informations d'identification
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'registration');
 
// Connexion à la base de données MySQL 
//$conn = new mysqli_connect("localhost", "root", "123456", "registration");
$conn =  mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Vérifier la connexion
if($conn===false){
    die("Failed to connect to database " . mysqli_connect_error());
    exit();
}
?>