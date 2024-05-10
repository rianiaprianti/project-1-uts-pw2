<?php
require 'dbkoneksi.php';


if(isset($_GET['id'])) {
    $id = $_GET['id'];


    $stmt = $dbh->prepare('DELETE FROM periksa WHERE id = ?');
    $stmt->execute([$id]);

    header("Location: data_periksa.php");
    exit();
} else {
    echo 'ID tidak diberikan.';
}
?>
