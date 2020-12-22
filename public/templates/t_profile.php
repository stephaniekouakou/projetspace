<?php if (isset($_SESSION['id'])){
        require "public/pages/traitement/connexion.php";

     $getid = $_SESSION['id'];
      $requser = $bdd->prepare('SELECT * FROM user WHERE id_user = ?');
      $requser ->execute(array($getid));
      $userinfo = $requser->fetch();

      $requser = $bdd->prepare('SELECT * FROM adresse WHERE id_user = ?');
      $requser ->execute(array($_SESSION['id']));
      $useadresse = $requser->fetch();

  ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>my space</title>
    <link rel="stylesheet" href="public/css/master.css">
      <link rel="stylesheet" href="public/css/style.profile.css">
      <link rel="stylesheet" href="public/css/style_messages.css">
      <link rel="stylesheet" href="public/css/style_amis.css">
      <link rel="stylesheet" media="screen and (max-width:1200px)" href="public/css/mediaprofil.css">
        <link rel="stylesheet" media="screen and (max-width:600px)" href="public/css/media2profil.css">



  </head>
  <body>
    <div class="conteneur">
        <!-- ______ l'entete du template  _________ -->
          <header>
            <div class="home">

                <img src="public/img/icon2.png" alt="" width="35px" >
            </div>
            <div class="barre">

                  <a href="<?= 'index.php?page=deconnexion'; ?>">deconnexion</a>

            </div>
          </header>
          <!-- ____________________ le corps du template_________ -->
          <!-- ____________________ je divise le coprs en 3 grandes partie______ -->

          <div class="content">
            <!-- __________________parite 1 du corps _________ -->
              <div class="part_one">

                <div class="myprofil">

                  <div class="picture">
                    <span>MON PROFIL</span>
                    <aside class="rond">
                      <?php
                            if (!empty($userinfo['photo'])){
                        ?>
                          <img src="public/membre/avatar/<?php echo $userinfo['photo'] ;?> " width="100%" height="100%"/>
                      <?php } ?>
                  </aside>

                  </div>
                  <div class="info_user">
                    <ul>
                      <li><img src="public/img/style.png" alt="" width="20px" > <?php echo $userinfo['nom_user']." " .$userinfo['prenom_user']   ?></li>
                      <li>  <img src="public/img/65-512.png" alt="" width="20px" ><?php echo $useadresse['pays'] ?> </li>
                      <li>   <img src="public/img/calen.png" alt="" width="20px" ><?php echo $userinfo['date_naissance'] ?> </li>
                    </ul>
                  </div>

                </div>

                <div class="groupe">

                    <ul>
                            <li><a href="<?= 'index.php?page=profil'; ?>">acceuil</a></li>
                            <li><a href="<?= 'index.php?page=photoprofil'; ?>">photo </a></li>
                            <li><a href="<?= 'index.php?page=message'; ?>">message </a></li>
                            <li><a href="<?= 'index.php?page=parametre'; ?>">parametre</a></li>
                            <li><a href="<?= 'index.php?page=discussion&id=0'; ?>">discution instantanée</a></li>
                  </ul>

                </div>

                <div class="divers">
                    <div class="">
                      <span>user</span> <span>music</span>
                        <span>sport</span> <span>lecture</span>
                    </div>
                      <div class="">
                       <span>religion</span>
                       <span>metier</span> <span>niveau</span>
                    </div>

              </div>
              </div>

              <div class="part_two">
                  <!-- ______partie 2 du corps = html de profil.php  _________ -->

                                <?=$content; ?>

                <!-- ______ fin partie 2 du corps = html de profil.php  _________ -->
              </div>
              <div class="part_three">
                  <!-- ______partie 3 du corps  _________ -->
                      <div class="bloc1">
                          <div class="bloc">
                            <span>evernements</span>
                            <div class="picture">
                                <!--<img src="public/img/ecran.jpg" alt=""  >-->
                            </div>
                            <span>holiday</span>
                            <span>friday 15:20</span>
                            <div class="info">
                              <a href="#">info</a>
                            </div>
                          </div>
                      </div>
                      <div class="bloc2">
                        <span>notification des professeurs</span>
                        <div class="picture">
                        <img src="public/img/userrm2.png" alt="" width="25px" >
                        </div>
                        <span>noms</span>
                          <div class="bouton">
                            <button type="button" name="button">v</button>
                            <button type="button" name="button">x</button>
                          </div>
                      </div>

                      <div class="bloc3">
                        <span>ADS</span>
                      </div>
                      <div class="bloc4">
                        <span>ADS</span>
                      </div>

              </div>

          </div>
            <!-- ______ le pieds du template  _________ -->
          <footer>

          </footer>
    </div>
  </body>
</html>
<?php } ?>
