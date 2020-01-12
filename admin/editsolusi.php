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
                <h3>UBAH SOLUSI</h3>
                <hr/>
                <?php
                    include '../conn.php';
                    $id = $_GET['id'];
                    $data = mysqli_query($koneksi,"select * from solusi where id='$id'");
                    while($d = mysqli_fetch_array($data)){
                ?>
                <form action="updatesolusi.php" method="POST">
                    <input type="hidden" value="<?php echo $d['id']?>" name="id"/>
                    <div class="form-group">
                        <label>Kode Solusi</label>
                        <input type="text" name="kd_solusi" value="<?php echo $d['kd_solusi']; ?>" class="form-control" disabled/>
                    </div>
                    <div class="form-group">
                        <label>Pencegahan</label>
                        <select name="kd_pencegahan" class="form-control">
                            <?php 
                                include "../conn.php";
                                $query = mysqli_query($koneksi,"SELECT * FROM pencegahan ORDER BY kd_pencegahan ASC");
                                while ($data=mysqli_fetch_array($query)) {
                            ?>  
                            <option value="<?php echo $data['kd_pencegahan'];?>" <?php if($data['kd_pencegahan'] == $d['kd_pencegahan']){ echo 'selected'; }?>> <?php echo $data['deskripsi']; ?></option>
                            <?php 
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Solusi</label>
                        <input type="text" value="<?php echo $d['solusi']; ?>" name="solusi" class="form-control" />
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
