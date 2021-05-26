<?php

$title = 'Mon espace perso';

ob_start();

?>


<section class="affichage">
    <h1 class="titleSection">Mon espace perso </h1>
    <h4 class="likedVideoTitle">Les vidéos que j'ai aimées</h4>
    <div class="espace-perso-container">
        
        <aside class="aside-perso-menu">
            <h3>Gestion du compte</h3>
            <span>
                <?php
                    if(isset($_GET['success']) && !empty($_GET['success'])){
                        echo('<p class="success">'.$_GET['success'].'</p>');
                    }
                ?>
            </span>
            <form action="#" method="post" class="form-perso">
                <?php
                    if(isset($_SESSION['role']) && $_SESSION['role'] === 'user'){

                        echo('<button type="submit"  name="statut" class="btn2">Demander le statut élève</button>');
                    }
                ?>               
                <button type="submit"  name="modifPseudo"class="btn2">Modifier mon pseudo</button>
                <button type="submit"  name="supprimerCompte"class="btn2">Supprimer mon compte</button>
            </form>
            
        
        </aside>
        <div class="section perso-section">

            <?php
                

                if($liste = $requeteLike->fetch()){
                    
                    do{
                        $videoId = $liste['video_id'];
                        $videos = getOneVideoById($videoId);
                        
                        if($video = $videos->fetch()){
                            do{
                                remplirSection($video, 'EspacePerso');
                            } while($video = $videos->fetch());
                        }
                    } while($liste = $requeteLike->fetch());
                }


            ?>
        </div>
    </div>
    
</section>


<?php
$content = ob_get_clean();

require('templates/base.php');

// <!--  Cette page contient tous les éléments qui seront affichés sur l'espace perso -->