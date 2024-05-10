<?php
require_once 'dbkoneksi.php';


if (!isset($_GET['id'])) {
    header("Location: data_paramedik.php");
    exit();
}

$id = $_GET['id'];

$stmt = $dbh->prepare("SELECT * FROM paramedik WHERE id=?");
$stmt->execute([$id]);
$paramedik = $stmt->fetch();


if (!$paramedik) {
    header("Location: data_paramedik.php");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $gender = $_POST['gender'];
    $tmp_lahir = $_POST['tmp_lahir'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $kategori = $_POST['kategori']; 
    $telpon = $_POST['telpon'];
    $alamat = $_POST['alamat'];
    $unit_kerja_id = $_POST['unit_kerja_id'];

    $sql = "UPDATE paramedik SET nama=?, gender=?, tmp_lahir=?, tgl_lahir=?, kategori=?, telpon=?, alamat=?, unit_kerja_id=? WHERE id=?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$nama, $gender, $tmp_lahir, $tgl_lahir, $kategori, $telpon, $alamat, $unit_kerja_id, $id]);

    header("Location: data_paramedik.php");
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

    <title>Edit Paramedik</title>
</head>

<body>
    <div class="container mt-1">
        <h2 class="text-center">Edit Paramedik</h2>
        <form action="edit_paramedik.php?id=<?php echo $id; ?>" method="POST">
            <div class="form-group row mt-3">
                <label for="nama" class="col-4 col-form-label">Nama</label>
                <div class="col-8">
                    <input required id="nama" name="nama" type="text" class="form-control" value="<?php echo $paramedik['nama']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="gender" class="col-4 col-form-label">Jenis Kelamin</label>
                <div class="col-8">
                    <select id="gender" name="gender" class="custom-select">
                        <option value="L" <?php if ($paramedik['gender'] == 'L') echo 'selected'; ?>>Laki-Laki</option>
                        <option value="P" <?php if ($paramedik['gender'] == 'P') echo 'selected'; ?>>Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="tmp_lahir" class="col-4 col-form-label">Tempat Lahir</label>
                <div class="col-8">
                    <input required id="tmp_lahir" name="tmp_lahir" type="text" class="form-control" value="<?php echo $paramedik['tmp_lahir']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="tgl_lahir" class="col-4 col-form-label">Tanggal Lahir</label>
                <div class="col-8">
                    <input required id="tgl_lahir" name="tgl_lahir" type="date" class="form-control" value="<?php echo $paramedik['tgl_lahir']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="kategori" class="col-4 col-form-label">Kategori</label>
                <div class="col-8">
                    <select id="kategori" name="kategori" class="custom-select">
                        <option value="<?php echo $paramedik['kategori']; ?>"><?php echo $paramedik['kategori']; ?></option>
                        <option value="perawat" <?php if ($paramedik['kategori'] == 'perawat') echo 'selected'; ?>>Perawat</option>
                        <option value="paramedis" <?php if ($paramedik['kategori'] == 'paramedis') echo 'selected'; ?>>Paramedis</option>
                        <option value="teknisi medis" <?php if ($paramedik['kategori'] == 'teknisi medis') echo 'selected'; ?>>Teknisi Medis</option>
                        <option value="asisten medis" <?php if ($paramedik['kategori'] == 'asisten medis') echo 'selected'; ?>>Asisten Medis</option>
                        <option value="ahli gizi" <?php if ($paramedik['kategori'] == 'ahli gizi') echo 'selected'; ?>>Ahli Gizi</option>
                        <option value="ahli farmasi" <?php if ($paramedik['kategori'] == 'ahli farmasi') echo 'selected'; ?>>Ahli Farmasi</option>
                    </select>
                </div>
            </div>
            <div class="form-group row mt-3">
                <label for="telpon" class="col-4 col-form-label">Telepon</label>
                <div class="col-8">
                    <input required id="telpon" name="telpon" type="tel" class="form-control" value="<?php echo $paramedik['telpon']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="alamat" class="col-4 col-form-label">Alamat</label>
                <div class="col-8">
                    <input required id="alamat" name="alamat" type="text" class="form-control" value="<?php echo $paramedik['alamat']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="unit_kerja_id" class="col-4 col-form-label">Id Unit Kerja</label>
                <div class="col-8">
                    <input required id="unit_kerja_id" name="unit_kerja_id" type="number" class="form-control" value="<?php echo $paramedik['unit_kerja_id']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-4 col-8">
                    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
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
