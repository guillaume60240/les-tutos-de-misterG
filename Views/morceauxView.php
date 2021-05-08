<?php

$title = 'Les morceaux expliqués en vidéo';

ob_start();
?>



<section class="affichage">
    <h1 class="titleSection">Les cours sur les morceaux</h1>
    <div class="section">

    <?php
        // affichage des vidéos de la fonction getVideos
        if($video = $requete->fetch()){
            do{              
                remplirSection($video);
            } while ($video = $requete->fetch());
            } else {
                sectionVide();
            }
         
         
    ?>

    </div>
</section>


<?php
$content = ob_get_clean();

require('templates/base.php');

// <!--  Cette page contient tous les éléments qui seront affichés sur la page des morceaux expliqués en vidéo-->