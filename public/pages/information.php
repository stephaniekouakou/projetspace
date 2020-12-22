
<?php
include('traitement/connexion.php');
include('app/fonctions/securite.php');


if(isset($_SESSION['id']) and !empty($_SESSION['id'])){


          if(isset($_POST['confirmer'])){
            $erreur =" ";
              $code=$_SESSION['id'];

              $contact =secure($_POST['contact']);
              $pays =secure($_POST['pays']);
              $ville =secure($_POST['ville']);
              $filiere =secure($_POST['filiere']);
              $niveau = secure($_POST['niveau']);

                if ( verifie($contact) and verifie($pays) and verifie($ville)   and verifie($filiere)  and verifie($niveau) ){

                      $regx2 = "#^[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}#";

                        if (preg_match($regx2, $contact)) {
                                   // insertion des informations de lutilisateur dans la table adresse

                                    $insert = $bdd->prepare('INSERT INTO adresse (pays, ville,contact, id_user) VALUES(?,?,?,?)' );
                                    $insert->execute(array($pays,$ville,$contact,$code));

                                    // insertion des informations de lutilisateur dans la table niveau

                                    $insert = $bdd->prepare('INSERT INTO niveau (filiere, niveau_fil, id_user) VALUES(?,?,?)' );
                                    $insert->execute(array($filiere,$niveau ,$code));


                                         header("location:index.php?page=echec_connexion");
                                   

                        }else{$erreur="format du contact incorrect";}



                }else{$erreur="rempissez touts les champ svp";}

              }

           ?>

          <div class="grde_div">
          <div class="information">

            <form class="info" action="" method="post">
              <fieldset>

              <legend>ADRESSE</legend>
                  <div class="">
                    <div class="label">
                      <label for="">contact*</label>
                    </div>
                    <input type="text" name="contact" value=""  placeholder="00-00-00-00">
                  </div>
                  <div class="">
                    <div class="label">
                      <label for="">pays*</label>
                    </div>
                    <input type="text" name="pays" value="" >
                  </div>
                  <div class="">
                    <div class="label">
                      <label for="">ville*</label>
                    </div>
                    <input type="text" name="ville" value="" >
                  </div>
                    </fieldset>

                      <fieldset>
                  <legend>NIVEAU D'ETUDE </legend>
                  <div class="">
                    <div class="label">
                      <label for="">filliere*</label>
                    </div>
                    <select class="" name="filiere">
                      <option value="informatique Developpement">IDA</option>
                        <option value="informatique Reseau Telecom">RIT</option>
                      <option value="communication">RHCOM</option>
                      <option value="comptabilité">GESTION</option>
                    </select>
                  </div>
                  <div class="">
                    <div class="label">
                      <label for="">niveau*</label>
                    </div>
                    <input type="text" name="niveau" value="" placeholder="ex:bts2">
                  </div>
                    </fieldset>

                  <div class="">
                    <input type="submit" name="confirmer" value="confirmer">
                  </div>
            </form>

</div>
<?php

     if (isset($erreur) && !empty($erreur)) {
          echo "<div class='error' style='  color: white;  width: 50%; margin:5px auto;text-align: center;  background-color: rgba(0, 0, 0, 0.5);  font-family: verdana; font-size: 13px;'> $erreur</div>";
     }
    ?>
</div>
<?php } ?>
