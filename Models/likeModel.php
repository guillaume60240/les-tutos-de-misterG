<?php

function insererLike($videoId, $userId, $videoTitle, $userPseudo){

    $bdd = getPdo();

    $like = $bdd->prepare('INSERT INTO likes( video_id, userId, user_pseudo, video_title) VALUES (:video_id, :userId, :user_pseudo, :video_title)');

    $like->execute(array(
        ':video_id' => $videoId,
        ':user_pseudo' => $userPseudo,
        ':userId' => $userId,
        ':video_title' =>$videoTitle
    ));
}

function rechercherLikeUneVideoUnUser($videoId, $userId){

    $bdd = getPdo();

    $requeteLike = $bdd->query('SELECT * FROM likes WHERE video_id ="'. $videoId.'" AND userId="'.$userId.'"');

    $likeExist = $requeteLike->fetch();

    return $likeExist;
}

function rechercherLikesUser($userId){
    $bdd = getPdo();

    $requeteLike = $bdd->query('SELECT * FROM likes WHERE  userId="'.$userId.'"');

    

    return $requeteLike;
}

function supprimerUnLike($id){
    $bdd = getPdo();

    $requete = $bdd->prepare('DELETE  FROM likes WHERE id = :id ');

    $requete->execute(['id' =>intval($id)]);
}