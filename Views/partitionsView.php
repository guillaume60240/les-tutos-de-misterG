<?php

$title = 'Les partitions';

ob_start();
?>



<h1>Liste des partitions</h1>


<?php
$content = ob_get_clean();

require('templates/base.php');

// <!--  Cette page contient tous les éléments qui seront affichés sur la page des partitions-->