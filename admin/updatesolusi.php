<?php 
// koneksi database
include '../conn.php';
 
// menangkap data yang di kirim dari form
$id = $_POST['id'];
$kd_pencegahan =  $_POST['kd_pencegahan'];
$kd_solusi = $_POST['kd_solusi'];
$solusi = $_POST['solusi'];
// update data ke database
mysqli_query($koneksi,"update solusi set kd_pencegahan='$kd_pencegahan', kd_solusi='$ks_solusi', solusi='$solusi' where id='$id'");
 
// mengalihkan halaman kembali ke index.php
header("location:pencegahan.php");
 
?>