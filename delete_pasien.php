<?php
require 'dbkoneksi.php';

if (!isset($_GET['id'])) {
    header("Location: data_pasien.php");
    exit();
}

$id = $_GET['id'];

$sql = "DELETE FROM pasien WHERE id=?";
$stmt = $dbh->prepare($sql);
$stmt->execute([$id]);

header("Location: data_pasien.php");
exit();
?>
