<?php


ob_start();

?>

<section class="affichage">


    <div id="inscription" class="modal_inscription">
        <div class="modal_content">
            <span >
                <?php
                if (isset($_GET['error'])) {
                    echo ('<p class="error">'.$_GET['error'].'</p>');
                }
                
                ?>
            </span>
            <form method="post" action="#" enctype="multipart/form-data">

                <label for="userPseudo">Mon pseudo *</label>
                <input type="text" name="userPseudo" id="userPseudo" placeholder="Pseudo">

                <label for="prenom">Mon prenom *</label>
                <input type="text" name="prenom" id="prenom" placeholder="prenom">

                <label for="nom">Mon nom *</label>
                <input type="text" name="nom" id="nom" placeholder="nom">

                <label for="ecole">Mon école *</label>
                <input type="text" name="ecole" id="ecole" placeholder="ecole ">

                <label for="message">Laisser un message</label>
                <textarea name="message" id="message" cols="30" rows="10" placeholder="optionnel"></textarea>
                <button type="submit" name="demandeStatut" class="btn2">Envoyer ma demande</button>

            </form>
            <a href="/?page=espacePerso" class="modal_close" class="formInscriptionLink">&times;</a>
        </div>
    </div>
</section>

<?php
$content = ob_get_clean();

require('templates/base.php');
