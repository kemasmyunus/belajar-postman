<?php

require_once('helper.php');

$todo = $_POST['todo'];
$query = "INSERT INTO list(todo) VALUES ('$todo')";
$sql = mysqli_query($db_connect, $query);

if($sql){
    echo json_encode(array('message' => 'created!')); 
}else{
    echo json_encode(array('message' => 'error!')); 
}

?>