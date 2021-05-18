<?php

function confirmationSuppression(){
    require('./Views/adminConfirmationSuppressionView.php');
}

// requetes pour gérer les utilisateurs
if(isset($_POST['afficheUtilisateurs'])){
    $action = 'Liste des utilisateurs';
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
    $action = 'Modifier un utilisateur';
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
    $action = 'Liste des commentaires';
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

//requêtes pour gérer le contenu

if(isset($_POST['afficheContenu'])){
    $action = 'Liste du contenu';
    $requeteVideos = getAllVideos();
    require('./Views/functionView/administration/tableauVideos.php');
    $requetePartitions = getPartition();
    require('./Views/functionView/administration/tableauPartitions.php');

}

if(isset($_POST['supprimerVideo'])){
    $id = $_POST['supprimerVideo'];
    suppressionVideo($id);
    echo('<p style= "width: 100%; position: absolute; top:0;">La vidéo n° '.$id.' a été supprimée</p>');
    $requeteVideos = getAllVideos();
    require('./Views/functionView/administration/tableauVideos.php');
    $requetePartitions = getPartition();
    require('./Views/functionView/administration/tableauPartitions.php');
}
if(isset($_POST['supprimerPartition'])){
    $id = $_POST['supprimerPartition'];
    suppressionPartition($id);
    echo('<p style= "width: 100%; position: absolute; top:0;">La partition n° '.$id.' a été supprimée</p>');
    $requeteVideos = getAllVideos();
    require('./Views/functionView/administration/tableauVideos.php');
    $requetePartitions = getPartition();
    require('./Views/functionView/administration/tableauPartitions.php');
}

if(isset($_POST['modifierContenu'])){
    $action = 'Modifier un post';
    require('./Views/functionView/administration/modifierContenu.php');
}

if(isset($_POST['updateContenu'])){
   if(isset($_POST['recherche']) && $_POST['recherche'] === 'video'){
       echo('video modifiée');
       $champ = $_POST['champ'];
       $key = $_POST['rechercheClef'];
       $valeur = $_POST['valeur'];
       updateVideo($champ, $key, $valeur);

   } elseif(isset($_POST['recherche']) && $_POST['recherche'] === 'partition'){
       echo('partition modifiée');
       $champ = $_POST['champ'];
       $key = $_POST['rechercheClef'];
       $valeur = $_POST['valeur'];
       updatePartition($champ, $key, $valeur);

   } else{
       echo('erreur');
   }
}

if(isset($_POST['creerContenu'])){
    $action = 'Creer un nouveau post';
    require('./Views/functionView/administration/creerContenu.php');
}

if(isset($_POST['insertContenu'])){
    $titre = htmlspecialchars( $_POST['titre']);
    $artiste = htmlspecialchars( $_POST['artiste']);
    $section = htmlspecialchars( $_POST['section']);
    $link = htmlspecialchars( $_POST['link']);
    $restriction = htmlspecialchars( $_POST['restriction']);

    if(isset($_POST['recherche']) && $_POST['recherche'] === 'video'){
        insertVideo($titre, $artiste, $section, $link, $restriction);
    } elseif(isset($_POST['recherche']) && $_POST['recherche'] === 'partition'){
        insertPartition($titre, $artiste,$section, $link, $restriction);
    } else{
        echo('erreur');
    }
}