<?php
//fonctions pour remplir les sections après les requêtes sql à l'aide des fonctionView
function remplirSectionVide(){
    require('./Views/functionView/sectionVideView.php');
}

function remplirSection($video, $nomSection){
    
        $titleVideo = $video['titre'];
        $date = $video['created_at'];
        $link = $video['link'];
        $videoId = $video['id'];
        
        require('./Views/functionView/remplirSection'.$nomSection.'View.php');
}


function remplirSuggestion1($video){
    $videoTitle = $video['titre'];
    $linkS = $video['link'];
    // echo'</br>4 derniere videos </br>';
    // var_dump($video);
    require('./Views/functionView/remplirSuggestion1View.php');
}
function afficheCommentaire($comment){
    $userPseudo = $comment['user_pseudo'];
    $contenu = $comment['contenu'];
    $dateC = $comment['created_at'];
    $commentaireUserId = $comment['userId'];
    $idCommentaire = $comment['id'];
    require('./Views/functionView/remplirSectionCommentaireView.php');
    // var_dump($comment);
}

function remplirSectionPartition($partition){

    $title = $partition['titre'];
    $artiste = $partition['artiste'];
    $link = $partition['lien'];

    require('./Views/functionView/affichePartitionView.php');

}

//fonction pour l'affichage d'erreur
function erreurView(){

    $_SESSION['pageView'] = 'Erreur';
    $error = 'Cette page n\'existe pas ou a été supprimée';
    require('./Views/errorView.php');
}