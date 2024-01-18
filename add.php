<?php
    $conn = new mysqli("localhost", "root", "", "crud_db");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $name = $_POST['name'];
    $age = $_POST['age'];
    $occupation = $_POST['occupation'];
    $salary = $_POST['salary'];

    $sql = "INSERT INTO customers (name, age, occupation, salary) VALUES ('$name', $age, '$occupation', $salary)";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>