
<?php

 if(!isset($_SESSION['id'])){
header("location:index.php?page=profil");
 }
 include('traitement/connexion.php');

if(isset($_POST['msgenvoyer'])){

   if(isset($_POST['destinataire'],$_POST['msg']) AND !empty($_POST['destinataire']) AND !empty($_POST['msg']) ) {

     $destinataire =htmlspecialchars($_POST['destinataire']);
     $msg=htmlspecialchars($_POST['msg']);
     $objet=htmlspecialchars($_POST['objet']);



     $req_msg= $bdd->prepare("INSERT INTO message(datemsg, heurmsg, de, pour, objetmsg, message) VALUES( NOW(), NOW() ,?,?,?,?) ");
     $req_msg->execute(array( $_SESSION['id'],$destinataire,$objet,$msg) );
     $msges ="Votre message a bien été envoyer !";
   }else{
     $msges ="Veuiller remplire tout les champs svp !";
   }

}
$destinataire=$bdd->prepare('SELECT nom_user, prenom_user  FROM user WHERE nom_user <> ? ');
$destinataire->execute(array($_SESSION['nom']));


 ?>
<div class="content_newmsg">

  <div class="boitemsg">

    <div class="contenu">
        <span>boite de message</span>
      <form class="" action="" method="POST">

          <div class="">
            <label for="">nom:</label>

              <select class="" name="destinataire">
                    <option value="">  </option>
                    <?php while ($d = $destinataire->fetch() ){?>
                      <option ><?= $d['nom_user'].'  '.$d['prenom_user'] ?></option>
                    <?php }
                  $destinataire ->closeCursor();
                    ?>

               </select>

          </div>

          <div class="">
             <label for="">objet:</label><input type="text" name="objet" value="">
          </div>
          <div class="msgarea">
             <textarea name="msg" rows="8" cols="45" placeholder="votre message..."></textarea>
          </div>
          <div class="valider">
            <input type="submit" name="msgenvoyer" value="envoyer">
            <input type="reset" name="annuler" value="annuler">
          </div>

      </form>

    </div>

  </div>



</div>
<?php
if (isset($msges) && !empty($msges)) {
     echo "<div class='error' style='  color: white;  width: 50%;margin:20px auto;text-align: center;  background-color: rgb(149, 201, 190);  font-family: verdana; font-size: 13px;'> $msges</div>";
}

 ?>
