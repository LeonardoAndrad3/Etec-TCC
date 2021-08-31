<?php
  class ControllerDb{

    private $host = "ec2-23-21-229-200.compute-1.amazonaws.com";
    private $user = "denibmcnmjikfy";
    private $password  = "18201ee8394165431162a91c26243c1dcf20092899f9d94ad1d8587604e88148";
    private $database = "d4vk0o4kdhima3";
    private $conn;

    function connectDb(){
        $conn = pg_connect("host=$this->host dbname=$this->database user=$this->user password=$this->password")or 
        die("Failed to create connection to database: ". pg_last_error(). "<br/>");
    }
    function construct(){
        $this->conn = $this->connectDb();
    }
    function accessQuery($query){
        $result = pg_query($query);
        while($row=pg_fetch_assoc($result)){
            
        }
        if(!empty($resultset))
        return $resultset;
    }
}

$db = new ControllerDb();
$db->connectDb();

if(isset($_POST['btnCadastrarChaveiro'])){  
    
    if(!empty($_POST['txtDescricao'])){
        $descricao = $_POST['txtDescricao'];
    } else {
        $descricao = "Chaveiro pronto a serviço!";
    }

    if(!empty($_POST['txtPagamentoD']) && !empty($_POST['txtPagamentoC'])){
        $pagamento = $_POST['txtPagamentoD'] ." e ". $_POST['txtPagamentoC'];
    } elseif(!empty($_POST['txtPagamentoD'])){
        $pagamento = $_POST['txtPagamentoD'];
    } elseif(!empty($_POST['txtPagamentoC'])){
        $pagamento = $_POST['txtPagamentoC'];
    } else{

    }

    //Verificando se os campos estão vazios.

    $name = $_POST['txtName'];
    $email = $_POST['txtEmailCadastro'];
    $senha = $_POST['txtSenhaCadastro'];
    $cpf = $_POST['cpf'];
    $dataN = $_POST['txtDataNascimento'];
    $cep =  $_POST['txtCep'];
    $tel = $_POST['txtTelefone'];
    $descricao;
    $especialidade = $_POST['txtEspecialidade'];
    $pagamento;

    try{
    $db->accessQuery(
    $query="insert into Chaveiro(nome, email, especialidade, telefone, cpf, cep, descricao, senha, dataDeNascimento, pagamento)
    values('$name','$email','$especialidade','$tel','$cpf','$cep','$descricao','$senha','$dataN','$pagamento');");  
        header('location: ../index.php');
        return $query;
    } catch(Exception $e){
        return $e;
    };    
    

} elseif(isset($_POST['btnCadastrarCliente'])){
        
    $name = addslashes($_POST['txtName']);
    $email = addslashes($_POST['txtEmailCadastro']);
    $senha = addslashes($_POST['txtSenhaCadastro']);
    $cpf = addslashes($_POST['txtCpf']);
    $dataN = addslashes($_POST['txtDataNascimento']);
    $tel = addslashes($_POST['txtTelefone']);

    try{
        $db->accessQuery(
        $query="insert into Cliente(nome, email, telefone, cpf, senha, datadenascimento) 
        values('$name', '$email','$tel','$cpf','$senha','$dataN');");
        header('location: ../index.php');
        return $query;
    } catch(Exception $e){
       return $e;
    };
   

} elseif(isset($_POST['btnLogin'])){

    $email = addslashes($_POST["txtEmailLogin"]);
    $senha = addslashes($_POST["txtSenhaLogin"]);
    // error_reporting(0);
    // ini_set("display_erros", 0);
    try{
    $db->accessQuery($query=sprintf("select email, senha from Chaveiro where email= '%s' and senha=%d;", $email, $senha));
    session_start();
    $_SESSION['login']  = $db->accessQuery($query);
    setcookie("primerioUsuario", "Bem vindo");
    echo"<section id='entrar' class='entrar' style='display: none;'><h1 class='titulo-entrar'>Cadastrado com sucesso!<h1>";
    echo"<link rel='stylesheet' type='text/css' href='../style.css'><a href='../index.php'><button type='submit'>Voltar</button></a></section>";
    
        }catch(Exception $e){
        echo $e;
    };
    
}; 

// Esse código foi feito para quando aperter certo button, ele irá corresponder 
// com o valor do button, assim não preciso criar pastas diferentes;

?>