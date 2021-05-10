<!-- Cette page sert à afficher le contenu -->

<?php
session_start();
$_SESSION['pseudo'] = "Guillaume";
$_SESSION['id'] = "1";
$_SESSION['role'] = "admin";



require('Controllers/controller.php');



if (isset($_GET['page'])){

    $affichage = $_GET['page'];

    switch ($affichage) {
        case 'accueil' :
            accueil();
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
            partitions();
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
            lectureVideo();
            $_GET['page'] = '';
            break;
        default :
        $error = "Cette page n'existe pas ou a été supprimée :'(";
        $_GET['page'] = '';
        require('./Views/errorView.php');
            
    }
} else {
    $_SESSION['pageView'] = 'accueil';
    accueil();
}

?>


