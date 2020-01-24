<?php 
// koneksi database
include '../conn.php';
 
// menangkap data yang di kirim dari form
$kode = $_POST['kode'];
$nama_penyakit = $_POST['nama_penyakit'];
$informasi = $_POST['informasi'];
$saran = $_POST['saran'];
// update data ke database
$newsql = "UPDATE penyakit SET nama_penyakit = '$nama_penyakit', informasi = '$informasi', saran = '$saran'  WHERE kode = '$kode'" ;

mysqli_query($koneksi,$newsql);
 
// mengalihkan halaman kembali ke index.php
header("location:penyakit.php");
 
?>