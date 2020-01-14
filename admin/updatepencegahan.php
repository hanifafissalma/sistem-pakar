<?php 
// koneksi database
include '../conn.php';
 
// menangkap data yang di kirim dari form
$kd_pencegahan =  $_POST['kd_pencegahan'];
$kode = $_POST['kode'];
$deskripsi = $_POST['deskripsi'];
// update data ke database
$newsql = "UPDATE pencegahan SET kode = '$kode', deskripsi = '$deskripsi'  WHERE kd_pencegahan = '$kd_pencegahan'" ;
mysqli_query($koneksi,$newsql);
 
// mengalihkan halaman kembali ke index.php
header("location:pencegahan.php");
 
?>