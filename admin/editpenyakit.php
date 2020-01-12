<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="SISTEM PAKAR DIAGNOSA KERUSAKAN PADA MOBIL">
    <link rel="icon" href="">
    <title>ADMIN SISTEM PAKAR DIAGNOSA KERUSAKAN PADA MOBIL</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/jquery.dataTables.min.css" rel="stylesheet"/>
  </head>
  <body>
    <?php include "header.php"; ?>
    <section>
        <div class="container">
            <a class="btn btn-md btn-info" href="gejala.php">Kembali</a>
            <div class="card" style="padding:20px;margin-top:30px">
                <h3>UBAH GEJALA</h3>
                <hr/>
                <?php
                    include '../conn.php';
                    $kode = $_GET['id'];
                    $data = mysqli_query($koneksi,"select * from penyakit where kode='$kode'");
                    while($d = mysqli_fetch_array($data)){
                ?>
                <form action="updatepenyakit.php" method="POST">
                    <div class="form-group">
                        <label>Kode</label>
                        <input type="text" name="kode" class="form-control" value="<?php echo $d['kode']; ?>" disabled />
                    </div>
                    <div class="form-group">
                        <label>Nama Gejala</label>
                        <input type="text" name="nama_penyakit" class="form-control" value="<?php echo $d['nama_penyakit']; ?>" />
                    </div>
                    <div class="form-group">
                        <label>Penyebab</label>
                        <input type="text" name="penyebab" class="form-control" value="<?php echo $d['penyebab']; ?>" />
                    </div>
                    <button type="submit" class="btn btn-md btn-danger">Ubah</button>
                </form>
                <?php 
                    }
                ?>
            </div>
        </div>
    </section>
    <script src="../js/popper.min.js"></script>
    <script src="../js/jquery-slim.min.js"></script>
  </body>
</html>