<?php

function verificationPseudoExist($pseudo){
    $bdd = getPdo();

    $requete = $bdd->query('SELECT * FROM membres WHERE pseudo ="'.$pseudo.'"');
    $liste = $requete->fetch();
    return $liste;
    
}

function verificationMailExist($mail){
    $bdd = getPdo();

    $requete = $bdd->query('SELECT * FROM membres WHERE pseudo ="'.$mail.'"');
    $liste = $requete->fetch();
    return $liste;

}

function inscriptionUtilisateur($pseudo, $mail, $mdp){
    $bdd = getPdo();

    $user= $bdd->prepare('INSERT INTO membres(pseudo, mail, motdepasse) VALUES (:pseudo, :mail, :motdepasse)');
    $user->execute(array(
        ':pseudo' => $pseudo,
        ':mail' => $mail,
        ':motdepasse' => $mdp
    ));
    
}

function getUtilisateurs(){
    $bdd = getPdo();

    $requete = $bdd->query('SELECT * FROM membres ORDER BY pseudo');

    return $requete;
}

function deleteUser($id){
    $bdd = getPdo();

    $requete = $bdd->prepare('DELETE  FROM membres WHERE id = :id');
    $requete->execute(['id' =>intval($id)]);
}

function updateUtilisateur($champ, $recherche, $key, $valeur){
    $bdd = getPdo();

    $requete = $bdd->prepare("UPDATE membres SET $champ = :valeur  WHERE $recherche = :clef");
    $requete->execute([':valeur' => $valeur,
                        ':clef' => $key
    ]);

}

