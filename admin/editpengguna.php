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
                <h3>UBAH PENGGUNA</h3>
                <hr/>
                <?php
                    include '../conn.php';
                    $id = $_GET['id'];
                    $data = mysqli_query($koneksi,"select * from user where user_id='$id'");
                    while($d = mysqli_fetch_array($data)){
                ?>
                <form action="updatepengguna.php" method="POST">
                <div class="form-group">
                      <label>Username</label>
                      <input type="hidden" name="user_id" class="form-control" value=<?php echo $d['user_id']?> />
                      <input type="text" name="username" class="form-control" value=<?php echo $d['username']?> />
                  </div>
                  <div class="form-group">
                      <label>Password</label>
                      <input type="password" name="password" class="form-control" value=<?php echo $d['password']?> />
                  </div>
                  <div class="form-group">
                      <label>Nama Lengkap</label>
                      <input type="text" name="fullname" class="form-control" value=<?php echo $d['fullname']?> />
                  </div>
                  <div class="form-group">
                      <label>Level User</label>
                      <select name="level" class="form-control" value=<?php echo $d['level']?>>
                          <option value="admin">Admin</option>
                          <option value="konsultan">Konsultan</option>
                      </select>
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
