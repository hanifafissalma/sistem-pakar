<?php
include '../conn.php';
 
// menangkap data yang di kirim dari form
$id_gejala = $_POST['id_gejala'];
$kode_penyakit = $_POST['kode_penyakit'];
$id_jenis_mobil = $_POST['id_jenis_mobil'];
$mb =  $_POST['mb'];
$md = $_POST['md'];

// menginput data ke database
mysqli_query($koneksi,"insert into pengetahuan values('','$kode_penyakit','$id_gejala','$id_jenis_mobil','$mb','$md')");
 
// mengalihkan halaman kembali ke index.php
header("location:pengetahuan.php");
 
?>