<?php
include '../conn.php';
 
// menangkap data yang di kirim dari form
$kd_gejala = $_POST['kd_gejala'];
$gejala = $_POST['gejala'];
 
// menginput data ke database
mysqli_query($koneksi,"insert into gejala values('$kd_gejala','$gejala')");
 
// mengalihkan halaman kembali ke index.php
header("location:gejala.php");
 
?>