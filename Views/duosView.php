<?php

$title = 'Duos';

ob_start();
?>



<section class="affichage">
    <h1 class="titleSection">Les duos</h1>
    <div class="section">

    <?php
        // affichage des vidéos de la fonction getVideos
        while($video = $requete->fetch()){
            
   
            remplirSection($video);
        }

        //     while($video = $requete->fetch()){
        //         var_dump($video);
        //         if(isset($video) ){

        //             remplirSection($video);
        //         } else{
        //             sectionVide();
                
        //         }
        //     }
        // var_dump($video);
        //  if(empty($video)){
        //      sectionVide();
        //      var_dump($video);
        //  }
        // try{
        //     remplirSection($video);
        //     throw new Exception("Section vide");
        // } catch(Exception $e){
        //     sectionVide();
        //    echo $e->getMessage();
        // }
    ?>
        
        
    </div>
</section>


<?php
$content = ob_get_clean();

require('templates/base.php');

// <!--  Cette page contient tous les éléments qui seront affichés sur la page des duos-->