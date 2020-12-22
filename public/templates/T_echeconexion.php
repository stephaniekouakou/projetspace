<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="public/css/style.connexion.css">
    <link rel="stylesheet" media="screen and (max-width:1000px)" href="public/css/media2.css">
    <link rel="stylesheet" media="screen and (max-width:600px)" href="public/css/media1.css">

    <title>my space</title>
    <style media="screen">
    .conteneur{
      background-image: url('public/img/bg2.jpg');
      background-size: 100% 100%;
      width: 100%;
      height: 100%;
      position:absolute;
    }
    .cover{
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.7);
    }
    </style>
  </head>
  <body>
    <div class="conteneur">
            <div class="cover">
              <header>
                <div class="coverall">
                  <div class="logo">
                          <a href="<?= 'index.php?page=acceuil'; ?>">acceuil</a>
                  </div>
                  <div class="barre">
                            <a href="#" class="pwd_fg">mot de passe  oublié</a>
                  </div>
                </div>
              </header>
              <div class="content">

                  <?=$content; ?>

              </div>

            </div>

  </div>
  </body>
</html>
