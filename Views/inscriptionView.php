<?php


ob_start();
if(isset($_POST['form_inscription'])){
    traitementFormulaireInscription();
}
?>
<section class="affichage">
    <div id="inscription" class="modal_inscription">
        <div class="modal_content">

            <form method="post" action="#" enctype='multipart/form-data'>

                <label for="userPseudo">Mon pseudo</label>
                <input type="text" name="userPseudo" id="userPseudo" placeholder="Pseudo">

                <label for="userMail">Mon adresse mail</label>
                <input type="text" name="userMail" id="userMail" placeholder="Mail@mail">

                <label for="userPassword">Mon mot de passe</label>
                <input type="password" name="userPassword" id="userPassword" placeholder="Mot de passe">

                <label for="userPassword2">Mot de passe de confirmation</label>
                <input type="password" name="userPassword2" id="userPassword2" placeholder="mot de passe ">

                <button type="reset">Réinitialiser les valeurs du formulaire</button>
                <button type="submit" name="form_inscription">Je m'inscris</button>
            </form>
            <a href="#" class="modal_close" class="formInscriptionLink">&times;</a>
        </div>
    </div>
</section>

<?php
$content = ob_get_clean();

require('templates/base.php');