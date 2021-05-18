
<?php

ob_start();

?>
<section class="affichage">
    <div id="deconnexion" class="modal_connexion">
        <div class="modal_content">
    
            <p>Vous êtes sur le point de supprimer votre compte</p>

            <form method="post" action="../index.php" enctype='multipart/form-data'>
                
                <button type="submit" name="deleteCompte">Ok</button>
            </form>
            <a href="/?page=espacePerso" class="modal_close">&times;</a>
        </div>
    </div>
</section>
<?php

$content = ob_get_clean();

require('templates/base.php');
