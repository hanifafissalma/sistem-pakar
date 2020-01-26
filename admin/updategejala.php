<?php 
// koneksi database
include '../conn.php';
 
// menangkap data yang di kirim dari form
$id_gejala = $_POST['id_gejala'];
$gejala = $_POST['gejala'];
$newsql = "UPDATE gejala SET gejala = '$gejala' WHERE id_gejala = '$id_gejala'" ;
// update data ke database
mysqli_query($koneksi,$newsql);
 
// mengalihkan halaman kembali ke index.php
header("location:gejala.php");
 
?>