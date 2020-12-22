
<?php  if (isset($_SESSION['id'])){
        require "public/pages/traitement/connexion.php";

             $id= $_SESSION['id'];
              $requete = $bdd->prepare('SELECT * FROM user WHERE id_user = ?');
              $requete ->execute(array($id));
              $user = $requete->fetch();

              $reqadr = $bdd->prepare('SELECT * FROM adresse WHERE id_user = ?');
              $reqadr->execute(array($id));
              $adresse = $reqadr->fetch();

              $reqniv = $bdd->prepare('SELECT * FROM  niveau WHERE id_user = ?');
              $reqniv->execute(array($id));
              $reqniv= $reqniv->fetch();

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="public/css/style.parametress.css">
    <link rel="stylesheet" media="screen and (max-width:1200px)" href="public/css/mediaprofil.css">
      <link rel="stylesheet" media="screen and (max-width:600px)" href="public/css/media2profil.css">
  </head>
  <body>
    <div class="conteneur">
        <!-- ______ l'entete du template  _________ -->
          <header>
            <div class="home">

              <a href="<?= 'index.php?page=profil'; ?>"><img src="public/img/icon2.png" alt="" width="35px" ></a>
            </div>
            <div class="barre">

                  <a href="<?= 'index.php?page=deconnexion'; ?>">deconnexion</a>

            </div>
          </header>

          <div id="content">

            <div class="part-one">
                    <div class="header">
                      <h4>parametre</h4>
                    </div>
                    <div class="body_part1">
                      <ul>
                              <li><a href="<?= 'index.php?page=modifpass'; ?>">modifier son password</a></li>
                              <li><a href="<?= 'index.php?page=infopersonnel';?>">modifer ses informatoins</a></li>
                              <li><a href="<?= 'index.php?page=ajoutinfo'; ?>">ajouter des informations </a></li>
                              <li><a href="<?= 'index.php?page=notification'; ?>">voir les notifications</a></li>
                              <li><a href="<?= 'index.php?page=evernement'; ?>">voir les evernements </a></li>
                              <li><a href="<?= 'index.php?page=parametre'; ?>">voir ses photo </a></li>
                    </ul>
                    </div>
            </div>

            <div class="part-two">

              <?=$content; ?>
            </div>
            <div class="part-three">

                      <section class="one">
                        <div class="avatar">
                                  <?php
                                    if (!empty($user['photo'])){
                                    ?>
                                    <img src="public/membre/avatar/<?php echo $user['photo'] ;?> " width="100%" height="100%"/>
                                    <?php } ?>
                        </div>
                        <span><?php echo $user['nom_user']." ".$user['prenom_user'] ;?></span>

                      </section >

                      <section class="two">

                        <span>Pays: <?php echo $adresse ['pays'] ;?></span>
                        <span>Ville: <?php echo $adresse ['ville'] ;?></span>
                        <span>Contact: <?php echo $adresse ['contact'] ;?></span>
                          <span>Date de Naissance: <?php echo $user ['date_naissance'] ;?></span>

                      </section>

                      <section class="three">

                        <span>niveau: <?php echo $reqniv['niveau_fil'] ;?></span>
                            <span>filiere: <?php echo $reqniv['filiere'] ;?></span>

                      </section>
            </div>

          </div>

      </div>
  </body>
</html>
<?php } ?>
