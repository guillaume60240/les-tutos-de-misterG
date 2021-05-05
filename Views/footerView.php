<?php


ob_start()

?>


<footer class="nav-container2">
    <ul class="nav-barre2">
        <li class="menu-nav" >A propos</li>
        <li class="menu-nav" ><a href="form.html"> Me contacter</a></li>
        <li class="menu-nav" >Liens utiles</li>
        
    </ul>       
</footer>

<?php

$content = ob_get_clean();

require('templates/baseFooter.php');

// <!--  Cette page contient tous les éléments qui seront affichés dans le footer-->