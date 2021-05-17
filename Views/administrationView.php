<?php
require('./Controllers/adminController.php');
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
                <li><button type="submit" name="supprimerContenu" action="#" class="btn">Supprimer</button></li>
                <li><button type="submit" name="creerContenu" action="#" class="btn">Créer</button></li>
                <span class="actionTitle">Gestion des demandes</span>
                <li><button type="submit" name="afficheDemandes" action="#" class="btn">Afficher</button> </li>
               
                <li><button type="submit" name="supprimerDemandes" action="#" class="btn">Supprimer</button></li>
               
            </form>
            
        </ul>
    </aside>

    <?php

    // requetes pour gérer les utilisateurs
        if(isset($_POST['afficheUtilisateurs'])){

            $requeteUtilisateur = getUtilisateurs();
            
            require('./Views/functionView/administration/tableau.php');
            
        }

        if(isset($_POST['supprimerUtilisateur'])){

            confirmationSuppression();
            
        }

        if(isset($_POST['confirm'])){
            $id = $_POST['confirm'];
            deleteUser($id);
        }

        if(isset($_POST['modifierUtilisateurs'])){
            require('./Views/functionView/administration/modifierUtilisateur.php');
        }

        if(isset($_POST['update'])){
            // var_dump($_POST['update']);
            $key = htmlspecialchars($_POST['rechercheClef']);
            $recherche = $_POST['recherche'];
            $champ = $_POST['champ'];
            $valeur = htmlspecialchars($_POST['valeur']);

            updateUtilisateur($champ, $recherche, $key, $valeur);
        }

    // requetes pour gérer les commentaires
        if(isset($_POST['afficheCommentaires'])){

            $requeteCommentaires = getCommentaires();

            require('./Views/functionView/administration/tableauCommentaires.php');
        }

        if(isset($_POST['supprimerCommentaire'])){

            // var_dump($_POST['supprimerCommentaire']);
            $id = $_POST['supprimerCommentaire'];
            suppressionCommentaire($id);
            echo('<p style= "width: 100%; position: absolute; top:0;">Le commentaire n° '.$id.' a été supprimé</p>');
            $requeteCommentaires = getCommentaires();

            require('./Views/functionView/administration/tableauCommentaires.php');

        }

    ?>
</section>

<?php

$content = ob_get_clean();

require('templates/admin.php');

// <!--  Cette page contient tous les éléments qui seront affichés sur la page administration-->