<?php

function getPdo(){

    try {
        $bdd = new PDO('mysql:host=localhost;dbname=mvc;charset=utf8', 'root', 'root');
    }
    catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
    return $bdd;
}