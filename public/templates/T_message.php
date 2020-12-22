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
      <link rel="stylesheet" href="public/css/style.Tmsg.css">
      <link rel="stylesheet" media="screen and (max-width:1200px)" href="public/css/mediaprofil.css">
        <link rel="stylesheet" media="screen and (max-width:600px)" href="public/css/media2profil.css">
    </head>
  </head>
  <body>
    <div class="conteneur">
        <!-- ______ l'entete du template  _________ -->
          <header>
            <div class="home">

                  <a href="<?= 'index.php?page=message'; ?>"><img src="public/img/icon2.png" alt="" width="35px" ></a>
            </div>
            <div class="barre">

                  <a href="<?= 'index.php?page=deconnexion'; ?>"> deconnexion</a>

            </div>
          </header>
          <!-- ____________________ le corps du template_________ -->


              <?=$content; ?>


            <!-- ______ le pieds du template  _________ -->
          <footer>

          </footer>
    </div>
  </body>
</html>
<?php } ?>
