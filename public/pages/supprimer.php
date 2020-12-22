<?php

require 'traitement/connexion.php';
$req=$bdd->prepare("DELETE FROM user WHERE id_msg=?");
$req->execute([$idmsg]);
  header("location:index.php?page=message");
 ?>
