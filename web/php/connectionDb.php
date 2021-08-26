<?php

    class ControllerDb{

        private $host = "ec2-23-21-229-200.compute-1.amazonaws.com";
        private $user = "denibmcnmjikfy";
        private $password  = "18201ee8394165431162a91c26243c1dcf20092899f9d94ad1d8587604e88148";
        private $database = "d4vk0o4kdhima3";
        private $conn;

        function connectDb(){
            $conn = pg_connect($this->host,$this->user,$this->password,$this->database);
            return $conn;
        }
        function construct(){
            $this->conn = $this->connectDb();
        }
        function accessQuery($query){
            $result = pg_query($this->conn,$query);
            while($row=pg_fetch_assoc($result)){
                $resultset[] = $row;
            }
            if(!empty($resultset))
            return $resultset;
        }
    }
?>