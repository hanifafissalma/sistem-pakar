<?php 
// koneksi database
include '../conn.php';
 
// menangkap data yang di kirim dari form
$user_id = $_POST['user_id'];
$username = $_POST['username'];
$password = $_POST['password'];
$fullname = $_POST['fullname'];
$level = $_POST['level'];
$newsql = "UPDATE user SET username = '$username', password = '$password', fullname = '$fullname', level = '$level' WHERE user_id = '$user_id'" ;
// update data ke database
mysqli_query($koneksi,$newsql);
 
// mengalihkan halaman kembali ke index.php
header("location:pengguna.php");
 
?>