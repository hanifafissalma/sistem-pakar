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
                <h3>TAMBAH PENYAKIT</h3>
                <hr/>
                <form action="prosestambahpenyakit.php" method="POST">
                  <div class="form-group">
                      <label>Kode</label>
                      <input type="text" name="kode" class="form-control" />
                  </div>
                  <div class="form-group">
                      <label>Nama Penyakit</label>
                      <input type="text" name="nama_penyakit" class="form-control" />
                  </div>
                  <div class="form-group">
                      <label>Informasi</label>
                      <textarea name="informasi" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                      <label>Saran</label>
                      <textarea name="saran" class="form-control"></textarea>
                  </div>
                  <button type="submit" class="btn btn-md btn-danger">Tambah</button>
                </form>
              </div>
              <br/>
              <h3>Daftar Penyakit</h3>
              <br/>
              <div class="row">
                <div class="col-md-12">
                  <table class="table table-bordered table-hover" id="gejala" class="display" style="width:100%">
                    <thead>
                      <tr>
                        <th width="20"><center>NO</center></th>
                        <th width="100"><center>KODE</center></th>
                        <th><center>NAMA PENYAKIT</center></th>
                        <th><center>INFORMASI</center></th>
                        <th><center>SARAN</center></th>
                        <th><center>AKSI</center></th>
                      </tr>
                    </thead> 
                    <tbody>   
                      <?php 
                        include "../conn.php";
                        $query = mysqli_query($koneksi,"SELECT * FROM penyakit ORDER BY kode ASC");
                        $no=0;
                        while ($data=mysqli_fetch_array($query)) {
                            $no++;
                      ?>
                      <tr>
                          <td><?php echo $no; ?></td>
                          <td><?php echo $data['kode']; ?></td>
                          <td><?php echo $data['nama_penyakit']; ?></td>
                          <td><?php echo $data['informasi']; ?></td>
                          <td><?php echo $data['saran']; ?></td>
                          <td>
                              <a  href="editpenyakit.php?id=<?php echo $data['kode']; ?>" class="btn btn-sm btn-warning">UBAH</a>
                              <a  href="hapuspenyakit.php?id=<?php echo $data['kode']; ?>" class="btn btn-sm btn-danger">HAPUS</a>
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
