<?php

$title = 'Compos';

ob_start();
?>

<h1>Mes compos</h1>

<section class="compo">
    <div class="section">
        <div class="vid">
            <h3>Absurde destinée</h3>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/OcAbq75_9oA"  frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen ></iframe>
            <a target="blank" href="https://www.instagram.com/tv/CG8ftRfqPkj/?utm_source=ig_web_copy_link" class="btn">Voir sur instagram</a>
        </div>
        <div class="compo_section">
        
        </div>   
        
    </div>
    
</section>
<?php

$content = ob_get_clean();

require('templates/base.php');

// <!--  Cette page contient tous les éléments qui seront affichés sur la page des cpmpos -->