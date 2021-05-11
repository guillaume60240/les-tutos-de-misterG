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