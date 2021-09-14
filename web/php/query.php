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
                throw new Exception("<script>window.location.replace('../cadastro.php');alert('Email ou senha incorretos!');</script>');"); 

        }}catch(Exception $e){
            echo die($e->getMessage());
        }
    }    
    
    function cadastrar($query, $vEmail, $vCpf){
      try{
            $validarE = pg_query($vEmail);
            $validarC = pg_query($vCpf);

            if(pg_num_rows($validarE) === 0){

            }else{
                throw new Exception('<script>window.location.replace("../cadastro.php");alert("Email já cadastrado, tente outro");</script>');
            }

            if(pg_num_rows($validarC) === 0){

            } else{
                throw new Exception('<script>window.location.replace("../cadastro.php");alert("CPF já cadastrado, tente outro");</script>');
            }
    
            if($result = pg_query($query)){
                // echo '<script>window.location.replace("../index.php");
                // alert("Usuário cadastrado com sucesso!");</script>';
            } else{
            //     throw new Exception('<script>window.location.replace("../cadastro.php");alert("Fala ao cadastrar!");</script>');
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
    
    function validarCPF($cpf){
        // Função para validar cpf
        // fonte: https://gist.github.com/rafael-neri/ab3e58803a08cb4def059fce4e3c0e40

        //Extraindo os números
        $cpf =  preg_replace('/[^0-9]/is', '', $cpf);

        try{
            //Verifica se foi digitado corretamente
            if(strlen($cpf) != 11){
                throw new Exception('<script>window.location.replace("../cadastro.php");alert("CPF inválido");</script>');   
            }

            //verifica se foir informada um sequência de digitos repet
            if(preg_match('/(\d)\1{10}', $cpf)){
                throw new Exception('<script>window.location.replace("../cadastro.php");alert("CPF inválido");</script>');   
            }

            //faz o calculo para validar o cpf

            for($t = 9; $t < 11; $t++){
                for($d = 0, $c = 0; $c < $t; $c++){
                    $d += $cpf[$c] * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) %10;
                if ($cpf[$c] != $d){
                    throw new Exception('<script>window.location.replace("../cadastro.php");alert("CPF inválido");</script>'); 
                }

            }
        }catch(Exception $e){
            echo die($e->getMessage());
        }
        
    // fazendo a vefiricação do cpf
    }

    function validarEmail($email){
        try{
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            } else {
                throw new Exception('<script>window.location.replace("../cadastro.php");alert("E-mail inválido");</script>');
            }
        }catch(Exception $e){
            echo die($e->getMessage());
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

    if(!empty(addslashes($_POST['txtPagamentoC'])) && !empty(addslashes($_POST['txtPagamentoD']))){
        
        $pagamento = addslashes($_POST['txtPagamentoC']) ." ou ". addslashes($_POST['txtPagamentoD']);

    } elseif(!empty(addslashes($_POST['txtPagamentoC'])) || !empty(addslashes($_POST['txtPagamentoD']))){

        $pagamento = addslashes($_POST['txtPagamentoC']) . addslashes($_POST['txtPagamentoD']);

    }
    
    //Verificando se os campos estão vazios.

    $name = addslashes($_POST['txtName']);
    $db->validarEmail($email = addslashes($_POST['txtEmailCadastro']));
    $senha = md5(addslashes($_POST['txtSenhaCadastro']));
    $senhaConfirma = md5(addslashes($_POST['txtSenhaConf']));
     // Fazendo a criptografia das senhas
    $db->validarCPF($cpf = addslashes($_POST['txtCpf']));
    $dataN = addslashes($_POST['txtDataNascimento']);
    $cep =  addslashes($_POST['txtCep']);
    $tel = addslashes($_POST['txtTelefone']);
    $descricao;

    if(!empty(addslashes($_POST['txtEspecialidade']))){
    $especialidade = addslashes($_POST['txtEspecialidade']);
    } else{   
       
    }

    // $especialidade = [];
    // $especialidade['prof'] = $_POST["profissao"];
    // print_r($especialidade);
        
    if ($senha == $senhaConfirma) {
        $db->cadastrar(
            $query="insert into Chaveiro(nome, email, especialidade, telefone, cpf, cep, descricao, senha, dataDeNascimento, pagamento)
            values('$name','$email','$especialidade','$tel','$cpf','$cep','$descricao','$senha','$dataN','$pagamento');", $vEmail="select email from Cliente where email='$email';", $vCpf="select cpf from Cliente where cpf='$cpf';");  
            } else {
            echo '<script>window.location.replace("../index.php");
            alert("Senhas não conferem!");</script>';
        };
        
} elseif(isset($_POST['btnCadastrarCliente'])){
    
    $name = addslashes($_POST['txtName']);
    $db->validarEmail($email = addslashes($_POST['txtEmailCadastro']));
    $senha = md5(addslashes($_POST['txtSenhaCadastro']));
    $senhaConfirma  = md5($_POST['txtSenhaConf']);
    // Fazendo a criptografia das senhas
    $db->validarCPF($cpf = addslashes($_POST['txtCpf']));
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
    // Fazendo a criptografia para entrar corretamente

    // error_reporting(0);
    // ini_set("display_erros", 0);
    $db->logar($query="select email, senha from Cliente where email='$email' and senha='$senha';");
};

// Esse código foi feito para quando aperter certo button, ele irá corresponder 
// com o valor do button, assim não preciso criar pastas diferentes;

?>