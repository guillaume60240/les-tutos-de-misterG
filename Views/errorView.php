<?php
    $title = 'Erreur';

//on demarre l'enregistrement du contenu
    ob_start();
?>
<!-- le contenu -->
    <section class="container">

        <h1>Oups !!</h1>
        <p><?= $error ?></p>
        

    </section>

<?php
//on enregistre le contenu dans la variable $content utilisée dans la base.php
    $content = ob_get_clean();

    require('templates/base.php');