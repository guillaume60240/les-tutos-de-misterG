<?php

function getPartition(){

    $bdd = getPdo();

    $requete = $bdd->query('SELECT * FROM partitionPdf  ORDER BY artiste DESC');

    return $requete;

}

function suppressionPartition($id){
    $bdd = getPdo();
    $requete = $bdd->prepare('DELETE  FROM partitionPdf WHERE id = :id');
    $requete->execute(['id' =>intval($id)]);
}