
<?php
include('traitement/connexion.php');
include('app/fonctions/securite.php');
include('app/fonctions/code.php');

  $iduser = $_SESSION['id'];

if (isset($_POST['valider'])) {

  $mdpactuel = secure($_POST['mdpA']);
  $Cmdpactuel = secure($_POST['CmdpA']);
  $mdpchange= secure($_POST['mdp']);
  $Cmdpchange= secure($_POST['Cmdp']);

  if (verifie($mdpactuel) AND  verifie($Cmdpactuel) AND verifie($mdpchange)  AND verifie($Cmdpchange)) {

          if ($mdpactuel==$Cmdpactuel ) {

            $reqmdp= $bdd->prepare("SELECT motpass FROM user  WHERE id_user = ?");
            $reqmdp->execute(array($_SESSION['id']));
            $motpass= $reqmdp->fetch();

              $Cmdpactuel = sha1($Cmdpactuel);

            if( $motpass["motpass"] == $Cmdpactuel){

              if ($mdpchange == $Cmdpchange){

                      if (strlen($Cmdpchange) >=8 ) {

                        $Cmdpchange= sha1($Cmdpchange);
                        $req=$bdd->prepare("UPDATE user SET motpass=? WHERE id_user='$iduser' ");
                        $req->execute(array($Cmdpchange));

                         $erreur ="votre mot de passe a bien été modifier";

                      }else {  $erreur ="votre mot de passe doit contenir au moins 8 caracteres";}

              }else {  $erreur ="vos nouveau mot de passe sont differents!!";}

            }else {$erreur ="mot de passe incorrect"; }

          }else {  $erreur ="vos mot de passe sont differents!!";}

  }else {  $erreur ="remplissez tous les champs svp!!";}

}


 ?>
 <?php

      if (isset($erreur) && !empty($erreur)) {
           echo "<div class='error' style='  color: #4d636f;  width: 80%;margin:20px auto;text-align: center;  background-color:#fff ; box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5); font-family: verdana; font-size: 15px; padding:5px;'> $erreur</div>";
      }
     ?>
<div id="modif-password">
    <form class="" action="" method="post">

      <fieldset>
        <legend>Verification du mot de passe actuel</legend>
            <div class="in">
              <div class="">
                  <label for="">Entrer le mot de passe actuel*</label>
                </div>
                <input type="password" name="mdpA" value="">
              </div>
              <div class="in">
                <div class="">
                    <label for="">Confirmation du mot de passe actuel*</label>
                  </div>
                  <input type="password" name="CmdpA" value="">
                </div>
            </fieldset>

        <fieldset>
          <legend>Changement de mot de passe</legend>
                <div class="in">
                  <div class="">
                    <label for="">Entrer le nouveau mot de passe*</label>
                  </div>
                  <input type="password" name="mdp" value="">
                </div>
                <div class="in">
                  <div class="">
                    <label for="">Confirmation du nouveau mot de passe*</label>
                  </div>
                  <input type="password" name="Cmdp" value="">
                </div>
      </fieldset>
         <div class="">
                   <input type="submit" name="valider" value="valider">
          </div>
    </form>
</div>
