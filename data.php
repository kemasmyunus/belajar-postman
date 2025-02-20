<?php
include "helper.php";

$connection = getConnection();
$sql = "SELECT * FROM list";
$result = $connection->query($sql);
foreach($result as $row){
    $id = $row['id'];
    $todo = $row['todo'];

    echo "$id. $todo".PHP_EOL;
}

$connection = null;