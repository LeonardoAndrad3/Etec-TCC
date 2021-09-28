<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="manifest" href="manifest.json">
        <script src="js/main.js" defer></script>
        <script src="//code-sa1.jivosite.com/widget/PNSgAqbd3B" async></script>
        <title>Open Doors</title>
		<meta name="theme-color" content="#353535">
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
                <ul id="menu" role="menu">
                    <li><a href="servicos.php">Serviços</a></li>
                    <li><a href="index.php">Sua localização</a></li>
                    <li><a href="contate.php">Contate-nos</a></li>
                    <li><a href="index.php">Sobre nós</a></li>
                    <?php
					if(isset($_SESSION["usuario"])){
						echo '<li><button href="" id="login" class="sessao">'.
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

            <div class="apresentacao-servicos">
                <h1 class="align-esquerda">Precisando de Chaveiro?</h1>
                <h3>Diversas opções para escolher a que mais combina com você.</h3>
            </div>
            <div class="voce-chaveiro">
                <h2>Você é um chaveiro?</h2>
                <p>Clique abaixo para cadastrar-se:</p>
                <a class="botao-maior" href="cadastro.php">Cadastrar-se</a>
            </div>
            <div class="opcoes-servicos">
                <h2>Veja as opções que temos para você</h2>
                <div class="input-funcao">
                    <p>Filtre sua pesquisa: <input id="busca-fun-input" type="text" onkeyup="myFunction()" placeholder="Insira a função desejada" title="busca"></p>
                    <p>Ordenar por: 
                        <select id="lista">
                            <option value="" disabled selected>Selecione</option>
                            <option value="1">Maior preço</option>
                            <option value="2">Menor preço</option>
                        </select>
                    </p>
                </div>
            </div>

            <div class="servicos-chaveiros">
                <!--Aqui ficará o laço de repetição, bastando fazer apenas um bloco que se fizer o laço ele fica com cada um sendo um linha diferente-->

                <ul class="blocos-chaveiros">
                    <li><h4>Nome do Chaveiro</h4></li>
                    <li><p>Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.</p></li>
                    <li><p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p></li>
                    <li class="linha-botao-bloco"><a class="botao-maior" href="">Contate via WhatsApp</a><br/></li>
                    <li><a class="mais-info-bloco" href="detalhe-servicos.php">Clique aqui para mais informações</a></li>
                </ul>

                <ul class="blocos-chaveiros">
                    <li><h4>Nome do Chaveiro</h4></li>
                    <li><p>Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.</p></li>
                    <li><p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p></li>
                    <li class="linha-botao-bloco"><a class="botao-maior" href="">Contate via WhatsApp</a><br/></li>
                    <li><a class="mais-info-bloco" href="detalhe-servicos.html">Clique aqui para mais informações</a></li>
                </ul>

                <ul class="blocos-chaveiros">
                    <li><h4>Nome do Chaveiro</h4></li>
                    <li><p>Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.</p></li>
                    <li><p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p></li>
                    <li class="linha-botao-bloco"><a class="botao-maior" href="">Contate via WhatsApp</a><br/></li>
                    <li><a class="mais-info-bloco" href="detalhe-servicos.html">Clique aqui para mais informações</a></li>
                </ul>

                <ul class="blocos-chaveiros">
                    <li><h4>Nome do Chaveiro</h4></li>
                    <li><p>Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.</p></li>
                    <li><p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p></li>
                    <li class="linha-botao-bloco"><a class="botao-maior" href="">Contate via WhatsApp</a><br/></li>
                    <li><a class="mais-info-bloco" href="detalhe-servicos.html">Clique aqui para mais informações</a></li>
                </ul>

                <ul class="blocos-chaveiros">
                    <li><h4>Nome do Chaveiro</h4></li>
                    <li><p>Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.</p></li>
                    <li><p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p></li>
                    <li class="linha-botao-bloco"><a class="botao-maior" href="">Contate via WhatsApp</a><br/></li>
                    <li><a class="mais-info-bloco" href="detalhe-servicos.html">Clique aqui para mais informações</a></li>
                </ul>
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
        <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="js/script.js"></script>

        <script>
            //Esse script é para fazer funcionar a pesquisa la por função, ela não está totalmente pronta, apenas quis auxiliar o pessoal de back

            function myFunction() {  //definição de funcão
            var input, filter, table, tr, td, i, txtValue; 
            input = document.getElementById("busca-fun-input"); //armazena infos que digitei
            filter = input.value.toUpperCase(); //converte tudo para maiusculo para facilitar a comparação
            table = document.getElementById("tabela"); //armazena dados da tabela
            tr = table.getElementsByTagName("tr"); //armazena elementos das linhas
            
            for (i = 0; i < tr.length; i++) { //comparação para exibir o resultado após a pesquisa
                td = tr[i].getElementsByTagName("td")[0]; //dentro do [] coloca a "tagname" a coluna que irá procurar no caso a 1 (nome) 
                if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
                }       
            }
            }
        </script>
    </body>
</html>