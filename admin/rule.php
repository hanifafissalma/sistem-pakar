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
                <h3>TAMBAH GEJALA</h3>
                <hr/>
                <form action="prosestambahrule.php" method="POST">
                    <div class="form-group">
                        <label class="font-bold">Daftar Gejala</label>
                        <br/>
                        <?php 
                          include "../conn.php";
                          $query = mysqli_query($koneksi,"SELECT * FROM gejala ORDER BY kd_gejala ASC");
                          $no=0;
                          while ($data=mysqli_fetch_array($query)) {
                            $a = $data['gejala'];
                            $no++;
                        ?>
                        <?php echo $no; ?>.    
                        <input type="checkbox" value="<?php echo $data['kd_gejala'];?>" name="cek[]" /> <?php echo $data['gejala']; ?><br />
                        <?php 
                          }
                        ?>
                        <br />
                    </div>
                    <div class="form-group">
                        <label>Daftar Penyakit</label>
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
                    <button type="submit" name="proses" class="btn btn-md btn-danger">Tambah</button>
                </form>
            </div>
            <br/>
            <h3>Daftar Rule</h3>
            <br/>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-hover" id="gejala" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th width="20"><center>NO</center></th>
                                <th width="200"><center>RULE</center></th>
                                <th><center>HASIL</center></th>
                                <th><center>AKSI</center></th>
                            </tr>
                        </thead> 
                        <tbody>   
                        <?php 
                            include "../conn.php";
                            $query = mysqli_query($koneksi,"SELECT * FROM rule ORDER BY jika ASC");
                            $no=0;
                            while ($data=mysqli_fetch_array($query)) {
                                $no++;
                            ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $data['jika']; ?></td>
                                    <td><?php echo $data['maka']; ?></td>
                                    <td>
                                        <a  href="hapusrule.php?id=<?php echo $data['jika']; ?>" class="btn btn-sm btn-danger">HAPUS</a>
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
