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
            <form method="post" action="#" enctype="multipart/form-data">

                
                <input type="hidden" name="userPseudo" id="userPseudo" placeholder="Pseudo" value="pseudo" >

                
                <input type="hidden" name="prenom" id="prenom" placeholder="prenom" value="prenom">

                
                <input type="hidden" name="nom" id="nom" placeholder="nom" value="nom">

                <label for="ecole">Mon mail *</label>
                <input type="mail" name="mail" id="mail" placeholder="mail de contact ">

                <label for="message">Laisser un message</label>
                <textarea name="message" id="message" cols="30" rows="10" placeholder="message"></textarea>
                <button type="submit" name="mailContact" class="btn2">Envoyer mon message</button>

            </form>
            <a href="/?page=<?=$_SESSION['redirection']?>" class="modal_close" class="formInscriptionLink">&times;</a>
        </div>
    </div>
</section>

<?php
$content = ob_get_clean();

require('templates/base.php');