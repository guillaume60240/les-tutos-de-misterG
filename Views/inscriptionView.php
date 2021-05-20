<?php


ob_start();

?>
<section class="affichage">
    <div id="inscription" class="modal_inscription">
        <div class="modal_content">
        <span style="color: red;">
                <?php
                if (isset($_GET['error'])) {
                    echo ($_GET['error']);
                }
                ?>
            </span>
            <form method="post" action="../index.php" enctype='multipart/form-data'>

                <label for="userPseudo">Mon pseudo</label>
                <input type="text" name="userPseudo" id="userPseudo" placeholder="Pseudo">

                <label for="userMail">Mon adresse mail</label>
                <input type="text" name="userMail" id="userMail" placeholder="Mail@mail">

                <label for="userPassword">Mon mot de passe</label>
                <input type="password" name="userPassword" id="userPassword" placeholder="Mot de passe">

                <label for="userPassword2">Mot de passe de confirmation</label>
                <input type="password" name="userPassword2" id="userPassword2" placeholder="mot de passe ">

                <button type="submit" name="form_inscription" class="btn2">Je m inscris</button>
                <button type="reset" class="btn2">Tout effacer</button></br>
                <a href="/?page=connexion">Déjà inscrit?</a>
            </form>
            <a href="/?page=<?=$_SESSION['redirection']?>" class="modal_close" class="formInscriptionLink">&times;</a>
        </div>
    </div>
</section>

<?php
$content = ob_get_clean();

require('templates/base.php');