<?php
$row = array('nik' => '', 'nama' => '', 'alamat' => '', 'keluhan' => '', 'id' => ''); // Initialize with empty values

if(isset($_POST['search'])){
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "Beber";

    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $nik = $_POST['nik'];

    $query = "SELECT nik, nama, alamat, keluhan, id FROM patients WHERE nik = '$nik'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<h2>Search Result:</h2>";

        // Tabel untuk menampilkan data
        echo "<div class='table-container'>";
        echo "<table class='styled-table'>";
        echo "<thead><tr><th>NIK</th><th>Nama</th><th>Alamat</th><th>Keluhan</th></tr></thead>";
        echo "<tbody>";
        echo "<tr>";
        echo "<td>" . $row['nik'] . "</td>";
        echo "<td>" . $row['nama'] . "</td>";
        echo "<td>" . $row['alamat'] . "</td>";
        echo "<td>" . $row['keluhan'] . "</td>";
        echo "</tr>";
        echo "</tbody>";
        echo "</table>";

        // Tabel untuk menampilkan id
        echo "<table class='styled-table'>";
        echo "<thead><tr><th>ID</th></tr></thead>";
        echo "<tbody>";
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "</tr>";
        echo "</tbody>";
        echo "</table>";
        echo "</div>";

        echo "<div style='text-align: center;'>"; // Posisikan QR code di tengah
        echo "<button id='generateQR'>Generate QR Code</button>";
        echo "<div id='qrcode'></div>";
        echo "<a id='downloadLink' style='display: none;'>Download QR Code</a>"; // Added download link
        echo "</div>";
    } else {
        echo "<p>Data not found</p>";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Patients</title>
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
    <link rel="stylesheet" href="bodyCr.css">
</head>

<body>
    <h2>Search Patients</h2>
    <form method="POST" action="">
        <label for="nik">NIK:</label>
        <input type="text" name="nik" id="nik" required>
        <button type="submit" name="search">Search</button>
    </form>


    <script>
    document.getElementById('generateQR').addEventListener('click', function () {
        <?php if(!empty($row['nik'])) : ?>
            var patientData = {
                nik: '<?php echo $row['nik']; ?>',
                nama: '<?php echo $row['nama']; ?>',
                alamat: '<?php echo $row['alamat']; ?>',
                keluhan: '<?php echo $row['keluhan']; ?>',
                id: '<?php echo $row['id']; ?>'
            };

            // Remove the existing QR code container if it exists
            var existingQRCode = document.getElementById('qrcode');
            if (existingQRCode) {
                existingQRCode.parentNode.removeChild(existingQRCode);
            }

            // Create a new QR code container
            var qrcodeElement = document.createElement('div');
            qrcodeElement.id = 'qrcode';
            qrcodeElement.style.display = 'block'; // Show the QR code
            qrcodeElement.style.width = '500px'; // Set the width to 500px
            qrcodeElement.style.height = '500px'; // Set the height to 500px
            qrcodeElement.style.margin = 'auto'; // Center the element

            // Append the QR code container to the body
            document.body.appendChild(qrcodeElement);

            // Generate QR Code
            var qrcode = new QRCode(qrcodeElement, {
                text: JSON.stringify(patientData),
                width: 500, // Set the width to 500px
                height: 500 // Set the height to 500px
            });

            // Show download link
            var downloadLink = document.getElementById('downloadLink');
            downloadLink.style.display = 'block';
            downloadLink.href = qrcodeElement.querySelector('canvas').toDataURL(); // Convert canvas to data URL
            downloadLink.download = '<?php echo $row['nama']; ?>_qrcode.png'; // Set the download file name

        <?php else : ?>
            alert("Please perform a search first.");
        <?php endif; ?>
    });
    </script>

</body>
</html>
