<?php

?>

<div class="confirmContainer">
    <p class="textConfirm">Confirmer la suppression?
        <a href="/?page=<?=$_SESSION['pageView']?>&videoId=<?=$_SESSION['videoId']?>&videoTitle=<?=$_SESSION['videoTitle']?>" class="modal_close">&times;</a>
    </p>

    <form action="#" method="post" class="formulaireConfirm">
        <button type="submit" name="confirm" value="<?=$_POST['deleteCommentaire']?>" class="buttonConfirm">Oui</button>
    </form>
</div>