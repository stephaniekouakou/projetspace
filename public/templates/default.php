<?php require "public/pages/traitement/traite_echeconex.php"; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="public/css/style.css">
      <link rel="stylesheet" media="screen and (max-width:1000px)" href="public/css/media2.css">
  <link rel="stylesheet" media="screen and (max-width:600px)" href="public/css/media1.css">



    <title>my space</title>
    <style>
      .conteneur{
       background-image: url('public/img/bg2.jpg');
        background-size: 100% 100%;
        width: 100%;
        height: 100%;
        position:absolute;
      }
    </style>
  </head>
  <body>
    <script type="text/javascript" src="app.js"> </script>
    <div class="conteneur">

    <header>
      <div class="coverall">
        <div class="logo">
                <a href="#" onclick="openModal()" id="button_modal">MY SPACE</a>
        </div>
        <div class="barre">
          <form class="" action="" method="post">
            <div class="">
              <input type="email" name="mailconnect" value="" placeholder="Email">
            </div>
            <div class="">
              <input type="password" name="mdpconnect" value="" placeholder="mot de passe">
            </div>

            <div class="sub">
              <input type="submit" name="connecter" value="connexion" id="connecter">
            </div>

          </form>
        </div>

      </div>
    </header>
    <div class="content">
        <?= $content; ?>


    </div>

  </div>
  <div id="boitemembre">
    <?php

         if (isset($erreur) && !empty($erreur)) {
              echo "<div class='error' style='  color: white;  width: 50%; margin:5px auto;text-align: center;  background-color: rgba(0, 0, 0, 0.5);  font-family: verdana; font-size: 13px;'> $erreur</div>";
         }
        ?>
            <form class="" action="" method="post">
              <div class="image">
                <button type="button" name="button" onclick="closeModal()" id="close"><img src="public/img/del.png" alt=""></button>
              </div>
              <div class="cover">
                <span>Espace membre</span>
                <div class="in">
                  <div class="label">
                    <label for="">speudo</label>
                  </div>
                  <input type="text" name="speudo" value="">
                </div>
                <div class="in">
                  <div class="label">
                    <label for="">code</label>
                  </div>
                  <input type="text" name="code" value="">
                </div>
                <div class="sub">
                  <input type="submit" name="membre" value="valider">
                </div>
              </div>

            </form>

  </div>
  </body>
</html>
