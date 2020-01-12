<?php 
// koneksi database
include '../conn.php';
 
// menangkap data yang di kirim dari form
$kd_pencegahan =  $_POST['kd_pencegahan'];
$kode = $_POST['kode'];
$deskripsi = $_POST['deskripsi'];
// update data ke database
mysqli_query($koneksi,"update pencegahan set kd_pencegahan='$kd_pencegahan', kode='$kode', deskripsi='$deskripsi' where kd_pencegahan='$kd_pencegahan'");
 
// mengalihkan halaman kembali ke index.php
header("location:pencegahan.php");
 
?>