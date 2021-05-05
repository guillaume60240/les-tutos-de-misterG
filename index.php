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
            covers();
            $_GET['page'] = '';
            break;
        case 'duos' :
            duos();
            $_GET['page'] = '';
            break;
        case 'compos' :
            compos();
            $_GET['page'] = '';
            break;
        case 'theorie' :
            theorie();
            $_GET['page'] = '';
            break;
        case 'morceaux' :
            morceaux();
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
            
    }
} else {

    accueil();
}


