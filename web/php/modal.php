<?php require_once("logar.php");?>

<!-- modal sucesso -->
<link rel="stylesheet" type="text/css" href="../css/style.css">
<div id="modal-login" class="modal-container">
    <div class="modal" style="border-color: gren;">
        <h3>Bem vindo!</h3>
        <p>Aproveite nossas funcionalidades!</p>
    </div>
</div>
<div id="modal-cadastro" class="modal-container">
    <div class="modal" style="border-color: gren;">
        <h3>Cadastrado em sucesso!<h3>
        <p>Faça o login e aproveite nossas funcionalidades!</p>
    </div>
</div>
<div id="modal-sucesso-avaliacao" class="modal-container">
    <div class="modal" style="border-color: gren;">
        <h3>Avaliação enviada com sucesso!<h3>
        <p>Obrigado, sua avaliação faz toda diferença</p>
    </div>
</div>


<!-- modal erro -->
<div id="modal-erro-login" class="modal-container">
    <div class="modal" style="border-color: red;">
        <h3>Email ou senha incorretos!</h3>
        <p>Por favor, verifique e tente novamente</p>
    </div>
</div>
<div id="modal-existe-email" class="modal-container">
    <div class="modal" style="border-color: red;">
        <h3>Email já cadastrado!</h3>
        <p>Por favor, tente novamente!</p>
    </div>
</div>
<div id="modal-invalide-email" class="modal-container">
    <div class="modal" style="border-color: red;">
        <h3>Email inválido!</h3>
        <p>Por favor, tente novamente!</p>
    </div>
</div>

<div id="modal-existe-cpf" class="modal-container">
    <div class="modal" style="border-color: red;">
        <h3>CPF já cadastrado!</h3>
        <p>Por favor, tente novamente!</p>
    </div>
</div>
<div id="modal-invalide-cpf" class="modal-container">
    <div class="modal" style="border-color: red;">
        <h3>CPF inválido!</h3>
        <p>Por favor, tente novamente!</p>
    </div>
</div>
<div id="modal-erro-senha" class="modal-container">
    <div class="modal" style="border-color: red;">
        <h3>Senhas não coincidem!</h3>
        <p>Por favor, tente novamente!</p>
    </div>
</div>
<div id="modal-sair" class="modal-container">
    <div class="modal" style="border-color: gren;">
        <h3>Até logo!<h3>
        <p>As portas sempre estarão apertas!</p>
    </div>
</div>
<div id="modal-erro-geral" class="modal-container">
    <div class="modal" style="border-color: gren;">
        <h3>Ops, ocorreu um erro!<h3>
        <p>Tente novamente mais tarde ou tente entrar em contato com o suporte</p>
    </div>
</div>
<div id="modal-iniciar-session" class="modal-container">
    <div class="modal" style="border-color: gren;">
        <h3>Atenção!<h3>
        <p>Por favor, fazer login para aproveitar todas funcionalidades</p>
    </div>
</div>
<div id="modal-erro-estrela" class="modal-container">
    <div class="modal" style="border-color: gren;">
        <h3>Por favor!<h3>
        <p>Ao menos uma estrela para avaliar!</p>
    </div>
</div>

<script>		
	function iniciaModal(modalID){
		const modal = document.getElementById(modalID);
		if (modal){
			modal.classList.add("mostrar");
			modal.addEventListener("click", (e)=> {
			console.log(e);
			if(e.target.className == "fechar"){
				modal.classList.remove("mostrar");
			}
			});
		}
	}

function redirecionar() {
    let redirecionarP = {};
    function principal() {
        setTimeout(() => {
            window.location.href = "../index.php";
        }, 1000);
    }
    function back(){
        setTimeout(() => {
            window.history.back(-1);
        }, 2000);
    }
    function cadastro(){
        setTimeout(() => {
            window.location.href = "../cadastro.php";
        }, 2000);
    }
    

    redirecionarP.principal = principal;
    redirecionarP.back = back;
    redirecionarP.cadastro = cadastro;

    return redirecionarP;
};
let modal = redirecionar();

</script>
