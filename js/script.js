const like = document.querySelectorAll('.like');

const commentaireBtn = document.getElementById('comments');
const formCommentaire = document.getElementById('formCommentaires');
const commentaireContainer = document.getElementById('commentaireContainer');
const commentsAnnuler = document.getElementById('commentsAnnuler');



commentaireBtn.addEventListener('click',()=>{
    console.log(commentaireContainer);
    
            formCommentaire.style.display = 'block';
            commentaireContainer.style.display = 'none';   
})

commentsAnnuler.addEventListener('click', ()=>{
    console.log('coucou');
    formCommentaire.style.display = 'none';
    commentaireContainer.style.display = 'block';   
})