<?php

ob_start();
if(isset($_POST['form_deconnexion'])){
    traitementFormulaireDeconnexion();
}
?>
<section class="affichage">
    <div id="deconnexion" class="modal_connexion">
        <div class="modal_content">
    
        

            <form method="post" action="#" enctype='multipart/form-data'>
                
                <!-- <input type="checkbox" name="form_deconnexion" id="form_deconnexion" hidden checked> -->
                
                <button type="submit" name="form_deconnexion">Je me deconnecte</button>
            </form>
            <a href="?/page=accueil" class="modal_close">&times;</a>
        </div>
    </div>
</section>
<?php

$content = ob_get_clean();

require('templates/base.php');
