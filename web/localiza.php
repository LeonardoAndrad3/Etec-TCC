<?php include_once("php/logar.php");?>

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
                <li><a href="localiza.php">Sua localização</a></li>
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
							Entrar</a></li></ul>';
					}
					?>
			</nav>
		</header>

		<section class="conteudo-localizacao">
			
        <iframe 
            width="600"
            height="450"
            loading="lazy"
            allowfullscreen
            class="map"
            src="">
    	</iframe>
			<!-- Abaixo é o botão para rota
			<button class="link" onclick="direcionarMaps()">Entrar</button>
				-->
		</section>

        <footer>
				<ul class="rodape">
					<li><h1 class="titulo-rodape">Suporte</h1></li>
					<li><p>Email: contatopendoors@gmail.com</p></li>
					<li><p>Desenvolvido por: Giovanna Rocha, Leonardo Andrade, Mateus Santana, Renan Rocha.</p></li>
					<li><p class="copy">Copyright © 2021 Open doors</p></li>
					<li><a class="link-rodape" href="">Termos e condições</a></li>
				</ul>
			</footer>

		

		<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
        <script type="text/javascript" src="js/localizar.js"></script>
	</body>
</html>

