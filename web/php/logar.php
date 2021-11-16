<?php
include_once("query.php");
include_once("modal.php");

$db = new ControllerDb();
$db->connectDb();
session_start();

function entrar($query){
    try{$result = pg_query($query);
        include("modal.php");
        if(pg_num_rows($result) > 0){
            $row = pg_fetch_assoc($result);
            $PrimeiroName = explode(" ", $row["nome"]);
            $_SESSION['usuario'] = $PrimeiroName[0];
            echo "<script>
                iniciaModal('modal-login');
                modal.principal();
            </script>";
        } else{
            throw new Exception("
            <script>
            iniciaModal('modal-erro-login');
            modal.back();
            </script>"); 

    }}catch(Exception $e){ 
        echo die($e->getMessage());
    }
}    

if(isset($_POST['btnLoginCliente'])){           
    $email = addslashes($_POST["txtEmailLogin"]);
    $senha = md5(addslashes($_POST["txtSenhaLogin"]));
    // Fazendo a criptografia para entrar corretamente

    entrar($query="select * from Cliente where email='$email' and senha='$senha';");
    
} elseif(isset($_POST['btnLoginChaveiro'])){           

    $email = addslashes($_POST["txtEmailLogin"]);
    $senha = md5(addslashes($_POST["txtSenhaLogin"]));
    // Fazendo a criptografia para entrar corretamente

    entrar($query="select * from Chaveiro where email='$email' and senha='$senha';");

} elseif(isset($_POST["btnSair"])){
    echo'
    <script> 
    iniciaModal("modal-sair");
    modal.principal();
    </script>';
    session_destroy();
}
?>
