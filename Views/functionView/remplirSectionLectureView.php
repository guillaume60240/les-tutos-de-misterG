<div class="sectionVideo">
    <div class="videosContainer">

        <div class="vid2">
            
            <iframe class="videoEnLecture" <?= $link ?> ></iframe>
            
        </div>
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
                
                
                
            
        </div>
    </div>
    <div class="descriptionContainer">
        
            <div class="titleVideo">

                <h3><?=$titleVideo ?></h3>
                <h6>Publié le : <?= $date?> </h6>
                <div class="btn-container">
                    <button class="btn2 comments" id="comments">Commenter</button>
                    <form action="#" method="post">
                        <button class="btn2 like <?php if(isset($_SESSION['like'])){if($_SESSION['like'] != false){ echo 'likeValide';}}?>" type="submit" name="ajoutLike"><span>J'aime</span> </button>
                    </form>
                </div>
            </div>
            
        
        
    </div>
    
</div>