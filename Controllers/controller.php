<?php
// Ce fichier contient toutes les fonctions nécessaires à l'affichage des pages avec les controlers
require('./Models/function.php');
require('./Models/databaseModel.php');
require('./Models/adminModel.php');
require('./Models/videosModel.php');
require('./Models/partitionsModel.php');

function headerContent(){
    require('./Views/headerView.php');
}

function footerContent(){
    require('./Views/footerView.php');
}

function accueil(){
    $_SESSION['pageView'] = 'accueil';

    $sections = ['covers', 'duos', 'compos', 'theorie', 'morceaux'];
    
    $requetes =[

        $requete = getLastVideoForOneSection($sections[0]),
        $requete = getLastVideoForOneSection($sections[1]),
        $requete = getLastVideoForOneSection($sections[2]),
        $requete = getLastVideoForOneSection($sections[3]),
        $requete = getLastVideoForOneSection($sections[4])
    ];

    require('./Views/acueilView.php');

}

function covers(){
    //indication de pageView pour la classe active
    $_SESSION['pageView'] = 'covers';
    //indication de $section nécessaire pour la fonction getVideo()
    $section = $_SESSION['pageView'];
    //on lance la requête getVideos()
    $requete = getAllVideosForOneSection($section);
    //page nécessaire à l'affichage
    require('./Views/coversView.php');
}

function duos(){
    $_SESSION['pageView'] = 'duos';

    $section = $_SESSION['pageView'];

    $requete = getAllVideosForOneSection($section);

    require('./Views/duosView.php');
}

function compos(){
    $_SESSION['pageView'] = 'compos';
    $section = $_SESSION['pageView'];
    $requete = getAllVideosForOneSection($section);
    require('./Views/composView.php');

}

function theorie(){
    $_SESSION['pageView'] = 'theorie';
    $section = $_SESSION['pageView'];
    $requete = getAllVideosForOneSection($section);
    require('./Views/theorieView.php');
}

function morceaux(){
    $_SESSION['pageView'] = 'morceaux';
    $section = $_SESSION['pageView'];
    $requete = getAllVideosForOneSection($section);
    require('./Views/morceauxView.php');
}

function partitions(){
    $_SESSION['pageView'] = 'partitions';
    $requete = getPartition();
    require('./Views/partitionsView.php');
}
function erreurView(){

    $_SESSION['pageView'] = 'Erreur';
    $error = 'Cette page n\'existe pas ou a été supprimée';
    require('./Views/errorView.php');
}

function espacePerso(){
    if(isset($_SESSION['pseudo']) && isset($_SESSION['id']) && isset($_SESSION['role'])){

        $_SESSION['pageView'] = '';
        require('./Views/espacePersoView.php');
    } else{
        erreurView();
    }
}

function administration(){
    

        if ($_SESSION['role'] === 'admin' && isset($_SESSION['pseudo']) && isset($_SESSION['id'])){

            $_SESSION['pageView'] = '';
            require('./Views/administrationView.php');

        } else{
            erreurView();
        }
        
    
}

function sectionVide(){
    require('./Views/functionView/sectionVideView.php');
}

function remplirSection($video){
    
        $titleVideo = $video['titre'];
        $date = $video['created_at'];
        $link = $video['link'];
        
        require('./Views/functionView/remplirSectionView.php');
}





function affichePartition($partition){

    $title = $partition['titre'];
    $artiste = $partition['artiste'];
    $link = $partition['lien'];

    require('./Views/functionView/affichePartitionView.php');

}
