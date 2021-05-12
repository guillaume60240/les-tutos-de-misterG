<!-- Cette page sert à afficher le contenu -->

<?php
session_start();
require('Controllers/controller.php');
actualiser_session();
// echo('session = </br>');
// var_dump($_SESSION);
// echo('</br>get = </br>');
// var_dump($_GET);
// echo('</br>post = </br>');
// var_dump($_POST);







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
    $idCommentaire = intval($_POST['deleteCommentaire']);
    suppressionCommentaire($idCommentaire);
    var_dump($_POST);
    var_dump($idCommentaire);
    
}
choixRequete();

?>


