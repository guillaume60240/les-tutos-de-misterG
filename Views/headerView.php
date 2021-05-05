<?php



ob_start();
?>
<header>
    <nav class="nav-container">
        
        <div class="entete">
            <h1>Bienvenue sur mon site musical</h1>
            <div class="pl-4 userAction" style="margin-right: 1%; margin-left: auto; width: 30%; text-align: right">

            <?php
                if($_SESSION['id']=== null){

                    echo 
                    '<a href="#inscription" class="link-light inscription_modale" >M\'inscrire</a>
                    <a href="#connexion" class="link-light connexion_modale" >Me connecter</a>';
                } else{
                    echo 
                    '<a href="/?page=espacePerso" class="link-light" style="text-decoration: none; margin-right: 10px">Mon espace perso</a>
                    <a href="#" class="link-light" >Me déconnecter</a>';
                }
                if($_SESSION['id'] && $_SESSION['role']==='admin'){
                    echo 
                    ' <a href="/?page=administration" class="link-light" >Administrer</a>';
                }
            ?>

            </div>
            <div>
            <?php if($_SESSION['id']){
                echo '<p class="link-light" style="margin-left: 85%; position: absolute padding-bottom: 10px">Bonjour '.$_SESSION['pseudo'].' !</p>'; 
            }
            ?>
        </div>
        </div>
        <ul class="nav-barre">
            <li class="menu-nav" id="accueil"><a href="/?page=accueil" class="menu-a">Accueil</a> </li>
            <li class="menu-nav" id="cover"><a href="/?page=covers" class="menu-a">Les covers</a> </li>
            <li class="menu-nav" id="duo"><a href="/?page=duos" class="menu-a">Les covers en duo</a></li>
            <li class="menu-nav" id="compo"><a href="/?page=compos" class="menu-a">Mes compos</a></li>
            <li class="menu-nav" id="theorie"><a href="/?page=theorie" class="menu-a">Cours de théorie en vidéos</a></li>
            <li class="menu-nav" id="morceau"><a href="/?page=morceaux" class="menu-a">Morceaux expliqués en vidéo</a></li>
            <li class="menu-nav" id="partition"><a href="/?page=partitions" class="menu-a">Partitions</a></li>
        </ul>
    </nav>
</header>


<?php

$content = ob_get_clean();

require('templates/baseHeader.php');

// <!--  Cette page contient tous les éléments qui seront affichés dans le header -->