<?php 
// koneksi database
include '../conn.php';
 
// menangkap data yang di kirim dari form
$id = $_POST['id_penyakit'];
$kode = $_POST['kode_penyakit'];
$nama_penyakit = $_POST['nama_penyakit'];
$saran = $_POST['saran'];
// update data ke database
$newsql = "UPDATE penyakit SET nama_penyakit = '$nama_penyakit', saran = '$saran'  WHERE id_penyakit = '$id'" ;

mysqli_query($koneksi,$newsql);
 
// mengalihkan halaman kembali ke index.php
header("location:penyakit.php");
 
?>