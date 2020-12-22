<?php



                                                       # code...
$taillemax = 2097152;
$extensionsvalides = array('jpg', 'jpeg', 'gif','png');

 if ($_FILES['photo']['size']<= $taillemax) {

   $extensionupload= strtolower(substr(strrchr($_FILES['photo']['name'], '.'), 1));
     if (in_array($extensionupload , $extensionsvalides)) {
             $chemin="public/membre/photo_poster/".$idpost.".".$extensionupload;
             $resultat = move_uploaded_file($_FILES['photo']['tmp_name'], $chemin);

             if ($resultat) {
                 $updateavatar = $bdd->prepare("INSERT INTO post (photo_publier ,id_user) VALUES  (?,?) ");
                 $updateavatar->execute( array ($idpost.".".$extensionupload, $iduser));
               }else{echo"eureur durant l'importation".$idpost; }


             }else{echo"votre photo de profil ne doit pas depasser 2Mo";}

         }else{echo "votre photo de profil doit etre de format jpg jpeg gif png" ;}


       


 ?>
