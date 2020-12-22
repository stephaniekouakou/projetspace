<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="public/css/style.membre.css">

  </head>
  <body>
    <div class="conteneur">
        <!-- ______ l'entete du template  _________ -->
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
              <div class="part-one">
                      <div class="menu">
                        <span>menu</span>
                        <ul>
                        <a href="<?='index.php?page=listetudiant'; ?>">  <li> Liste des etudiants</li></a>
                          <a href="<?='index.php?page=listeprofesseur'; ?>">   <li>Liste des Professeurs</li></a>
                            <a href="<?='index.php?page=evoinotification'; ?>"><li>Envoyer une notification</li></a>
                            <a href="<?='index.php?page=evoievernement'; ?>">  <li>Ajouter un evernement</li></a>
                            <a href="<?='index.php?page=ajoutprof'; ?>">  <li>ajouter un professeur</li></a>
                            <a href="#">  <li>--------------------------</li></a>
                          <a href="#">  <li>--------------------------</li></a>
                          <a href="#">  <li>--------------------------</li></a>
                        </ul>
                      </div>
              </div>
              <div class="part-two">
                <?=$content; ?>
              </div>

          </div>


        </div>
  </body>
</html>
