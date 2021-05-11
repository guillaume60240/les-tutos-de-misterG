<?php
// Ce fichier contient toutes les fonctions nécessaires à l'affichage des pages avec les controlers
require('./Models/function.php');
require('./Models/databaseModel.php');
require('./Models/adminModel.php');
require('./Models/videosModel.php');
require('./Models/partitionsModel.php');
require('./Models/usersModel.php');
require('./Models/commentsModel.php');

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
            case 'inscription' :
                inscription();
                $_GET['page'] = '';
                break;
            case 'connexion' :
                connexion();
                $_GET['page'] = '';
                break;
            case 'deconnexion' :
                deconnexion();
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
    // $_GET['page'] = 'accueil';
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
    $_SESSION['videoId'] = $_GET['videoId'];
    $_SESSION['videoTitle'] = $_GET['videoTitle'];
    $videoId = $_SESSION['videoId'];
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

function inscription(){
    $title = 'Inscription';
    require('./Views/inscriptionView.php');
}

function connexion(){
    $title = 'Connexion';
    require('./Views/connexionView.php');
}

function deconnexion(){
    $title = 'deconnexion';
    require('./Views/deconnexionView.php');
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

//fonctions traitement des formulaires 
function traitementFormulaireInscription(){
    if(!empty($_POST['userPseudo']) && !empty($_POST['userMail']) && !empty($_POST['userPassword']) && !empty($_POST['userPassword2'])){
        
        $userPseudo = htmlspecialchars($_POST['userPseudo']);
        $userMail = htmlspecialchars($_POST['userMail']);
        $mdp = password_hash($_POST['userPassword'], PASSWORD_DEFAULT);
        $mdp2 = password_hash($_POST['userPassword2'], PASSWORD_DEFAULT);
    } else {
        ?><script>alert('Veuillez renseigner tous les champs')</script>  <?php
    }

    $UserPseudoExist = verificationPseudoExist($userPseudo);

    if($UserPseudoExist === false){
        
        $userMailExist = verificationMailExist($userMail);

        if($userMailExist === false){
            
            if($_POST['userPassword'] === $_POST['userPassword2']){

                inscriptionUtilisateur($userPseudo, $userMail, $mdp);

                ?><script>alert('Inscription réussie. Vous pouvez vous connecter')</script>  <?php
                connexion();

            } else {
                ?><script>alert('Erreur lors de l\'inscription, veuillez réessayer ')</script>  <?php
            }

        } else {
            ?><script>alert('Erreur lors de l\'inscription, veuillez réessayer ')</script>  <?php
        }

    } else {
        ?><script>alert('Erreur lors de l\'inscription, veuillez réessayer ')</script>  <?php
    }
}

function traitementFormulaireConnexion(){

    if(!empty($_POST['userPseudo']) && !empty($_POST['userPassword'])){
        $pseudo = htmlspecialchars($_POST['userPseudo']);
        $mdp = htmlspecialchars($_POST['userPassword']);
        $userPseudoExist = verificationPseudoExist($pseudo);
       
        if(!empty($userPseudoExist)){

            $hash = $userPseudoExist['motdepasse'];

            if (password_verify($mdp , $hash)) {
                $_SESSION['pseudo'] = $userPseudoExist['pseudo'];
                $_SESSION['id'] = $userPseudoExist['id'];
                $_SESSION['role'] = $userPseudoExist['role'];
                $pageActuelle = $_SESSION['pageView'];
                if($pageActuelle != 'lectureVideo'){

                    $_GET['page'] = $pageActuelle;
                } else {
                    $_GET['page'] = 'accueil';
                }
                
            } else {
                ?><script>alert('Erreur lors de la connexion, veuillez réessayer 3')</script>  <?php
                $_GET['page'] = 'connexion';
            }
        }
    } else {
        ?><script>alert('Erreur lors de la connexion, veuillez réessayer 3')</script>  <?php
        connexion();
    }
}

function traitementFormulaireDeconnexion(){
    unset($_GET['page']);
    $_SESSION['id'] = null;
    $_SESSION['pseudo'] = null;
    $_SESSION['role'] = null;
    //redirection
    $pageActuelle = $_SESSION['pageView'];

    if($pageActuelle != 'lectureVideo'){

        $_GET['page'] = $pageActuelle;
    } else {
        $_GET['page'] = 'accueil';
    }
    
}

function traitementFormulaireCommentaire(){
    if($_SESSION['id'] && $_SESSION['pseudo']){
        $contenu = htmlspecialchars($_POST['commentaire']);
        $userId = $_SESSION['id'];
        $userPseudo = $_SESSION['pseudo'];
        $videoId = $_SESSION['videoId'];
        $videoTitle = $_GET['videoTitle'];

        insererUnCommentaire($userId, $userPseudo, $contenu, $videoId, $videoTitle);
    } else {
        ?><script>alert('Vous devez être connecté pour pouvoir commenter')</script> <?php
    }
}