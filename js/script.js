const like = document.querySelectorAll('.like');

const commentaireBtn = document.getElementById('comments');
const formCommentaire = document.getElementById('formCommentaires');
const commentaireContainer = document.getElementById('commentaireContainer');
const commentsAnnuler = document.getElementById('commentsAnnuler');
const navbarMobileBtn = document.getElementById('navbar-mobile-btn');
const navbarMobileLink = document.getElementById('navbar-mobile-link');
const close1 = document.getElementById('close1');
const close2 = document.getElementById('close2');
const close3 = document.getElementById('close3');
const close4 = document.getElementById('close4');
const close5 = document.getElementById('close5');



navbarMobileBtn.addEventListener('click',(e)=>{
    if(navbarMobileLink.style.left == '-400%'){
        navbarMobileLink.style.left = 0;
        navbarMobileLink.style.opacity = 1;
       close2.classList.toggle("close2");
       close1.classList.toggle("close1");
       close3.classList.toggle("close3");
       close5.style.opacity = 1;
    } else{
        navbarMobileLink.style.left = '-400%';
        navbarMobileLink.style.opacity = 0;
        close2.classList.toggle("close2");
        close1.classList.toggle("close1");
        close3.classList.toggle("close3");
        close5.style.opacity = 0;
    }
})

commentaireBtn.addEventListener('click',()=>{
    formCommentaire.style.display = 'block';
    commentaireContainer.style.display = 'none';   
})

commentsAnnuler.addEventListener('click', ()=>{
    formCommentaire.style.display = 'none';
    commentaireContainer.style.display = 'block';   
})

