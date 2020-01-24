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
        <div class="row">
            <div class="col-md-12">
              <div class="card" style="padding:20px">
                <h3>TAMBAH PENGGUNA</h3>
                <hr/>
                <form action="prosestambahpengguna.php" method="POST">
                  <div class="form-group">
                      <label>Username</label>
                      <input type="text" name="username" class="form-control" />
                  </div>
                  <div class="form-group">
                      <label>Password</label>
                      <input type="password" name="password" class="form-control" />
                  </div>
                  <div class="form-group">
                      <label>Nama Lengkap</label>
                      <input type="text" name="fullname" class="form-control" />
                  </div>
                  <div class="form-group">
                      <label>Level User</label>
                      <select name="level" class="form-control">
                          <option value="admin">Admin</option>
                          <option value="konsultan">Konsultan</option>
                      </select>
                  </div>
                  <button type="submit" class="btn btn-md btn-danger">Tambah</button>
                </form>
              </div>
              <br/>
              <h3>Daftar Pengguna</h3>
              <br/>
              <div class="row">
                <div class="col-md-12">
                  <table class="table table-bordered table-hover" id="gejala" class="display" style="width:100%">
                    <thead>
                      <tr>
                        <th width="20"><center>NO</center></th>
                        <th width="100"><center>USERNAME</center></th>
                        <th><center>NAMA LENGKAP</center></th>
                        <th><center>LEVEL</center></th>
                        <th><center>AKSI</center></th>
                      </tr>
                    </thead> 
                    <tbody>   
                      <?php 
                        include "../conn.php";
                        $query = mysqli_query($koneksi,"SELECT * FROM user ORDER BY user_id ASC");
                        $no=0;
                        while ($data=mysqli_fetch_array($query)) {
                            $no++;
                      ?>
                      <tr>
                          <td><?php echo $no; ?></td>
                          <td><?php echo $data['username']; ?></td>
                          <td><?php echo $data['fullname']; ?></td>
                          <td><?php echo $data['level']; ?></td>
                          <td>
                              <a  href="editpengguna.php?id=<?php echo $data['user_id']; ?>" class="btn btn-sm btn-warning">UBAH</a>
                              <a  href="hapuspengguna.php?id=<?php echo $data['user_id']; ?>" class="btn btn-sm btn-danger">HAPUS</a>
                          </td>
                      </tr>  
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>
      </div>
    </section>
    <script src="../js/popper.min.js"></script>
    <script src="../js/jquery-slim.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#gejala').DataTable();
        } );
    </script>
  </body>
</html>
