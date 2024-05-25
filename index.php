<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Motor</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h4 class="text-center mt-4">Rental Motor</h4>
                <img src="assets/headerRental.jpeg" class="card-img" alt="Motor Image">
                <div class="card-body">
                    <form method="POST">
                        <div class="form-group">
                            <label for="nama">Nama Pelanggan</label>
                            <input type="text" id="nama" name="nama" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="waktu">Lama Waktu Rental (per hari)</label>
                            <input type="number" id="waktu" name="waktu" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="jenis">Jenis Motor</label>
                            <select name="jenis" id="jenis" class="form-control" required>
                                <option disabled selected>-- Pilih Motor --</option>
                                <option value="Matic">Motor Matic</option>
                                <option value="Manual">Motor Manual</option>
                                <option value="Sport">Motor Sport</option>
                                <option value="Listrik">Motor Listrik</option>
                            </select>
                        </div>
                        <button type="submit" name="btn-submit" class="btn btn-primary btn-block">Submit</button>
                    </form>
                    <?php 
                    require 'logicRent.php';
                    if (isset($_POST['btn-submit'])) {
                        $nama = $_POST['nama'];
                        $lamaRental = $_POST['waktu'];
                        $jenisMotor = $_POST['jenis'];

                        $rental = new RentalMotor($nama, $lamaRental, $jenisMotor);
                        $strukRental = $rental->getHarga();
                        echo "<div class='mt-3 alert alert-info'>$strukRental</div>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>