<?php
// Ce fichier contient toutes les fonctions nécessaires à l'affichage des pages avec les controlers
require('./Models/affichageModel.php');

require('./Models/databaseModel.php');

require('./Models/videosModel.php');
require('./Models/partitionsModel.php');
require('./Models/usersModel.php');
require('./Models/commentsModel.php');
require('./Models/likeModel.php');
require('./Models/demandesModel.php');


//actualisation de la session en fonction de GET
function actualiser_session(){
    if(isset($_GET['videoId'])){
        $_SESSION['videoId'] = $_GET['videoId'];
    }
    if(isset($_GET['videoTitle'])){
        $_SESSION['videoTitle'] = $_GET['videoTitle'];
    }
    if(empty($_SESSION['pageView'])){
        $_SESSION['pageView'] = 'accueil';
    }
    if(isset($_GET['page']) && $_GET['page'] != 'inscription' && $_GET['page'] != 'connexion' && $_GET['page'] != 'deconnexion'){
        $_SESSION['pageView'] = $_GET['page'];
    }
    if(isset($_GET['page']) && $_GET['page'] != 'lectureVideo' && $_GET['page'] != 'connexion' && $_GET['page'] != 'inscription' && $_GET['page'] != 'deconnexion' && $_GET['page'] != 'aPropos' && $_GET['page'] != 'contact' && $_GET['page'] != 'liensUtiles'){
        unset($_SESSION['videoId']);
        unset($_SESSION['videoTitle']);
        unset($_SESSION['like']);
        $_SESSION['redirection'] = $_SESSION['pageView'];
    } elseif(isset($_GET['page']) && $_GET['page'] === 'lectureVideo'){
        $_SESSION['redirection'] = $_SESSION['pageView'].'&videoId='.$_GET['videoId'].'&videoTitle='.$_GET['videoTitle'];
    } else{
        if(isset($_SESSION['redirection'])){

            $_SESSION['redirection'] = $_SESSION['redirection'];
        }
    }
    
}

//lancement des fonctions
if(isset($_POST['form_deconnexion'])){
    traitementFormulaireDeconnexion();
}
if(isset($_POST['form_connexion'])){
    traitementFormulaireConnexion();
}
if(isset($_POST['form_inscription'])){
    traitementFormulaireInscription();
}
if(isset($_POST['formulaireCommentaire'])){
    traitementFormulaireCommentaire();
}

if(isset($_POST['deleteCommentaire'])){
    
    require('./Views/confirmationSuppressionView.php');      
    $_GET['videoTitle'] = $_SESSION['videoTitle'];
}

if(isset($_POST['confirm'])){
    
    $idCommentaire  = $_POST['confirm'];
    
    suppressionCommentaire($idCommentaire);
} 

if(isset($_POST['ajoutLike'])){
    traitementFormulaireLike();
}

if(isset($_POST['statut'])){
    $_GET['page'] = 'demandeStatut';
}
if(isset($_POST['demandeStatut'])){
    traitementFormulaireDemande();
}


if(isset($_POST['modifPseudo'])){
    $_GET['page'] = 'modifPseudo';
}

if(isset($_POST['updatePseudo'])){
    $id = $_SESSION['id'];
    $pseudo = htmlspecialchars($_POST['userPseudo']);
    $newPseudo = htmlspecialchars($_POST['nouveauPseudo']);
    traitementFormulairePseudo($id, $pseudo, $newPseudo);
}
if(isset($_POST['supprimerCompte'])){
    $_GET['page'] = 'supprimerCompte';
}

if(isset($_POST['deleteCompte'])){
    $id = $_SESSION['id'];
    deleteUser($id);
    traitementFormulaireDeconnexion();
}

if(isset($_POST['mailContact'])){
    traitementFormulaireContact();
}
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
                requeteEspacePerso();
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
                userAction('inscription');
                $_GET['page'] = '';
                break;
            case 'connexion' :
                userAction('connexion');
                $_GET['page'] = '';
                break;
            case 'deconnexion' :
                userAction('deconnexion');
                $_GET['page'] = '';
                break;
            case 'demandeStatut' :
                userAction('demandeStatut');
                $_GET['page'] = '';
                break;
            case 'modifPseudo' :
                userAction('modifPseudo');
                $_GET['page'] = '';
                break;
            case 'supprimerCompte' :
                userAction('supprimerCompte');
                $_GET['page'] = '';
                break;
            case 'aPropos' :
                userAction('aPropos');
                $_GET['page'] = '';
                break;
            case 'contact' :
                userAction('contact');
                $_GET['page'] = '';
                break;
            case 'liensUtiles' :
                userAction('liensUtiles');
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

//fonctions pour lancer les requêtes sql
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
        require_once('./Views/acueilView.php');
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
    $rVideoTitle = $_GET['videoTitle'];
    $rVideoId = $_GET['videoId'];
    if(isset($_SESSION['id'])){

        $userId = $_SESSION['id'];
        $likeExist = rechercherLikeUneVideoUnUser($rVideoId, $userId );
        $_SESSION['like'] = $likeExist;
    }
    
    $requete = getOneVideoById($rVideoId);
    $comments = recupererCommentairesPourUneVideo($rVideoId);
    $requeteFirstTwoVideo = getFirstTwoVideo();
    
    require('./Views/lectureVideoView.php');
    
}

function requeteEspacePerso(){
    if(isset($_SESSION['pseudo']) && isset($_SESSION['id']) && isset($_SESSION['role'])){
        $userId = $_SESSION['id'];

        $requeteLike = getLikedVideoForUserId($userId);
        
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


function userAction($action){
    $title = $action;
    require('./Views/'.$action.'View.php');
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
                unset($_GET) ;
                $_GET['error'] = 'Inscription réussie. Vous pouvez vous connecter';
                $_GET['page'] = 'connexion';
                
            } else {
                unset($_GET) ;
                $_GET['error'] = 'Erreur lors de l\'inscription, veuillez réessayer ';
                $_GET['page'] = 'inscription';
                
            }

        } else {
            unset($_GET) ;
            $_GET['error'] = 'Erreur lors de l\'inscription, veuillez réessayer ';
            $_GET['page'] = 'inscription';
        }

    } else {
        unset($_GET) ;
        $_GET['error'] = 'Erreur lors de l\'inscription, veuillez réessayer ';
        $_GET['page'] = 'inscription';
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
                unset($_GET);
                $_GET['error'] = 'Erreur lors de la connexion, veuillez réessayer ';
               
                $_GET['page'] = 'connexion';
            }
        }
    } else {
        unset($_GET);
        $_GET['error'] = 'Erreur lors de la connexion, veuillez réessayer ';
        $_GET['page'] = 'connexion';
        
    }
}

function traitementFormulaireDeconnexion(){
   
    $_SESSION = array();
    session_destroy();
   
    //redirection
    $_GET['page'] = 'accueil'; 
}

function traitementFormulaireCommentaire(){
    if(isset($_SESSION['id']) && isset($_SESSION['pseudo'])){
        $contenu = htmlspecialchars($_POST['commentaire']);
        $userId = $_SESSION['id'];
        $userPseudo = $_SESSION['pseudo'];
        $videoId = $_SESSION['videoId'];
        $videoTitle = $_SESSION['videoTitle'];

        insererUnCommentaire($userId, $userPseudo, $contenu, $videoId, $videoTitle);
    } else {
        $_GET['error'] = 'vous devez être connecté pour liker une vidéo';
        $_GET['page'] = 'connexion';
        
    }
}

function traitementFormulaireLike(){
    if(isset($_SESSION['id']) && isset($_SESSION['pseudo'])){
        $videoId = $_SESSION['videoId'];
        $userId = $_SESSION['id'];
        $userPseudo = $_SESSION['pseudo'];
        $videoTitle = $_SESSION['videoTitle'];

        $likeExist = rechercherLikeUneVideoUnUser($videoId, $userId);
        if($likeExist === false){
            insererLike($videoId, $userId, $videoTitle, $userPseudo);

        } else{
            $id = $likeExist['id'];
            supprimerUnLike($id);
        }

    } else {
        $_GET['error'] = 'vous devez être connecté pour liker une vidéo';
        $_GET['page'] = 'connexion';
        
    }
}

function traitementFormulaireDemande(){
    if(isset($_SESSION['id']) && isset($_SESSION['pseudo'])){
        if(!empty($_POST['userPseudo']) && !empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['ecole'])){

            $pseudo = htmlspecialchars($_POST['userPseudo']);
            $prenom = htmlspecialchars($_POST['prenom']);
            $nom = htmlspecialchars($_POST['nom']);
            $ecole = htmlspecialchars($_POST['ecole']);
            $message = htmlspecialchars($_POST['message']);

            insertDemandeStatut($pseudo, $prenom, $nom, $ecole, $message);
            
        } else {
            $_GET['error'] = 'Remplissez tous les champs';
            $_GET['page'] = 'demandeStatut';
        }
    }
}

function traitementFormulairePseudo($id, $pseudo, $newPseudo){

    if(isset($_SESSION['id']) && isset($_SESSION['pseudo'])){
    
        if(!empty($_POST['userPseudo']) && !empty($_POST['nouveauPseudo'])){

            if($pseudo === $_SESSION['pseudo']){
                
                $UserPseudoExist = verificationPseudoExist($newPseudo);
                
                if($UserPseudoExist === false){
                    modifPseudo($id, $newPseudo);
                    $_SESSION['pseudo'] = $newPseudo;
                } else{
                    $_GET['error'] = 'Ce pseudo existe déjà';
                    $_GET['page'] = 'modifPseudo';
                }
            } else{
                $_GET['error'] = 'Les informations ne sont pas correctes';
                $_GET['page'] = 'modifPseudo';
            }
        } else{
            $_GET['error'] = 'Les informations ne sont pas correctes';
            $_GET['page'] = 'modifPseudo';
        }
    } else{
        $_GET['error'] = 'Les informations ne sont pas correctes';
        $_GET['page'] = 'modifPseudo';
    }
    
}

function traitementFormulaireContact(){
    if(!empty($_POST['message']) && !empty($_POST['mail'])){

        $pseudo = htmlspecialchars($_POST['userPseudo']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $nom = htmlspecialchars($_POST['nom']);
        $ecole = htmlspecialchars($_POST['mail']);
        $message = htmlspecialchars($_POST['message']);

        insertDemandeStatut($pseudo, $prenom, $nom, $ecole, $message);
        $_GET['error'] = 'Message envoyé';
        
    } else {
        $_GET['error'] = 'Remplissez tous les champs';
        $_GET['page'] = 'contact';
    }
}