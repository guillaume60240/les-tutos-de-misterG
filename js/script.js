const like = document.querySelectorAll('.like');

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