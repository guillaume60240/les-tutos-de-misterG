<?php

ob_start();

?>
<section class="affichage">
    <div id="connexion" class="modal_connexion">
        <div class="modal_content">
        <span style="color: red;">
                <?php
                if (isset($_GET['error'])) {
                    echo ($_GET['error']);
                }
                ?>
            </span>
        

            <form method="post" action="/?page=<?=$_SESSION['redirection']?>" enctype='multipart/form-data'>

                <label for="userPseudo">Mon pseudo</label>
                <input type="text" name="userPseudo" id="userPseudo" placeholder="Pseudo" value="">

                
                <label for="userPassword">Mon mot de passe</label>
                <input type="password" name="userPassword" id="userPassword" placeholder="Mot de passe">

                

                <button type="submit" name="form_connexion" class="btn2">Je me connecte</button>
                <button type="reset" class="btn2">Tout effacer</button></br>
                <a href="/?page=inscription">Pas encore inscrit?</a>
            </form>
            <a href="/?page=<?=$_SESSION['redirection']?>" class="modal_close">&times;</a>
        </div>
    </div>
</section>
<?php

$content = ob_get_clean();

require('templates/base.php');