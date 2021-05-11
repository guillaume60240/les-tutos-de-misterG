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