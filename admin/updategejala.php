<?php 
// koneksi database
include '../conn.php';
 
// menangkap data yang di kirim dari form
$kd_gejala = $_POST['kd_gejala'];
$gejala = $_POST['gejala'];
$newsql = "UPDATE gejala SET gejala = '$gejala' WHERE kd_gejala = '$kd_gejala'" ;
// update data ke database
mysqli_query($koneksi,$newsql);
 
// mengalihkan halaman kembali ke index.php
header("location:gejala.php");
 
?>