<?php

require "public/pages/traitement/connexion.php";
 $requete = $bdd->query('SELECT  * FROM notification');

 ?>

<div id="notification">
  <h1>Notification des professeurs</h1>
<?php  while ($donnee = $requete->fetch() ) {
      echo '<div class="content">

      <div class="nomprof">
          <span>'.$donnee['nom_professeur'] .' </span>
        </div>
        <div class="contenue">
        <span class="datenotifi">Date: '.$donnee['date_notifi'] .'</span><br>
          <span class="msg">  '.$donnee['contenu'] .'</span><br>

        </div>
    </div><br>';
    } ?>
</div>
