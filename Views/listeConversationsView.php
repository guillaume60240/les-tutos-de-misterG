<?php


ob_start();

?>

<section class="affichage ">
    <div id="inscription" class="modal_inscription">
        <div class="modal_content affichageMessage">
            <span style="color: red;">
                <?php
                if (isset($_GET['error'])) {
                    echo ($_GET['error']);
                }
                ?>
            </span>
            <form action="#" method="post">
            <?php
                $result = getMessageNonLuByUserId($_SESSION['id']);

                if($row = $result->fetch()){
                    do{
                        $pseudo = $row['pseudoEmetteur'];
                        $id = $row['idEmetteur'];
                        echo('Nouveau message de : <button type="submit" class="emetteurMessage" name="lireMessage" value="'.$id.'">'.$pseudo.'</button></br>');
                    } while($row = $result->fetch());
                }

            ?>
            
            <a href="/?page=espacePerso" class="modal_close" class="formInscriptionLink">&times;</a>
        </div>
    </div>
    
</section>

<?php
$content = ob_get_clean();

require('templates/base.php');