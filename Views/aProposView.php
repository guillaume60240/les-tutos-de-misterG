
<?php

ob_start();

?>
<section class="affichage">
    <div id="deconnexion" class="modal_connexion">
        <div class="modal_content">
        <img src="../src/img/les_tutos_de_mister_G.png" alt="logo du site sous form de guitare, les tutos de mister G" class="logo">
        <h3>Bienvenue sur mon site</h3>
            <a href="/?page=<?=$_SESSION['redirection']?>" class="modal_close">&times;</a>

            <p>
                Après 16 ans passés à enseigner la guitare je me suis dit qu'il était temps de partager avec plus de monde mon travail.
                Vous trouverez ici des covers de morceaux connus et moins connus, seul à la guitare ou avec ma fille au chant.
                Je vais aussi partager des cours qui porteront sur des morceaux ou sur de la théorie harmonique ou rythmique.</br>
                Certaines vidéos ne seront accessibles que par mes élèves alors si vous en faites partie n'hésitez pas à vous inscrire et à demander, depuis votre espace perso, cet accès réservé à mes padawans.
                Je mettrai en libre accès des partitions que j'ai eu l'occasion d'adapter pour mes élèves.
            </p></br>
            
            <p>
                Encore une fois, bienvenue à vous et j'espère que ce site saura vous séduire
            </p>
        </div>
    </div>
</section>
<?php

$content = ob_get_clean();

require('templates/base.php');





