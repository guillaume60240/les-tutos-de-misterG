<?php

$title = 'Covers';

ob_start();
?>
<body>
    
<section class="affichage">
    <h1 class="titleSection">Les covers</h1>
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

</body>

<?php
$content = ob_get_clean();

require('templates/base.php');

// <!--  Cette page contient tous les éléments qui seront affichés sur la page des covers -->