

<div class="commentaire">  
    <div class="btn-container">
        <h5>De : <?=$userPseudo?></h5>
        <h6>le : <?=$dateC?></h6>
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
    </div>      
    <p class="textCommentaire"><?=$contenu?></p>
</div>