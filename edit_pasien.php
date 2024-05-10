<?php

require 'dbkoneksi.php';


if (!isset($_GET['id'])) {
   
    header("Location: data_pasien.php");
    exit();
}


$id = $_GET['id'];


$stmt = $dbh->prepare("SELECT * FROM pasien WHERE id=?");
$stmt->execute([$id]);
$pasien = $stmt->fetch();

if (!$pasien) {
    
    header("Location: data_pasien.php");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $tmp_lahir = $_POST['tmp_lahir'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $kelurahan_id = $_POST['kelurahan_id'];

    $sql = "UPDATE pasien SET nama=?, tmp_lahir=?, tgl_lahir=?, gender=?, email=?, alamat=?, kelurahan_id=? WHERE id=?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$nama, $tmp_lahir, $tgl_lahir, $gender, $email, $alamat, $kelurahan_id, $id]);

    header("Location: data_pasien.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Edit Pasien</title>
</head>

<body>
    <div class="container mt-2">
        <h2 class="text-center">Edit Pasien</h2>
        <form action="" method="POST">
            <div class="form-group row mt-3 ">
                <label for="kode" class="col-4 col-form-label">Kode</label>
                <div class="col-8">
                    <input readonly id="kode" name="kode" type="text" class="form-control" value="<?php echo $pasien['kode']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-4 col-form-label">Nama</label>
                <div class="col-8">
                    <input required id="nama" name="nama" type="text" class="form-control" value="<?php echo $pasien['nama']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="tmp_lahir" class="col-4 col-form-label">Tempat Lahir</label>
                <div class="col-8">
                    <input required id="tmp_lahir" name="tmp_lahir" type="text" class="form-control" value="<?php echo $pasien['tmp_lahir']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="tgl_lahir" class="col-4 col-form-label">Tanggal Lahir</label>
                <div class="col-8">
                    <input required id="tgl_lahir" name="tgl_lahir" type="date" class="form-control" value="<?php echo $pasien['tgl_lahir']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="gender" class="col-4 col-form-label">Jenis Kelamin</label>
                <div class="col-8">
                    <select id="gender" name="gender" class="custom-select">
                        <option value="L" <?php if ($pasien['gender'] == 'L') echo 'selected'; ?>>Laki-Laki</option>
                        <option value="P" <?php if ($pasien['gender'] == 'P') echo 'selected'; ?>>Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-4 col-form-label">Email</label>
                <div class="col-8">
                    <input required id="email" name="email" type="email" class="form-control" value="<?php echo $pasien['email']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="alamat" class="col-4 col-form-label">Alamat</label>
                <div class="col-8">
                    <input required id="alamat" name="alamat" type="text" class="form-control" value="<?php echo $pasien['alamat']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="kelurahan_id" class="col-4 col-form-label">Kelurahan ID</label>
                <div class="col-8">
                    <input required id="kelurahan_id" name="kelurahan_id" type="text" class="form-control" value="<?php echo $pasien['kelurahan_id']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-4 col-8">
                    <button name="submit" type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>
