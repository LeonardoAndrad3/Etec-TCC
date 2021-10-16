<?php

function chaveiroServico(){

    
    try{
        $result = pg_query("SELECT * FROM chaveiro");
        if (!$result) {
            echo "Ocorreu um erro.\n";
            exit;
        }

        while ($row = pg_fetch_assoc($result)) {
            if ($row['celular'] == "") {
            
            echo " 
            <ul class='blocos-chaveiros' id='blocos-chaveiros'> 
            <li><h4>".$row['nome']."</h4></li>
            <li><p maxlength='168'>".$row['descricao']."</p></li>
            <li><p>Funções: ".$row['especialidade']."</p></li>
            <li><p>Formas de pagamento: ".$row['pagamento']." </p></li>
            <li><p>Telefone: ".$row['telefone']." </p></li>
            <li><a class='mais-info-bloco' href='detalhe-servicos.php?id={$row['id']}'>Clique aqui para mais informações</a></li>
            </ul>"; 
           }
           else {
            echo " 
            <ul class='blocos-chaveiros' id='blocos-chaveiros'> 
            <li><h4>".$row['nome']."</h4></li>
            <li><p maxlength='168'>".$row['descricao']."</p></li>
            <li><p>Funções: ".$row['especialidade']."</p></li>
            <li><p>Formas de pagamento: ".$row['pagamento']." </p></li>
            <li><p>Telefone: ".$row['telefone']." </p></li>
            <li><a class='mais-info-bloco' href='detalhe-servicos.php?id={$row['id']}'>Clique aqui para mais informações</a></li>
            <li class='linha-botao-bloco'><a class='botao-maior' href='https://api.whatsapp.com/send?phone=55".$row['celular']."'>Contate via WhatsApp</a><br/></li>
            </ul>"; 
            
           }
        } 
    }
    catch(Exception $e){
        return die($e);
    }
}


?>