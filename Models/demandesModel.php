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

function insertDemandeStatut($pseudo, $prenom, $nom, $ecole, $message){

    $bdd = getPdo();

    $requete = $bdd->prepare('INSERT INTO demandes(userPseudo, userPrenom, userNom, userEcole, message) VALUES (:pseudo, :prenom, :nom, :ecole, :contenu)');

    $requete->execute(array(
        ':pseudo' => $pseudo,
        ':prenom' => $prenom,
        ':nom' => $nom,
        ':ecole' => $ecole,
        ':contenu' =>$message
    ));
}