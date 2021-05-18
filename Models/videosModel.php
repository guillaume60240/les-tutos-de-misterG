<?php
// cette fonction permet d'aller chercher toutes les vidéos en rapport avec la section voulue

function getAllVideosForOneSection($section){

    $bdd = getPdo();
    if(isset($_SESSION['role']) && ($_SESSION['role'] === 'eleve' || $_SESSION['role'] === 'admin')){

        $requete = $bdd->query('SELECT * FROM videos WHERE section="'.$section.'" ORDER BY created_at DESC');
    } else{
        $requete = $bdd->query('SELECT * FROM videos WHERE section="'.$section.'" AND  restriction = "aucune" ORDER BY created_at DESC');
    }
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
        if(isset($_SESSION['role']) && ($_SESSION['role'] === 'eleve' || $_SESSION['role'] === 'admin')){
            $requete = $bdd->query('SELECT * FROM videos WHERE section="'.$section.'" ORDER BY created_at DESC LIMIT 1');
            $video = $requete->fetch();
        } else{
            $requete = $bdd->query('SELECT * FROM videos WHERE section="'.$section.'" AND  restriction = "aucune" ORDER BY created_at DESC LIMIT 1');
        }
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
    if(isset($_SESSION['role']) && ($_SESSION['role'] === 'eleve' || $_SESSION['role'] === 'admin')){

        $requete = $bdd->query('SELECT * FROM videos WHERE section="'.$section.'" ORDER BY created_at DESC LIMIT 1');
    } else{
        $requete = $bdd->query('SELECT * FROM videos WHERE section="'.$section.'" AND  restriction = "aucune" ORDER BY created_at DESC LIMIT 1');
    }
    return $requete;
}

function getOneVideoById($videoId){

    $bdd = getPdo();
    if(isset($_SESSION['role']) && ($_SESSION['role'] === 'eleve' || $_SESSION['role'] === 'admin')){
        $requete = $bdd->query('SELECT * FROM videos WHERE id="'.$videoId.'"');
    } else{
        $requete = $bdd->query('SELECT * FROM videos WHERE id="'.$videoId.'" AND  restriction = "aucune" ');
    }
    return $requete;
}

function getFirstTwoVideo(){
    $bdd = getPdo();
    $videoLecture = $_SESSION['videoId'];
    if(isset($_SESSION['role']) && ($_SESSION['role'] === 'eleve' || $_SESSION['role'] === 'admin')){
        $requeteLastFourVideo = $bdd->query('SELECT * FROM videos  WHERE id != "'.$videoLecture.'" ORDER BY created_at ASC LIMIT 2');
    } else{
        $requeteLastFourVideo = $bdd->query('SELECT * FROM videos  WHERE id != "'.$videoLecture.'" AND  restriction = "aucune" ORDER BY created_at ASC LIMIT 2');
    }
    return $requeteLastFourVideo;
}

function getLikedVideoForUserId($userId){
    $bdd = getPdo();
    if(isset($_SESSION['role']) && ($_SESSION['role'] === 'eleve' || $_SESSION['role'] === 'admin')){
        $likedVideos = $bdd->query('SELECT * FROM likes WHERE userId ="'.$userId.'"');
    } else{
        $likedVideos = $bdd->query('SELECT * FROM likes WHERE userId ="'.$userId.'" AND  restriction = "aucune" ');
    }
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

function updateVideo($champ, $key, $valeur){
    $bdd = getPdo();

    $requete = $bdd->prepare("UPDATE videos SET $champ = :valeur  WHERE titre = :clef");
    $requete->execute([':valeur' => $valeur,
                        ':clef' => $key
    ]);

}

function insertVideo($titre, $artiste, $section, $link, $restriction){
    $bdd = getPdo();

    $comment = $bdd->prepare('INSERT INTO videos(titre, artiste, section, link, restriction) VALUES (:titre, :artiste, :section, :link, :restriction)');

    $comment->execute(array(
        ':titre' => $titre,
        ':artiste' => $artiste,
        ':section' => $section,
        ':link' => $link,
        ':restriction' =>$restriction
    ));
}