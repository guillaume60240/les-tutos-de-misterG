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



<section class="compo">
    <h1 class="titleSection">l'espace perso de 
        <?php
        $_SESSION['pseudo']
        ?>
    </h1>
    <div class="section">
        <div class="vid">
            <h3>Titre</h3>
            
        </div>
        <div class="compo_section">
        </div>
        <div class="vid">
            <h3>Titre</h3>
            
        </div>
        <div class="compo_section">
        </div>
        <div class="vid">
            <h3>Titre</h3>
            
        </div>
        <div class="compo_section">
        </div>
        <div class="vid">
            <h3>Titre</h3>
            
        </div>
        <div class="compo_section">
        </div>
        <div class="vid">
            <h3>Titre</h3>
            
        </div>
        <div class="compo_section">
        </div>
    </div>
</section>


<?php
$content = ob_get_clean();

require('templates/base.php');

// <!--  Cette page contient tous les éléments qui seront affichés sur l'espace perso -->