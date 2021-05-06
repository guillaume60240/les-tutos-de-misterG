<?php

function getPdo(){

    try {
        $bdd = new PDO('mysql:host=localhost;dbname=les_tutos_de_mister_G;charset=utf8', 'root', 'root');
    }
    catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
    return $bdd;
}