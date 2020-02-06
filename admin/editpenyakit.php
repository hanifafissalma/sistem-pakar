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
            <a class="btn btn-md btn-info" href="penyakit.php">Kembali</a>
            <div class="card" style="padding:20px;margin-top:30px">
                <h3>UBAH PENYAKIT</h3>
                <hr/>
                <?php
                    include '../conn.php';
                    $kode = $_GET['id'];
                    $data = mysqli_query($koneksi,"select * from penyakit where id_penyakit='$kode'");
                    while($d = mysqli_fetch_array($data)){
                ?>
                <form action="updatepenyakit.php" method="POST">
                    <div class="form-group">
                        <label>Kode</label>
                        <br/>
                        <b><?php echo $d['kode_penyakit']?></b>
                        <input type="hidden" name="id_penyakit" class="form-control" value="<?php echo $d['id_penyakit']; ?>" />
                        <input type="hidden" name="kode_penyakit" class="form-control" value="<?php echo $d['kode_penyakit']; ?>" />
                    </div>
                    <div class="form-group">
                        <label>Nama Gejala</label>
                        <input type="text" name="nama_penyakit" class="form-control" value="<?php echo $d['nama_penyakit']; ?>" />
                    </div>
                    <div class="form-group">
                        <label>Saran</label>
                        <textarea name="saran" class="form-control"><?php echo $d['saran']?></textarea>
                    </div>
                    <div class="form-group">
                      <label>Perkiraan Biaya Service</label>
                      <input type="number" name="biaya" class="form-control" value="<?php echo $d['biaya_service']?>"/>
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
