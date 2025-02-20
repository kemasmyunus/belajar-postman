<?php

function getConnection(){
    
    try{
        $host = "localhost";
        $port = 3306;
        $database = "db_catatanlist";
        $username = "root";
        $password = "";
        return new PDO("mysql:host=$host:$port;dbname=$database",$username,$password);
    }catch(PDOException $exception){
        echo "WADUH ERROR, NIH ERRORNYA : ".$exception->getMessage().PHP_EOL;
    }
}

