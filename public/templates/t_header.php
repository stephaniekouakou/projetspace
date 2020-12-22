<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" media="screen and (max-width:1020px)" href="public/css/media.css">
    <link rel="stylesheet" href="public/css/style.inscriptions.css">
    <link rel="stylesheet" href="public/css/informationss.css">
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
                          <a href="#">MY SPACE</a>
                  </div>
                  <div class="barre">
                            <a href="<?= 'index.php?page=acceuil'; ?>"><img src="public/img/icon2.png" alt="" width="36px" ></a>
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
