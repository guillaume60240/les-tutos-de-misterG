<?php

$title = 'Video';

ob_start();
?>



<section class="affichage">
   

    <?php
        if($video = $requete->fetch()){
            do{              
                remplirSection($video, 'Lecture');
            } while ($video = $requete->fetch());
            } else {
                remplirSectionVide();
            }
    ?>
        
        
    </div>
</section>


<?php
$content = ob_get_clean();

require('templates/base.php');

// <!--  Cette page contient tous les éléments qui seront affichés sur la page de lecture de video-->