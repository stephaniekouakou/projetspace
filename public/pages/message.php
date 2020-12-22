
<?php
include('traitement/connexion.php');
 $pour = $_SESSION['nom'].' '.$_SESSION['prenom'];
$msg = $bdd->prepare('SELECT * FROM message WHERE pour = ?');
$msg->execute(array($pour) );
$nbr_msg = $msg->rowCount();

 ?>

<div class="content_message">
<div class="entete">
  <p class="msg">
    <button  name="button"><a href="<?= 'index.php?page=newmsg'; ?>">nouveau message</a></button>
  </p>
  <p>
    <span class="one"><img src="public/img/sender.png" alt="" width="25px" > destinateurs</span>
    <span class="two"> <img src="public/img/msgbox.png" alt="" width="25px" >messages</span>
    <span class="three"> <img src="public/img/timer.png" alt="" width="25px" >heures</span>
  </p>
</div>
<div class="content_M">

  <?php
        if ($nbr_msg == 0) {
          echo '<div class="infomsg"><img src="public/img/del.png" alt="" width="25px">Vous navez pas de message  </div>';
        }

        while( $m=$msg->fetch() ){
              $exp=$bdd->prepare('SELECT nom_user , prenom_user from user WHERE id_user= ?');
              $exp -> execute(array($m['de']) );
              $exp = $exp->fetch();
              $exp = $exp['nom_user'].' '.$exp['prenom_user'];

              ?>

              <div class="message_content">
                <div class="destinateur">
                   <?=$exp?>
                </div>
                <div class="message">

                   <?=$m['message']?>

                </div>
                <div class="heur">
                    <?=$m['datemsg']?><br>  à<br>
                    <?=$m['heurmsg']?><br>
                    <?php $d=$m['id_msg'] ; ?>
                      <?php if($m['lu']==1){?><a  href="index.php?page=lecturemsg&idmsg=<?=$m['id_msg']?>" class="aa" style="color:#4d636f;"> <i>lu</i>&nbsp;&nbsp;<img src="public/img/msg3.png" width="23px" alt=""> </a><br> <?php }else{ ?>
                      <a  href="index.php?page=lecturemsg&idmsg=<?=$m['id_msg']?>" class="aa">lire </a><br><?php } ?>
                      <a  href="index.php?page=msgdel&idmsg=<?=$m['id_msg']?>" class="aa">supprimer <img src="public/img/del.png" width="23px" alt=""></a><br>

                </div>

              </div>

      <?php } ?>



</div>



</div>
