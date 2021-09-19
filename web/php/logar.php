<?php
include("query.php");
$db = new ControllerDb();
$db->connectDb();

function logar($query){
    try{$result = pg_query($query);
        session_reset();
        if(pg_num_rows($result) > 0){
            $row = pg_fetch_assoc($result);
            session_start();
            $_SESSION['usuario'] = $row["nome"];
            echo'<script>window.location.replace("../index.php");alert("Bem-vindo '.$_SESSION['usuario'].'!");</script>';
            include("../css/button.css");
        } else{
            throw new Exception("<script>window.location.replace('../cadastro.php');alert('Email ou senha incorretos!');</script>');"); 

    }}catch(Exception $e){ 
        echo die($e->getMessage());
    }
}    

if(isset($_POST['btnLoginCliente'])){           

    $email = addslashes($_POST["txtEmailLogin"]);
    $senha = md5(addslashes($_POST["txtSenhaLogin"]));
    // Fazendo a criptografia para entrar corretamente

    logar($query="select email, senha, nome from Cliente where email='$email' and senha='$senha';");
} elseif(isset($_POST['btnLoginChaveiro'])){           

    $email = addslashes($_POST["txtEmailLogin"]);
    $senha = md5(addslashes($_POST["txtSenhaLogin"]));
    // Fazendo a criptografia para entrar corretamente

    logar($query="select email, senha, nome from Chaveiro where email='$email' and senha='$senha';");
};

if(isset($_POST["btnSair"])){
    echo'<script>window.location.replace("../index.php");alert("Até uma próxima!");</script>';
    include("../principal.php");
    session_destroy();
    
}

?>