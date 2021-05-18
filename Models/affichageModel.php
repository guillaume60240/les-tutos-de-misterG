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
    $link = $partition['link'];

    require('./Views/functionView/affichePartitionView.php');

}

//fonction pour l'affichage d'erreur
function erreurView(){

    $_SESSION['pageView'] = 'Erreur';
    $error = 'Cette page n\'existe pas ou a été supprimée';
    require('./Views/errorView.php');
}

//fonctions d'affichage de l'espace administration

function afficheUtilisateur($utilisateurs){
    $pseudo = $utilisateurs['pseudo'];
    $mail = $utilisateurs['mail'];
    $date = $utilisateurs['created_at'];
    $id = $utilisateurs['id'];
    $role = $utilisateurs['role'];

        require('./Views/functionView/administration/afficheUtilisateurs.php');

}

function afficheAdminCommentaire($commentaire){

    $pseudo = $commentaire['user_pseudo'];
    $date = $commentaire['created_at'];
    $content = $commentaire['contenu'];
    $id = $commentaire['id'];

    require('./Views/functionView/administration/afficheCommentaires.php');


}

function afficheVideos($video){
    $id = $video['id'];
    $titre = $video['titre'];
    $section = $video['section'];
    $created_at = $video['created_at'];
    $link = $video['link'];

    require('./Views/functionView/administration/afficheVideos.php');
}

function affichePartitions($partition){
    $id = $partition['ID'];
    $titre = $partition['titre'];
    $artiste = $partition['artiste'];
    $created_at = $partition['dateUpload'];
    $link = $partition['link'];

    require('./Views/functionView/administration/affichePartitions.php');
}

function afficheAdminDemande($demande){
    $id = $demande['id'];
    $date = $demande['created_at'];
    $pseudo = $demande['userPseudo'];
    $prenom = $demande['userPrenom'];
    $nom = $demande['userNom'];
    $ecole = $demande['userEcole'];
    $message = $demande['message'];

    require('./Views/functionView/administration/afficheDemande.php');
}