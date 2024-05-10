<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contoh PHP dengan Bootstrap Table</title>
    <!-- Tautan CSS Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php

$nama = 'Akbar';
$umur = 18;  
$berat = 50;

echo "<table class='table table-bordered'>";
echo "<tr>";
echo "<td>Nama</td>";
echo "<td>$nama</td>";  
echo "</tr>";

echo "<tr>";
echo "<td>Umur</td>";
echo "<td>$umur</td>";
echo "</tr>";

echo "<tr>"; 
echo "<td>Berat</td>";
echo "<td>$berat kg</td>";
echo "</tr>";

echo "</table>";

echo "<br/>";

echo "<table class='table table-bordered'>";
echo "<tr>";
echo "<td>Dokumen Root</td>";
echo "<td>".$_SERVER["DOCUMENT_ROOT"]."</td>";  
echo "</tr>";

echo "<tr>";
echo "<td>Nama File</td>";
echo "<td>".$_SERVER["PHP_SELF"]."</td>";  
echo "</tr>";
echo "</table>";

// definisi konstanta
define('PHI', 3.14);
define('DBNAME', 'inventori');
define('DBSERVER', 'localhost');

echo "<table class='table table-bordered'>";  
echo "<tr>";
echo "<td>PHI</td>";
echo "<td>".PHI."</td>";
echo "</tr>";

echo "<tr>";
echo "<td>DBNAME</td>"; 
echo "<td>".DBNAME."</td>";
echo "</tr>";

echo "<tr>";
echo "<td>DBSERVER</td>";
echo "<td>".DBSERVER."</td>"; 
echo "</tr>";
echo "</table>";

// luas dan keliling lingkaran
$jari = 8;
$luas = PHI * $jari * $jari;
$kll = 2 * PHI * $jari;

echo "<table class='table table-bordered'>";
echo "<tr>";
echo "<td>Luas Lingkaran</td>";
echo "<td>$luas</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Keliling</td>";
echo "<td>$kll</td>";
echo "</tr>";  
echo "</table>";

// array buah-buahan
$ar_buah = ["Pepaya", "Mangga","Pisang","Jambu" ];

echo "<table class='table table-bordered'>";
foreach($ar_buah as $k => $v){
  echo "<tr>";
  echo "<td>Buah ke-$k</td>"; 
  echo "<td>$v</td>";
  echo "</tr>";
}
echo "</table>";

?>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>