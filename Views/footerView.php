<?php


ob_start()

?>


<footer class="footer">
    <div class="nav-container2">
        <ul class="nav-barre2">
            <li class="menu-nav" ><a href="/?page=aPropos">A propos</a> </li>
            <li class="menu-nav" ><a href="/?page=contact"> Me contacter</a></li>
            <li class="menu-nav" ><a href="/?page=liensUtiles">Liens Utiles</a></li>
            
        </ul>       
    </div>
</footer>

<?php

$content = ob_get_clean();

require('templates/baseFooter.php');

// <!--  Cette page contient tous les éléments qui seront affichés dans le footer-->