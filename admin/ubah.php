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
    <?php
        session_start();
        $username = $_SESSION['username'];
    ?>
    <section>
        <div class="container">
            <a class="btn btn-md btn-info" href="gejala.php">Kembali</a>
            <div class="card" style="padding:20px;margin-top:30px">
                <h3>UBAH PASSWORD</h3>
                <hr/>
                <form action="updatepassword.php" method="POST">
                    <div class="form-group">
                        <label>Password Baru</label>
                        <input type="hidden" name="username" class="form-control" value="<?php echo $username?>"/>
                        <input type="password" name="password" class="form-control" />
                    </div>
                    <button type="submit" class="btn btn-md btn-danger">Ubah</button>
                </form>
            </div>
        </div>
    </section>
    <script src="../js/popper.min.js"></script>
    <script src="../js/jquery-slim.min.js"></script>
  </body>
</html>
