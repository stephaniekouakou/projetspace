<?php require "public/pages/traitement/connexion.php"; ?>
<div id="listetudiant">
          <h1>listes des etudiants</h1>
  <div class="boite_etudiant">
    <table>
      <th>nom</th> <th>prenom</th><th>date naissance</th><th>email</th><th>contact</th><th>supprimer</th>


    <?php

    $req = $bdd->query('SELECT *  from user ');
     while ($donne=$req->fetch()) {
       $requser = $bdd->prepare('SELECT * FROM adresse WHERE id_user = ?');
       $requser ->execute(array($donne['id_user']));
       $useadresse = $requser->fetch();
              echo "

                 <tr>
                          <td> ".$donne['nom_user']."</td>
                          <td> ".$donne['prenom_user']."</td>
                          <td>".$donne['date_naissance']." </td>
                          <td>".$donne['email']."</td>
                          <td>".$useadresse['contact']."</td>
                          <td><a href='index.php?page=supprimer'> <img src='public/img/del.png' alt='' width='25px'> </a> </td>
                    </tr>";
      }?>
        </table>

  </div>
<th></th>
</div>
