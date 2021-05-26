<?php

$title = 'Video';

ob_start();
?>



<section class="affichage">
   

    <?php
        if($video = $requete->fetch()){
            do{              
                remplirSection($video, 'Lecture');
            } while ($video = $requete->fetch());
            } else {
                remplirSectionVide();
            }
            
    ?>
    
    <div class="suggestion">
        
        <div class="suggestionContainer">
        <h4>Suggestions de vidéos</h4>
            <?php
                if($firstTwoVideo = $requeteFirstTwoVideo->fetch()){
                    do{
                        remplirSuggestion1($firstTwoVideo);
                    } while ($firstTwoVideo = $requeteFirstTwoVideo->fetch());
                } else{
                    echo('pas de video');
                }
            ?>
        </div>
    </div>

    <div class="sectionCommentaire">

        <div class="formCommentaireContainer" id="formCommentaires">
            <form action="#" method="post" class="formCommentaire">
                <label for="commentaire" class="formCommentaireLabel">Mon commentaire</label>
                <textarea name="commentaire" id="commentaire" rows="5" cols="50" style="resize: none;"></textarea>
                <p>

                    <button type="submit" class="btn2" name="formulaireCommentaire">Poster mon commentaire</button>
                    <button type="reset" class="btn2" name="formulaireCommentaireAnnuler" id="commentsAnnuler">Annuler</button>
                </p>
            </form>
        </div>
        <div class="commentaireContainer" id="commentaireContainer">
            
            <div class="commentaires" id="blocCommentaires">
                <h3>Commentaires</h3>
                <?php
                    if(isset($_GET['success']) && !empty($_GET['success'])){
                        echo('<p class="success">'.$_GET['success'].'</p>');
                    }
                    if($comment = $comments->fetch()){
                        do{
                            
                            afficheCommentaire($comment);
                        } while ($comment = $comments->fetch());
                    } else{
                        echo('Pas de commentaire pour le moment');
                    }
        
                ?>
            </div>
        
        </div>
    </div>
        
        
    
</section>


<?php
$content = ob_get_clean();

require('templates/base.php');

// <!--  Cette page contient tous les éléments qui seront affichés sur la page de lecture de video-->