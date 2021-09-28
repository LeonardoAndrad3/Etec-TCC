<?php
include_once("query.php");
$db = new ControllerDb();
$db->connectDb();

$estrela = $_POST["estrela"];
$query = "insert into Avaliacoes(avaliacoes) values($estrela);";

try{
    if($estrela != 0){
        if($return = pg_query($query)){
        echo "<script>window.location.replace('../index.php'); alert('Avaliação enviada com sucesso!')</script>";
    } else {
        throw new Exception("<script>window.location.replace('../detalhe-servicos.php');alert('Ops!')</script>");
    }} else{
        throw new Exception("<script>window.location.replace('../detalhe-servicos.php');alert('Por favor, ao mínimo uma estrela')</script>");
    }

}catch(Exception $e){
    echo die($e->getMessage());
}


?>