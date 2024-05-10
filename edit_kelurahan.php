<?php

require 'dbkoneksi.php';


if (!isset($_GET['id'])) {
   
    header("Location: data_kelurahan.php");
    exit();
}


$id = $_GET['id'];


$stmt = $dbh->prepare("SELECT * FROM kelurahan WHERE id=?");
$stmt->execute([$id]);
$kelurahan = $stmt->fetch();

if (!$kelurahan) {
    
    header("Location: data_kelurahan.php");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $kec_id = $_POST['kec_id'];
    
    $sql = "UPDATE kelurahan SET nama=?, kec_id=? WHERE id=?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$nama, $kec_id, $id]);

    header("Location: data_kelurahan.php");
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

    <title>Edit Kelurahan</title>
</head>

<body>
    <div class="container mt-2">
        <h2 class="text-center">Edit Kelurahan</h2>
        <form action="" method="POST">
            <div class="form-group row mt-3 ">
                <label for="nama" class="col-4 col-form-label">nama</label>
                <div class="col-8">
                    <input required id="nama" name="nama" type="text" class="form-control" value="<?php echo $kelurahan['nama']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="kec_id" class="col-4 col-form-label">Kecamatan ID</label>
                <div class="col-8">
                    <input required id="kec_id" name="kec_id" type="number" class="form-control" value="<?php echo $kelurahan['kec_id']; ?>">
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
