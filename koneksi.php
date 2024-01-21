<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "Beber";

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $nik = $_POST["nik"];
    $tgl_lahir = $_POST["tgl_lahir"];
    $status = $_POST["status"];
    $alamat = $_POST["alamat"];
    $keluhan = $_POST["keluhan"];

    // Perform your SQL query to insert data into the database
    $sql = "INSERT INTO patients (nama, nik, tgl_lahir, status, alamat, keluhan)
            VALUES ('$nama', '$nik', '$tgl_lahir', '$status', '$alamat', '$keluhan')";

    // Execute the SQL query
    if ($conn->query($sql) === TRUE) {
        echo "";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Sudah Mendaftar di Puskesmas Beber</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(to right, #3498db, #2c3e50);
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .fullscreen-container {
            text-align: center;
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
            animation: fadeIn 1s ease-in-out;
        }

        h1 {
            color: #3498db;
            margin-bottom: 20px;
        }

        .button-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 30px;
        }

        .button {
            padding: 15px 30px;
            font-size: 18px;
            text-align: center;
            text-decoration: none;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            outline: none;
        }

        .button-cari {
            background: linear-gradient(to right, #27ae60, #2ecc71);
            margin-right: 10px;
        }

        .button-back {
            background: linear-gradient(to right, #e74c3c, #c0392b);
        }

        .button:hover {
            filter: brightness(1.2);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
    </style>
</head>
<body>

<div class="fullscreen-container">
    <h1>Selamat Sudah Mendaftar di Puskesmas Beber</h1>

    <div class="button-container">
        <a class="button button-cari" href="cari.php">Cari</a>
        <a class="button button-back" href="index.html">Back to Home</a>
    </div>
</div>

</body>
</html>

