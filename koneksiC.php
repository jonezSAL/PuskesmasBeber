<?php
// Your database connection code goes here

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $nama = $_POST["nama"];
    $nik = $_POST["nik"];
    $tgl_lahir = $_POST["tgl_lahir"];
    $status = $_POST["status"];
    $alamat = $_POST["alamat"];
    $keluhan = $_POST["keluhan"];

    // Generate a unique queue number
    $queueNumber = generateQueueNumber();

    // Insert data into the database along with the queue number
    $sql = "INSERT INTO pasien (nama, nik, tgl_lahir, status, alamat, keluhan, queue_number) VALUES ('$nama', '$nik', '$tgl_lahir', '$status', '$alamat', '$keluhan', '$queueNumber')";

    if (mysqli_query($conn, $sql)) {
        echo "Registration successful. Your queue number is: $queueNumber";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}

// Function to generate a unique queue number (you can customize this)
function generateQueueNumber() {
    // You can use a combination of date, time, and a random number for uniqueness
    $timestamp = time();
    $randomNumber = mt_rand(1000, 9999);
    $queueNumber = "Q" . date("YmdHis", $timestamp) . $randomNumber;

    return $queueNumber;
}
?>
