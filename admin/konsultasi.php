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
              <h3>Daftar Hasil Konsultasi</h3>
              <br/>
              <div class="row">
                <div class="col-md-12">
                  <table class="table table-bordered table-hover" id="gejala" class="display" style="width:100%">
                    <thead>
                      <tr>
                        <th><center>NO</center></th>
                        <th><center>NAMA</center></th>
                        <th><center>TANGGAL</center></th>
                        <th><center>JENIS MOBIL</center></th>
                        <th><center>KERUSAKAN</center></th>
                        <th><center>CF</center></th>
                        <th><center>AKSI</center></th>
                      </tr>
                    </thead> 
                    <tbody>   
                      <?php 
                        include "../conn.php";
                        $query = mysqli_query($koneksi,"SELECT * FROM konsultasi ORDER BY kode_konsultasi ASC");
                        $no=0;
                        while ($data=mysqli_fetch_array($query)) {
                            $no++;
                      ?>
                      <tr>
                          <td><?php echo $no; ?></td>
                          <td><?php echo $data['nama']; ?></td>
                          <td><?php echo $data['tanggal']; ?></td>
                          <td><?php echo $data['jenis_mobil']; ?></td>
                          <td><?php echo $data['penyakit']; ?></td>
                          <td><?php echo $data['cf']; ?></td>
                          <td>
                              <a  href="hapuskonsultasi.php?id=<?php echo $data['kode_konsultasi']; ?>" class="btn btn-sm btn-danger">HAPUS</a>
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
