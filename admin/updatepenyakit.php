<?php 
// koneksi database
include '../conn.php';
 
// menangkap data yang di kirim dari form
$kode = $_POST['kode'];
$nama_penyakit = $_POST['nama_penyakit'];
$penyebab = $_POST['penyebab'];
$bobot = $_POST['bobot'];
// update data ke database
$newsql = "UPDATE penyakit SET nama_penyakit = '$nama_penyakit', penyebab = '$penyebab', bobot = '$bobot'  WHERE kode = '$kode'" ;

mysqli_query($koneksi,$newsql);
 
// mengalihkan halaman kembali ke index.php
header("location:penyakit.php");
 
?>