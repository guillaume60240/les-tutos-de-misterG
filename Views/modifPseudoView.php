<?php


ob_start();

?>

<section class="affichage">
    <div id="inscription" class="modal_inscription">
        <div class="modal_content">

            <form method="post" action="#" enctype="multipart/form-data">

                <label for="userPseudo">Mon pseudo</label>
                <input type="text" name="userPseudo" id="userPseudo" placeholder="Pseudo">

                <label for="nouveauPseudo">Mon nouveau pseudo</label>
                <input type="text" name="nouveauPseudo" id="nouveauPseudo" placeholder="nouveau pseudo">

                
                <button type="submit" name="updatePseudo" class="btn2">Valider</button>
                
            </form>
            <a href="/?page=espacePerso" class="modal_close" class="formInscriptionLink">&times;</a>
        </div>
    </div>
</section>

<?php
$content = ob_get_clean();

require('templates/base.php');