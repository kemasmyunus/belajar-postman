<?php

include "helper.php";

$connection = getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $query = "DELETE FROM list WHERE id = :id";
        $statement = $connection->prepare($query);
        $statement->bindParam(':id', $id);
        if ($statement->execute()) {
            echo "Data successfully deleted.";
        } else {
            handleError("Failed to delete data.");
        }
    } else {
        handleError("No 'id' field in POST data.");
    }
} else {
    handleError("Invalid request method.");
}

$connection = null;
?>
