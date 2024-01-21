<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Registrasi</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="bodyD.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <!-- Column with Image -->
            <div class="col-md-1"></div>
            <div class="col-md-5">
                <img src="img/Daftar.jpeg" alt="Image" class="img-fluid">
            </div>

            <!-- Column with Form -->
            <div class="col-md-6">
                <h1>BEBER SEHAT</h1>
                <h2>DAFTAR PASIEN</h2>
                <form method="post" action="koneksi.php">
                    <div class="form-group">
                        <label for="nama">NAMA:</label>
                        <input type="text" id="nama" name="nama" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="nik">NIK:</label>
                        <input type="number" id="nik" name="nik" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="tgl_lahir">TGL LAHIR:</label>
                        <input type="date" id="tgl_lahir" name="tgl_lahir" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="status">STATUS:</label>
                        <select id="status" name="status" class="form-control" required>
                            <option value="">-- Pilih Status --</option>
                            <option value="Menikah">Menikah</option>
                            <option value="Belum Menikah">Belum Menikah</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="alamat">ALAMAT:</label>
                        <textarea id="alamat" name="alamat" class="form-control" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="keluhan">KELUHAN:</label>
                        <textarea id="keluhan" name="keluhan" class="form-control" required></textarea>
                    </div>

                    <input type="submit" value="Daftar" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
