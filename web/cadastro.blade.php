<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Open Doors</title>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="manifest" href="manifest.json">
        <script src="js/main.js" defer></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body>

        <header id="header">
            <a id="logo" href="index.html"><img src="icon/logo-2.png" width="150" height="120"></a> <!--logo1: w:60, h:60 -- logo2: w:150, h:120 -- logo3: w:130, h:70-->
            <nav id="nav">
                <button aria-label="Abrir Menu" id="btn-mobile" aria-haspopup="true" aria-controls="menu" aria-expanded="false">Menu
                    <span id="hamburguer"></span>
                </button>
                <ul id="menu" role="menu">
                    <li><a href="servicos.html">Serviços</a></li>
                    <li><a href="">Sua localização</a></li>
                    <li><a href="">Contate-nos</a></li>
                    <li><a href="">Sobre nós</a></li>
                    <li><a href="cadastro.html" id="login">Entrar</a></li>
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
                <form class="lista-form">
                    <ul>
                        <li><p>*Nome:</p><input type="text"></li>
                        <li><p>*Email:</p><input type="text"></li>
                        <li><p>*Senha:</p><input type="password"></li>
                        <li><p>*CPF:</p><input type="text"></li>
                        <li><p>*Data de Nascimento:</p><input type="text"></li>
                        <li><p>*CEP:</p><input type="text"></li>
                        <li><p>*Telefone:</p><input type="text"></li>
                    </ul>

                    <ul>
                        <li><p>Descreva-se:</p><input type="text"></li>
                        <li><p id="funcao">*Função Principal <br/>
                            <select id="lista">
                                <option value="" disabled selected>Selecione</option>
                                <option value="1">Chaveiro Residencial</option>
                                <option value="2">Chaveiro Residencial</option>
                                <option value="3">Outro</option>
                            </select><br/>
                        </p></li>
                        <li><p>*Valor da função principal:</p><input type="text"></li>
                        <li><p>
                                Possui outras funções? <input type="checkbox" id="checkBox1" onchange="javascript:Caixa()"><br/>
                                <input id="textBox1" type="text" style="display:none"/>
                            </p>
                        </li>
                        <li><p>Insira os valores das funções extras:</p><input type="text"></li>
                        <li><p>*Métodos de pagamento aceito: <br/> <p>Dinheiro: <input type="checkbox"></p> <p>Cartão: <input type="checkbox"></p> 
                        </p></li>
                        <li class="submit-line"><input type="submit" value="Cadastrar"></li>
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
                <form class="lista-form">
                    <ul>
                        <li><p>*Nome:</p><input type="text"></li>
                        <li><p>*Email:</p><input type="text"></li>
                        <li><p>*Senha:</p><input type="password"></li>
                        <li><p>*Confirmar Senha:</p><input type="password"></li>
                    </ul>

                    <ul>
                        <li><p>*CPF:</p><input type="text"></li>
                        <li><p>*Data de Nascimento:</p><input type="text"></li>
                        <li><p>*Telefone:</p><input type="text"></li>
                        <li class="submit-line"><input type="submit" value="Cadastrar"></li>
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
                <form class="lista-form">
                    <ul>
                        <li><p>*Email:</p><input type="text"></li>
                        <li><p>*Senha:</p><input type="password"></li>
                        <li class="submit-line"><input type="submit" value="Entrar"></li>
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