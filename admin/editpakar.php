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
                <h3>UBAH PAKAR</h3>
                <hr/>
                <?php
                    include '../conn.php';
                    $kode_pakar = $_GET['id'];
                    $data = mysqli_query($koneksi,"select * from pakar where kode_pakar='$kode_pakar'");
                    while($d = mysqli_fetch_array($data)){
                ?>
                <form action="updatepakar.php" method="POST">
                    <div class="form-group">
                        <label>Kode Pakar</label>
                        <br/>
                        <b><?php echo $d['kode_pakar']?></b>
                        <input type="hidden" name="kode_pakar" value="<?php echo $d['kode_pakar']; ?>" class="form-control" />
                    </div>
                    <input type="hidden" name="kode_pakar" value="<?php $d['kode_pakar']?>"/>
                    <div class="form-group">
                        <label>Gejala</label>
                        <select name="kd_gejala" class="form-control">
                        <?php 
                            include "../conn.php";
                            $query = mysqli_query($koneksi,"SELECT * FROM gejala ORDER BY kd_gejala ASC");
                            $no=0;
                            while ($data=mysqli_fetch_array($query)) {
                            $no++;
                        ?>  
                        <option value="<?php echo $data['kd_gejala'];?>" <?php if($data['kd_gejala'] == $d['kd_gejala']){ echo 'selected'; } ?>> <?php echo $data['gejala']; ?></option>
                        <?php 
                            }
                        ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Penyakit</label>
                        <select name="kode" class="form-control">
                        <?php 
                            include "../conn.php";
                            $query = mysqli_query($koneksi,"SELECT * FROM penyakit ORDER BY kode ASC");
                            $no=0;
                            while ($data=mysqli_fetch_array($query)) {
                            $no++;
                        ?>  
                        <option value="<?php echo $data['kode'];?>" <?php if($data['kode'] == $d['kode']){ echo 'selected'; } ?>> <?php echo $data['nama_penyakit']; ?></option>
                        <?php 
                            }
                        ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Bobot</label>
                        <input type="number" step="0.01" name="bobot" class="form-control" value="<?php echo $d['bobot']?>"/>
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
