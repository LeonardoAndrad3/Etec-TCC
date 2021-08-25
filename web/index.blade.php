<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Open Doors</title>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="manifest" href="manifest.json">
        <script src="js/main.js" defer></script>
    </head>
    <body>

    <?php
    
    $db = new ControllerDb();
    if($connetion= pg_connect(connectDb())){
        echo("Foi");
        pg_close($connetion);
    } else{
        echo("Não foi cara!");
    }
    ?>
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
        
        <section class="conteudo">
            <div class="home">
                <div class="texto-home">
                    <img class="fundo-home" src="icon/fundo.png">
                    <h1 class="titulo">Open doors</h1>
                    <h2 class="sub-titulo">Não tenha mais problemas com o esquecimento, as portas ainda se abrirão para você!</h2>
                </div>
                <ul class="home-botoes">
                    <li class="botoes-linha"><a class="botoes-verdes" href="">Saber Mais</a></li>
                    <li class="botoes-linha"><a class="botoes" href="">Quero Contratar</a></li>
                </ul>
            </div>
        
        
            <div class="oque">
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
                        <li><p class="paragrafo-oque">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p></li>
                    </ul>
                    <ul class="escolher">
                        <li><img class="image-oque" src="icon/image-escolher.png"></li>
                        <li><h3 class="subtitulo-center">Escolha</h3></li>
                        <li><p class="paragrafo-oque">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p></li>
                    </ul>
                    <ul class="contratar">
                        <li><img class="image-oque" src="icon/image-contratar.png"></li>
                        <li><h3 class="subtitulo-center">Contrate</h3></li>
                        <li><p class="paragrafo-oque">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p></li>
                    </ul>
                </div>
            </div>
        
        
            <div class="sobre-nos">
                <ul class="texto-sobre">
                    <li><h1 class="titulo-esquerda">Sobre nós</h1></li>
                    <li><p class="paragrafo-sobre">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Id facere labore, amet magni 
                        repellendus quia, eaque, quas laudantium provident impedit sapiente! Provident beatae voluptatem, cum consequuntur 
                        sequi molestias in nulla.Lorem ipsum dolor sit, amet consectetur adipisicing elit. Id facere labore, amet magni 
                        repellendus quia, eaque, quas laudantium provident impedit sapiente! Provident beatae voluptatem, cum consequuntur 
                        sequi molestias in nulla.</p>
                    </li>
                </ul>
                <ul class="image-sobre">
                    <li><img class="image-lampada" src="icon/lampada.png"></li>
                </ul>
            </div>
        
        
            <div class="motivos">
                <ul class="image-motivos">
                    <li><img class="image-porque-escolher" src="icon/porque-escolher.png"></li>
                </ul>
                <ul class="texto-motivos">
                    <li><h1 class="titulo-direita">Motivos para nos escolher</h1></li>
                    <li><p class="paragrafo-motivos">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Id facere labore, amet magni 
                        repellendus quia, eaque, quas laudantium provident impedit sapiente! Provident beatae voluptatem, cum consequuntur 
                        sequi molestias in nulla.Lorem ipsum dolor sit, amet consectetur adipisicing elit. Id facere labore, amet magni 
                        repellendus quia, eaque, quas laudantium provident impedit sapiente! Provident beatae voluptatem, cum consequuntur 
                        sequi molestias in nulla.</p>
                    </li>
                    <li class="botao-motivos"><a class="botoes" href="">Quero Contratar</a></li>
                </ul>
            </div>
        
        
            <div class="opcoes">
                <h1 class="titulo-centralizado">Nossas opções incluem:</h1>
                <h3 class="tipos-chaveiros">Tipo de chaveiro //Tipo de chaveiro // Tipo de chaveiro // Tipo de chaveiro // Tipo de chaveiro // Tipo de chaveiro // Tipo de chaveiro //  </h3>
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
        
        </section>

        <script type="text/javascript" src="js/script.js"></script>
    </body>
</html>