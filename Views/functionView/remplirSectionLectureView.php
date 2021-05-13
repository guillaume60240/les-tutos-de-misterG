<div class="sectionVideo">
    <div class="videosContainer">

        <div class="vid2">
            
            <iframe class="videoEnLecture" <?= $link ?> ></iframe>
            
        <!-- </div>
        <div class="suggestion">
            
            <div>

                <div class="vid3">
                    <h3>Titre</h3>
                    
                </div>
                
                <div class="vid3">
                    <h3>Titre</h3>
                    
                </div>
            </div>
            <div>

                <div class="vid3">
                    <h3>Titre</h3>
                    
                </div>
                
                <div class="vid3">
                    <h3>Titre</h3>
                    
                </div>
            </div>
                
                
                
            
        </div> -->
    </div>
    <div class="descriptionContainer">
        
            <div class="titleVideo">

                <h3><?=$titleVideo ?></h3>
                <h6>Publié le : <?= $date?> </h6>
                <div class="btn-container">
                    <button class="btn2 comments" id="comments">Commenter</button>
                    <form action="#" method="post">
                    <?php
                       if(isset($_SESSION['like'])){
                        if($_SESSION['like'] != false){
                            //emplacement bouton délà liké
                            ?> <button class="btnLikeValide comments" id="comments" name="ajoutLike">J'aime déjà</button> <?php
                          
                        } else {
                              //emplacement bouton like 
                            ?> <button class="btn2 comments" id="comments" name="ajoutLike">J'aime</button>  <?php
                        }
                    } else{
                       //emplacement bouton like
                       ?> <button class="btn2 comments" id="comments" name="ajoutLike">J'aime</button>  <?php
                    }
                        ?>
                    </form>
                </div>
            </div>
            
        
        
    </div>
    
</div>