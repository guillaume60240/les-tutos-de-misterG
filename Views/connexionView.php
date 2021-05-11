<?php

ob_start();
if(isset($_POST['form_inscription'])){
    traitementFormulaireConnexion();
}
?>
<section class="affichage">
    <div id="connexion" class="modal_connexion">
        <div class="modal_content">
    
        

            <form method="post" action="back/traitement-formulaire.php" enctype='multipart/form-data'>

                <label for="userPseudo">Mon pseudo</label>
                <input type="text" name="userPseudo" id="userPseudo" placeholder="Pseudo" value="">

                
                <label for="userPassword">Mon mot de passe</label>
                <input type="password" name="userPassword" id="userPassword" placeholder="Mot de passe">

                

                <button type="reset">Réinitialiser les valeurs du formulaire</button>
                <button type="submit">Je me connecte</button>
            </form>
            <a href="#" class="modal_close">&times;</a>
        </div>
    </div>
</section>
<?php

$content = ob_get_clean();

require('templates/base.php');