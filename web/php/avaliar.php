<?php
include_once("query.php");
include_once("logar.php");
$db = new ControllerDb();
$db->connectDb();

function validar($query){
    try{
        $return = pg_query($query);
    if(pg_num_rows($return) == 0){

     echo "<script>window.location.replace('../detalhe-servicos.php'); alert('Avaliação enviada com sucesso!')</script>";
    }
     else{
    throw new Exception("<script>window.location.replace('../detalhe-servicos.php');alert('Por favor, ao mínimo uma estrela')</script>");
    }

    }catch(Exception $e){

    echo die($e->getMessage());

    }}

function mostrarAv(){
    $queryAvaliacao = "select*from Avaliacoes order by random() limit 3;";
    try{
    $result = pg_query($queryAvaliacao);
    
        while($row = pg_fetch_assoc($result)){
            if(!$row['descricao']==""){
                if($row["avaliacoes"] == 5){
                    echo'<div style="margin-top:30px;">                        
                        <form class="estrelas" style="margin: 5px;">
                        <p>'.$row["nomecliente"].'</p>
                        <input type="radio" id="vazio" name="estrela" value="0"> <!--Coloco esse vazio para mostrar uma estrela-->
                        <label for="estrela_um"><i class="fa"></i></label> <!--label serve para se tornar a estrela-->
                        <input type="radio" id="estrela_um" name="estrela" value="1">
                        <label for="estrela_dois"><i class="fa"></i></label>
                        <input type="radio" id="estrela_dois" name="estrela" value="2">
                        <label for="estrela_tres"><i class="fa"></i></label>
                        <input type="radio" id="estrela_tres" name="estrela" value="3">
                        <label for="estrela_quatro"><i class="fa"></i></label>
                        <input type="radio" id="estrela_quatro" name="estrela" value="4">
                        <label for="estrela_cinco"><i class="fa"></i></label>
                        <input type="radio" id="estrela_cinco" name="estrela" value="5" checked><br/>             
                        <p>'.$row["descricao"].'</p></form></div>';

                    }elseif($row['avaliacoes'] == 4){
                        echo '<div style="margin-top:30px;">                        
                        <form class="estrelas" style="margin: 5px;">
                        <p>'.$row["nomecliente"].'</p>
                        <input type="radio" id="vazio" name="estrela" value="0"> <!--Coloco esse vazio para mostrar uma estrela-->
                        <label for="estrela_um"><i class="fa"></i></label> <!--label serve para se tornar a estrela-->
                        <input type="radio" id="estrela_um" name="estrela" value="1">
                        <label for="estrela_dois"><i class="fa"></i></label>
                        <input type="radio" id="estrela_dois" name="estrela" value="2">
                        <label for="estrela_tres"><i class="fa"></i></label>
                        <input type="radio" id="estrela_tres" name="estrela" value="3">
                        <label for="estrela_quatro"><i class="fa"></i></label>
                        <input type="radio" id="estrela_quatro" name="estrela" value="4"checked>
                        <label for="estrela_cinco"><i class="fa"></i></label>
                        <input type="radio" id="estrela_cinco" name="estrela" value="5"><br/>             
                        <p>'.$row["descricao"].'</p></form></div>';

                    }elseif($row['avaliacoes'] == 3){
                        echo '<div style="margin-top:30px;">                        
                        <form class="estrelas" style="margin: 5px;">
                        <p>'.$row["nomecliente"].'</p>
                        <input type="radio" id="vazio" name="estrela" value="0"> <!--Coloco esse vazio para mostrar uma estrela-->
                        <label for="estrela_um"><i class="fa"></i></label> <!--label serve para se tornar a estrela-->
                        <input type="radio" id="estrela_um" name="estrela" value="1">
                        <label for="estrela_dois"><i class="fa"></i></label>
                        <input type="radio" id="estrela_dois" name="estrela" value="2">
                        <label for="estrela_tres"><i class="fa"></i></label>
                        <input type="radio" id="estrela_tres" name="estrela" value="3"checked>
                        <label for="estrela_quatro"><i class="fa"></i></label>
                        <input type="radio" id="estrela_quatro" name="estrela" value="4">
                        <label for="estrela_cinco"><i class="fa"></i></label>
                        <input type="radio" id="estrela_cinco" name="estrela" value="5"><br/>             
                        <p>'.$row["descricao"].'</p></form></div>';

                    }elseif($row['avaliacoes'] == 2){
                        echo '<div style="margin-top:30px;">                        
                        <form class="estrelas" style="margin: 5px;">
                        <p>'.$row["nomecliente"].'</p>
                        <input type="radio" id="vazio" name="estrela" value="0"> <!--Coloco esse vazio para mostrar uma estrela-->
                        <label for="estrela_um"><i class="fa"></i></label> <!--label serve para se tornar a estrela-->
                        <input type="radio" id="estrela_um" name="estrela" value="1">
                        <label for="estrela_dois"><i class="fa"></i></label>
                        <input type="radio" id="estrela_dois" name="estrela" value="2"checked>
                        <label for="estrela_tres"><i class="fa"></i></label>
                        <input type="radio" id="estrela_tres" name="estrela" value="3">
                        <label for="estrela_quatro"><i class="fa"></i></label>
                        <input type="radio" id="estrela_quatro" name="estrela" value="4">
                        <label for="estrela_cinco"><i class="fa"></i></label>
                        <input type="radio" id="estrela_cinco" name="estrela" value="5"><br/>             
                        <p>'.$row["descricao"].'</p></form></div>';

                    }elseif($row['avaliacoes'] == 1){
                        echo '<div style="margin-top:30px;">
                        <form class="estrelas" style="margin: 5px;">
                        <p>'.$row["nomecliente"].'</p>
                        <input type="radio" id="vazio" name="estrela" value="0"> <!--Coloco esse vazio para mostrar uma estrela-->
                        <label for="estrela_um"><i class="fa"></i></label> <!--label serve para se tornar a estrela-->
                        <input type="radio" id="estrela_um" name="estrela" value="1" checked>
                        <label for="estrela_dois"><i class="fa"></i></label>
                        <input type="radio" id="estrela_dois" name="estrela" value="2">
                        <label for="estrela_tres"><i class="fa"></i></label>
                        <input type="radio" id="estrela_tres" name="estrela" value="3">
                        <label for="estrela_quatro"><i class="fa"></i></label>
                        <input type="radio" id="estrela_quatro" name="estrela" value="4">
                        <label for="estrela_cinco"><i class="fa"></i></label>
                        <input type="radio" id="estrela_cinco" name="estrela" value="5"><br/>             
                        <p>'.$row["descricao"].'</p></form></div>';
                    }
            
            } else{
                
                if($row["avaliacoes"] == 5){
                    echo'<div style="margin-top:30px;">                        
                    <form class="estrelas" style="margin: 5px;">
                    <p>'.$row["nomecliente"].'</p>
                    <input type="radio" id="vazio" name="estrela" value="0"> <!--Coloco esse vazio para mostrar uma estrela-->
                    <label for="estrela_um"><i class="fa"></i></label> <!--label serve para se tornar a estrela-->
                    <input type="radio" id="estrela_um" name="estrela" value="1">
                    <label for="estrela_dois"><i class="fa"></i></label>
                    <input type="radio" id="estrela_dois" name="estrela" value="2">
                    <label for="estrela_tres"><i class="fa"></i></label>
                    <input type="radio" id="estrela_tres" name="estrela" value="3">
                    <label for="estrela_quatro"><i class="fa"></i></label>
                    <input type="radio" id="estrela_quatro" name="estrela" value="4">
                    <label for="estrela_cinco"><i class="fa"></i></label>
                    <input type="radio" id="estrela_cinco" name="estrela" value="5" checked><br/>             
                    </form></div>';

                }elseif($row['avaliacoes'] == 4){
                    echo'<div style="margin-top:30px;">
                    <form class="estrelas" style="margin: 5px;">
                    <p>'.$row["nomecliente"].'</p>
                    <input type="radio" id="vazio" name="estrela" value="0"> <!--Coloco esse vazio para mostrar uma estrela-->
                    <label for="estrela_um"><i class="fa"></i></label> <!--label serve para se tornar a estrela-->
                    <input type="radio" id="estrela_um" name="estrela" value="1">
                    <label for="estrela_dois"><i class="fa"></i></label>
                    <input type="radio" id="estrela_dois" name="estrela" value="2">
                    <label for="estrela_tres"><i class="fa"></i></label>
                    <input type="radio" id="estrela_tres" name="estrela" value="3">
                    <label for="estrela_quatro"><i class="fa"></i></label>
                    <input type="radio" id="estrela_quatro" name="estrela" value="4" checked>
                    <label for="estrela_cinco"><i class="fa"></i></label>
                    <input type="radio" id="estrela_cinco" name="estrela" value="5"><br/>             
                    </form></div>';

                }elseif($row['avaliacoes'] == 3){
                    echo'<div style="margin-top:30px;">
                    <form class="estrelas" style="margin: 5px;">
                    <p>'.$row["nomecliente"].'</p>
                    <input type="radio" id="vazio" name="estrela" value="0"> <!--Coloco esse vazio para mostrar uma estrela-->
                    <label for="estrela_um"><i class="fa"></i></label> <!--label serve para se tornar a estrela-->
                    <input type="radio" id="estrela_um" name="estrela" value="1">
                    <label for="estrela_dois"><i class="fa"></i></label>
                    <input type="radio" id="estrela_dois" name="estrela" value="2">
                    <label for="estrela_tres"><i class="fa"></i></label>
                    <input type="radio" id="estrela_tres" name="estrela" value="3" checked>
                    <label for="estrela_quatro"><i class="fa"></i></label>
                    <input type="radio" id="estrela_quatro" name="estrela" value="4">
                    <label for="estrela_cinco"><i class="fa"></i></label>
                    <input type="radio" id="estrela_cinco" name="estrela" value="5" ><br/>             
                    </form></div>';
                }elseif($row['avaliacoes'] == 2){
                    echo'<div style="margin-top:30px;">
                    <form class="estrelas" style="margin: 5px;">
                    <p>'.$row["nomecliente"].'</p>
                    <input type="radio" id="vazio" name="estrela" value="0"> <!--Coloco esse vazio para mostrar uma estrela-->
                    <label for="estrela_um"><i class="fa"></i></label> <!--label serve para se tornar a estrela-->
                    <input type="radio" id="estrela_um" name="estrela" value="1">
                    <label for="estrela_dois"><i class="fa"></i></label>
                    <input type="radio" id="estrela_dois" name="estrela" value="2" checked>
                    <label for="estrela_tres"><i class="fa"></i></label>
                    <input type="radio" id="estrela_tres" name="estrela" value="3">
                    <label for="estrela_quatro"><i class="fa"></i></label>
                    <input type="radio" id="estrela_quatro" name="estrela" value="4">
                    <label for="estrela_cinco"><i class="fa"></i></label>
                    <input type="radio" id="estrela_cinco" name="estrela" value="5"><br/>             
                    </form></div>';

                }elseif($row['avaliacoes'] == 1){
                    echo'<div style="margin-top:30px;">
                    <form class="estrelas" style="margin: 5px;">
                    <p>'.$row["nomecliente"].'</p>
                    <input type="radio" id="vazio" name="estrela" value="0"> <!--Coloco esse vazio para mostrar uma estrela-->
                    <label for="estrela_um"><i class="fa"></i></label> <!--label serve para se tornar a estrela-->
                    <input type="radio" id="estrela_um" name="estrela" value="1" checked>
                    <label for="estrela_dois"><i class="fa"></i></label>
                    <input type="radio" id="estrela_dois" name="estrela" value="2">
                    <label for="estrela_tres"><i class="fa"></i></label>
                    <input type="radio" id="estrela_tres" name="estrela" value="3">
                    <label for="estrela_quatro"><i class="fa"></i></label>
                    <input type="radio" id="estrela_quatro" name="estrela" value="4">
                    <label for="estrela_cinco"><i class="fa"></i></label>
                    <input type="radio" id="estrela_cinco" name="estrela" value="5"><br/>             
                    </form></div>';
                }
            }
        }
    }catch(Exception $e){
        
    }
}


if(isset($_POST["btnEstrela"])){
    if(isset($_SESSION["usuario"])){   
    $mensagem = $_POST["Mensagem"];
    $estrela = $_POST["estrela"];
    $name = $_SESSION["usuario"];

    $query = "insert into Avaliacoes(nomeCliente, avaliacoes, descricao) values('$name','$estrela', '$mensagem');";
    validar($query); 
    }
    else{
        echo "<script>window.location.replace('../cadastro.php'); alert('Inicie uma sessão para avaliar!');</script>";
    }
} else{
    echo "<script>window.location.replace('../cadastro.php') alert('Inicie uma sessão para avaliar!');</script>";

}
?>