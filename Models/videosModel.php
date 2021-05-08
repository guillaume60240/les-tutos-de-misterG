<?php
// cette fonction permet d'aller chercher toutes les vidéos en rapport avec la section voulue

function getAllVideosForOneSection($section){

    $bdd = getPdo();

    $requete = $bdd->query('SELECT * FROM videos WHERE section="'.$section.'" ORDER BY created_at DESC');

    return $requete;


}

function getLastVideoForAllSection($sections){
    
    
    $bdd = getPdo();

    foreach($sections as $section){
        $requete = $bdd->query('SELECT * FROM videos WHERE section="'.$section.'" ORDER BY created_at DESC LIMIT 1');
        $video = $requete->fetch();
        if($video){
            $section = strtoupper($video['section']);
            ?><h2><?=$section?></h2><?php
            remplirSection($video);
            
            
        } else {
            ?> <h2><?=$section?> </h2><?php
            sectionVide();
            
        }
    }
    
}

function getLastVideoForOneSection($section){

    $bdd = getPdo();

    $requete = $bdd->query('SELECT * FROM videos WHERE section="'.$section.'" ORDER BY created_at DESC LIMIT 1');
    return $requete;
}