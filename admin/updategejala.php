<?php 
// koneksi database
include '../conn.php';
 
// menangkap data yang di kirim dari form
$kd_gejala = $_POST['kd_gejala'];
$gejala = $_POST['gejala'];
 
// update data ke database
mysqli_query($koneksi,"update gejala set gejala='$gejala' where kd_gejala='$kd_gejala'");
 
// mengalihkan halaman kembali ke index.php
header("location:gejala.php");
 
?>