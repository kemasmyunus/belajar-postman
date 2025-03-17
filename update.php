<?php

include "helper.php";

$connection = getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id']) && isset($_POST['todo'])) {
        $id = $_POST['id'];
        $todo = $_POST['todo'];
        $query = "UPDATE list SET todo = :todo WHERE id = :id";
        $statement = $connection->prepare($query);
        $statement->bindParam(':id', $id);
        $statement->bindParam(':todo', $todo);
        if ($statement->execute()) {
            echo "Data successfully updated.";
        } else {
            handleError("Failed to update data.");
        }
    } else {
        handleError("No 'id' or 'todo' field in POST data.");
    }
} else {
    handleError("Invalid request method.");
}

$connection = null;
?>
