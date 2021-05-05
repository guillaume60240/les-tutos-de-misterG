<?php
    $title = 'Erreur';

//on demarre l'enregistrement du contenu
    ob_start();
?>
<!-- le contenu -->
    <section class="container">

       
        <section class="compo">
        <h1 class="titleSection">Oups!!!</h1>
        <div class="section">
            <div class="vid">
                <h3>Erreur</h3>
                <p><?= $error ?></p>
            </div>
            <div class="compo_section">
            </div>
        
        </div>
</section>

    </section>

<?php
//on enregistre le contenu dans la variable $content utilisée dans la base.php
    $content = ob_get_clean();

    require('templates/base.php');