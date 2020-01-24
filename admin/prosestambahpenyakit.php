<?php
include '../conn.php';
 
// menangkap data yang di kirim dari form
$kode = $_POST['kode'];
$nama_penyakit = $_POST['nama_penyakit'];
$informasi = $_POST['informasi'];
$saran = $_POST['saran'];
// menginput data ke database
mysqli_query($koneksi,"insert into penyakit values('$kode','$nama_penyakit','$informasi','$saran')");
 
// mengalihkan halaman kembali ke index.php
header("location:penyakit.php");
 
?>