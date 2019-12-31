<?php include "conn.php"; ?>
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
    <link href="css/style.css" rel="stylesheet">
  </head>
  <body>
    <?php include "header.php"; ?>
    <section>

    </section>
    <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <h2 class="title">DIAGNOSA KERUSAKAN</h2>
            <?php if (isset($_GET['error'])) {
              echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                      </button>
                      <strong>Ups! </strong> $_GET[error]
                    </div>";
              } else { 
                echo "";
              } 
            ?>
            <form method="POST" action="hasil.php" name="diagnosa" enctype="form-data/multipart">
              <?php 
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
              <input type="submit" class="btn btn-medium btn-primary-sikar" value="Cek Diagnosa Kerusakan" name="proses" />
            </form>
          </div>
        </div>
    </div>
    <script src="js/popper.min.js"></script>
    <script src="js/jquery-slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
