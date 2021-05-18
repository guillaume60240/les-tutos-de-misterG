<?php

$title = 'Espace administration';



ob_start();
?>


    <h1 class="titleSection">Administration du site</h1>
   
<section class="section"> 
    

    <aside class="aside">
        <a href="/?page=accueil" class="btn actionTitle">Retour à l'accueil</a>
        <ul>
            <form action="#" method="post">
                <span class="actionTitle">Gestion des utilisateurs</span>
                <li><button type="submit" name="afficheUtilisateurs" action="#" class="btn">Afficher</button> </li>
                <li><button type="submit" name="modifierUtilisateurs" action="#" class="btn">Modifier</button></li>
                
                
                <span class="actionTitle">Gestion des commentaires</span>
                <li><button type="submit" name="afficheCommentaires" action="#" class="btn">Afficher</button> </li>
               
                
                <span class="actionTitle">Gestion du contenu</span>
                <li><button type="submit" name="afficheContenu" action="#" class="btn">Afficher</button> </li>
                <li><button type="submit" name="modifierContenu" action="#" class="btn">Modifier</button></li>                
                <li><button type="submit" name="creerContenu" action="#" class="btn">Créer</button></li>
                
                <span class="actionTitle">Gestion des demandes</span>
                <li><button type="submit" name="afficheDemandes" action="#" class="btn">Afficher</button> </li>               
                <li><button type="submit" name="supprimerDemandes" action="#" class="btn">Supprimer</button></li>
               
            </form>
            
        </ul>
    </aside>
    <div class="affichage">
        <?php
        
        require('./Controllers/adminController.php');
        
        ?>
    </div>
</section>
<?php
if(isset($action)){
?>
    <h2 class="titleAction"><?=$action?></h2>
<?php
}



$content = ob_get_clean();

require('templates/admin.php');

// <!--  Cette page contient tous les éléments qui seront affichés sur la page administration-->