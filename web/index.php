<?php
    include_once ("index.html");
    $db = new ControllerDb();
    if($connetion= pg_connect(connectDb())){
        echo("Foi");
        pg_close($connetion);
    } else{
        echo("Não foi cara!");
    }
?>