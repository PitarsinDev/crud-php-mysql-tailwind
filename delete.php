<?php
    $conn = new mysqli("localhost", "root", "", "crud_db");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "DELETE FROM customers WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            header("Location: index.php");
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }

    $conn->close();
?>