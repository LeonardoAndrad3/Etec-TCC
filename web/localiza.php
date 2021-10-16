<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>localização</title>
    <script src="js/localizar.js"></script>
</head>
<body>
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
        <iframe 
            width="600"
            height="450"
            style="border:0"
            loading="lazy"
            allowfullscreen
            class="map"
            src="">
        </iframe>
    <label>
        <span id="lat"></span>
    </label>
    <br><br>
    <label>
        <span id="lon"></span>
    </label>
</body>
</html>