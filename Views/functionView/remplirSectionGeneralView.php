

<div class="vid">
    <h3><?=$titleVideo ?> - <?=$artiste?></h3>
    <h6>Publié le : <?= $date?> </h6>
    <iframe <?= $link ?> ></iframe>
    <p class="btn-container-accueil">
        
        <button class="btnVoirVideo">
            <a href="/?page=lectureVideo&videoId=<?=$videoId?>&videoTitle=<?=$titleVideo?>" class="linkVoirVideo"></a> 
            </button>
        
    </p>
</div>