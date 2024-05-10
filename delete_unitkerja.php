<?php
require 'dbkoneksi.php';

if (!isset($_GET['id'])) {
    header("Location: data_unitkerja.php");
    exit();
}

$id = $_GET['id'];

$sql = "DELETE FROM unit_kerja WHERE id=?";
$stmt = $dbh->prepare($sql);
$stmt->execute([$id]);

header("Location: data_unitkerja.php");
exit();
?>
