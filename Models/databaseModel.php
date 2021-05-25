<?php




function getPdo(){
    
    require('./functions/variables.php');
    
    try {
        $bdd = new PDO('mysql:host=localhost;dbname='.$dbName.';charset=utf8', $userName , $mdp);
    }
    catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
    return $bdd;
}