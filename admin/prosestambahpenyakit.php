<?php
include '../conn.php';
 
// menangkap data yang di kirim dari form
$kode = $_POST['kode'];
$nama_penyakit = $_POST['nama_penyakit'];
$penyebab = $_POST['penyebab'];
$bobot = $_POST['bobot'];
// menginput data ke database
mysqli_query($koneksi,"insert into penyakit values('$kode','$nama_penyakit','$penyebab','$bobot')");
 
// mengalihkan halaman kembali ke index.php
header("location:penyakit.php");
 
?>