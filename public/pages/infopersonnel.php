<?php

include('traitement/connexion.php');
include('app/fonctions/securite.php');
include('app/fonctions/code.php');

  $iduser = $_SESSION['id'];

if (isset($_POST['modifier'])) {

  $pays= secure($_POST['pays']);
  $ville = secure($_POST['ville']);
  $contact = secure($_POST['contact']);
  $niveau = secure($_POST['niveau']);
  $filiere = secure($_POST['filiere']);

  if (verifie($pays) AND verifie($ville) AND verifie($contact)  AND verifie($niveau) AND verifie($filiere) ) {

    $regx = "#^[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}#";

      if (preg_match($regx , $contact)) {

        $req=$bdd->prepare("UPDATE adresse SET pays = ?, ville =?, contact=? WHERE id_user='$iduser' ");
        $req->execute(array(  $pays, $ville, $contact));

        $reqniv=$bdd->prepare("UPDATE niveau SET filiere= ?, niveau_fil=? WHERE id_user='$iduser' ");
        $reqniv->execute(array( $filiere, $niveau ));

      }else {
        $erreur="format du contact incorrect";
      }

  }else { $erreur=" remplissez tous les champs svp!!!";}
}

 ?>
 <?php

      if (isset($erreur) && !empty($erreur)) {
           echo "<div class='error' style='  color: #4d636f;  width: 80%;margin:20px auto;text-align: center;  background-color:#fff ; box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5); font-family: verdana; font-size: 15px; padding:5px;'> $erreur</div>";
      }
     ?>

<div id="infopersonnel">
    <form class="" action="" method="post">
      <div class="">
        <div class="">
            <label for="">Pays*</label>
        </div>
        <input type="text" name="pays" value="">
      </div>
      <div class="">
        <div class="">
          <label for="">Ville*</label>
        </div>
        <input type="text" name="ville" value="">
      </div>

      <div class="">
        <div class="">
            <label for="">Contact*</label>
        </div>
        <input type="text" name="contact" value="">
      </div>

      <div class="">
        <div class="">
          <label for="">Niveau*</label>
        </div>
        <input type="text" name="niveau" value="">
      </div>
      <div class="">
        <div class="">
            <label for="">Filiere*</label>
        </div>
        <select class="" name="filiere">
          <option value=""> </option>
          <option value="informatique Developpement">IDA</option>
            <option value="informatique Reseau Telecom">RIT</option>
          <option value="communication">RHCOM</option>
          <option value="comptabilité">GESTION</option>
        </select>
      </div>
      <div class="validation">
        <input type="submit" name="modifier" value="modifier">
      </div>
    </form>
</div>
