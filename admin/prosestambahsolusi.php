<?php
include '../conn.php';
 
// menangkap data yang di kirim dari form
$kd_solusi = $_POST['kd_solusi'];
$kd_pencegahan = $_POST['kd_pencegahan'];
$solusi = $_POST['solusi'];
// menginput data ke database
mysqli_query($koneksi,"insert into solusi values('','$kd_solusi','$kd_pencegahan','$solusi')");
 
// mengalihkan halaman kembali ke index.php
header("location:solusi.php");
 
?>