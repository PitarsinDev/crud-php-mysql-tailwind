<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
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
    
        <div class='flex justify-center'>
            <div class='p-5'>
                <h2 class='text-center text-3xl text-blue-500'>C<span class='text-orange-500'>R</span><span class='text-yellow-500'>U</span><span class='text-green-500'>D</span></h2>
                <div class='bg-orange-500 w-4 h-1 rounded-full'></div>
            </div>
        </div>

    <div class='flex justify-center'>
        <table class='border shadow-md'>
            <tr>
                <th class='border p-2 text-orange-500'>ID</th>
                <th class='border p-2 text-blue-500'>Name</th>
                <th class='border p-2 text-yellow-500'>Age</th>
                <th class='border p-2 text-green-500'>Occupation</th>
                <th class='border p-2 text-indigo-500'>Salary</th>
                <th class='border p-2 text-rose-500'>Action</th>
            </tr>
            <?php
                // Connect to the database
                $conn = new mysqli("localhost", "root", "", "crud_db");

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Fetch and display records
                $result = $conn->query("SELECT * FROM customers");
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td class='border p-2 text-orange-500'>{$row['id']}</td>
                            <td class='border p-2 text-blue-500'>{$row['name']}</td>
                            <td class='border p-2 text-yellow-500'>{$row['age']}</td>
                            <td class='border p-2 text-green-500'>{$row['occupation']}</td>
                            <td class='border p-2 text-indigo-500'>{$row['salary']}</td>
                            <td class='border p-2 flex gap-2'>
                                <a href='edit.php?id={$row['id']}' class='bg-yellow-200 text-yellow-500 shadow-sm px-5 rounded-full'>Edit</a>
                                <a href='delete.php?id={$row['id']}' class='bg-rose-200 text-rose-500 shadow-sm px-5 rounded-full'>Delete</a>
                            </td>
                        </tr>";
                }

                // Close the connection
                $conn->close();
            ?>
        </table>
    </div>

    <div class='pt-10'>
        <h2 class='text-center text-2xl text-orange-500 pb-5'>Add New</h2>
        <div class='flex justify-center'>
            <form action="add.php" method="post">
                <div>
                    <div class='flex justify-center pb-2 text-blue-500'>
                    <label>Name</label>
                    </div>
                    <div class='flex justify-center'>
                    <input type="text" name="name" required class='border border-blue-500 rounded-full px-2 text-zinc-700'>
                    </div>
                </div>
                <br>
                <div>
                    <div class='flex justify-center pb-2 text-yellow-500'>
                    <label>Age</label>
                    </div>
                    <div class='flex justify-center'>
                    <input type="number" name="age" class='border border-yellow-500 rounded-full px-2 text-zinc-700'>
                    </div>
                </div>
                <br>
                <div>
                    <div class='flex justify-center pb-2 text-green-500'>
                    <label>Occupation</label>
                    </div>
                    <div class='flex justify-center'>
                    <input type="text" name="occupation" class='border border-green-500 rounded-full px-2 text-zinc-700'>
                    </div>
                </div>
                <br>
                <div>
                    <div class='flex justify-center pb-2 text-indigo-500'>
                    <label>Salary</label>
                    </div>
                    <div class='flex justify-center'>
                    <input type="number" name="salary" class='border border-indigo-500 rounded-full px-2 text-zinc-700'>
                    </div>
                </div>
                <div class='flex justify-center pt-5'>
                    <button type="submit" class='transition hover:shadow-md text-blue-500 bg-blue-200 px-5 py-1 rounded-full'>Add Data</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>