<?php
  require "public/pages/traitement/connexion.php";
  include('app/fonctions/securite.php');
  if (isset($_POST['envoi'])) {

      $nom=secure($_POST['nom']);
      $message=secure($_POST['message']);

      if (verifie($nom) AND verifie($message)) {

        $insert = $bdd->prepare('INSERT INTO notification  (contenu, nom_professeur,date_notifi) VALUES(?,?,NOW() )' );
        $insert->execute(array($message,$nom));
          $erreur='Notification envoyé!';

      }else {$erreur='Remplissez tous les champs svp!!';}
  }
 ?>
 <?php
 if (isset($erreur) && !empty($erreur)) {
      echo "<div class='error' style='  color: white;padding:8px;   width: 40%;position:relative;top:20px;left:30%; text-align: center;  background-color: rgba(0, 0, 0, 0.5);  font-family:cursive; font-size: 15px;'> $erreur</div>";
 }

  ?>

<div id="contentnotifi">

  <form class="" action="" method="post">
    <div class="cover">
      <div class="in">
        <div class="label">
          <label for="">votre nom:</label>
        </div>
          <input type="text" name="nom" value="">
      </div>
      <div class="in">
        <div class="label">
            <label for="">message:</label>
        </div>
          <textarea name="message" rows="8" cols="80"></textarea>
      </div>
      <div class="sub">
        <input type="submit" name="envoi" value="envoyer">
      </div>
    </div>

  </form>
</div>
