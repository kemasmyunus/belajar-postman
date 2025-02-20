<?php

include "helper.php";
$connection = getConnection();
// $todo = $_POST['todo'];
$query = "INSERT INTO list(todo) VALUES ('Kouka')";
$connection->exec($query);
$connection = null;
?>