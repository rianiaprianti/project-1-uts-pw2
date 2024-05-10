<?php
// Memanggil file koneksi database
require_once 'dbkoneksi.php';

// Menangkap data yang dikirimkan melalui form
if (isset($_POST['submit'])) {

    $_nama = $_POST['nama'];
    $_kec_id = $_POST['kec_id'];

    $data = [$_nama, $_kec_id];

    // Menyiapkan query SQL untuk menyimpan data ke dalam tabel pasien
    $sql = "INSERT INTO kelurahan (nama, kec_id) VALUES (?, ?)";

    // Mempersiapkan statement PDO untuk eksekusi query
    $stmt = $dbh->prepare($sql);

    // Mengeksekusi statement dengan menyertakan data yang telah ditangkap dari form
    $stmt->execute($data);

    // Redirect ke halaman data_pasien.php setelah proses penyimpanan selesai
    header("Location: data_kelurahan.php");
}
