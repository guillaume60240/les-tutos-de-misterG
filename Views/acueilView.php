
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


    <div class="vid">
    <?php $videoId = 3; ?>
    <h3>Bohemian</h3>
    <h6>Publié le : hier </h6>
    <iframe src="https://www.youtube.com/embed/fj1ekgc5W70?autoplay=0"  frameborder="0" allowfullscreen ></iframe>
    <p class="btn-container" style="position: relative">
        <button style="border: none; "><a href="/?page=covers" style="text-decoration: none; color: #333; padding-top: 200px; padding-left: 40px; padding-right:40px; background: transparent; position: absolute; bottom: -20px; left: 40px">Voir la section</a> </button>
        <button style="border: none; "><a href="/?page=lectureVideo&videoId=<?=$videoId?>" style=" text-decoration: none; color: #333; padding-top: 200px; padding-left: 40px; padding-right:40px; background: transparent; position: absolute; bottom: -20px; right: 40px">Voir la vidéo</a> </button>
    </p>
</div>
    
</section>
<?php
$content = ob_get_clean();

require('templates/base.php');

// <!--  Cette page contient tous les éléments qui seront affichés sur la page d'accueil -->