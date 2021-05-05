<?php

$title = 'Les morceaux expliqués en vidéo';

ob_start();
?>



<h1>Les cours sur les morceaux</h1>


<?php
$content = ob_get_clean();

require('templates/base.php');

// <!--  Cette page contient tous les éléments qui seront affichés sur la page des morceaux expliqués en vidéo-->