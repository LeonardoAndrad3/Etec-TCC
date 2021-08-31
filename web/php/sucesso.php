<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Open Doors</title>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" type="text/css" href="./style.css">
        <link rel="manifest" href="manifest.json">
        <script src="../js/main.js" defer></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- <script src="chamarFunctionPhp.js"></script> -->
        <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    </head>
    <body>
        <header id="header">
            <a id="logo" href="../index.php"><img src="../icon/logo-2.png" width="150" height="120"></a> <!--logo1: w:60, h:60 -- logo2: w:150, h:120 -- logo3: w:130, h:70-->
            <nav id="nav">
                <button aria-label="Abrir Menu" id="btn-mobile" aria-haspopup="true" aria-controls="menu" aria-expanded="false">Menu
                    <span id="hamburguer"></span>
                </button>
                <ul id="menu" role="menu">
                    <li><a href="../servicos.html">Serviços</a></li>
                    <li><a href="">Sua localização</a></li>
                    <li><a href="">Contate-nos</a></li>
                    <li><a href="">Sobre nós</a></li>
                    <li><a href="../cadastro.html" id="login"></a></li>
                </ul>
            </nav>
        </header>
            
            <div id="users" class="users">
            <ul class="escolher-users">
                <li id="chamar-user"><img src="../icon/Usuario.png"></li>
                <li id="chamar-user"><p class="paragrafo-user">Logado como usuário</p></li>
            </ul>
        </div>

        

            <div class="form-cadastro">
                <form class="lista-form" action="../index.php" >
                <ul>
                        <li class="submit-line"><button class ="button" type="submit" name="btnLogin">voltar</button></li>
                    </ul>
                </form>
            </div>

            <footer>
            <ul class="rodape">
                <li><h1 class="titulo-rodape">Suporte</h1></li>
                <li><p>Email: opendoors@gmail.com</p></li>
                <li><p>Desenvolvido por: Giovanna Rocha, Leonardo Andrade, Mateus Santana, Renan Rocha.</p></li>
                <li><p class="copy">Copyright © 2021 Open doors</p></li>
                <li><a class="link-rodape" href="">Termos e condições</a></li>
            </ul>
        </footer>

        <script type="text/javascript" src="../js/script.js"></script>
    </body>
</html>