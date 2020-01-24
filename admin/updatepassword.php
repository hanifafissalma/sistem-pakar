<?php 
// koneksi database
include '../conn.php';
 
// menangkap data yang di kirim dari form
$password = $_POST['password'];
$username = $_POST['username'];
$newsql = "UPDATE user SET password = '$password' WHERE username = '$username'" ;
// update data ke database
mysqli_query($koneksi,$newsql);
 
// mengalihkan halaman kembali ke index.php
header("location:pengguna.php");
 
?>