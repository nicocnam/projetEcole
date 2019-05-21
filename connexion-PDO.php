<?php
//connexion à une base de données avec PDO (programmation OBJET)
$serverBDD = "mysql:host=localhost; dbname=users; charset=utf8";
$user = "root";
$password = "root";
try {
    $bdd = new PDO($serverBDD, $user, $password,
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch(Exception $e) {
    die("erreur ! : {$e->getMessage()}");
}
?>
