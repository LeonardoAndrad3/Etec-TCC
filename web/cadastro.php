<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Open Doors</title>
        <meta name="theme-color" content="#353535">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="manifest" href="manifest.json">
        <script src="js/main.js" defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
        <!-- <script src="chamarFunctionPhp.js"></script> -->
        <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    
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
                    <li><a href="">Sua localização</a></li>
                    <li><a href="contate.php">Contate-nos</a></li>
                    <li><a href="index.php">Sobre nós</a></li>              
                    <li><a href="cadastro.php" id="login">entrar</a></li>
                </ul>;
            </nav>
        </header>

        <div id="users" class="users">
            <ul class="escolher-users">
                <li id="chamar-user"><img src="icon/Usuario.png" onclick="chamarusernormal()"></li>
                <li id="chamar-user"><p class="paragrafo-user" onclick="chamarusernormal()">Entre como Usuário</p></li>
            </ul>
            <ul class="escolher-users">
                <li id="chamar-chaveiro"><img src="icon/Chaveiro.png" onclick="chamarchaveiro()"></li>
                <li id="chamar-chaveiro" onclick="chamarchaveiro()"><p class="paragrafo-user">Entre como Chaveiro</p></li>
            </ul>
        </div>

        <div id="div-escolher" class="div-escolher" style="display: none;">
            <ul class="escolher-form">
                <li id="chamarform" onclick="chamarform()">Clique aqui para Cadastrar-se</li>
                <li id="chamarlog" style="display: none;" onclick="chamarform()">Clique aqui para Entrar</li>
            </ul>
        </div>
        <div id="div-escolhernormal" class="div-escolher" style="display: none;">
            <ul class="escolher-form">
                <li id="chamarformnormal" onclick="chamarformnormal()">Clique aqui para Cadastrar-se</li>
                <li id="chamarlognormal" style="display: none;" onclick="chamarformnormal()">Clique aqui para Entrar</li>
            </ul>
        </div>

        <!--Abaixo é o cadastro do chaveiro-->
        <section id="cadastro" class="cadastro" style="display: none;">
            <div class="login-cadastro">
                    <h1 class="titulo-cadastro">Cadastro</h1>
                    <p>Preencha todos os campos obrigatórios *</p>
            </div>
        
            <div class="form-cadastro">
                <form class="lista-form" action="php/query.php" method="POST">
                    <ul>
                        <li><p>*Nome:</p><input type="text" name="txtName" required></li>
                        <li><p>*Email:</p><input type="text" name="txtEmailCadastro"required></li>
                        <li><p>*Senha:</p><input type="password" name="txtSenhaCadastro" id ="campo-senhaconfirm2"pattern="^[a-zA-Z0-9]+$" minlength="6" maxlength="50"required ><button type="button" class="visible-senha" onclick="mostrarConfSenha()" ><img src="icon/olho-senha.png"></button></li>
                        <li><p>*Confirmar Senha:</p><input type="password" id="campo-senhaconfirm" name="txtSenhaConf" pattern="^[a-zA-Z0-9]+$" minlength="6" maxlength="50"required ><button type="button" class="visible-senha" onclick="mostrarConfSenha()" ><img src="icon/olho-senha.png"></button></li>
                        <li><p>*CPF:</p><input type="text" name="txtCpf" required  minlength="14" onkeypress="$(this).mask('000.000.000-00')"></li>
                        <li><p>*Data de Nascimento:<p><input type="text" name="txtDataNascimento"required onkeypress="$(this).mask('00/00/0000')"></li>
                        <li><p>*CEP:</p><input type="text" onkeypress="$(this).mask('00000-000')"name="txtCep" required ></li>
                        <li><p>*Telefone:</p><input type="text" name="txtTelefone" onkeypress="$(this).mask('(00) 0000-00009')"required ></li>
                    </ul>

                    <ul>
                        <li><p>Descreva-se:</p><input type="text" name="txtDescricao"></li>
                        <li><p id="funcao">*Função Principal <br/>
                            <select id="lista" name="txtEspecialidade"required>
                                <option value="" disabled selected>Selecione</option>
                                <?php   
                                include('php/profissoes.php');
                                profissao();                           
                                ?>
                                <option value="3">Outro</option>
                            </select><br/>
                        </p></li>
                        <li><p>*Valor da função principal:</p><input type="text" required></li>
                        <li><p>*Métodos de pagamento aceito: <br/> <p>Dinheiro: <input type="checkbox" value="Dinheiro"name="txtPagamentoD"></p> <p>Cartão: <input type="checkbox" value="Cartão" name="txtPagamentoC"></p> 
                        </p></li>
                        <li class="submit-line"><button name="btnCadastrarChaveiro" type="submit" class="botaochav">Cadastrar</button></li> 
                    </ul>
                </form>
            </div>
        </section>
        
        <!--Abaixo é o cadastro do usuário normal-->
        <section id="cadastronormal" class="cadastro" style="display: none;">
            <div class="login-cadastro">
                    <h1 class="titulo-cadastro">Cadastro</h1>
                    <p>Preencha todos os campos obrigatórios *</p>
            </div>
        
            <div class="form-cadastro">
                <form class="lista-form" name="form_cliente" action="php/query.php" method="POST">
                    <ul>
                        <li><p>*Nome:</p><input type="text" name="txtName"required></li>
                        <li><p>*Email:</p><input type="text" name="txtEmailCadastro"required></li>
                        <li><p>*Senha:</p><input type="password" name="txtSenhaCadastro" minlength="6" maxlength="50" pattern="^[a-zA-Z0-9]+$"required><button type="button" class="visible-senha" onclick="mostrarConfSenha()" ><img src="icon/olho-senha.png"></button></li>
                        <li><p>*Confirmar Senha:</p><input type="password" name="txtSenhaConf" minlength="6" maxlength="50" pattern="^[a-zA-Z0-9]+$"required><button type="button" class="visible-senha" onclick="mostrarConfSenha()" ><img src="icon/olho-senha.png"></button></li>
                    </ul>

                    <ul>
                        <li><p>*CPF:</p><input type="text"required name="txtCpf" onkeypress="$(this).mask('000.000.000-00')"></li>
                        <li><p>*Data de Nascimento:</p><input type="text"required name="txtDataNascimento" onkeypress="$(this).mask('00/00/0000')"></li>
                        <li><p>*Telefone:</p><input type="text"required name="txtTelefone" onkeypress="$(this).mask('(00) 0000-00009')"></li>
                        <li class="submit-line"><button name="btnCadastrarCliente" type="submit" class="botaochav">Cadastrar</button></li>
                    </ul>
                </form>
            </div>
        </section>

        <!--Abaixo é o login de chaveiro-->
        <section id="entrar-chaveiro" class="entrar" style="display: none;">
            <div class="login-cadastro">
                <h1 class="titulo-entrar">Login</h1>
                <p style="text-align: center;">Preencha todos os campos obrigatórios *</p>
            </div>

            <div class="form-cadastro">
                <form class="lista-form" action="php/logar.php" method="POST">
                    <ul>
                        <li><p>*Email:</p><input type="text"></li>
                        <li><p>*Senha:</p><input type="password" id="campo-senhalogin-chaveiro"required minlength="6" maxlength="50" pattern="^[a-zA-Z0-9]+$"><button type="button" class="visible-senha" onclick="mostrarSenhaLoginChaveiro()"><img src="icon/olho-senha.png"></button></li>
                        <li class="submit-line"><button name="btnLoginChaveiro" type="submit" class="botaochav">login</button></li>
                    </ul>
                </form>
            </div>
        </section>

        <!--Abaixo é o login de usuário normal-->
        <section id="entrar" class="entrar" style="display: none;">
            <div class="login-cadastro">
                <h1 class="titulo-entrar">Login</h1>
                <p style="text-align: center;">Preencha todos os campos obrigatórios *</p>
            </div>

            <div class="form-cadastro">
                <form class="lista-form" action="php/logar.php" method="POST">
                    <ul>
                        <li><p>*Email:</p><input type="text" name="txtEmailLogin" required></li>
                        <li><p>*Senha:</p><input type="password" name="txtSenhaLogin" id="campo-senhalogin"required minlength="6" maxlength="50" pattern="^[a-zA-Z0-9]+$"><button type="button" class="visible-senha" onclick="mostrarSenhaLogin()"><img src="icon/olho-senha.png"></button></li>
                        <li class="submit-line"><button name="btnLoginCliente" type="submit" class="botaochav">Cadastrar</button></li>
                    </ul>
                </form>
            </div>
        </section>
            <footer>
                <ul class="rodape">
                    <li><h1 class="titulo-rodape">Suporte</h1></li>
                    <li><p>Email: opendoors@gmail.com</p></li>
                    <li><p>Desenvolvido por: Giovanna Rocha, Leonardo Andrade, Mateus Santana, Renan Rocha.</p></li>
                    <li><p class="copy">Copyright © 2021 Open doors</p></li>
                    <li><a class="link-rodape" href="">Termos e condições</a></li>
                </ul>
            </footer>
        
        <!-- <div id="modal-sucesso" class="modal-container">
            <div class="modal">
                <a href="index.php"><button class="fechar">X</button></a>
                <h3>Cadastro realizado com sucesso!</h3>
            </div>
        </div> 
        <div id="modal-falha" class="modal-container">
            <div class="modal">
                <a href="index.php"><button class="fechar">X</button></a>
                <h3>Falha ao Cadastro!</h3>
            </div>
        </div>    
        <div id="modal-cpf" class="modal-container">
            <div class="modal">
                <a href="index.php"><button class="fechar">X</button></a>
                <h3>Cadastro realizado com sucesso!</h3>
            </div>
        </div> 
        <div id="modal-login" class="modal-container">
            <div class="modal">
                <a href="index.php"><button class="fechar">X</button></a>
                <h3>Cadastro realizado com sucesso!</h3>
            </div>
        </div>        
        <div id="modal-email" class="modal-container">
            <div class="modal">
                <a href="index.php"><button class="fechar">X</button></a>
                <h3>Cadastro realizado com sucesso!</h3>
            </div>
        </div>    
        <div id="modal-senhas" class="modal-container">
            <div class="modal">
                <a href="index.php"><button class="fechar">X</button></a>
                <h3>Cadastro realizado com sucesso!</h3>
            </div>
        </div>        -->


        <script type="text/javascript" src="js/script.js"></script>

        <!--Abaixo é o script para a combobox funcionar com a opção outros-->
        <script>
            $('#lista').change(function(){
                if( $(this).val() == '3'){
                    $('#funcao').append("<?php
                        require_once('php/profissoes.php');
                        profissaoCheck();
                        ?>");
                }else{
                    for(let i=0;i<15;i++){
                        $("#myInput").remove();
                    } 
                }
            });
        </script>

        <!--Abaixo é o script para escolher a maneira de entrar-->
        <script type="text/javascript">

            //inicio de caso escolher entrar como usuário
            function chamarusernormal(){
                var div = document.getElementById('div-escolhernormal');
                if(div.style.display == 'none'){
                    document.getElementById('users').style.display = 'none';
                    document.getElementById('div-escolhernormal').style.display = 'block';
                    document.getElementById('entrar').style.display = 'block';
                } else {
                    document.getElementById('chamarform').style.display = 'none';
                }
            }
            //fim para entrar como usuário

            //inicio de caso escolher entrar como chaveiro
            function chamarchaveiro(){
                var div = document.getElementById('div-escolher');
                if(div.style.display == 'none'){
                    document.getElementById('users').style.display = 'none';
                    document.getElementById('div-escolher').style.display = 'block';
                    document.getElementById('entrar-chaveiro').style.display = 'block';
                } else {
                    document.getElementById('chamarform').style.display = 'none';
                }
            }
            //fim para entrar como chaveiro
        </script>

        <!--Abaixo é o script para checkbox com input.text-->
        <script type="text/javascript">
            function Caixa()
            {
                var check = document.getElementById('checkBox1');
                if (check.checked) {
                    document.getElementById('textBox1').style.display = 'block';
                }
                else
                    document.getElementById('textBox1').style.display = 'none';                
            }
        </script>

        <!--Abaixo é o script para chamar os forms-->
        <script>
            //chamar forms da parte do chaveiro
            function chamarform(){
                var divlogin = document.getElementById('entrar-chaveiro');
                if(divlogin.style.display == 'none'){
                    document.getElementById('chamarform').style.display = 'block';
                    document.getElementById('chamarlog').style.display = 'none';
                    document.getElementById('entrar-chaveiro').style.display = 'block';
                    document.getElementById('cadastro').style.display = 'none';
                } else {
                    document.getElementById('chamarform').style.display = 'none';
                    document.getElementById('chamarlog').style.display = 'block';
                    document.getElementById('entrar-chaveiro').style.display = 'none';
                    document.getElementById('cadastro').style.display = 'block';
                }
            }
            //fim de chamar forms do chaveiro

            //chamar forms da parte do usuário comum
            function chamarformnormal(){
                var divlogin = document.getElementById('entrar');
                if(divlogin.style.display == 'none'){
                    document.getElementById('chamarformnormal').style.display = 'block';
                    document.getElementById('chamarlognormal').style.display = 'none';
                    document.getElementById('entrar').style.display = 'block';
                    document.getElementById('cadastronormal').style.display = 'none';
                } else {
                    document.getElementById('chamarformnormal').style.display = 'none';
                    document.getElementById('chamarlognormal').style.display = 'block';
                    document.getElementById('entrar').style.display = 'none';
                    document.getElementById('cadastronormal').style.display = 'block';
                }
            }
            //fim de chamar forms do usuário
        </script>

        <script>
            //abaixo é para mostrar senha quando clica no icon do olho
            function mostrarSenha(){
                var tipo = document.getElementById("campo-senha");
                var tipo2 = document.getElementById("campo-senha2");
                if (tipo.type == "password") {
                    tipo.type = "text"; 
                }else {
                    tipo.type = "password";
                }
                if (tipo2.type == "password") {
                    tipo2.type = "text"; 
                }else {
                    tipo2.type = "password";
                }
            }

            function mostrarConfSenha(){
                var tipo3 = document.getElementById("campo-senhaconfirm");
                var tipo4 = document.getElementById("campo-senhaconfirm2");
                if (tipo3.type == "password") {
                    tipo3.type = "text"; 
                }else {
                    tipo3.type = "password";
                }
                if (tipo4.type == "password") {
                    tipo4.type = "text"; 
                }else {
                    tipo4.type = "password";
                }
            }

            function mostrarSenhaLogin(){
                var tipo5 = document.getElementById("campo-senhalogin");
                if (tipo5.type == "password") {
                    tipo5.type = "text"; 
                }else {
                    tipo5.type = "password";
                }
            }

            function mostrarSenhaLoginChaveiro(){
                var tipo5 = document.getElementById("campo-senhalogin-chaveiro");
                if (tipo5.type == "password") {
                    tipo5.type = "text"; 
                }else {
                    tipo5.type = "password";
                }
              
            }

        </script>

        <!-- <script>
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

            const botaouser = document.querySelector(".botaouser");
            botaouser.addEventListener("click", () => iniciaModal ('modal-container'));
            const botaochav = document.querySelector(".botaochav");
            botaochav.addEventListener("click", () => iniciaModal ('modal-container'));

        </script> -->



    </body>
</html>