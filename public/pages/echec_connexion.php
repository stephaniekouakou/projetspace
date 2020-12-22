
<?php
             require "traitement/traite_connexion.php";
    ?>
<div class="content_pwfg">
        <div class="coverall">
        <div class="all">
             <form action="" method="post">

                       <div>
                            <aside class="rond"><img src="public/img/graduate.png" alt="" width="25px" ></aside>
                            <div><input id="jp1" type="email" placeholder="Email" name="mailconnect"></div>
                            <div><input id="jp2" type="password" placeholder="Mot De Passe" name="mdpconnect"></div>
                            <div><input class="aa" type="submit" value="connexion" name="connecter"></div>
                       </div>

             </form>
             <?php

                  if (isset($erreur) && !empty($erreur)) {
                       echo "<div class='error'> $erreur</div>";
                  }
                 ?>
         </div>

     </div>
  </div>
