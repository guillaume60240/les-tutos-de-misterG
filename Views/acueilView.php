
<?php

$title = 'C\'est l\'accueil';



ob_start();
?>




<section class="affichage">
    <h1 class="titleSection">Les dernières nouveautés</h1>
    <div class="section">
    <?php
    
    
        foreach($requetes as $requete){

            if($video = $requete->fetch()){
                
                do{              
                    ?><div class="sectionTitleVideo"><a href="/?page=<?=$video['section']?>" class="linkVoirSection"><h2 class="sectionTitle">Les <?=$video['section']?></h2></a><?php
                    remplirSection($video, 'Accueil');
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