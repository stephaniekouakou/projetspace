<?php
require "public/pages/traitement/connexion.php";
if (isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'] )) {
  $taillemax = 2097152;
      $extensionsvalides = array('jpg', 'jpeg', 'gif','png');

      if ($_FILES['avatar']['size']<= $taillemax) {

        $extensionupload= strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
        if (in_array($extensionupload , $extensionsvalides)) {
            $chemin="public/membre/avatar/".$_SESSION['id'].".".$extensionupload;
            $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);

            if ($resultat) {
              $updateavatar = $bdd->prepare('UPDATE user SET photo = :avatar WHERE id_user = :id');
                $updateavatar->execute( array('avatar'=> $_SESSION['id'].".".$extensionupload,
                'id' => $_SESSION['id']));

            }else{
                $msg ="eureur durant l'importation";
            }

      }else{$msg ="votre photo de profil ne doit pas depasser 2Mo";}

  }else{$msg = "votre photo de profil doit etre de format jpg jpeg gif png" ;}
}



$getid = $_SESSION['id'];
 $requser = $bdd->prepare('SELECT photo FROM user WHERE id_user = ?');
 $requser ->execute(array($getid));
 $userphoto = $requser->fetch();
