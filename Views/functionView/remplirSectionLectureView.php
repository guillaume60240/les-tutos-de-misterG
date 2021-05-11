<div >
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
                <p class="btn-container">
                    <button class="btn2 comments" id="comments">Commenter</button>
                    <button class="btn2 like"><span>J'aime</span>  <span class="likeIcone">&#10084</span></button>
                </p>
            </div>
            
        
        
    </div>
    <div class="commentaireContainer">
    
        <div class="commentaires" id="blocCommentaires">
        <h3>Commentaires</h3>

            <div class="commentaire">        
                <h4>Pseudo</h4>
                <h5>le : date</h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque natus autem rerum labore officia. Earum, ullam possimus. Labore, laborum sunt?</p>
            </div>

            <div class="commentaire">        
                <h4>Pseudo</h4>
                <h5>le : date</h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque natus autem rerum labore officia. Earum, ullam possimus. Labore, laborum sunt?</p>
            </div>

            <div class="commentaire">        
                <h4>Pseudo</h4>
                <h5>le : date</h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque natus autem rerum labore officia. Earum, ullam possimus. Labore, laborum sunt?</p>
            </div>

            <div class="commentaire">        
                <h4>Pseudo</h4>
                <h5>le : date</h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque natus autem rerum labore officia. Earum, ullam possimus. Labore, laborum sunt?</p>
            </div>
            
        </div>
        <div class="formCommentaireContainer" id="formCommentaires">
            <form action="#" method="post" class="formCommentaire">
                <label for="commentaire" class="formCommentaireLabel">Mon commentaire</label>
                <textarea name="commentaire" id="commentaire" rows="5" cols="30" style="resize: none;"></textarea>
                <button type="submit" class="btn2" name="formulaireCommentaire">Poster mon commentaire</button>
            </form>
        </div>
    </div>
</div>