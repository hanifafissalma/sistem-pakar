<?php
include '../conn.php';
 
// menangkap data yang di kirim dari form
$kode_penyakit = $_POST['kode_penyakit'];
$nama_penyakit = $_POST['nama_penyakit'];
$saran = $_POST['saran'];
$biaya = $_POST['biaya'];
// menginput data ke database
mysqli_query($koneksi,"insert into penyakit values('','$kode_penyakit','$nama_penyakit','$saran','$biaya')");
 
// mengalihkan halaman kembali ke index.php
header("location:penyakit.php");
 
?>