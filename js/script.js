const like = document.querySelectorAll('.like');

const commentaireBtn = document.getElementById('comments');
const blocCommentaire = document.getElementById('blocCommentaires');
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
    console.log('hello');
    if(blocCommentaire.style.display = 'none'){

        blocCommentaire.style.display = 'block';
        console.log(blocCommentaire);
    } 
})