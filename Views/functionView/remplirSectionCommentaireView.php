

<div class="commentaire">        
    <h4>De : <?=$userPseudo?></h4>
    <h5>le : <?=$dateC?></h5>
    <?php
    if(isset($_SESSION['id'])){

        if($_SESSION['id'] === $commentaireUserId){
            ?>
            <form action="#" method="post">
                <button type="submit" class="btn2" name="deleteCommentaire" value="<?=$idCommentaire?>">supprimer</button>
            </form>
            <?php
        }
    }
    ?>
    <p><?=$contenu?></p>
</div>