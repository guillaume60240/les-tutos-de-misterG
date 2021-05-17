

<div class="utilisateurs">
    <table class="tableauStyle">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Section</th>
                <th>Date de mise en ligne</th>
                <th>lien</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            
            <?php
                if($video = $requeteVideos->fetch()){
                    do{
                        afficheVideos($video);
                    } while($video = $requeteVideos->fetch());
                }               
                
            ?>
                
        </tbody>
    </table>

</div>
