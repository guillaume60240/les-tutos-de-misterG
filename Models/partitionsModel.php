<?php

function getPartition(){

    $bdd = getPdo();

    $requete = $bdd->query('SELECT * FROM partitionPdf  ORDER BY artiste DESC');

    return $requete;

}