
<?php

$title = 'C\'est l\'accueil';



ob_start();
?>




<section class="compo">
    <h1 class="titleSection">Les dernières nouveautés</h1>
    <div class="section">
    <?php
    
    
        foreach($requetes as $requete){

            if($video = $requete->fetch()){
                
                do{              
                    ?><div><h2 class="sectionTitle"><?=$video['section']?></h2><?php
                    remplirSection($video);
                    ?></div><?php
                } while ($video = $requete->fetch());
            }
        }
   
    ?>
    </div>
</section>
<?php
$content = ob_get_clean();

require('templates/base.php');

// <!--  Cette page contient tous les éléments qui seront affichés sur la page d'accueil -->