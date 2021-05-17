<?php
// cette fonction permet d'aller chercher toutes les vidéos en rapport avec la section voulue

function getAllVideosForOneSection($section){

    $bdd = getPdo();

    $requete = $bdd->query('SELECT * FROM videos WHERE section="'.$section.'" ORDER BY created_at DESC');

    return $requete;


}

function getAllVideos(){
    $bdd = getPdo();
    $requeteVideos = $bdd->query('SELECT * FROM videos  ORDER BY created_at DESC');

    return $requeteVideos;
}

function getLastVideoForAllSection($sections){
    
    
    $bdd = getPdo();

    foreach($sections as $section){
        $requete = $bdd->query('SELECT * FROM videos WHERE section="'.$section.'" ORDER BY created_at DESC LIMIT 1');
        $video = $requete->fetch();
        if($video){
            $section = strtoupper($video['section']);
            ?><h2><?=$section?></h2><?php
            remplirSection($video, 'General');
            
            
        } else {
            ?> <h2><?=$section?> </h2><?php
            remplirSectionVide();
            
        }
    }
    
}

function getLastVideoForOneSection($section){

    $bdd = getPdo();

    $requete = $bdd->query('SELECT * FROM videos WHERE section="'.$section.'" ORDER BY created_at DESC LIMIT 1');
    return $requete;
}

function getOneVideoById($videoId){

    $bdd = getPdo();

    $requete = $bdd->query('SELECT * FROM videos WHERE id="'.$videoId.'"');
    return $requete;
}

function getFirstTwoVideo(){
    $bdd = getPdo();
    $videoLecture = $_SESSION['videoId'];
    $requeteLastFourVideo = $bdd->query('SELECT * FROM videos  WHERE id != "'.$videoLecture.'" ORDER BY created_at ASC LIMIT 2');
    return $requeteLastFourVideo;
}

function getLikedVideoForUserId($userId){
    $bdd = getPdo();

    $likedVideos = $bdd->query('SELECT * FROM likes WHERE userId ="'.$userId.'"');
    return $likedVideos;
}

// function getLikedVideoForUserIdAndSection($userId, $section){
//     $bdd = getPdo();

//     $likedVideos = $bdd->query('SELECT * FROM videos WHERE userId ="'.$userId.'" AND section ="'.$section.'"');
//     return $likedVideos;
// }

function suppressionVideo($id){
    $bdd = getPdo();
    $requete = $bdd->prepare('DELETE  FROM videos WHERE id = :id');
    $requete->execute(['id' =>intval($id)]);
}