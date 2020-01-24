<?php
include '../conn.php';
 
// menangkap data yang di kirim dari form
$kd_gejala = $_POST['kd_gejala'];
$kode = $_POST['kode'];
$mb =  $_POST['mb'];
$md = $_POST['md'];

// menginput data ke database
mysqli_query($koneksi,"insert into pengetahuan values('','$kd_gejala','$kode','$mb','$md')");
 
// mengalihkan halaman kembali ke index.php
header("location:pengetahuan.php");
 
?>