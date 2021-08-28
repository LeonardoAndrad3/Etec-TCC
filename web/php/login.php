<?php
include('connectionDb.php');
$db = new ControllerDb();
$db->connectDb();

$email = $_POST["txtEmail"];
$senha = $_POST["txtSenha"];
// error_reporting(0);
// ini_set("display_erros", 0);
try{
$db->accessQuery($query="select email, senha from Chaveiro;");

}catch(Exception $e){
    echo($this->e);
};
?>