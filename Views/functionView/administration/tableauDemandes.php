
<div class="utilisateurs">
    <table class="tableauStyle">
        <thead>
            <tr>
                <th>Pseudo</th>
                <th>Date</th>
                <th>Prenom</th>
                <th>Nom</th>
                <th>Ecole</th>
                <th>Message</th>
               
                <th></th>
            </tr>
        </thead>
        <tbody>
            
            <?php
                if($demande = $requeteDemandes->fetch()){
                    do{
                        afficheAdminDemande($demande);
                    } while($demande = $requeteDemandes->fetch());
                }
                
                
            ?>
                
        </tbody>
    </table>

</div>