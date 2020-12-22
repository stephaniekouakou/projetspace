<?php require "public/pages/traitement/connexion.php"; ?>
<div id="listeprof">

  <div class="boite_professeur">
    <table>
      <th>nom</th> <th>prenom</th><th>email</th><th>contact</th><th>supprimer</th>

      <?php

      $req = $bdd->query('SELECT *  from professeur ');
       while ($donne=$req->fetch()) {
                echo "

                   <tr>
                            <td> ".$donne['nom_prof']."</td>
                            <td> ".$donne['prenom_prof']."</td>
                            <td>".$donne['email']."</td>
                            <td>".$donne['contact']."</td>
                            <td><a href=''> <img src='public/img/del.png' alt='' width='25px'> </a> </td>
                      </tr>";
        }?>
        </table>

  </div>
