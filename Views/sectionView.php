<?php



ob_start();
?>
<body>
    
<section class="affichage">
    <h1 class="titleSection"><?= $h1?></h1>
    <div class="section">

    <?php
        // affichage des vidéos de la fonction getVideos
        if($video = $requete->fetch()){
            do{              
                remplirSection($video, 'General');
            } while ($video = $requete->fetch());
            } else {
                remplirSectionVide();
            }
         
         
    ?>

    </div>
</section>

</body>

<?php
$content = ob_get_clean();

require('templates/base.php');

// <!--  Cette page contient tous les éléments qui seront affichés sur la page des covers -->