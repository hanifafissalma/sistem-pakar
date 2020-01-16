<?php
include '../conn.php';
 
// menangkap data yang di kirim dari form
$kd_gejala = $_POST['kd_gejala'];
$kode = $_POST['kode'];
$bobot = $_POST['bobot']; 

mysqli_query($koneksi,"INSERT into pakar values('','$kd_gejala','$kode','$bobot')");
 
// mengalihkan halaman kembali ke index.php
header("location:pakar.php");
 
?>