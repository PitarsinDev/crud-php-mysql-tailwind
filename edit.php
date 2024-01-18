<?php
$conn = new mysqli("localhost", "root", "", "crud_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];

    $result = $conn->query("SELECT * FROM customers WHERE id = $id");
    $row = $result->fetch_assoc();

    // Check if the result is not empty before processing
    if ($row) {
        echo "<h1 class='text-orange-500 text-center p-5 text-2xl'>Edit Data</h1>";
        echo "<div>";
        echo "<form action='edit.php' method='post'>
                <input type='hidden' name='id' value='{$row['id']}'>
                <div>
                    <div class='flex justify-center pb-2 text-blue-500'>
                    <label>Name</label>
                    </div>
                    <div class='flex justify-center'>
                    <input type='text' name='name' value='{$row['name']}' required class='border border-blue-600 rounded-full px-2 text-zinc-700'>
                    </div>
                </div>
                <br>
                <div>
                    <div class='flex justify-center pb-2 text-yellow-500'>
                    <label>Age</label>
                    </div>
                    <div class='flex justify-center'>
                    <input type='number' name='age' value='{$row['age']}' class='border border-yellow-600 rounded-full px-2 text-zinc-700'>
                    </div>
                </div>
                <br>
                <div>
                    <div class='flex justify-center pb-2 text-rose-500'>
                    <label>Occupation</label>
                    </div>
                    <div class='flex justify-center'>
                    <input type='text' name='occupation' value='{$row['occupation']}' class='border border-rose-600 rounded-full px-2 text-zinc-700'>
                    </div>
                </div>
                <br>
                <div>
                    <div class='flex justify-center pb-2 text-indigo-500'>
                    <label>Salary</label>
                    </div>
                    <div class='flex justify-center'>
                    <input type='number' name='salary' value='{$row['salary']}' class='border border-indigo-600 rounded-full px-2 text-zinc-700'>
                    </div>
                </div>
                <br>
                <div class='flex justify-center'> 
                <button type='submit' name='update' class='text-green-500 bg-green-200 px-5 py-1 rounded-full shadow-md'>Update Customer</button>
                </div>
            </form>";
        echo "<div>";

    } else {
        echo "Record not found.";
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $occupation = $_POST['occupation'];
    $salary = $_POST['salary'];

    $sql = "UPDATE customers SET name='$name', age=$age, occupation='$occupation', salary=$salary WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit CRUD</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <style>
        *{
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body>
</body>
</html>