<?php 
// koneksi database
include '../conn.php';
 
// menangkap data id yang di kirim dari url
$id = $_GET['id'];
 
 
// menghapus data dari database
mysqli_query($koneksi,"delete from konsultasi where kode_konsultasi='$id'");
 
// mengalihkan halaman kembali ke index.php
header("location:konsultasi.php");
 
?>