<!-- Cette page sert à afficher le contenu -->

<?php
session_start();
echo('session = </br>');
var_dump($_SESSION);
echo('</br>get = </br>');
var_dump($_GET);
echo('</br>post = </br>');
var_dump($_POST);



require('Controllers/controller.php');

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

choixRequete();

?>


