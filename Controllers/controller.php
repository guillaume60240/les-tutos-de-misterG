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

function requeteSection($section, $h1title){
    //indication de pageView pour la classe active
    $_SESSION['pageView'] = $section;
    //on lance la requête getVideos()
    $h1 = $h1title;
    $title = $section;
    $requete = getAllVideosForOneSection($section);
    //page nécessaire à l'affichage
    require('./Views/sectionView.php');
    
}

function partitions(){
    $_SESSION['pageView'] = 'partitions';
    $requete = getPartition();
    require('./Views/partitionsView.php');
}

function lectureVideo(){
    $_SESSION['pageView'] = 'lectureVideo';
    $videoId = $_GET['videoId'];
    // var_dump($_GET);
    $requete = getOneVideoById($videoId);
    require('./Views/lectureVideoView.php');
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

function remplirSection($video, $nomSection){
    
        $titleVideo = $video['titre'];
        $date = $video['created_at'];
        $link = $video['link'];
        $videoId = $video['id'];
        require('./Views/functionView/remplirSection'.$nomSection.'View.php');
}



function affichePartition($partition){

    $title = $partition['titre'];
    $artiste = $partition['artiste'];
    $link = $partition['lien'];

    require('./Views/functionView/affichePartitionView.php');

}
