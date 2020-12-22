<?php
include('traitement/connexion.php');

$req_s=$bdd->prepare('UPDATE user SET etat = 0 WHERE  email=?');
$req_s->execute(array($_SESSION['email']));
session_destroy();
header("location:index.php?page=acceuil");
 ?>
