<?php
// cette fonction permet d'aller chercher toutes les vidéos en rapport avec la section voulue

function getVideos($section){

    $bdd = getPdo();

    $requete = $bdd->query('SELECT * FROM videos WHERE section="'.$section.'" ORDER BY created_at DESC');

    return $requete;


}