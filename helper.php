<?php

function getConnection(){
    try{
        $host = "localhost";
        $port = 3306;
        $database = "db_catatanlist";
        $username = "root";
        $password = "";
        return new PDO("mysql:host=$host;port=$port;dbname=$database", $username, $password);
    }catch(PDOException $exception){
        handleError($exception->getMessage());
    }
}

function handleError($message) {
    echo "WADUH ERROR, NIH ERRORNYA : " . $message . PHP_EOL;
    exit;
}

