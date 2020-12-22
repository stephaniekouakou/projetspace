<?php
  require "public/pages/traitement/connexion.php";
  $req=$bdd->prepare('SELECT * FROM user WHERE etat="1" AND id_user<>?');
  $req->execute(array($_SESSION['id']));

    $reql=$bdd->prepare('SELECT * FROM user WHERE id_user<>?');
    $reql->execute(array($_SESSION['id']));

  if(isset($_POST['envoyer']) AND !empty($_POST['msg_discou'])){

    $req_send=$bdd->prepare("INSERT INTO chat SET de=?, pour=?, msg_chat=?, datechat=NOW()");
    $req_send->execute(array($_SESSION['id'],$_GET['id'],$_POST['msg_discou']));
    header('location:');
}else{

}

      $req_msg=$bdd->prepare("SELECT * FROM chat WHERE de=? AND pour=? OR de=? AND pour=?");
      $req_msg->execute(array($_SESSION['id'],$_GET['id'],$_GET['id'],$_SESSION['id']));

   ?>
<div class="content_discou">

  <section class="userligne">

      <div class="cover">

          <div class="panel-heading">
              <h3 class="panel-title">Liste des utilisateurs </h3>
            </div>
            <div class="list-group">
                <?php while ($requser=$reql->fetch()) {?>
                    <?php if ($requser['etat']==1){ ?>
                      <a class="list-group-item" href="index.php?page=discussion&id=<?=$requser['id_user']?>">  <span style="margin-right:5px"> </span> <?=$requser['nom_user']?>
                      <span style="margin-right:10px"> </span> <span class="bulle"  style="background-color:green"></span>&nbsp;<span class="conecte" style="color:green;font-size:12px;">connecté</span></a>
                    <?php }else {?>
                      <a class="list-group-item" href="index.php?page=discussion&id=<?=$requser['id_user']?>"> <span style="margin-right:5px"> </span> <?=$requser['nom_user']?>
                      <span style="margin-right:10px"> </span> <span class="bulle" style="background-color:gray"></span> &nbsp;<span class="deconte" style="color:#dadada; font-size:12px;">deconnecté</span></a>
                  <?php  } ?>

                    <?php }?>

              </div>

      </div>


    </section>

  <section class="msg_user">
    <div class="cover">
           <div class="panel-heading">
                <h3 class="panel-title">discussion instantanée</h3>
            </div>
            <div class="panel-body">

              <?php while ($msg=$req_msg->fetch()) {?>

                  <div class="1msg">

                      <img src="public/img/userm.png" class="<?php if($msg['de']==$_SESSION['id']){echo "imgmsg";}else{echo "imgmsg2";};?>">

                      <div class="<?php if($msg['de']==$_SESSION['id']){echo "msgbox";}else{echo "msgbox2";};?>">

                          <p id="moov3"><?=$msg['msg_chat']?></p>

                      </div><br clear="all"/>

                    </div> <br>
                    <?php }?>

            </div>
            <div class="envoimsg">
                  <form class="" action="" method="post">
                    <div class="">
                        <textarea name="msg_discou" rows="2" cols="80" placeholder="Votre message ici..."></textarea>
                    </div>

                    <div class="">
                      <input type="submit" name="envoyer" value="envoyer">
                    </div>
                  </form>
            </div>

    </div>

  </section>

</div>
