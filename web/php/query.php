<?php
include('connectionDb.php');
$db= new ControllerDb();
$db->connectDb();

if(isset($_POST['btnCadastroChaveiro'])){

    $name = $_POST['txtName'];
    $email = $_POST['txtEmailCadastro'];
    $senha = $_POST['txtSenhaCadastro'];
    $cpf = $_POST['cpf'];
    $dataN = $_POST['txtDataNascimento'];
    $cep =  $_POST['txtCep'];
    $tel = $_POST['txtTelefone'];
    $descricao = $_POST['txtDescricao'];
    $especialidade = $_POST['txtEspecialidade'];
    $pagamento = $_POST['txtPagamento'];

    try{
    $db->accessQuery(
    $query="insert into Chaveiro(nome, email, especialidade, telefone, cpf, cep, descricao, senha, dataDeNascimento)
    values('$name','$email','$especialidade','$tel','$cpf','$cep','$descricao','$senha','$dataN');"
    );
        return $query;
    } catch(Exception $e){
        return $e;
    };
    pg_close($db->conn);

}; if(isset($_POST['btnCadastroCliente'])){
        
    $name = $_POST['txtName'];
    $email = $_POST['txtEmailCadastro'];
    $senha = $_POST['txtSenhaCadastro'];
    $cpf = $_POST['txtCpf'];
    $dataN = $_POST['txtDataNascimento'];
    $tel = $_POST['txtTelefone'];

    try{
        $db->accessQuery(
        $query="insert into Cliente(nome, email, telefone, cpf, senha, datadenascimento) 
        values('$name', '$email', '$tel', '$cpf', '$senha', '$dataN');");
        return $query;
    } catch(Exception $e){
        return $e;
    }
    pg_close($db->conn);

}; if(isset($_POST['btnLogin'])){

    $email = $_POST["txtEmailLogin"];
    $senha = $_POST["txtSenhaLogin"];
    // error_reporting(0);
    // ini_set("display_erros", 0);
    try{
    $db->accessQuery($query="select email from Chaveiro;");

    session_start();
    $_SESSION['login']  = $db->accessQuery($query);

    }catch(Exception $e){
        echo($this->e);
    };
}; 

// Esse código foi feito para quando aperter certo button, ele irá corresponder 
// com o valor do button, assim não preciso criar pastas diferentes;

?>