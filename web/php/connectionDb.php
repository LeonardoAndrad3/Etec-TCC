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
        function accessQuery($query){
            $result = pg_query($query);
            while($row=pg_fetch_assoc($result)){
                echo $row['email']."<br>";
            }
            if(!empty($resultset))
            return $resultset;
        }
    }
?>