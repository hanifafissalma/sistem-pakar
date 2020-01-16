<?php 
// koneksi database
include '../conn.php';
 
// menangkap data yang di kirim dari form
$kode_pakar = $_POST['kode_pakar'];
$kd_gejala =  $_POST['kd_gejala'];
$kode = $_POST['kode'];
$bobot = $_POST['bobot'];
// update data ke database
$newsql = "UPDATE pakar SET kode = '$kode', bobot = '$bobot', kd_gejala = '$kd_gejala  WHERE kode_pakar = '$kode_pakar'" ;
mysqli_query($koneksi,$newsql);
// mengalihkan halaman kembali ke index.php
header("location:pakar.php");
 
?>