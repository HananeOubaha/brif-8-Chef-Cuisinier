<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'chef_order';

// Connexion à la base de données
$conn = mysqli_connect($host, $user, $password, $dbname);

// Vérification de la connexion
if (!$conn) {
    die('Erreur : Impossible de se connecter à la base de données. ' . mysqli_connect_error());
}
