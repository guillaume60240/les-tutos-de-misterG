<div class="utilisateurs">
    <table class="tableauStyle">
        <thead>
            <tr>
                <th>Pseudo</th>
                <th>Adresse mail</th>
                <th>Rôle</th>
                <th>Date d'inscription</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            
            <?php
                if($utilisateur = $requeteUtilisateur->fetch()){
                    do{
                        afficheUtilisateur($utilisateur);
                    } while($utilisateur = $requeteUtilisateur->fetch());
                }
                
                
            ?>
                
        </tbody>
    </table>

</div>
