<?php



ob_start();
?>
<header>
    <nav class="nav-container">
        
        <div class="entete">
        <?php if(isset($_SESSION['id'])){
                if(isset($_SESSION['role']) && $_SESSION['role'] === 'eleve'){
                    $role = 'Padawan';
                } else{
                    $role = '';
                }
                echo '<p class="messageBienvenue" >Bonjour '.$role.' '.$_SESSION['pseudo'].' !</p>'; 
            }
            ?>
            <!-- <h1>Bienvenue sur mon site musical</h1> -->
            <h1>Les tutos de Mister G</h1>
            <div class="pl-4 userAction">

            <?php
                if(!isset($_SESSION['id'])){

                    echo 
                    '<a href="/?page=inscription" class="link-light inscription_modale" >M\'inscrire</a>
                    <a href="/?page=connexion" class="link-light connexion_modale" >Me connecter</a>';
                } else{
                    echo 
                    '<a href="/?page=espacePerso" class="link-light" >Mon espace perso</a>
                    <a href="/?page=deconnexion" class="link-light" >Me déconnecter</a>';
                }
                if(isset($_SESSION['id']) && $_SESSION['role']==='admin'){
                    echo 
                    ' <a href="/?page=administration" class="link-light" >Administrer</a>';
                }
            ?>

            </div>
            <div>
            
        </div>
        </div>
        <ul class="nav-barre">
            <li class="menu-nav <?php if(isset($_SESSION['pageView'])){if($_SESSION['pageView'] === 'accueil'){ echo 'active';}}?>" id="accueil" ><a href="/?page=accueil" class="menu-a">Accueil</a> </li>
            <li class="menu-nav <?php if(isset($_SESSION['pageView'])){if($_SESSION['pageView'] === 'covers'){ echo 'active';}}?>" id="cover"><a href="/?page=covers" class="menu-a">Les covers</a> </li>
            <li class="menu-nav <?php if(isset($_SESSION['pageView'])){if($_SESSION['pageView'] === 'duos'){ echo 'active';}}?>" id="duo"><a href="/?page=duos" class="menu-a">Les covers en duo</a></li>
            <li class="menu-nav <?php if(isset($_SESSION['pageView'])){if($_SESSION['pageView'] === 'compos'){ echo 'active';}}?>" id="compo"><a href="/?page=compos" class="menu-a">Mes compos</a></li>
            <li class="menu-nav <?php if(isset($_SESSION['pageView'])){if($_SESSION['pageView'] === 'theorie'){ echo 'active';}}?>" id="theorie"><a href="/?page=theorie" class="menu-a">Cours de théorie</a></li>
            <li class="menu-nav <?php if(isset($_SESSION['pageView'])){if($_SESSION['pageView'] === 'morceaux'){ echo 'active';}}?>" id="morceau"><a href="/?page=morceaux" class="menu-a">Morceaux expliqués</a></li>
            <li class="menu-nav <?php if(isset($_SESSION['pageView'])){if($_SESSION['pageView'] === 'partitions'){ echo 'active';}}?>" id="partition"><a href="/?page=partitions" class="menu-a">Partitions</a></li>
        </ul>

        <div class="navbar-mobile-container">

            <button class="navbar-mobile-btn" id="navbar-mobile-btn" >
                <span class="navbar-mobile-burger" id="close1"></span>
                <span class="navbar-mobile-burger" id="close2"></span>
                <span class="navbar-mobile-burger" id="close3"></span>
                
                <span class="navbar-mobile-burger-close " id="close5" ></span>
            </button>

            <ul class="navbar-mobile-link" id="navbar-mobile-link" style="left: -400%;">
                <li ><?php if(isset($_SESSION['id'])){
                if(isset($_SESSION['role']) && $_SESSION['role'] === 'eleve'){
                    $role = 'Padawan';
                } else{
                    $role = '';
                }
                echo '<p class="messageBienvenue-navbar-mobile" >Bonjour '.$role.' '.$_SESSION['pseudo'].' !</p>'; 
            }
            ?></li>
                <li class="navbar-mobile-menu <?php if(isset($_SESSION['pageView'])){if($_SESSION['pageView'] === 'accueil'){ echo 'active';}}?>" id="accueil" ><a href="/?page=accueil" class="menu-a">Accueil</a> </li>
                <li class="navbar-mobile-menu <?php if(isset($_SESSION['pageView'])){if($_SESSION['pageView'] === 'covers'){ echo 'active';}}?>" id="cover"><a href="/?page=covers" class="menu-a">Les covers</a> </li>
                <li class="navbar-mobile-menu <?php if(isset($_SESSION['pageView'])){if($_SESSION['pageView'] === 'duos'){ echo 'active';}}?>" id="duo"><a href="/?page=duos" class="menu-a">Les covers en duo</a></li>
                <li class="navbar-mobile-menu <?php if(isset($_SESSION['pageView'])){if($_SESSION['pageView'] === 'compos'){ echo 'active';}}?>" id="compo"><a href="/?page=compos" class="menu-a">Mes compos</a></li>
                <li class="navbar-mobile-menu <?php if(isset($_SESSION['pageView'])){if($_SESSION['pageView'] === 'theorie'){ echo 'active';}}?>" id="theorie"><a href="/?page=theorie" class="menu-a">Cours de théorie</a></li>
                <li class="navbar-mobile-menu <?php if(isset($_SESSION['pageView'])){if($_SESSION['pageView'] === 'morceaux'){ echo 'active';}}?>" id="morceau"><a href="/?page=morceaux" class="menu-a">Morceaux expliqués</a></li>
                <li class="navbar-mobile-menu <?php if(isset($_SESSION['pageView'])){if($_SESSION['pageView'] === 'partitions'){ echo 'active';}}?>" id="partition"><a href="/?page=partitions" class="menu-a">Partitions</a></li>        
            </ul>
            
        </div>
    </nav>
</header>


<?php

$content = ob_get_clean();

require('templates/baseHeader.php');

// <!--  Cette page contient tous les éléments qui seront affichés dans le header -->