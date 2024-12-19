<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "chef_cuisine";

// Connexion à la base de données
$conn = mysqli_connect($host, $username, $password, $database);

// Vérifier la connexion
if (!$conn) {
    die("Échec de la connexion : " . mysqli_connect_error());
}
?>