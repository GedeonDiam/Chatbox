<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpassword = ''; // Remplacez par votre mot de passe MySQL si nécessaire
$dbname = 'chat_box_finale';

// Je me connecte à la base de données 
$connexion = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);

// Vérifier la connexion
if (!$connexion) {
    die("La connexion à la base de données a échoué : " . mysqli_connect_error());
}
?>
