<?php

function insererUnCommentaire($userId, $userPseudo, $contenu, $videoId, $videoTitle){
    $bdd = getPdo();

    $comment = $bdd->prepare('INSERT INTO commentaires(userId, user_pseudo, contenu, video_id, video_title) VALUES (:userId, :user_pseudo, :contenu, :video_id, :video_title)');

    $comment->execute(array(
        ':userId' => $userId,
        ':user_pseudo' => $userPseudo,
        ':contenu' => $contenu,
        ':video_id' => $videoId,
        ':video_title' =>$videoTitle
    ));

}

function recupererCommentairesPourUneVideo($videoId){
    $bdd = getPdo();

    $comments = $bdd->query('SELECT * FROM commentaires WHERE video_id ="'. $videoId.'" ORDER BY id');

    return $comments;
}

function suppressionCommentaire($id){
    $bdd = getPdo();

    $requete = $bdd->prepare('DELETE  FROM commentaires WHERE id = :id');

    $requete->execute(['id' =>intval($id)]);
}

function getCommentaires(){

    $bdd = getPdo();

    $requeteCommentaires = $bdd->query('SELECT * FROM commentaires ORDER BY created_at ASC');

    return $requeteCommentaires;
}