<?php

$title = 'Covers';

ob_start();
?>

<section class="compo">
    <h1 class="titleSection">Les covers</h1>
    <div class="section">

    <?php
        // affichage des vidéos de la fonction getVideos
        while($video = $requete->fetch()){
            $titleVideo = $video['titre'];
            $date = $video['created_at'];
            $link = $video['link'];
    ?>
        <div class="vid">
                <h3><?=$titleVideo ?></h3>
                <h6>Publié le : <?= $date?> </h6>
                <iframe <?= $link ?> ></iframe>
                <button class="comments">Commentaires</button>
                <button class="like">J'aime</button>
            </div>
            <div class="compo_section">
            
            </div>

    <?php

        }
    ?>

    </div>
</section>


<?php
$content = ob_get_clean();

require('templates/base.php');

// <!--  Cette page contient tous les éléments qui seront affichés sur la page des covers -->