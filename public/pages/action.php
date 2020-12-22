<?php
require "public/pages/traitement/connexion.php";

if (isset($_GET['t'],$_GET['post']) AND !empty($_GET['t']) AND !empty($_GET['post']) ) {

      $getid= (int)$_GET['post'];
      $gett= (int)$_GET['t'];

      $check=$bdd->prepare('SELECT id_post from post WHERE id_post=?');
      $check->execute(array($getid));

      if (  $check->rowCount()==1) {
        if ($gett==1) {

          $check_likes=$bdd->prepare('SELECT id_likes from likes WHERE id_post=? and id_user=? ');
          $check_likes->execute(array($getid,$_SESSION['id']));

          $del=$bdd->prepare('DELETE FROM dislikes WHERE id_post=? and id_user=?');
          $del->execute(array($getid, $_SESSION['id']));

            if (  $check_likes->rowCount()==1) {
              $del=$bdd->prepare('DELETE FROM likes WHERE id_post=? and id_user=?');
              $del->execute(array($getid, $_SESSION['id']));
            }else {
                $ins=$bdd->prepare('INSERT INTO likes(id_post,id_user) VALUES(?,?)');
                $ins->execute(array($getid, $_SESSION['id']));
                  }


        }elseif ($gett==2) {
            $check_likes=$bdd->prepare('SELECT id_dislike from dislikes WHERE id_post=? and id_user=? ');
            $check_likes->execute(array($getid,$_SESSION['id']));

            $del=$bdd->prepare('DELETE FROM likes WHERE id_post=? and id_user=?');
            $del->execute(array($getid, $_SESSION['id']));
            
            if (  $check_likes->rowCount()==1) {
              $del=$bdd->prepare('DELETE FROM dislikes WHERE id_post=? and id_user=?');
              $del->execute(array($getid, $_SESSION['id']));
            }else {
                $ins=$bdd->prepare('INSERT INTO dislikes(id_post,id_user) VALUES(?,?)');
                $ins->execute(array($getid, $_SESSION['id']));
                  }
        }

          header('location:index.php?page=commentaires&post='.$getid);

        }else{
          exit('erreur fatale');
        }
}else {
  exit('ERREUR FATALE:<a href="index.php?page=acceuil>REVENIR A LA PAGE Acceuil </a>');
}
