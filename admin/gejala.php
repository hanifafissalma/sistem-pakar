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
            <h3>TAMBAH GEJALA</h3>
            <hr/>
            <form action="prosestambahgejala.php" method="POST">
                <div class="form-group">
                    <label>Nama Gejala</label>
                    <input type="text" name="gejala" class="form-control" />
                </div>
                <button type="submit" class="btn btn-md btn-danger">Tambah</button>
            </form>
        </div>
        <br/>
        <h3>Daftar Gejala</h3>
        <br/>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-hover" id="gejala" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th width="20"><center>NO</center></th>
                            <th width="200"><center>KODE GEJALA</center></th>
                            <th><center>NAMA GEJALA</center></th>
                            <th><center>AKSI</center></th>
                        </tr>
                    </thead> 
                    <tbody>   
                    <?php 
                        include "../conn.php";
                        $query = mysqli_query($koneksi,"SELECT * FROM gejala ORDER BY id_gejala ASC");
                        $no=0;
                        while ($data=mysqli_fetch_array($query)) {
                            $a = $data['gejala'];
                            $no++;
                        ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $data['id_gejala']; ?></td>
                                <td><?php echo $data['gejala']; ?></td>
                                <td>
                                    <a  href="editgejala.php?id=<?php echo $data['id_gejala']; ?>" class="btn btn-sm btn-warning">UBAH</a>
                                    <a  href="hapusgejala.php?id=<?php echo $data['id_gejala']; ?>" class="btn btn-sm btn-danger">HAPUS</a>
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
