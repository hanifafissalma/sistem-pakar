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
                <h3>TAMBAH SOLUSI</h3>
                <hr/>
                <form action="prosestambahsolusi.php" method="POST">
                  <div class="form-group">
                      <label>Kode Solusi</label>
                      <input type="text" name="kd_solusi" class="form-control" />
                  </div>
                  <div class="form-group">
                    <label>Pencegahan</label>
                    <select name="kd_pencegahan" class="form-control">
                      <?php 
                        include "../conn.php";
                        $query = mysqli_query($koneksi,"SELECT * FROM pencegahan ORDER BY kd_pencegahan ASC");
                        $no=0;
                        while ($data=mysqli_fetch_array($query)) {
                          $no++;
                      ?>  
                      <option value="<?php echo $data['kd_pencegahan'];?>"> <?php echo $data['deskripsi']; ?></option>
                      <?php 
                        }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                      <label>Solusi</label>
                      <input type="text" name="solusi" class="form-control" />
                  </div>
                  <button type="submit" class="btn btn-md btn-danger">Tambah</button>
                </form>
              </div>
              <br/>
              <h3>Daftar Solusi</h3>
              <br/>
              <div class="row">
                <div class="col-md-12">
                  <table class="table table-bordered table-hover" id="gejala" class="display" style="width:100%">
                    <thead>
                      <tr>
                        <th width="20"><center>NO</center></th>
                        <th width="100"><center>KODE SOLUSI</center></th>
                        <th><center>PENCEGAHAN</center></th>
                        <th><center>SOLUSI</center></th>
                        <th><center>AKSI</center></th>
                      </tr>
                    </thead> 
                    <tbody>   
                      <?php 
                        include "../conn.php";
                        $query = mysqli_query($koneksi,"SELECT * FROM solusi ORDER BY id ASC");
                        $no=0;
                        while ($data=mysqli_fetch_array($query)) {
                            // $a = $data['gejala'];
                            $no++;
                      ?>
                      <tr>
                          <td><?php echo $no; ?></td>
                          <td><?php echo $data['kd_solusi']; ?></td>
                          <td><?php echo $data['kd_pencegahan']; ?></td>
                          <td><?php echo $data['solusi']; ?></td>
                          <td>
                              <a  href="editsolusi.php?id=<?php echo $data['id']; ?>" class="btn btn-sm btn-warning">UBAH</a>
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
