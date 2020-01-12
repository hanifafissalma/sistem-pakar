<?php 
// koneksi database
include '../conn.php';
 
// menangkap data yang di kirim dari form
$kode = $_POST['kode'];
$nama_penyakit = $_POST['nama_penyakit'];
$penyebab = $_POST['penyebab'];
// update data ke database
mysqli_query($koneksi,"update penyakit set nama_penyakit='$nama_penyakit', penyebab='$penyebab' where kode='$kode'");
 
// mengalihkan halaman kembali ke index.php
header("location:penyakit.php");
 
?>