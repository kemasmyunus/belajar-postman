<?php

include "helper.php";

$connection = getConnection();

$query = "SELECT * FROM list";
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($result);

$connection = null;
?>
