<?php

$title = 'Mon espace perso';

ob_start();

// if($video = $requete->fetch()){
//     do{              
//         remplirSection($video, 'General');
//     } while ($video = $requete->fetch());
//     } else {
//         remplirSectionVide();
//     }


?>



<section class="affichage">
    <h1 class="titleSection">Mon espace perso </h1>
    <h4>Les vidéos que j'ai aimées</h4>
    <div class="section">

        <?php


            if($liste = $requeteLike->fetch()){
                // echo'</br> liste =</br>';
                // var_dump($liste);
                do{
                    $videoId = $liste['video_id'];
                    $videos = getOneVideoById($videoId);
                    // echo'</br> video =</br>';
                    // var_dump($videos);
                    if($video = $videos->fetch()){
                        do{
                            remplirSection($video, 'EspacePerso');
                        } while($video = $videos->fetch());
                    }
                } while($liste = $requeteLike->fetch());
            }





        ?>
    </div>
    
</section>


<?php
$content = ob_get_clean();

require('templates/base.php');

// <!--  Cette page contient tous les éléments qui seront affichés sur l'espace perso -->