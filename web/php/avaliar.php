<?php
include_once("query.php");
$db = new ControllerDb();
$db->connectDb();



function validar($query){
    $mensagem = $_POST["Mensagem"];
    $estrela = $_POST["estrela"];

    $query = "insert into Avaliacoes(avaliacoes, descricao) values($estrela, $mensagem);";
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

    }}

function mostrarAv(){
    $queryAvaliacao = "select avaliacoes, descricao from Avaliacoes limit 3;";
    try{
    $result = pg_query($queryAvaliacao);

        while($row = pg_fetch_assoc($result)){
            echo "<li><p>".$row['avaliacoes']."</p></li>";
            echo "<li><p>".$row['descricao']."</p></li>";
        }
    }catch(Exception $e){

    }
}

if(!isset($_POST["btnEstrela"])){
    $query = "insert into Avaliacoes(avaliacoes, descricao) values($estrela, $mensagem);";
    validar($query);
} else{
    
}
?>