<?php
             require "traitement/traite_inscription.php";
    ?>

<div class="form_inscription">
  <?php

       if (isset($erreur) && !empty($erreur)) {
            echo "<div class='error' style='  color: white;  width: 80%;margin:10px auto;text-align: center;  background-color: rgba(0, 0, 0, 0.5);  font-family: verdana; font-size: 13px;'> $erreur</div>";
       }
      ?>

         <div class="formulaire">
           <h1>inscrivez vous</h1>
           <p></p>

           <form class="" action="" method="post">

             <div class="block">

             <div class="form1">

                       <div class="">
                         <div class="lab">
                           <label for="">nom*</label>
                         </div>
                         <input type="text" name="nom" value="" >
                       </div>

                       <div class="">
                         <div class="lab">
                           <label for="">prenom*</label>
                         </div>
                         <input type="text" name="prenom" value="" >
                       </div>

                       <div class="">
                         <div class="lab">
                              <label for="">sexe*</label>
                         </div>

                         <select class="" name="genre" >
                           <option value=""> </option>
                           <option value="femme">Femme</option>
                           <option value="homme">Homme</option>
                         </select>
                       </div>

                       <div class="">
                         <div class="lab">
                            <label for="">date naissance*</label>
                         </div>
                         <input type="date" name="date-n" value="" >
                       </div>




             </div>

             <div class="form2">
                   <div class="">
                     <div class="lab">
                         <label for="">Email*</label>
                     </div>
                        <input type="text" name="email" value="" placeholder="fanny@gmail.com">
                   </div>
                   <div class="">
                     <div class="lab">
                         <label for="">confirmation Email*</label>
                     </div>
                        <input type="text" name="c_email" value="" placeholder="fanny@gmail.com">
                   </div>
                   <div class="">
                     <div class="lab">
                         <label for="">Password*</label>
                     </div>
                        <input type="password" name="mdp" value="" placeholder="mot de passe">
                   </div>
                   <div class="">
                     <div class="lab">
                           <label for="">confirmation Password* </label>
                     </div>
                        <input type="password" name="c_mdp" value="" placeholder="mot de passe">
                   </div>

             </div>

              </div>
             

              <div class="valider">
                <input type="submit" name="valider" value="valider">
              </div>
           </form>

         </div>


</div>
