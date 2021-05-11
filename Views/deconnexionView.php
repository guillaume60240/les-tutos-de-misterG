<?php

ob_start();
if(isset($_POST['form_deconnexion'])){
    traitementFormulaireDeconnexion();
}
?>
<section class="affichage">
    <div id="deconnexion" class="modal_connexion">
        <div class="modal_content">
    
        

            <form method="post" action="../index.php" enctype='multipart/form-data'>
                
                <button type="submit" name="form_deconnexion">Je me deconnecte</button>
            </form>
            <a href="/?page=<?=$_SESSION['pageView']?>" class="modal_close">&times;</a>
        </div>
    </div>
</section>
<?php

$content = ob_get_clean();

require('templates/base.php');
