<?php

$title = 'Les cours théoriques';

ob_start();
?>



<h1>Mes cours sur la théorie</h1>


<?php
$content = ob_get_clean();

require('templates/base.php');

// <!--  Cette page contient tous les éléments qui seront affichés sur la page des cours théoriques -->