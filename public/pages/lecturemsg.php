<?php

if(!isset($_SESSION['id'])){
header('');
}

$nom = $_SESSION['nom'].' '.$_SESSION['prenom'];

if(isset($_GET['idmsg']) AND !empty($_GET['idmsg'])){
  $idmsg=intval($_GET['idmsg']);
  require 'traitement/connexion.php';
  $req=$bdd->prepare('SELECT * FROM message WHERE id_msg=? AND pour=?');
  $req->execute(array($idmsg,$nom));
  $reqmsg=$req->fetch();
  $reqmsg['de'];
  $objet=$reqmsg['objetmsg'];

  $requsers=$bdd->prepare('SELECT * FROM user where id_user=?');
  $requsers->execute(array($reqmsg['de']));
  $usermsg=  $requsers->fetch();
  $nommsg=$usermsg['nom_user']." ".$usermsg['prenom_user'];

if(isset($_POST['repondre'])){

    if(isset($_POST['message']) AND !empty($_POST['message'])  ) {

      $msg=htmlspecialchars($_POST['message']);
      $req_msg= $bdd->prepare("INSERT INTO message(datemsg, heurmsg, de, pour, objetmsg, message) VALUES( NOW(), NOW() ,?,?,?,?) ");
      $req_msg->execute(array($_SESSION['id'],$nommsg,$objet,$msg));
      echo "<div class='error'>Felicitation<br> Votre message a bien ete envoye  !!!!!</div>";
    }else{
        echo "<div class='error'>Desolé<br> Veillez  remplire tous les champs svp !!!!!</div>";
    }

 }



 ?>

<div class="content_lecture">

    <div class="destinataire">
      <div class="bloc_tof">

          <img src="public/membre/avatar/<?php echo $usermsg['photo'] ;?> " width="50%" height="50%"/>
          <p>message de : <?=$usermsg['nom_user']." ".$usermsg['prenom_user'] ?></p>
      </div>
      <div class="bloc_msg">
        <form class="" action="" method="post">
        </form>
        <textarea name="name" rows="10"><?=$reqmsg['message']?>    </textarea>
      </div>
    </div>
    <div class="message">
         <p class="design"></p>
    </div>
    <div class="repondre">
      <form class="" action="" method="post">
        <textarea name="message" rows="10" placeholder="votre message..."></textarea>

        <div class="validation">
          <input type="submit" name="repondre" value="repondre">
          <button type="button" name="button"><a href="index.php?page=message">retour</a></button>
        </div>
      </form>
    </div>
</div>
 <?php

      $lu=$bdd->prepare('UPDATE message SET lu = 1 WHERE id_msg=?');
      $lu->execute(array($idmsg));

 }

  ?>
