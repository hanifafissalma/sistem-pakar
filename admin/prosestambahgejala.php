<?php
include '../conn.php';
 
// menangkap data yang di kirim dari form
$gejala = $_POST['gejala'];
 
// menginput data ke database
mysqli_query($koneksi,"insert into gejala values('','$gejala')");
 
// mengalihkan halaman kembali ke index.php
header("location:gejala.php");
 
?>