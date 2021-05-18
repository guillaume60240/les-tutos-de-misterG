<?php

function getPartition(){

    $bdd = getPdo();
    if(isset($_SESSION['role']) && ($_SESSION['role'] === 'eleve' || $_SESSION['role'] === 'admin')){

        
        $requete = $bdd->query('SELECT * FROM partitionPdf  ORDER BY artiste DESC');
    } else{
        $requete = $bdd->query('SELECT * FROM partitionPdf WHERE restriction = "aucune"  ORDER BY artiste DESC');
    }

    return $requete;

}

function suppressionPartition($id){
    $bdd = getPdo();
    $requete = $bdd->prepare('DELETE  FROM partitionPdf WHERE id = :id');
    $requete->execute(['id' =>intval($id)]);
}

function updatePartition($champ, $key, $valeur){
    $bdd = getPdo();

    $requete = $bdd->prepare("UPDATE partitionPdf SET $champ = :valeur  WHERE titre = :clef");
    $requete->execute([':valeur' => $valeur,
                        ':clef' => $key
    ]);

}

function insertPartition($titre, $artiste,$section,  $link, $restriction){
    $bdd = getPdo();

    $comment = $bdd->prepare('INSERT INTO partitionPdf(titre, artiste, section, link, restriction) VALUES (:titre, :artiste, :section, :link, :restriction)');

    $comment->execute(array(
        ':titre' => $titre,
        ':artiste' => $artiste,  
        ':section' => $section,      
        ':link' => $link,
        ':restriction' =>$restriction
    ));
}