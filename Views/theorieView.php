<?php

$title = 'Les cours théoriques';

ob_start();
?>



<section class="affichage">
    <h1 class="titleSection">Les cours de théories</h1>
    <div class="section">

    <?php
        // affichage des vidéos de la fonction getVideos
        while($video = $requete->fetch()){
            
   
                remplirSection($video);
            }
         
         
    ?>

    </div>
</section>


<?php
$content = ob_get_clean();

require('templates/base.php');

// <!--  Cette page contient tous les éléments qui seront affichés sur la page des cours théoriques -->