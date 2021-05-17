

<div class="utilisateurs">

    <table class="tableauStyle">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Artiste</th>
                <th>Date de mise en ligne</th>
                <th>lien</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            
            <?php
                if($partition = $requetePartitions->fetch()){
                    do{
                        affichePartitions($partition);
                    } while($partition = $requetePartitions->fetch());
                }               
                
            ?>
                
        </tbody>
    </table>

</div>