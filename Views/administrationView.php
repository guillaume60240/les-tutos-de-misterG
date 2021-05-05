<?php

$title = 'Espace administration';

ob_start();
?>



<h1>Administration du site</h1>


<?php
$content = ob_get_clean();

require('templates/base.php');

// <!--  Cette page contient tous les éléments qui seront affichés sur la page des covers -->