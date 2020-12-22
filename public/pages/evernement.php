<?php
      require "public/pages/traitement/connexion.php";
       $requete = $bdd->query('SELECT  * FROM evernement');

 ?>
<div id="evernement">
  <h1> Evernements </h1>
  <?php while ($donnee = $requete->fetch() ) {
    echo '<div class="contenu">
              <span class="datep">date publication:'.$donnee['date_ever'].'</span><br>
              <span class="msg">'.$donnee['contenu'].'</span>';

              if (isset($donnee['photoevernement'] )) {
                echo '<div class="image"><img src="public/membre/evernement/'.$donnee['photoevernement'].' " width="100%"; height="98%" /> </div> ';

              }

            echo '</div>';
    } ?>
</div>
