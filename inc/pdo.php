<?php
$serveur  = '%';
$bdd      = 'wtgm7011_vactolib';
$username = 'wtgm7011_admin';
$password = 'Azerty1999';
try {
    $pdo = new PDO('mysql:host='.$serveur.';dbname='.$bdd.'', ''.$username.'', ''.$password.'', array(
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
    ));
} catch (PDOException $e) {
    echo 'Erreur de connexion : ' . $e->getMessage();
}