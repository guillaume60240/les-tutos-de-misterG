<?php

$title = 'Mon espace perso';

ob_start();
?>



<h1>Mon espace perso</h1>


<?php
$content = ob_get_clean();

require('templates/base.php');

// <!--  Cette page contient tous les éléments qui seront affichés sur l'espace perso -->