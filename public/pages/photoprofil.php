
<?php
          require "public/pages/traitement/traitement_avatar.php";

      ?>

<div class="content_photo">

                       <div class="photo">

                         <div class="avatar1">
                           <?php
                                if (!empty($userphoto['photo'])){
                            ?>
                              <img src="public/membre/avatar/<?php echo $userphoto['photo'] ;?> " width="100%" height="100%"/>
                     <?php } ?>
                         </div>
                         <form action="" enctype="multipart/form-data" method="post">
                           <h2>photo de profil</h2>
                           <div class="file_design">Choisir un fichier<input type="file" name="avatar" value="avatar"></div>
                           <div class="bouton_v"><input type="submit" name="" value="valider votre choix"></div>
                         </form>
                       </div>

                       <?php if(isset($msg)){
                         echo $msg;
                       } ?>

  </div>
