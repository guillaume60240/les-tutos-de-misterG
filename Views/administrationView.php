<?php

$title = 'Espace administration';

ob_start();
?>


<section class="compo"> 
    
    <h1 class="titleSection">Administration du site</h1>
    <div class="section">
        
        
    </div>
        
</section>
<?php
$content = ob_get_clean();

require('templates/base.php');

// <!--  Cette page contient tous les éléments qui seront affichés sur la page administration-->