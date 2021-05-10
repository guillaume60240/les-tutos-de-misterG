<?php
// Ce fichier contient toutes les fonctions nécessaires à l'affichage des pages avec les controlers
require('./Models/function.php');
require('./Models/databaseModel.php');
require('./Models/adminModel.php');
require('./Models/videosModel.php');
require('./Models/partitionsModel.php');

//choix de l'affichage principal
function choixRequete(){

    if (isset($_GET['page'])){

        $affichage = htmlspecialchars($_GET['page']);
    
        switch ($affichage) {
            case 'accueil' :
                requeteAccueil();
                $_GET['page'] = '';
                break;
            case 'covers' :
                requeteSection('covers', 'Les covers');
                $_GET['page'] = '';
                break;
            case 'duos' :
                requeteSection('duos', 'Les covers en duo');
                $_GET['page'] = '';
                break;
            case 'compos' :
                requeteSection('compos', 'Mes compos');
                $_GET['page'] = '';
                break;
            case 'theorie' :
                requeteSection('theorie', 'Les cours théoriques');
                $_GET['page'] = '';
                break;
            case 'morceaux' :
                requeteSection('morceaux', 'Les cours sur les morceaux');
                $_GET['page'] = '';
                break;
            case 'partitions' :
                requetePartitions();
                $_GET['page'] = '';
                break;
            case 'espacePerso' :
                espacePerso();
                $_GET['page'] = '';
                break;
            case 'administration' :
                administration();
                $_GET['page'] = '';
                break;
            case 'lectureVideo' :
                requeteLectureVideo();
                $_GET['page'] = '';
                break;
            default :
                erreurView();
                $_GET['page'] = '';   
        }
    } else {
        $_SESSION['pageView'] = 'accueil';
        requeteAccueil();
    }
}

function headerFooterContent($choix){
    require('./Views/'.$choix.'View.php');
}

//fonctions des requêtes sql
function requeteAccueil(){
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

function requetePartitions(){
    $_SESSION['pageView'] = 'partitions';
    $requete = getPartition();
    require('./Views/partitionsView.php');
}

function requeteLectureVideo(){
    $_SESSION['pageView'] = 'lectureVideo';
    $videoId = $_GET['videoId'];
    // var_dump($_GET);
    $requete = getOneVideoById($videoId);
    require('./Views/lectureVideoView.php');
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

//fonctions pour remplir les sections après les requêtes sql
function remplirSectionVide(){
    require('./Views/functionView/sectionVideView.php');
}

function remplirSection($video, $nomSection){
    
        $titleVideo = $video['titre'];
        $date = $video['created_at'];
        $link = $video['link'];
        $videoId = $video['id'];
        require('./Views/functionView/remplirSection'.$nomSection.'View.php');
}

function remplirSectionPartition($partition){

    $title = $partition['titre'];
    $artiste = $partition['artiste'];
    $link = $partition['lien'];

    require('./Views/functionView/affichePartitionView.php');

}

//fonction pour l'affichage d'erreur
function erreurView(){

    $_SESSION['pageView'] = 'Erreur';
    $error = 'Cette page n\'existe pas ou a été supprimée';
    require('./Views/errorView.php');
}