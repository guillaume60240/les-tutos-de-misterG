
<?php

$title = 'C\'est l\'accueil';

ob_start();
?>




<section class="compo">
    <h1 class="titleSection">L'accueil</h1>
    <div class="section">
        <div class="vid">
            <h3>Titre</h3>
            
        </div>
        <div class="compo_section">
        </div>
        <div class="vid">
            <h3>Titre</h3>
            
        </div>
        <div class="compo_section">
        </div>
        <div class="vid">
            <h3>Titre</h3>
            
        </div>
        <div class="compo_section">
        </div>
        <div class="vid">
            <h3>Titre</h3>
            
        </div>
        <div class="compo_section">
        </div>
        <div class="vid">
            <h3>Titre</h3>
            
        </div>
        <div class="compo_section">
        </div>
    </div>
</section>
<?php
$content = ob_get_clean();

require('templates/base.php');

// <!--  Cette page contient tous les éléments qui seront affichés sur la page d'accueil -->