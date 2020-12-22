<?php
      require "public/pages/traitement/connexion.php";
      include('app/fonctions/securite.php');
      if (isset($_POST['ajouter'])) {

        $nom =secure($_POST['nom']);
        $prenom =secure($_POST['prenom']);
        $contact =secure($_POST['contact']);
        $email = secure($_POST['email']);


        if (verifie($nom) AND verifie($prenom)  AND verifie($contact)  AND verifie($email) ) {

                  if(filter_var($email, FILTER_VALIDATE_EMAIL)){

                    $regx2 = "#^[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}#";

                      if (preg_match($regx2, $contact)) {

                       $insert = $bdd->prepare('INSERT INTO professeur (nom_prof, prenom_prof,email, contact) VALUES(?,?,?,?)' );
                      $insert->execute(array($nom,$prenom,$email,$contact));

                        $erreur= 'ajout effectué!!';
                      }else { $erreur= 'format du numero incorrect';}

                  }else { $erreur= 'email invalide';}

        }else {  $erreur= 'remplissez tous les champs svp';}


      }

 ?>
<div id="ajoutprof">
  <?php

       if (isset($erreur) && !empty($erreur)) {
            echo "<div class='error' style='  color: white;padding:8px; text-transform: capitalize;  width: 40%;position:relative;top:20px;left:30%; text-align: center;  background-color: rgba(0, 0, 0, 0.5);  font-family: verdana; font-size: 15px;'> $erreur</div>";
       }
      ?>
  <form class="" action="" method="post">
    <div class="in">
      <div class="label">
        <label for="">nom*</label>
      </div>
      <input type="text" name="nom" value="">
    </div>
    <div class="in">
      <div class="label">
        <label for="">prenom*</label>
      </div>
      <input type="text" name="prenom" value="">
    </div>
    <div class="in">
      <div class="label">
        <label for="">email*</label>
      </div>
      <input type="text" name="email" value="">
    </div>
    <div class="in">
      <div class="label">
        <label for="">contact*</label>
      </div>
      <input type="tel" name="contact" value="" placeholder="00-00-00-00">
    </div>
    <div class="sub">
      <input type="submit" name="ajouter" value="ajouter">
    </div>
  </form>

</div>
