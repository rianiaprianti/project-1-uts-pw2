<?php
require_once 'dbkoneksi.php';


if (!isset($_GET['id'])) {
    header("Location: data_paramedik.php");
    exit();
}


$id = $_GET['id'];


$stmt = $dbh->prepare("DELETE FROM paramedik WHERE id=?");
$stmt->execute([$id]);

header("Location: data_paramedik.php");
exit();
?>
