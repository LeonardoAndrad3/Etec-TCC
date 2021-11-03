// Scroll suave para link interno
//triplicado pois cada um tem uma posição diferente, necessitando reduzir px individualmente
$('.home .botoes-verdes').click(function(e){ //saber mais
	e.preventDefault();
	var id = $(this).attr('href'),
			menuHeight = $('nav').innerHeight(),
			targetOffset = $(id).offset().top;
	$('html, section').animate({
		scrollTop: targetOffset -65
	}, 500);
});
$('.home .botoes').click(function(e){ //porque contratar
	e.preventDefault();
	var id = $(this).attr('href'),
			menuHeight = $('nav').innerHeight(),
			targetOffset = $(id).offset().top;
	$('html, section').animate({
		scrollTop: targetOffset -80
	}, 500);
});
$('.menu .link-parascroll').click(function(e){ //sobre-nos
	e.preventDefault();
	var id = $(this).attr('href'),
			menuHeight = $('nav').innerHeight(),
			targetOffset = $(id).offset().top;
	$('html, section').animate({
		scrollTop: targetOffset -65
	}, 500);
});

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

// if(1 == 1){
// 	function iniciaModal(modalID){
// 		const modal = document.getElementById(modalID);
// 		if (modal){
// 			modal.classList.add("mostrar");
// 			modal.addEventListener("click", (e)=> {
// 			console.log(e);
// 			if(e.target.className == "fechar"){
// 				modal.classList.remove("mostrar");
// 			}
// 			});
// 		}
// 	}

// 	iniciaModal('modal-container');
// }