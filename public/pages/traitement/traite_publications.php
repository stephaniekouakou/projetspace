<?php

            $iduser=$_SESSION['id'];

            $req = $bdd->query('SELECT *  from post ');
             $nombre=$req->rowcount();



   if (isset($_POST['poster']) ){

                    if (!empty($_POST['texte'])  and  isset($_FILES['photo']) AND !empty($_FILES['photo']['name'] ) ) {
                                                                           # code...
                    $taillemax = 2097152;
                    $extensionsvalides = array('jpg', 'jpeg', 'gif','png','ico');

                     if ($_FILES['photo']['size']<= $taillemax) {

                       $extensionupload= strtolower(substr(strrchr($_FILES['photo']['name'], '.'), 1));
                         if (in_array($extensionupload , $extensionsvalides)) {
                                 $chemin="public/membre/photo_poster/".$nombre.".".$extensionupload;
                                 $resultat = move_uploaded_file($_FILES['photo']['tmp_name'], $chemin);

                                 if ($resultat) {
                                   $post = $_POST['texte'];
                                   $insertpost= $bdd->prepare(" INSERT INTO post (contenu , photopublier, date_pub, id_user)   VALUES  (?,?,NOW(),?) ");
                                   $insertpost->execute(array($post,$nombre.".".$extensionupload, $iduser ) );

                                   }


                                 }

                             }


                           }elseif (!empty($_POST['texte']) ) {
                             $post = $_POST['texte'];
                             $insertpost= $bdd->prepare(" INSERT INTO post (contenu, date_pub, id_user)   VALUES  (?,NOW(),?) ");
                             $insertpost->execute(array($post, $iduser ));
                           }else {
                             if (  isset($_FILES['photo']) AND !empty($_FILES['photo']['name'] ) ) {
                                                                                    # code...
                             $taillemax = 2097152;
                             $extensionsvalides = array('jpg', 'jpeg', 'gif','png');

                              if ($_FILES['photo']['size']<= $taillemax) {

                                $extensionupload= strtolower(substr(strrchr($_FILES['photo']['name'], '.'), 1));
                                  if (in_array($extensionupload , $extensionsvalides)) {
                                          $chemin="public/membre/photo_poster/".$nombre.".".$extensionupload;
                                          $resultat = move_uploaded_file($_FILES['photo']['tmp_name'], $chemin);

                                          if ($resultat) {
                                            $post = $_POST['texte'];
                                            $insertpost= $bdd->prepare(" INSERT INTO post ( photopublier, date_pub, id_user)   VALUES  (?,NOW(),?) ");
                                            $insertpost->execute(array($nombre.".".$extensionupload, $iduser ));

                                            }


                                          }

                                      }


                                    }
                           }

             }

      $requete = $bdd->query('SELECT  post.id_post, user.nom_user , user.prenom_user, user.photo, post.date_pub  , post.contenu, post.photopublier from  post , user
                                   WHERE post.id_user = user.id_user
                                   ORDER BY id_post DESC');

             while ($donnee = $requete->fetch() ) {
               $numpost=$donnee['id_post'];
              //echo ".$numpost.";
          echo ' <div class="aff_pub">
          <div class="info_user">

               <div class="picture">
                     <img src="public/membre/avatar/'.$donnee['photo'].' " width="100%" height="100%"/>

               </div>
               <span>
                 '.$donnee['nom_user']. "  ".$donnee['prenom_user']. '
               </span>
               <span class="datepublier" style="text-align:center;  ">
                  '.$donnee['date_pub'] .'
               </span>
          </div>
            <p class="separe"></p>
          <div class="publi">

           <div class="libelle"></div>

             <div class="pub">

                     <div class="lib1" style="text-align:center;  ">
                        '.$donnee['contenu'] .'
                     </div>';

                     if (isset($donnee['photopublier'] )) {
                       echo '<div class=""><img src="public/membre/photo_poster/'.$donnee['photopublier'].' " width="100%" /> </div> ';

                     }



          echo '

            </div>

          </div>
          <div class="bouton">
          <button type="button" name="button" class="aa1"><a href="index.php?page=commentaires&post='.$numpost.'">votre avis</a></button>
          <div>  <button type="button" name="button" class="aa3"><a href="index.php?page=commentaires&post='.$numpost.'">commentaires</a></button>  </div>
          </div>
          </div>

           ' ;

          }




               $requete ->closeCursor();
