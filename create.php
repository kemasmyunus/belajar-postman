<?php

include "helper.php";

$connection = getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['todo'])) {
        $todo = $_POST['todo'];
        $query = "INSERT INTO list(todo) VALUES (:todo)";
        $statement = $connection->prepare($query);
        $statement->bindParam(':todo', $todo);
        if ($statement->execute()) {
            echo "Data successfully inserted.";
        } else {
            handleError("Failed to insert data.");
        }
    } else {
        handleError("No 'todo' field in POST data.");
    }
} else {
    handleError("Invalid request method.");
}

$connection = null;
?>