<?php
include('connexion.php');
include('app/fonctions/securite.php');
include('app/fonctions/code.php');

if (isset($_POST['connecter'])) {
    $mailconnect = htmlspecialchars($_POST['mailconnect']);
    $mdpconnect = sha1($_POST['mdpconnect']);
    if (verifie($mailconnect) AND verifie($mdpconnect)) {
        $req = $bdd->prepare("SELECT * FROM user WHERE email = ? and motpass = ?");
        $req->execute(array($mailconnect, $mdpconnect));
        $userexist = $req->rowcount();
        if ($userexist == 1) {

            $userinfo = $req ->fetch();
            $_SESSION['id'] = $userinfo['id_user'];
            $_SESSION['nom'] =  $userinfo['nom_user'];
            $_SESSION['prenom'] = $userinfo['prenom_user'];
            $_SESSION['email'] = $userinfo['email'];
            $_SESSION['naissance'] = $userinfo['date_naissance'];
            $_SESSION['etat']="1";
            $req_s=$bdd->prepare('UPDATE user SET etat = "1" WHERE email=?');
            $req_s->execute(array($mailconnect));

            header("location:index.php?page=profil");

        }else {
          $erreur = "mauvais email ou mot de passe ou vous netre pas encore inscrire: <a href='index.php?page=inscription'>cliquez ici</a> pour vous inscrire";
        }
    }else {
      $erreur="tous les champs doivent etre completer";
    }
}


if (isset($_POST['membre'])) {

      $speudo=secure($_POST['peudo']);
      $code = secure($_POST['code']);

      if (verifie($speudo) AND verifie($code) ) {
        $reqmembre = $bdd->prepare('SELECT * FROM membre WHERE speudo=? and code=?');
        $reqmembre->execute(array($speudo,$code));
        $exit=$reqmembre->rowcount();
        if ($exi==1) {
          header("location:index.php?page=pagemembre");
        }

      }
}
