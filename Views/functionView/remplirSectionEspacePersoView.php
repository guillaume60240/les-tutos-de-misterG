


<div class="vid">
    <h3><?=$titleVideo ?></h3>
    <h6>Publié le : <?= $date?> </h6>
    <iframe <?= $link ?> ></iframe>
    <p class="btn-container-accueil">
        
        <button class="btnVoirVideo">
            <a href="/?page=lectureVideo&videoId=<?=$videoId?>&videoTitle=<?=$titleVideo?>" class="linkVoirVideo" style="margin-bottom: 20px"></a> 
        </button>
        
    </p>
</div>