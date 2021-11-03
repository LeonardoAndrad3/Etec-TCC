<?php
 include_once("php/logar.php");
 require("php/avaliar.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="manifest" href="manifest.json">
    <script src="js/main.js" defer></script>
    <title>Open Doors</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"> <!--link para pegar as estrelas-->
    <meta name="theme-color" content="#353535">
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
            <ul id="menu" role="menu">
                <li><a href="servicos.php">Serviços</a></li>
                <li><a href="localiza.php">Sua localização</a></li>
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

    <section class="conteudo-detalhes">
        <!--Funcionará como pura consultas ao BD, informando de acordo com o link clicado na página de serviços-->
        
        <div class="detalhes">
            <ul class="detalhe-nome">
                <li><h4><?php echo $row['nome']?></h4></li>
                <?php
                 if ($row['celular'] == "") {
                     echo "<li><p>Telefone: ".$row['telefone']." </p></li>";
                 }
                else {
                    
                    echo "<li class='linha-botao-bloco'><a class='botao-detalhes-menor'  target='_blank' href='https://api.whatsapp.com/send?phone=55".$row['celular']."'> Contate via WhatsApp</a><br/></li>";
                }
                ?>
                
                <li><p> <?php $myDate = date("jS M Y"); 
                echo "Membro da Open Doors desde: $myDate";?></p></li>
                <li><h3>Avalie o chaveiro:</h3></li>
                <li>
                    <form class="estrelas" method="post" name="fEstrela" id="fEstrela" action="php/avaliar.php">
                        <input type="radio" id="vazio" name="estrela" value="0" checked> <!--Coloco esse vazio para mostrar uma estrela-->
                        <label for="estrela_um"><i class="fa"></i></label> <!--label serve para se tornar a estrela-->
                        <input type="radio" id="estrela_um" name="estrela" value="1">
                        <label for="estrela_dois"><i class="fa"></i></label>
                        <input type="radio" id="estrela_dois" name="estrela" value="2">
                        <label for="estrela_tres"><i class="fa"></i></label>
                        <input type="radio" id="estrela_tres" name="estrela" value="3">
                        <label for="estrela_quatro"><i class="fa"></i></label>
                        <input type="radio" id="estrela_quatro" name="estrela" value="4">
                        <label for="estrela_cinco"><i class="fa"></i></label>
                        <input type="radio" id="estrela_cinco" name="estrela" value="5"><br/>
                        <input type="text" name="Mensagem" placeholder="Mensagem"><br/>
                        <input type="submit" class="botao-detalhes-estrela" name="btnEstrela" value="Enviar"><br/>
                    </form>
                </li>
            </ul>
            <ul class="detalhe-descricao">
                <li><h4>Descrição</h4></li>
                <li><p><?php echo $row['descricao']?></p></li>
            </ul>
            <ul class="detalhe-funcao">
                <li><h4>Função</h4></li>
                <li><p><?php echo $row['especialidade']?></p></li>
            </ul>
            <ul class="detalhe-encontrar">
               <h4>Onde encontrar: <br><?php echo $row['cep']?></h4>
               <?php echo "<iframe width='400' height='300' style='border:0;' allowfullscreen='' loading='lazy' src='https://www.google.com/maps/embed/v1/place?key=AIzaSyCAcV6JSwmuPsbOtY7qHrAS6Xf6dORB16k
                &q=".$row['cep']."' ></iframe>"?>
                <!-- teste pra ver se ta pegando a api do gogole -->

                <!--Aqui fica a API de mapa fixando pelo cep que o chaveiro registrará-->
            </ul>
            <ul class="detalhe-valor">
                <li><h4>Valor</h4></li>
                <li><p><?php echo $row['pagamento']?></p></li>
            </ul>
            <ul class="detalhe-avaliacoes">
                <li><h4>Avaliações - Últimas avaliações:</h4></li>
                <div class="uni-avaliacoes" style="display:block;">
               
                <?php
                    mostrarAvaliacao();                                 
                ?>

                <!-- <li><p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Minima, omnis.</p></li>
                    <li><p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Minima, omnis.</p></li>
                    <li><p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Minima, omnis.</p></li> -->
                </div>
            </ul>
            <ul class="detalhe-denuncie">
                <li><h4>Denuncie</h4></li>
                <li>
                    <form class="form-denuncia" method="POST" action="sendDenuncia.php">
                        <p>Nome:</p><input type="text" name="nome">
                        <p>Email:</p><input type="email" name="email">
                        <p>Mensagem:</p><textarea class="mensagem-area-denuncia" name="mensagem"></textarea>
                        <br/><input type="submit" value="Enviar">
                    </form>
                </li>
            </ul>
        </div>

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
    <script src="http://maps.google.com/maps/api/js"></script>

</body>
</html>