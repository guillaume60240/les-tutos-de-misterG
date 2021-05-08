<?php

$title = 'Les partitions';

ob_start();
?>

<section class="affichage">
    <h1 class="titleSection">Les partitions</h1>
    <div class="section">

    <div class="partitionContainert">
        <h3 class="artistePartition"> Artiste</h3>
        <h4 class="titrePartition">Titre</h4>
        <a href="<?= $link ?>" class="linkPartitiont">Lien</a>
    </div>
    <div class="partitionContainert">
        <h3 class="artistePartition"> Artiste</h3>
        <h4 class="titrePartition">Titre</h4>
        <a href="<?= $link ?>" class="linkPartitiont">Lien</a>
    </div>
<?php
        if($partition = $requete->fetch()){
            
            do{
                affichePartition($partition);
            } while ($partition = $requete->fetch());
            
        } else {
            sectionVide();
            
        }

?>

    </div>
</section>
<?php
$content = ob_get_clean();

require('templates/base.php');

// <!--  Cette page contient tous les éléments qui seront affichés sur la page des partitions-->