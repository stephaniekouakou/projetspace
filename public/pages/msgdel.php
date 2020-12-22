<?php
if(!isset($_SESSION['id'])){
  header("location:index.php?page=profil");
}

$idmsg=intval($_GET['idmsg']);
require 'traitement/connexion.php';
$req=$bdd->prepare("DELETE FROM message WHERE id_msg=?");
$req->execute([$idmsg]);
  header("location:index.php?page=message");
 ?>
