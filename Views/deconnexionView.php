<?php

ob_start();

?>
<section class="affichage">
    <div id="deconnexion" class="modal_connexion">
        <div class="modal_content">
    
            <p>Vous êtes sur le point de fermer votre session</p>

            <form method="post" action="../index.php" enctype='multipart/form-data'>
                
                <button type="submit" name="form_deconnexion">Ok</button>
            </form>
            <a href="/?page=<?=$_SESSION['redirection']?>" class="modal_close">&times;</a>
        </div>
    </div>
</section>
<?php

$content = ob_get_clean();

require('templates/base.php');
