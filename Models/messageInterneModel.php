<?php

function createMessageInterne($idEmetteur, $pseudoEmetteur, $contenu, $idRecepteur, $pseudoRecepteur){
    $bdd = getPdo();

    $requete = $bdd->prepare('INSERT INTO message_interne(idEmetteur, pseudoEmetteur, contenu, idRecepteur, pseudoRecepteur) VALUES (:idEmetteur, :pseudoEmetteur, :contenu, :idRecepteur, :pseudoRecepteur)');

    $requete->execute(array(
        ':idEmetteur' => $idEmetteur,
        ':pseudoEmetteur' => $pseudoEmetteur,
        ':contenu' => $contenu,
        ':idRecepteur' => $idRecepteur,
        ':pseudoRecepteur' =>$pseudoRecepteur
    ));
}

function updateMessageInterne($id, $champ, $valeur){
    $bdd = getPdo();

    $requete = $bdd->prepare("UPDATE message_interne SET $champ = :valeur  WHERE id = :id");
    $requete->execute([':valeur' => $valeur,
                        ':id' => $id
    ]);

}

function readMessageInterne($id){
    $bdd = getPdo();

    $requete = $bdd->query('SELECT * FROM message_interne WHERE id = "'.$id.'"' );

    return $requete;
}

function getMessageByUserId($userId){
    $bdd = getPdo();

    $requete = $bdd->query('SELECT * FROM message_interne WHERE idRecepteur = "'.$userId.'"');

    return $requete;
}
function getMessageNonLuByUserId($idRecepteur){
    $bdd = getPdo();

    $requete = $bdd->query('SELECT * FROM message_interne WHERE idRecepteur = "'.$idRecepteur.'" AND lu = "FALSE"');

    return $requete;
}

function getMessageNonLuByEmetteurAndRecepteur($idEmetteur, $idRecepteur){
    $bdd = getPdo();

    $requete = $bdd->prepare('SELECT * FROM message_interne WHERE idEmetteur = :idEmetteur AND idRecepteur = :idRecepteur && lu = "FALSE"');
    $requete->execute(([
        ':idEmetteur' => $idEmetteur,
        ':idRecepteur' => $idRecepteur
    ]));
    return $requete;
}

function getMessageByUserAndEmetteur($idUser, $idInterlocuteur){
    $bdd = getPdo();
    $requete = $bdd->prepare('SELECT * FROM message_interne WHERE (idRecepteur = :user AND idEmetteur = :interlocuteur) ');
    $requete->execute([
        ':user' => $idUser,
        ':interlocuteur' => $idInterlocuteur
    ]);
    return $requete;
}

function getMessageByUserAndRecepteur($idUser, $idInterlocuteur){
    $bdd = getPdo();
    $requete = $bdd->prepare('SELECT * FROM message_interne WHERE (idRecepteur = :interlocuteur AND idEmetteur = :user) ');
    $requete->execute([
        ':user' => $idUser,
        ':interlocuteur' => $idInterlocuteur
    ]);
    return $requete;
}

function deleteMessageInterne($id){
    $bdd = getPdo();

    $requete = $bdd->prepare('DELETE FROM message_interne where id = :id');
    $requete->execute(['id' =>intval($id)]);
}
