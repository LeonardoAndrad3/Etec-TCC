<?php

include("query.php");
$db = new ControllerDb();
$db->connectDb();

function profissao(){
    try{
        $result = pg_query('select nome from Profissao;');
        if(pg_num_rows($result)>0){
            while($row=pg_fetch_assoc($result)){
            echo "<option value=".$row['nome'].">";
            echo str_replace("_", " ", $row['nome']."</option>");
            }
        }
    }
    catch(Exception $e){
        return die($e);
    }
}

function profissaoCheck(){
    try{
        $result = pg_query('select nome from Profissao;');
        if(pg_num_rows($result)>0){
            while($row=pg_fetch_assoc($result)){
            echo str_replace("_", " ", "<p id='myInput'>".$row['nome']);
            echo "<input type='checkbox' id='myInput' name='profissao[]' value=".$row['nome']. " /></p>";
            }
        }
}catch(Exception $e){
        return die($e);
    }
}


?>