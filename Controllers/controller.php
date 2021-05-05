<?php
// Ce fichier contient toutes les fonctions nécessaires à l'affichage des pages avec les controlers
require('./Models/function.php');

function headerContent(){
    require('./Views/headerView.php');
}

function footerContent(){
    require('./Views/footerView.php');
}

function accueil(){
    require('./Views/acueilView.php');
}

function covers(){
    require('./Views/coversView.php');
}

function duos(){
    require('./Views/duosView.php');
}

function compos(){
    require('./Views/composView.php');

}

function theorie(){
    require('./Views/theorieView.php');
}

function morceaux(){
    require('./Views/morceauxView.php');
}

function partitions(){
    require('./Views/partitionsView.php');
}

function espacePerso(){
    require('./Views/espacePersoView.php');
}

function administration(){
    try {

        if ($_SESSION['role'] === 'admin'  ){
            
            require('./Views/administrationView.php');


        } else {
            throw new Exception(("Cette page n'existe pas ou a été supprimée :'(")); 
        }
    } catch(Exception $e) {
        // die('Erreur : '.$e->getmessage());
        $error = $e->getMessage();
        require('./Views/errorView.php');
    }
}