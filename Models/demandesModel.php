<?php

function getDemandes(){

$bdd = getPdo();

$requeteDemandes = $bdd->query('SELECT * FROM demandes ORDER BY created_at ASC');

return $requeteDemandes;
}

function deleteDemande($id){
    $bdd = getPdo();

    $requete = $bdd->prepare('DELETE  FROM demandes WHERE id = :id');

    $requete->execute(['id' =>intval($id)]);
}