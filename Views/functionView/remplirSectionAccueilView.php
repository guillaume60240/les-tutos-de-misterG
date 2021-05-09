

<div class="vid">
    <h3><?=$titleVideo ?></h3>
    <h6>Publié le : <?= $date?> </h6>
    <iframe <?= $link ?> ></iframe>
    <p class="btn-container-accueil" >
        
        <button class="btnVoirVideo"><a href="/?page=lectureVideo&videoId=<?=$videoId?>" class="linkVoirVideo">Voir la vidéo</a> </button>
        <button class="btnVoirSection"><a href="/?page=covers" class="linkVoirSection">Voir la section</a> </button>
    </p>
</div>