<?php
  require "public/pages/traitement/connexion.php";
include('app/fonctions/securite.php');
   if (isset($_GET['post'])) {

      $getidpost= htmlspecialchars(($_GET['post']));


      $requete = $bdd->prepare('SELECT  user.nom_user , user.prenom_user, user.photo, post.date_pub  , post.contenu, post.photopublier from  post , user
                                  WHERE post.id_user = user.id_user
                                  AND post.id_post = ? ');
                                  $requete->execute(array($getidpost));
                                  $requete = $requete->fetch();

      $likes=$bdd->prepare('SELECT id_likes from likes WHERE id_post=?');
      $likes->execute(array($getidpost));
      $likes=$likes->rowCount();

      $dislikes=$bdd->prepare('SELECT id_dislike from dislikes WHERE id_post=?');
      $dislikes->execute(array($getidpost));
      $dislikes=$dislikes->rowCount();

        if (isset($_POST['commenter']) ) {

              if ( isset($_POST['commentaire']) and !empty($_POST['commentaire']) ) {
                    $contenu = secure(($_POST['commentaire']));

                    $comment = $bdd->prepare('INSERT INTO commentaire (contenu, datecom,id_user,id_post) VALUES(?,NOW(),?,?) ');
                    $comment->execute(array($contenu,$_SESSION['id'], $getidpost ));

              }else { $msg= 'Remplissez le champs svp!!!';}
      }

      $commentaire=$bdd->prepare('SELECT user.photo, commentaire.contenu, commentaire.datecom FROM commentaire , user WHERE id_post = ? and  commentaire.id_user = user.id_user
        order by id_commentaire asc ');
      $commentaire->execute(array($getidpost));

  ?>


  <div class="content_commentaires">
    <div class="pub">

        <div class="aff_profil ">
          <?php echo '<img src="public/membre/avatar/'.$requete['photo'].' " width="60%" height=""/>' ?><br><br>
            <a href="index.php?page=action&t=1&post=<?=$getidpost?>">j'aime(<?=$likes?>)</a><br>
            <a href="index.php?page=action&t=2&post=<?=$getidpost?>">j'aime pas(<?=$dislikes?>)</a>
        </div>




    <div class="aff_post">

      <div class="cont_post">
            <div class="lib1">
               <?=$requete['contenu'] ; ?>
            </div>

           <?php    if (isset($requete['photopublier'] )) {
                echo '<div class="photo"><img src="public/membre/photo_poster/'.$requete['photopublier'].' " width="50%" /> </div> ';

              } ?>
      </div>
    </div>
    </div>

    <form class="comment" action="" method="POST">
        <div class="aa1">
          <textarea name="commentaire"  placeholder="votre commentaire ..."></textarea>
        </div>
        <div class="aa">
          <input type="submit" name="commenter" value="commenter">
        </div>
    </form>

      <?php if (isset($msg)) {
         echo " <div style='color:rgb(232, 97, 110); width:50%; margin:auto;'> Erreur:  $msg. </div> ";
      } ?>


    <div class="affichage">
         <?php while($c = $commentaire->fetch() ){ ?>

        <div class="aff_com">
          <span><?=  '<img src="public/membre/avatar/'.$c['photo'].' " width="50px" height="40px" />  '   ?></span> <div class="contenu-com"> <?= $c['contenu'] ?></div>
       </div>   <br>

           <?php } ?>
    </div>


  </div>

  <?php    }?>
