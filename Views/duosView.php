<?php

$title = 'Duos';

ob_start();
?>



<section class="affichage">
    <h1 class="titleSection">Les duos</h1>
    <div class="section">

    <?php
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

// <!--  Cette page contient tous les éléments qui seront affichés sur la page des duos-->