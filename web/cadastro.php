
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Open Doors</title>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" type="text/css" href="style.css">
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
                    <li><a href="servicos.html">Serviços</a></li>
                    <li><a href="">Sua localização</a></li>
                    <li><a href="">Contate-nos</a></li>
                    <li><a href="">Sobre nós</a></li>
                    <li><a href="cadastro.php" id="login">Entrar</a></li>
                </ul>
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
                <form class="lista-form" action="./php/query.php" method="POST">
                    <ul>
                        <li><p>*Nome:</p><input type="text" name="txtName"  required></li>
                        <li><p>*Email:</p><input type="text" name="txtEmailCadastro"required></li>
                        <li><p>*Senha:</p><input type="password" name="txtSenhaCadastro" required maxlength="50"></li>
                        <li><p>*CPF:</p><input type="text" name="cpf" required onkeypress="$(this).mask('000.000.000-00')"></li>
                        <li><p>*Data de Nascimento:</p ><input type="text" name="txtDataNascimento"required onkeypress="$(this).mask('00/00/0000')"></li>
                        <li><p>*CEP:</p><input type="text" onkeypress="$(this).mask('00000-000')"name="txtCep" required ></li>
                        <li><p>*Telefone:</p><input type="text" name="txtTelefone" onkeypress="$(this).mask('(00) 0000-00009')"required ></li>
                    </ul>

                    <ul>
                        <li><p>Descreva-se:</p><input type="text" name="txtDescricao"></li>
                        <li><p id="funcao">*Função Principal <br/>
                            <select id="lista" name="txtEspecialidade"required>
                                <option value="" disabled selected>Selecione</option>
                                <?php
                                include('./php/query.php');
                                $db = new ControllerDb();
                                $db->profissao();                                
                                ?>
                            </select><br/>
                        </p></li>
                        <li><p>*Valor da função principal:</p><input type="text" required></li>
                        <li><p>
                                Possui outras funções? <input type="checkbox" id="checkBox1" onchange="javascript:Caixa()"><br/>
                                <input id="textBox1" type="text" style="display:none"/>
                            </p>
                        </li>
                        <li><p>Insira os valores das funções extras:</p><input type="text"></li>
                        <li><p>*Métodos de pagamento aceito: <br/> <p>Dinheiro: <input type="checkbox" value="Dinheiro"name="txtPagamento"></p> <p>Cartão: <input type="checkbox" value="Cartão" name="txtPagamento"></p> 
                        </p></li>
                        <li class="submit-line"><button name="btnCadastrarChaveiro" type="submit">Cadastrar</button></li>
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
                <form class="lista-form" action="./php/query.php" method="POST">
                    <ul>
                        <li><p>*Nome:</p><input type="text" name="txtName"required></li>
                        <li><p>*Email:</p><input type="text" name="txtEmailCadastro"required></li>
                        <li><p>*Senha:</p><input type="password" name="txtSenhaCadastro"required></li>
                        <li><p>*Confirmar Senha:</p><input type="password" name="txtSenhaConf"required></li>
                    </ul>

                    <ul>
                        <li><p>*CPF:</p><input type="text"required name="txtCpf" onkeypress="$(this).mask('000.000.000-00')"></li>
                        <li><p>*Data de Nascimento:</p><input type="text"required name="txtDataNascimento" onkeypress="$(this).mask('00/00/0000')"></li>
                        <li><p>*Telefone:</p><input type="text"required name="txtTelefone" onkeypress="$(this).mask('(00) 0000-00009')"></li>
                        <li class="submit-line"><button type="submit" name="btnCadastrarCliente">Cadastrar</button></li>
                    </ul>
                </form>
            </div>
        </section>


        <section id="entrar" class="entrar" style="display: none;">
            <div class="login-cadastro">
                <h1 class="titulo-entrar">Login</h1>
                <p style="text-align: center;">Preencha todos os campos obrigatórios *</p>
            </div>

            <div class="form-cadastro">
                <form class="lista-form" action="./php/query.php" method="POST">
                    <ul>
                        <li><p>*Email:</p><input type="text" name="txtEmailLogin" required></li>
                        <li><p>*Senha:</p><input type="password" name="txtSenhaLogin"required>
                        <span class="lnr lnr-eye"></span></li>

                        <!-- depois devo terminar essa parte de visualizar senha -->
                        <li class="submit-line"><button class ="button" type="submit" name="btnLogin">Entar</button></li>
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
        

        <script type="text/javascript" src="js/script.js"></script>

        <!--Abaixo é o script para a combobox funcionar com a opção outros-->
        <script>
            $('#lista').change(function(){
                if( $(this).val() == '3'){
                    $('#funcao').append('<input id="myInput" type="text" />');
                }else{
                    $('#myInput').remove();
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
                    document.getElementById('entrar').style.display = 'block';
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
                var divlogin = document.getElementById('entrar');
                if(divlogin.style.display == 'none'){
                    document.getElementById('chamarform').style.display = 'block';
                    document.getElementById('chamarlog').style.display = 'none';
                    document.getElementById('entrar').style.display = 'block';
                    document.getElementById('cadastro').style.display = 'none';
                } else {
                    document.getElementById('chamarform').style.display = 'none';
                    document.getElementById('chamarlog').style.display = 'block';
                    document.getElementById('entrar').style.display = 'none';
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

    </body>
</html>