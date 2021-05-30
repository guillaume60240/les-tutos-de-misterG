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
            <?php
                $idEmetteur = $_POST['lireMessage'];
                $idRecepteur = $_SESSION['id'];
                $result = getMessageNonLuByEmetteurAndRecepteur($idEmetteur, $idRecepteur);;

                
                if($message = $result->fetch()){
                    do{
                        $idMessage = $message['id'];
                        $pseudoEmetteur = $message['pseudoEmetteur'];
                        $contenu = $message['contenu'];
                        $date = $message['created_at'];
                        updateMessageInterne($idMessage, 'lu', TRUE);
            ?>
                            <h3>Message de : <?=$pseudoEmetteur?> </h3> 
                            <h6>Reçu le : <?=$date?> </h6>
                            <p class="message"><?=$contenu?></p>
                            <form action="#" method="post">
                                <textarea name="contenu" id="contenu" cols="30" rows="10" class="reponseMessage" placeholder="Répondre"></textarea>
                                <button type="submit" name="reponseMessage" class="btn2" value="<?=$idEmetteur?>">Envoyer</button>
                            </form>
            <?php
                    } while($message = $result->fetch());
                }
            ?>
            
                
            
            <a href="/?page=espacePerso" class="modal_close" class="formInscriptionLink">&times;</a>
        </div>
    </div>
    
</section>

<?php
$content = ob_get_clean();

require('templates/base.php');