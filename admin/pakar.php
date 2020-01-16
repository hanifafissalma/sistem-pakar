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
        <div class="card" style="padding:20px">
            <h3>TAMBAH PAKAR</h3>
            <hr/>
            <form action="prosestambahpakar.php" method="POST">
                <div class="form-group">
                    <label>Gejala</label>
                    <select name="kd_gejala" class="form-control">
                      <?php 
                        include "../conn.php";
                        $query = mysqli_query($koneksi,"SELECT * FROM gejala ORDER BY kd_gejala ASC");
                        $no=0;
                        while ($data=mysqli_fetch_array($query)) {
                          $a = $data['gejala'];
                          $no++;
                      ?>  
                      <option value="<?php echo $data['kd_gejala'];?>"> <?php echo $data['gejala']; ?></option>
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
                          $a = $data['nama_penyakit'];
                          $no++;
                      ?>  
                      <option value="<?php echo $data['kode'];?>"> <?php echo $data['nama_penyakit']; ?></option>
                      <?php 
                        }
                      ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Bobot</label>
                    <input type="number" step="0.01" name="bobot" class="form-control" />
                </div>
                <button type="submit" class="btn btn-md btn-danger">Tambah</button>
            </form>
        </div>
        <br/>
        <h3>Daftar Pakar</h3>
        <br/>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-hover" id="gejala" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th width="20"><center>NO</center></th>
                            <th width="200"><center>KODE GEJALA</center></th>
                            <th><center>KODE PENYAKIT</center></th>
                            <th width="200"><center>BOBOT</center></th>
                            <th><center>AKSI</center></th>
                        </tr>
                    </thead> 
                    <tbody>   
                    <?php 
                        include "../conn.php";
                        $query = mysqli_query($koneksi,"SELECT * FROM pakar ORDER BY kode_pakar ASC");
                        $no=0;
                        while ($data=mysqli_fetch_array($query)) {
                            $no++;
                        ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $data['kd_gejala']; ?></td>
                                <td><?php echo $data['kode']; ?></td>
                                <td><?php echo $data['bobot']; ?></td>
                                <td>
                                    <a  href="editpakar.php?id=<?php echo $data['kode_pakar']; ?>" class="btn btn-sm btn-warning">UBAH</a>
                                </td>
                            </tr>  
                        <?php } ?>
                        </tbody>
                </table>
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