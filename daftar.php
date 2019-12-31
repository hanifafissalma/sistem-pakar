<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="SISTEM PAKAR DIAGNOSA KERUSAKAN PADA MOBIL">
    <link rel="icon" href="">
    <title>SISTEM PAKAR DIAGNOSA KERUSAKAN PADA MOBIL</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/justified-nav.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <?php include "header.php"; ?>
      <main role="main">
        <div class="row">
          <div class="col-lg-12">
            <h2>Daftar Penyakit Tanaman Sayur Organik</h2>
            <table class="table table-bordered table-hover">
		          <tr>
                <th><center>NO</center></th>
                <th><center>KODE </center></th>
                <th><center>NAMA PENYAKIT</center></th>
                <th><center>PENYEBAB</center></th>
                <th><center>DESKRIPSI</center></th>
		          </tr>
              <?php 
                  include "conn.php";
                    $query = mysqli_query($koneksi,"SELECT * FROM penyakit ORDER BY kode ASC");
                    $no=0;
                while ($data=mysqli_fetch_array($query)) {
                        $no++;
              ?>
		          <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $data['kode']; ?></td>
                <td><?php echo $data['nama_penyakit']; ?></td>
                <td><?php echo $data['penyebab']; ?></td>
                <td><a href="deskripsi.php?id=<?php echo $data['kode']; ?>" class="btn btn-sm btn-primary">Detail</a></td>
              </tr>
            <?php } ?>
            </table>
          </div>
        </div>
      </main>
      <footer class="footer">
        <p>Copyright &copy; 2019</p>
      </footer>
    </div>
    <script src="js/popper.min.js"></script>
    <script src="js/jquery-slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
