<?php

try{
       $bdd = new PDO('mysql:host=localhost; dbname=bdspace', 'root', '');
       $bdd->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
     }
     catch(PDOException $e){
       echo 'Erreur:' .$e->getmessage();
     }
