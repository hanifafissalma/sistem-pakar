<?php
include '../conn.php';
 
// menangkap data yang di kirim dari form
$kd_pencegahan = $_POST['kd_pencegahan'];
$kode = $_POST['kode'];
$deskripsi = $_POST['deskripsi'];
// menginput data ke database
mysqli_query($koneksi,"insert into pencegahan values('$kd_pencegahan','$kode','$deskripsi')");
 
// mengalihkan halaman kembali ke index.php
header("location:pencegahan.php");
 
?>