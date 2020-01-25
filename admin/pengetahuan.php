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
                <h3>TAMBAH BASIS PENGETAHUAN</h3>
                <hr/>
                <form action="prosestambahpengetahuan.php" method="POST">
                    <div class="form-group">
                        <label>Gejala</label>
                        <select name="kd_gejala" class="form-control">
                          <option>-- Pilih Gejala --</option>
                            <?php 
                                include "../conn.php";
                                $query = mysqli_query($koneksi,"SELECT * FROM gejala ORDER BY kd_gejala ASC");
                                $no=0;
                                while ($data=mysqli_fetch_array($query)) {
                                $no++;
                            ?>  
                            <option value="<?php echo $data['kd_gejala'];?>"> <?php echo $data['kd_gejala'];?> - <?php echo $data['gejala']; ?></option>
                            <?php 
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Penyakit</label>
                        <select name="kode" class="form-control">
                          <option>-- Pilih Penyakit --</option>
                            <?php 
                                include "../conn.php";
                                $query = mysqli_query($koneksi,"SELECT * FROM penyakit ORDER BY kode ASC");
                                $no=0;
                                while ($data=mysqli_fetch_array($query)) {
                                $a = $data['nama_penyakit'];
                                $no++;
                            ?>  
                            <option value="<?php echo $data['kode'];?>"> <?php echo $data['kode'];?> - <?php echo $data['nama_penyakit']; ?></option>
                            <?php 
                                }
                            ?>
                            </select>
                    </div>
                    <div class="form-group">
                        <label>Nilai Kepercayaan (MB)</label>
                        <input type="number" step="0.01" name="mb" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Nilai Ketidakpercayan (MD)</label>
                        <input type="number" step="0.01" name="md" class="form-control" />
                    </div>
                    <button type="submit" class="btn btn-md btn-danger">Tambah</button>
                </form>
              </div>
              <br/>
              <h3>Daftar Basis Pengetahuan</h3>
              <br/>
              <div class="row">
                <div class="col-md-12">
                  <table class="table table-bordered table-hover" id="gejala" class="display" style="width:100%">
                    <thead>
                      <tr>
                        <th><center>NO</center></th>
                        <th><center>GEJALA</center></th>
                        <th><center>PENYAKIT</center></th>
                        <th><center>MB</center></th>
                        <th><center>MD</center></th>
                        <th><center>AKSI</center></th>
                      </tr>
                    </thead> 
                    <tbody>   
                      <?php 
                        include "../conn.php";
                        $query = mysqli_query($koneksi,"SELECT * FROM pengetahuan ORDER BY kode_pengetahuan ASC");
                        $no=0;
                        while ($data=mysqli_fetch_array($query)) {
                            $no++;
                      ?>
                      <tr>
                          <td><?php echo $no; ?></td>
                          <td><?php echo $data['kd_gejala']; ?></td>
                          <td><?php echo $data['kode']; ?></td>
                          <td><?php echo $data['mb']; ?></td>
                          <td><?php echo $data['md']; ?></td>
                          <td>
                              <a  href="hapuspengetahuan.php?id=<?php echo $data['kode_pengetahuan']; ?>" class="btn btn-sm btn-danger">HAPUS</a>
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
