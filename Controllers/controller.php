<?php
// Ce fichier contient toutes les fonctions nécessaires à l'affichage des pages avec les controlers
require('./Models/function.php');
require('./Models/databaseModel.php');
require('./Models/adminModel.php');
require('./Models/videosModel.php');

function headerContent(){
    require('./Views/headerView.php');
}

function footerContent(){
    require('./Views/footerView.php');
}

function accueil(){
    $_SESSION['pageView'] = 'accueil';

    require('./Views/acueilView.php');
}

function covers(){
    //indication de pageView pour la classe active
    $_SESSION['pageView'] = 'covers';
    //indication de $section nécessaire pour la fonction getVideo()
    $section = $_SESSION['pageView'];
    //on lance la requête getVideos()
    $requete = getVideos($section);
    //page nécessaire à l'affichage
    require('./Views/coversView.php');
}

function duos(){
    $_SESSION['pageView'] = 'duos';
    require('./Views/duosView.php');
}

function compos(){
    $_SESSION['pageView'] = 'compos';
    require('./Views/composView.php');

}

function theorie(){
    $_SESSION['pageView'] = 'theorie';
    require('./Views/theorieView.php');
}

function morceaux(){
    $_SESSION['pageView'] = 'morceaux';
    require('./Views/morceauxView.php');
}

function partitions(){
    $_SESSION['pageView'] = 'partitions';
    require('./Views/partitionsView.php');
}

function espacePerso(){
    $_SESSION['pageView'] = '';
    require('./Views/espacePersoView.php');
}

function administration(){
    try {

        if ($_SESSION['role'] === 'admin'  ){
            $_SESSION['pageView'] = '';
            require('./Views/administrationView.php');
           


        } else {
            throw new Exception(("Cette page n'existe pas ou a été supprimée :'(")); 
        }
    } catch(Exception $e) {
        
        $error = $e->getMessage();
        require('./Views/errorView.php');
    }
}