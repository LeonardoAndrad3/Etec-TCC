<?php
include('connectionDb.php');
$db = new ControllerDb();
$db->connectDb();


function login(){
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

function cadastrarChaveiro(){
    $db->accessQuery(
    $query="insert into Chaveiro(nome, email, especialidade, telefone, cpf, endereco, cep, descricao, senha) 
    values();");
};

if(isset($_POST['action'])){
    switch($_POST['action']){
        case 'btnLogin':
            login();
        break;
    }
}

?>