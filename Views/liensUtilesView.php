<?php

ob_start();

?>
<section class="affichage">
    <div id="deconnexion" class="modal_connexion">
        <div class="modal_content">
        <img src="../src/img/les_tutos_de_mister_G.png" alt="logo du site sous form de guitare, les tutos de mister G" class="logo">
        <h3>Quelques liens</h3>
            <a href="/?page=<?=$_SESSION['redirection']?>" class="modal_close">&times;</a>
            <p>
                <a href="https://www.instagram.com/lepoetreguillaume/?hl=fr" target="_blank" rel="noopener noreferrer" class="linkUtiles">Mon compte Insta de cover</a>
            </p>
            <p>
                <a href="https://www.instagram.com/guillaumedeveloppement/?hl=fr" target="_blank" rel="noopener noreferrer" class="linkUtiles">Mon compte Insta sur le développement</a>
            </p>
          
        </div>
    </div>
</section>
<?php

$content = ob_get_clean();

require('templates/base.php');

