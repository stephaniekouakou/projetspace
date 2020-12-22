<?php
include('traitement/connexion.php');
include('app/fonctions/securite.php');
include('app/fonctions/code.php');

  $iduser = $_SESSION['id'];

if (isset($_POST['valider'])) {

      $pere= secure($_POST['pere']);
      $mere=secure($_POST['mere']);
      $numero = secure($_POST['numparent']);
      $domicile = secure($_POST['domicile']);
      $nationnalite= secure($_POST['nationnalite']);

      if (verifie($pere) AND verifie($mere) AND verifie($numero) AND verifie($domicile) AND verifie($nationnalite)) {

            $req=$bdd->prepare("INSERT INTO information ()  VALUES(?,?,?,?,?,?)");
              $req->execute(array($pere,$mere, $numero,$domicile,$nationnalite,$iduser) ) ;
                $erreur="Félicitation vos  informations ont bien été ajoutés";
      }else {
        $erreur="Remplissez tous les champs svp";
      }
}

 ?>
<?php

     if (isset($erreur) && !empty($erreur)) {
          echo "<div class='error' style='  color: #4d636f;  width: 80%;margin:20px auto;text-align: center;  background-color:#fff ; box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5); font-family: verdana; font-size: 15px; padding:5px;'> $erreur</div>";
     }
    ?>
<div id="ajouterinfo">
          <div class="">
            <form class="" action="" method="post">
              <div class="in">
                <div class="">
                  <label for="">nom du père*</label>
                </div>
                <input type="text" name="pere" value="" placeholder="">
              </div>
              <div class="in">
                <div class="">
                  <label for="">nom de la mere*</label>
                </div>
                <input type="text" name="mere" value="" placeholder="">
              </div>
              <div class="in">
                <div class="">
                  <label for="">numero d'un parent*</label>
                </div>
                <input type="number" name="numparent" value="" placeholder="">
              </div>
              <div class="in">
                <div class="">
                  <label for="">domicile*</label>
                </div>
                <input type="text" name="domicile" value="" placeholder="">
              </div>
              <div class="in">
                <div class="">
                  <label for="">nationnalité*</label>
                </div>
                <input type="text" name="nationnalite" value="" placeholder="">
              </div>
              <div class="valider">
                <input type="submit" name="valider" value="valider">
              </div>
            </form>
          </div>
</div>
