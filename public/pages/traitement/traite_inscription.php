<?php

include('connexion.php');
include('app/fonctions/securite.php');
include('app/fonctions/code.php');

if(isset($_POST['valider'])){
  $erreur = ' ';

    $nom =secure($_POST['nom']);
    $prenom =secure($_POST['prenom']);
    $date_naissance =secure($_POST['date-n']);
    $sexe =secure($_POST['genre']);
    $email = secure($_POST['email']);
    $c_email = secure($_POST['c_email']);
    $password = secure($_POST['mdp']);
    $c_password = secure($_POST['c_mdp']);
    $n=substr($nom,0,2);
  	$p=substr($prenom,0,1);
    $e=substr($password,0,2);
    $t=substr($date_naissance,0,2);
  	$code=$n.$p.$e.$t;
    $_SESSION['id'] = $code ;
      $user=$prenom." ".$nom;


      if ( verifie($nom) and verifie($prenom) and verifie($date_naissance)   and verifie($sexe)  and verifie($email) and verifie($c_email) and verifie($password) and verifie($c_password) ) {

        if(strlen($nom)>=2){

                if (strlen($prenom)>=3) {

                        if ($email == $c_email) {

                              if(filter_var($email, FILTER_VALIDATE_EMAIL)){

                                $reqmail = $bdd->prepare("SELECT * FROM user  WHERE email = ?");
                                $reqmail->execute(array($email));
                                $mailexist = $reqmail->rowcount();
                                if($mailexist == 0){

                                if (strlen($password) >=8){

                                  if ($password == $c_password) {
                                    $password = sha1($password);
                                    $etat = 0;
                                    //insertion des donnees dans  la base de donnees

                                          //insertion des donnees de lutilisateur dans la table user

                                            $insertmbr = $bdd->prepare("INSERT INTO user (id_user,nom_user,prenom_user,date_naissance,sexe,email,motpass, etat ) VALUES(?,?,?,?,?,?,?,?)");
                                            $insertmbr->execute(array( $code,$nom,$prenom,$date_naissance,$sexe,$email,$password,$etat));


                                            $erreur='vous etre inscrire <a href="index.php?page=information"> cliquez ici</a> pour completer vos informations';

                                           // redirection de pa page vers la page information



                                  }else{ $erreur=" vos mot de passe sont differentes ";}

                                }else{ $erreur=" votre mot de passe doit contenir au moins 8 caracteres ";}

                              }else{$erreur="Cet  email existe deja ";}

                            }else {$erreur=" email est invalide ";}
                            }else{$erreur=" votre email nest pas  conforme a l'email de confirmation ";}




                }else{ $erreur=" votre nom doit contenir au moins 2 caracteres";}

              }else{ $erreur=" votre prenom doit contenir au moins 3 caracteres";}



      }else{ $erreur ="remplissez tous les champs svp!!";}


  }
