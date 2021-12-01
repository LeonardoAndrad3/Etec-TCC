<?php
require_once("logar.php");
require_once("detalhesChaveiroServico.php");
require_once("modal.php");

function req(){

    if(isset($_GET['id'])) {
        $idC = pg_escape_string($_GET['id']);
        $postg = "SELECT * FROM chaveiro WHERE id = '$idC' ";
        $result = pg_query($postg) ;
        $row = pg_fetch_array($result);
        
        return $GLOBALS['id'] = $row['id'];
    } 
}
//novo

function validar($query){
    try{
  
    if(!pg_query($query)){
        throw new Exception("
        <script>
            iniciaModal('modal-erro-geral');
            modal.back();
        <script>");
    }
    else{
        echo "
        <script>
            iniciaModal('modal-sucesso-avaliacao');
            modal.back();
        </script>";    
    }

    }catch(Exception $e){
        echo die($e->getMessage());

    }}

function mostrarAvaliacao(){
    req(); 
    $_SESSION["id"] = $GLOBALS['id'];
    //Novo

    try{ 
        $queryAvaliacao = "select * from Avaliacoes where idchaveiro=".$GLOBALS['id']." order by random() limit 3;" or die ("Sem avaliações");
    
    if(pg_query($queryAvaliacao)){

        $result=pg_query($queryAvaliacao);
        
        while($row = pg_fetch_assoc($result)){

            if(!$row['descricao']==""){
                $dataA = $row["data"];
                $dataA = date('d/m/Y', strtotime($dataA));
                if($row["avaliacoes"] == 5){
                    echo'<div style="margin-top:30px;">                        
                        <form class="estrelas" style="margin: 5px;">
                        <p>'.$row["nomecliente"]." ".$dataA.'</p>
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
                        <p>'.$row["nomecliente"]." ".$dataA.'</p>
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
                        <p>'.$row["nomecliente"]." ".$dataA.'</p>
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
                        <p>'.$row["nomecliente"]." ".$dataA.'</p>
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
                        <p>'.$row["nomecliente"]." ".$dataA.'</p>
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
                    <p>'.$row["nomecliente"]." ".$dataA.'</p>
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
                    <p>'.$row["nomecliente"]." ".$dataA.'</p>
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
                    <p>'.$row["nomecliente"]." ".$dataA.'</p>
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
                    <p>'.$row["nomecliente"]." ".$dataA.'</p>
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
                    <p>'.$row["nomecliente"]."  ".$dataA.'</p>
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
    }
    }catch(Exception $err){
        return die($err);
    } 
}
if(isset($_POST["btnEstrela"])){
    if(isset($_SESSION["usuario"])){
        $mensagem = $_POST["Mensagem"];
        $estrela = $_POST["estrela"];
        $name = $_SESSION["usuario"];
    if(!$estrela == 0){ 
        $query = "insert into Avaliacoes(idchaveiro, nomeCliente, avaliacoes, descricao) values('".$_SESSION['id']."', '$name', '$estrela', '$mensagem');";
        validar($query); 
    } else {
        echo("
            <script>
            iniciaModal('modal-erro-estrela')
            modal.back();
        </script>");
    }

    }else{
        echo('
        <script>
            iniciaModal("modal-iniciar-session");
            modal.cadastro();
        </script>');
    }
} 
?>