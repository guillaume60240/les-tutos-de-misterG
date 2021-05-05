
<?php

$title = 'C\'est l\'accueil';

ob_start();
?>



<h1>Voici un accueil</h1>


<?php
$content = ob_get_clean();

require('templates/base.php');

// <!--  Cette page contient tous les éléments qui seront affichés sur la page d'accueil -->