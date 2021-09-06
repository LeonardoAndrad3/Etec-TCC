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
    
    function logar($query){
        session_start();

        try{$result = pg_query($query);
            if(pg_num_rows($result) > 0){
                $_SESSION["msg"] = '<script>window.location.replace("../index.php");alert("logado com sucesso!");</script>';
                echo $_SESSION["msg"];
            } else{
                throw new Exception("<script>window.location.replace('../index.php');alert('Ops, ocorreu um erro. Tente novamente mais tarde!');</script>');");
                
                $_SESSION["msgErr"] ='<script>window.location.replace("../cadastro.php");
                alert("Email ou senha incorretos!");</script>'; 
                echo $_SESSION["msgErr"];   

        }}catch(Exception $e){
            echo die($e->getMessage());
        }
    }    
    
    function cadastrar($query, $vEmail, $vCpf){
      try{

        if(!$validarE = pg_query($vEmail)){
        }else{
            throw new Exception('<script>window.location.replace("../index.php");alert("Email já cadastrado, tente outro");</script>', 1);
            
        }
        if(!$validarC = pg_query($vCpf)){
        } else{
            throw new Exception('<script>window.location.replace("../index.php");alert("CPF já cadastrado, tente outro");</script>', 2);
            
        }
    
        $result = pg_query($query);
 
        if(pg_num_rows($result) > 0){
           
            echo '<script>window.location.replace("../index.php");
            alert("Usuário cadastrado com sucesso!");</script>';
        } else{
            throw new Exception('<script>window.location.replace("../index.php");alert("Fala ao cadastrar!");</script>');
        }
      }catch(Exception $e){
        echo die($e->getMessage());
      }
    }   
    
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
}

$db = new ControllerDb();
$db->connectDb();

if(isset($_POST['btnCadastrarChaveiro'])){  
    
    if(!empty($_POST['txtDescricao'])){
        $descricao = addslashes($_POST['txtDescricao']);
    } else {
        $descricao = "Chaveiro pronto a serviço!";
    }

    // if(!empty($_POST['txtPagamentoD']) && !empty($_POST['txtPagamentoC'])){
    //     $pagamento = $_POST['txtPagamentoD']."".$_POST['txtPagamentoC'];
    // } elseif(!empty($_POST['txtPagamentoD'])){
    //     $pagamento = $_POST['txtPagamentoD'];
    // } elseif(!empty($_POST['txtPagamentoC'])){
    //     $pagamento = $_POST['txtPagamentoC'];
    // } else{

    // }

    //Verificando se os campos estão vazios.

    $name = addslashes($_POST['txtName']);
    $email = addslashes($_POST['txtEmailCadastro']);
    $senha = md5(addslashes($_POST['txtSenhaCadastro']));
    $cpf = addslashes($_POST['cpf']);
    $dataN = addslashes($_POST['txtDataNascimento']);
    $cep =  addslashes($_POST['txtCep']);
    $tel = addslashes($_POST['txtTelefone']);
    $descricao;
    $especialidade = addslashes($_POST['txtEspecialidade']);
    $pagamento = addslashes($_POST['txtPagamento']);
        
    $db->cadastrar(
    $query="insert into Chaveiro(nome, email, especialidade, telefone, cpf, cep, descricao, senha, dataDeNascimento, pagamento)
    values('$name','$email','$especialidade','$tel','$cpf','$cep','$descricao',$senha,'$dataN','$pagamento');", $vEmail="select email from Cliente where email='$email';", $vCpf="select cpf from Cliente where cpf='$cpf';");  

} elseif(isset($_POST['btnCadastrarCliente'])){
    
    $name = addslashes($_POST['txtName']);
    $email = addslashes($_POST['txtEmailCadastro']);
    //remove os caracteres ilegais, caso tenha
    $senha = md5(addslashes($_POST['txtSenhaCadastro']));
    $senhaConfirma  = md5($_POST['txtSenhaConf']);
    $cpf = addslashes($_POST['txtCpf']);
    $dataN = addslashes($_POST['txtDataNascimento']);
    $tel = addslashes($_POST['txtTelefone']);

    if ($senha == $senhaConfirma) {
    $db->cadastrar(
    $query="insert into Cliente(nome, email, telefone, cpf, senha, datadenascimento) 
    values('$name', '$email','$tel','$cpf','$senha','$dataN');", $vEmail="select email from Cliente where email='$email';", $vCpf="select cpf from Cliente where cpf='$cpf';");
    } else {
        echo '<script>window.location.replace("../index.php");
        alert("Senhas não conferem!");</script>';
    };

} elseif(isset($_POST['btnLogin'])){           

    $email = addslashes($_POST["txtEmailLogin"]);
    $senha = md5(addslashes($_POST["txtSenhaLogin"]));
    // error_reporting(0);
    // ini_set("display_erros", 0);
    $db->logar($query="select email, senha from Cliente where email='$email' and senha='$senha';");
};

// Esse código foi feito para quando aperter certo button, ele irá corresponder 
// com o valor do button, assim não preciso criar pastas diferentes;

?>