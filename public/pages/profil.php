
<?php

          require "public/pages/traitement/connexion.php";
    ?>
            <div class="publication">

                <div class="poster">
                  <div class="">
                    <form class="poste" action="" method="post"  enctype="multipart/form-data">

                      <div class="">
                        <span>Exprimer vous:</span>
                          <textarea name="texte" rows="4" cols="80" placeholder="POSTER"></textarea>
                        </div>
                        <div class="file_design">poster une photo <input type="file" name="photo" value="photo"></div>
                        <div class="">
                          <input type="submit" name="poster" value="poster">
                       </div>

                    </form>


                  </div>
                </div>

              <?php
                  require "public/pages/traitement/traite_publications.php";

               ?>


            </div>
