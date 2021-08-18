const btnMobile = document.getElementById('btn-mobile');

function alternarMenu(event){
    if(event.type == 'touchstart') event.preventDefault();
    const nav = document.getElementById('nav');
    nav.classList.toggle('active');//ativa e desativa class
    const active = nav.classList.contains('active');
    event.currentTarget.setAttribute('aria-expanded', 'active');
    if (active){
        event.currentTarget.setAttribute('aria-label', 'Fechar Menu');
    }else{
        event.currentTarget.setAttribute('aria-label', 'Abrir Menu');
    }
}

btnMobile.addEventListener('click', alternarMenu);
btnMobile.addEventListener('touchstart', alternarMenu);



