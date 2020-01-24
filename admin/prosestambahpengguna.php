<?php
include '../conn.php';
 
// menangkap data yang di kirim dari form
$username = $_POST['username'];
$password = $_POST['password'];
$fullname =  $_POST['fullname'];
$level = $_POST['level'];
// menginput data ke database
mysqli_query($koneksi,"insert into user values('','$username','$password','$fullname','$level')");
 
// mengalihkan halaman kembali ke index.php
header("location:pengguna.php");
 
?>