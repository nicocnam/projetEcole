<?php
//connexion à la base de données utilisateurs avec mysql
$host = "localhost";
$user = "root";
$password = "root";
$nomBDD = "test";
$connexionBDD = mysqli_connect($host, $user, $password, $nomBDD);
// Check connection
if(!$connexionBDD){
	die("Impossible de se connecter : " . mysqli_connect_errno());
}
?>
