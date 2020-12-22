<?php

require "public/pages/traitement/connexion.php";
include('app/fonctions/securite.php');

$req = $bdd->query('SELECT *  from evernement ');
 $nombre=$req->rowcount();

 if (isset($_POST['envoyer'])) {

   $msg=secure($_POST['msg']);

    if (!empty($_POST['msg'])  and  isset($_FILES['photo']) AND !empty($_FILES['photo']['name'] ) ) {
      $taillemax = 2097152;
      $extensionsvalides = array('jpg', 'jpeg', 'gif','png');

       if ($_FILES['photo']['size']<= $taillemax) {
            $extensionupload= strtolower(substr(strrchr($_FILES['photo']['name'], '.'), 1));

                    if (in_array($extensionupload , $extensionsvalides)) {
                            $chemin="public/membre/evernement/".$nombre.".".$extensionupload;
                            $resultat = move_uploaded_file($_FILES['photo']['tmp_name'], $chemin);

                                      if ($resultat) {
                                        $insertpost= $bdd->prepare(" INSERT INTO evernement (contenu , photoevernement, date_ever)   VALUES  (?,?,NOW()) ");
                                        $insertpost->execute(array($msg,$nombre.".".$extensionupload) );
                                        $erreur="ENVOIE REUSSIR!!";
                                        }

                        }
          }
    }elseif (!empty($_POST['msg']) ){

      $insertpost= $bdd->prepare(" INSERT INTO evernement (contenu , date_ever)   VALUES  (?,NOW() ) ");
      $insertpost->execute(array($msg) );
      $erreur="ENVOIE REUSSIR!!";

    }else {
         if (  isset($_FILES['photo']) AND !empty($_FILES['photo']['name'] ) ) {


           $taillemax = 2097152;
           $extensionsvalides = array('jpg', 'jpeg', 'gif','png');

            if ($_FILES['photo']['size']<= $taillemax) {
                 $extensionupload= strtolower(substr(strrchr($_FILES['photo']['name'], '.'), 1));

                         if (in_array($extensionupload , $extensionsvalides)) {
                                 $chemin="public/membre/evernement/".$nombre.".".$extensionupload;
                                 $resultat = move_uploaded_file($_FILES['photo']['tmp_name'], $chemin);

                                           if ($resultat) {

                                             $insertpost= $bdd->prepare(" INSERT INTO evernement (photoevernement, date_ever)   VALUES  (?,NOW()) ");
                                             $insertpost->execute(array($nombre.".".$extensionupload) );

                                             $erreur="ENVOIE REUSSIR!!";

                                             }

                             }
               }


         }

    }

  }

 ?>

 <?php

      if (isset($erreur) && !empty($erreur)) {
           echo "<div class='error' style='  color: white;padding:8px; text-transform: capitalize;  width: 40%;position:relative;top:20px;left:30%; text-align: center;  background-color: rgba(0, 0, 0, 0.5);  font-family: verdana; font-size: 15px;'> $erreur</div>";
      }
     ?>
     
<div id="contentevernement">
  <form class="" action="" method="post" enctype="multipart/form-data">
    <label for="">evernement important</label>
    <div class="aa">
      <textarea name="msg" rows="8" cols="80"></textarea>
    </div>
    <div class="sub">


       <div class="file_design">
          Ajouter photo<input type="file" name="photo" value="photo">
       </div>
         <input type="submit" name="envoyer" value="envoyer">
    </div>
  </form>
</div>
