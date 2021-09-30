<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
			<title>Open Doors</title>
			<meta name="theme-color" content="#353535">
			<meta name="viewport" content="width=device-width,initial-scale=1">
			<link rel="stylesheet" type="text/css" href="css/style.css">
			<link rel="manifest" href="manifest.json">
			<script src="js/main.js" defer></script>
			<script type="text/javascript">
			function updateStatus(){
				if(navigator.onLine){
					console.log('online');
					document.getElementById("cssLink").href = "css/style.css";
				}else{
					document.getElementById("cssLink").href = "css/stylerr.css";
				}
			}
			window.addEventListener('offline', updateStatus);
			window.addEventListener('online', updateStatus);
			updateStatus();
			</script>
			<script src="//code-sa1.jivosite.com/widget/PNSgAqbd3B" async></script>
			<?php
				include("php/logar.php");
				if(isset($_SESSION["usuario"])){
					echo '<link rel="stylesheet" href="css/button.css">';
				}
			?>
	</head>
	<body>

		<header id="header">
			<a id="logo" href="index.php"><img src="icon/logo-2.png" width="150" height="120"></a> <!--logo1: w:60, h:60 -- logo2: w:150, h:120 -- logo3: w:130, h:70-->
			<nav id="nav">
				<button aria-label="Abrir Menu" id="btn-mobile" aria-haspopup="true" aria-controls="menu" aria-expanded="false">Menu
					<span id="hamburguer"></span>
				</button>
				<ul id="menu" class="menu" role="menu">
				<li><a href="servicos.php">Serviços</a></li>
                <li><a href="">Sua localização</a></li>
                <li><a href="contate.php">Contate-nos</a></li>
                <li><a href="index.php">Sobre nós</a></li>
					<?php
					if(isset($_SESSION["usuario"])){
						echo '<li><button id="login" class="sessao">'.
						$_SESSION["usuario"].'</button></a></ul>';
						echo '<script>
							//script para o modal
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

								const sessaoR = document.querySelector(".sessao");
								sessaoR.addEventListener("click", () => iniciaModal ("modal-container"));
							</script>
							<div id="modal-container" class="modal-container">
								<div class="modal" style="border-color: red;">
									<button class="fechar" style="border-color: red;">X</button>
									<h3>Deseja encerrar a sessão?</h3>
									<p>Ao clicar abaixo você desconectará de sua conta.</p>
									<form action="php/logar.php" method="POST">
										<button name="btnSair" class="encerrar-sessao">Encerrar</button>
									</form>
								</div>
							</div>';

						}else {
							echo '<li><a href="cadastro.php" id="login">
							entrar</a></li></ul>';
					}
					?>
			</nav>
		</header>

		<section class="conteudo">
		
			<div class="home">
				<div class="texto-home">
					<img class="fundo-home" src="icon/fundo.png">
					<h1 class="titulo">Open doors</h1>
					<h2 class="sub-titulo">Não tenha mais problemas com o esquecimento, as portas ainda se abrirão para você!</h2>
				</div>
				<ul class="home-botoes">
					<li class="botoes-linha"><a class="botoes-verdes" href="#oque">Saber mais</a></li>
					<li class="botoes-linha"><a class="botoes" href="#motivos">Por que contratar</a></li>
				</ul>
			</div>


			<div class="oque" id="oque">
				<h1 class="titulo-centralizado">O que é a Open doors?</h1>
				<p class="texto-center">
					A open doors é uma plataforma de contratação de chaveiros espalhados por toda parte. Com ela é possível 
					conectar profissionais mais próximos com pessoas que solicitam o serviço, buscando sempre a maior qualidade, 
					rapidez e segurança para todos as necessidades.
				</p>
				<div class="lista-oque">
					<ul class="busca">
						<li><img class="image-oque" src="icon/image-busca.png"></li>
						<li><h3 class="subtitulo-center">Busque</h3></li>
						<li><p class="paragrafo-oque">Obtenha diversas opções para escolher a que mais desejar.</p></li>
					</ul>
					<ul class="escolher">
						<li><img class="image-oque" src="icon/image-escolher.png"></li>
						<li><h3 class="subtitulo-center">Escolha</h3></li>
						<li><p class="paragrafo-oque">Selecione entre os melhores, o serviço que você necessita.</p></li>
					</ul>
					<ul class="contratar">
						<li><img class="image-oque" src="icon/image-contratar.png"></li>
						<li><h3 class="subtitulo-center">Contrate</h3></li>
						<li><p class="paragrafo-oque">Converse diretamente com o prestador antes de solicitar.</p></li>
					</ul>
				</div>
			</div>


			<div class="sobre-nos" id="sobre-nos">
				<ul class="texto-sobre">
					<li><h1 class="titulo-esquerda">Sobre nós</h1></li>
					<li><p class="paragrafo-sobre">A Open Doors surgiu com um grupo de estudantes da ETEC da Zona Leste com o objetivo
							de conectar pessoas com o mesmo interesse, criando uma ponte de fácil acesso a chaveiros e pessoas que 
							necessitam destes serviços. Atualmente, o serviço autônomo tem crescido consideravelmente, entretanto, 
							não são todos que possuem ferramentas para divulgar seu próprio serviço. Por esse motivo, criamos a 
							Open Doors para ajudar essas pessoas a divulgarem o seu serviço gratuitamente.</p>
					</li>
				</ul>
				<ul class="image-sobre">
					<li><img class="image-lampada" src="icon/lampada.png"></li>
				</ul>
			</div>	
		

			<div class="motivos" id="motivos">
				<ul class="image-motivos">
					<li><img class="image-porque-escolher" src="icon/porque-escolher.png"></li>
				</ul>
				<ul class="texto-motivos">
					<li><h1 class="titulo-direita">Motivos para nos escolher</h1></li>
					<li><p class="paragrafo-motivos">
						Oferecemos a possibilidade de divulgação do seu serviço gratuitamente.<br/>
						Temos diversas opções de chaveiros esperando você escolher o melhor.<br/>
						Economize seu tempo, com um clique contate com o chaveiro escolhido.<br/>
						Suporte total da equipe open doors para qualquer dúvida ou reclamação.<br/>
					</p>
					</li>
					<li class="botao-motivos"><a class="botoes" href="servicos.html">Quero contratar</a></li>
				</ul>
			</div>
		
		
			<div class="opcoes">
				<h1 class="titulo-centralizado">Nossas opções incluem:</h1>
				<h3 class="tipos-chaveiros">Tipo de chaveiro //Tipo de chaveiro // Tipo de chaveiro // Tipo de chaveiro // Tipo de chaveiro // Tipo de chaveiro // Tipo de chaveiro //  </h3>
			</div>
		
		
			<footer>
				<ul class="rodape">
					<li><h1 class="titulo-rodape">Suporte</h1></li>
					<li><p>Email: contatopendoors@gmail.com</p></li>
					<li><p>Desenvolvido por: Giovanna Rocha, Leonardo Andrade, Mateus Santana, Renan Rocha.</p></li>
					<li><p class="copy">Copyright © 2021 Open doors</p></li>
					<li><a class="link-rodape" href="">Termos e condições</a></li>
				</ul>
			</footer>
		
		</section>

		<section class="mensagem-erro">
            <img src="icon/erro-conexao.png">
            <h3>Conecte-se à Internet</h3>
            <p>Você não está conectado a internet, verifique sua conexão.</p>
        </section>
		
		<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
	</body>
</html>