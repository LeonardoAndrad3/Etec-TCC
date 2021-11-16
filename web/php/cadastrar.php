<?php
include_once("modal.php");
include_once("query.php");
$db = new ControllerDb();
$db->connectDb();
    
function cadastrar($query, $vEmail, $vCpf){
    try{
          $validarE = pg_query($vEmail);
          $validarC = pg_query($vCpf);

          if(pg_num_rows($validarE) === 0){

          }else{
              throw new Exception('
              <script>
              iniciaModal("modal-existe-email");
              modal.back();
              </script>');
          }

          if(pg_num_rows($validarC) === 0){

          } else{
              throw new Exception('
              <script>
              iniciaModal("modal-existe-cpf");
              modal.back();
              </script>');
          }
  
          if($result = pg_query($query)){
              echo '
              <script>
              iniciaModal("modal-cadastro");
              modal.principal();
              </script>';
          } else{
              throw new Exception('<script>window.location.replace("../cadastro.php");alert("Fala ao cadastrar!");</script>');
          }
      }catch(Exception $e){
          echo die($e->getMessage());
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
            throw new Exception('
            <script>
            iniciaModal("modal-invalide-cpf");
            modal.back();

            </script>');   
        }

        //faz o calculo para validar o cpf
        for($t = 9; $t < 11; $t++){
            for($d = 0, $c = 0; $c < $t; $c++){
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) %10;
            if ($cpf[$c] != $d){
                throw new Exception('
                <script>
                iniciaModal("modal-invalide-cpf");
                modal.back();
                
                </script>'); 
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
            throw new Exception('
            <script>
            iniciaModal("modal-invalide-email");
            modal.back();
            </script>');
        }
    }catch(Exception $e){
        echo die($e->getMessage());
    }
}

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

    // Verificando se os campos estão vazios.
    $name = addslashes($_POST['txtName']);
    validarEmail($email = addslashes($_POST['txtEmailCadastro']));
    $senha = md5(addslashes($_POST['txtSenhaCadastro']));
    $senhaConfirma = md5(addslashes($_POST['txtSenhaConf']));
     // Fazendo a criptografia das senhas
    validarCPF($cpf = addslashes($_POST['txtCpf']));
    $dataN = addslashes($_POST['txtDataNascimento']);
    $cep =  addslashes($_POST['txtCep']);
    $tel = addslashes($_POST['txtTelefone']);
    $cel = addslashes($_POST['txtCelular']);
    $descricao;
    
    if(addslashes($_POST['txtEspecialidade']) != 3){
        $especialidade = addslashes($_POST['txtEspecialidade']);
        // print_r($especialidade);
    } else{   
        $arrayProfissao = [];
        $arrayProfissao['prof'] = $_POST["profissao"];
        $especialidade = implode(", ", $arrayProfissao['prof']); 
        // print_r($especialidade);   
    }
    // if para inserir mais de uma profissao ao chaveiro, coloquei ela em um 
    // array para pegar todos os dados da tela cadastro.php
            
    if ($senha == $senhaConfirma) {
        cadastrar(
            $query="insert into Chaveiro(nome, email, especialidade, telefone, cpf, cep, descricao, senha, dataDeNascimento, pagamento, celular)
            values('$name','$email','$especialidade','$tel','$cpf','$cep','$descricao','$senha','$dataN','$pagamento', '$cel');", $vEmail="select email from Cliente where email='$email';", $vCpf="select cpf from Cliente where cpf='$cpf';");  
    } else {
            echo'
            <script>
            iniciaModal("modal-erro-senha");
            modal.back();
            </script>';
    };
        
} elseif(isset($_POST['btnCadastrarCliente'])){
    
    $name = addslashes($_POST['txtName']);
    validarEmail($email = addslashes($_POST['txtEmailCadastro']));
    $senha = md5(addslashes($_POST['txtSenhaCadastro']));
    $senhaConfirma  = md5($_POST['txtSenhaConf']);
    // Fazendo a criptografia das senhas
    validarCPF($cpf = addslashes($_POST['txtCpf']));
    $dataN = addslashes($_POST['txtDataNascimento']);
    $tel = addslashes($_POST['txtTelefone']);

    if ($senha == $senhaConfirma) {
        cadastrar(
        $query="insert into Cliente(nome, email, telefone, cpf, senha, datadenascimento) 
        values('$name', '$email','$tel','$cpf','$senha','$dataN');", $vEmail="select email from Cliente where email='$email';", $vCpf="select cpf from Cliente where cpf='$cpf';");
    } else {
        echo'
        <script>
        iniciaModal("modal-erro-senha");
        modal.back();
        </script>';
    };

} 
?>