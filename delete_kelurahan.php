<?php
require 'dbkoneksi.php';

if (!isset($_GET['id'])) {
    header("Location: data_kelurahan.php");
    exit();
}

$id = $_GET['id'];

$sql = "DELETE FROM kelurahan WHERE id=?";
$stmt = $dbh->prepare($sql);
$stmt->execute([$id]);

header("Location: data_kelurahan.php");
exit();
?>
