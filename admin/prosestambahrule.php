<?php
include '../conn.php';
 
// menangkap data yang di kirim dari form
if(isset($_POST['proses'])){    
    $a = $_POST['cek'];
    $aa = implode('AND',$a);
}

$jika = $aa;
$maka = $_POST['kode'];
// menginput data ke database
mysqli_query($koneksi,"insert into rule values('$jika','$maka')");
 
// mengalihkan halaman kembali ke index.php
header("location:rule.php");
 
?>