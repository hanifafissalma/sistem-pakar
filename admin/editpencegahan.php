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
            <a class="btn btn-md btn-info" href="pencegahan.php">Kembali</a>
            <div class="card" style="padding:20px;margin-top:30px">
                <h3>UBAH PENCEGAHAN</h3>
                <hr/>
                <?php
                    include '../conn.php';
                    $kd_pencegahan = $_GET['id'];
                    $data = mysqli_query($koneksi,"select * from pencegahan where kd_pencegahan='$kd_pencegahan'");
                    while($d = mysqli_fetch_array($data)){
                ?>
                <form action="updatepencegahan.php" method="POST">
                    <div class="form-group">
                        <label>Kode Pencegahan</label>
                        <br/>
                        <b><?php echo $d['kd_pencegahan']?></b>
                        <input type="hidden" name="kd_pencegahan" value="<?php echo $d['kd_pencegahan']; ?>" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Daftar Penyakit</label>
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
                        <label>Deskripsi</label>
                        <input type="text" name="deskripsi" value="<?php echo $d['deskripsi']; ?>" class="form-control" />
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
