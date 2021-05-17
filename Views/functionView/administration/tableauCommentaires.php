<div class="utilisateurs">
    <table class="tableauStyle">
        <thead>
            <tr>
                <th>Pseudo</th>
                <th>Date</th>
                <th>Contenu</th>
               
                <th></th>
            </tr>
        </thead>
        <tbody>
            
            <?php
                if($commentaire = $requeteCommentaires->fetch()){
                    do{
                        afficheAdminCommentaire($commentaire);
                    } while($commentaire = $requeteCommentaires->fetch());
                }
                
                
            ?>
                
        </tbody>
    </table>

</div>
