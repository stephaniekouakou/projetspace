<?php
SESSION_START();
require "app/loading.php";
define("DS", DIRECTORY_SEPARATOR);
$tabl = Loading("public".DS."pages".DS);


if (isset($_GET["page"]))
 {
 	$vue = $_GET["page"];
 }
 else
 {
 	$vue = "acceuil";
 }


 ob_start();

 if (in_array($vue, $tabl))
 {

 	require "public".DS."pages".DS.$vue.".php";
 }
 else
 {
 	require "public".DS."error".DS."eror.php";
 }

 $content = ob_get_clean();

 $templ1 = array("acceuil");
 $templ2 = array( "inscription","deconnexion","information","msgdel");
 $templ3 = array("echec_connexion");
 $templ4 = array("profil", "message","action", "photoprofil","commentaires","newmsg",);
 $templ5 = array("lecturemsg","discussion");
 $templ6=array("parametre", "modifpass","ajoutinfo","infopersonnel","notification","evernement");
 $templ7=array( "pagemembre","evoinotification","evoievernement","listetudiant","listeprofesseur","ajoutprof","suprrimer");
  if(in_array($vue, $templ1)){require "public".DS."templates".DS."default.php";}
  elseif(in_array($vue, $templ2)){require "public".DS."templates".DS."t_header.php";}
  elseif(in_array($vue, $templ3)){require "public".DS."templates".DS."T_echeconexion.php";}
  elseif(in_array($vue, $templ4)){require "public".DS."templates".DS."t_profile.php";}
  elseif(in_array($vue, $templ5)){require "public".DS."templates".DS."t_message.php";}
  elseif(in_array($vue, $templ6)){require "public".DS."templates".DS."t_parametre.php";}
  elseif(in_array($vue, $templ7)){require "public".DS."templates".DS."T_membre.php";}
