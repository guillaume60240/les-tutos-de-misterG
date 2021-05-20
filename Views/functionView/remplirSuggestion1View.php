

<div class="vid3">
    <h5 class="suggestionTitre"><?= $videoTitle?></h5>
    <div class="suggestionBefore">
        
        <iframe <?=$linkS?>></iframe>
            <form action="#" method="get" class="formSuggestion">
                <input type="hidden" name="videoId" id="videoId" value="<?=$videoId?>">
                <input type="hidden" name="videoTitle" id="videoId" value="<?=$videoTitle?>">
                <input type="hidden" name="page" id="page" value="lectureVideo">
                <button class="btnVoirVideo" type="submit" name="suggestionLecture" style="padding-top: 200px;">
                Voir la vidéo
                </button>
            </form>
            
        
    </div>
</div>