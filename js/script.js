const like = document.querySelectorAll('.like');

const commentaireBtn = document.getElementById('comments');
const formCommentaire = document.getElementById('formCommentaires');
const commentaireContainer = document.getElementById('commentaireContainer');
console.log(like);

console.log(like[1]);

// like[1].addEventListener("click",()=>{
//     alert('coucou');
// })

for (const icone of like){
    icone.addEventListener('click',()=>{
        // alert('coucou2');
        // document.querySelector(".likeIcone").style.display = "block";
        console.log(icone);
    })
}

commentaireBtn.addEventListener('click',()=>{
    console.log(commentaireContainer);
    
        
        formCommentaire.style.display = 'block';
        commentaireContainer.style.display = 'none';
        
    
})