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
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <h2 class="title">Hasil Diagnosa</h2>
            <?php  
              include 'conn.php';
              if(isset($_POST['proses'])){    
                $a = $_POST['cek'];
                
                //1
                $sql_1 = mysqli_query($koneksi, "SELECT pencegahan.*, penyakit.*, solusi.* , pakar.*, gejala.*
                                    FROM pencegahan, penyakit, solusi, pakar,gejala
                                    WHERE 
                                    pencegahan.kode=penyakit.kode AND
                                    solusi.kd_pencegahan=pencegahan.kd_pencegahan AND
                                    pakar.kode=penyakit.kode AND
                                    pakar.kd_gejala = gejala.kd_gejala AND
                                    pakar.kd_gejala = '$a[0]'");
                if(mysqli_num_rows($sql_1) == 0){
                  header('location:diagnosa.php?error=Tidak ditemukan kerusakan dengan gejala tersebut, silahkan cek <a href="daftar.php">daftar kerusakan mobil</a>');		
                }else{
                  $row_1 = mysqli_fetch_array($sql_1);
                }
                
                // menangkap data yang di kirim dari form
                $kode = $row_1['nama_penyakit'];
                $bobot = $row_1['bobot'];
                $waktu = date("Y-m-d H:i:s");
                mysqli_query($koneksi,"insert into log values('','$kode','$bobot','$waktu')");
                
                //2
                if(isset($a[1])){
                  $sql_2 = mysqli_query($koneksi, "SELECT pencegahan.*, penyakit.*, solusi.* , pakar.*, gejala.*
                                  FROM pencegahan, penyakit, solusi, pakar,gejala
                                  WHERE 
                                  pencegahan.kode=penyakit.kode AND
                                  solusi.kd_pencegahan=pencegahan.kd_pencegahan AND
                                  pakar.kode=penyakit.kode AND
                                  pakar.kd_gejala = gejala.kd_gejala AND
                                  pakar.kd_gejala = '$a[1]'");
                  if(mysqli_num_rows($sql_2) == 0){
                    echo "";
                  }else{
                    $row_2 = mysqli_fetch_array($sql_2);
                  }

                  $kode = $row_2['nama_penyakit'];
                  $bobot = $row_2['bobot'];
                  $waktu = date("Y-m-d H:i:s");
                  mysqli_query($koneksi,"insert into log values('','$kode','$bobot','$waktu')");
                }
                
                
                //3
                if(isset($a[2])){
                  $sql_3 = mysqli_query($koneksi, "SELECT pencegahan.*, penyakit.*, solusi.* , pakar.*, gejala.*
                                  FROM pencegahan, penyakit, solusi, pakar,gejala
                                  WHERE 
                                  pencegahan.kode=penyakit.kode AND
                                  solusi.kd_pencegahan=pencegahan.kd_pencegahan AND
                                  pakar.kode=penyakit.kode AND
                                  pakar.kd_gejala = gejala.kd_gejala AND
                                  pakar.kd_gejala = '$a[2]'");
                  if(mysqli_num_rows($sql_3) == 0){
                    echo "";
                  }else{
                    $row_3 = mysqli_fetch_array($sql_3);
                  }

                  $kode = $row_3['nama_penyakit'];
                  $bobot = $row_3['bobot'];
                  $waktu = date("Y-m-d H:i:s");
                  mysqli_query($koneksi,"insert into log values('','$kode','$bobot','$waktu')");
                }

                //4
                if(isset($a[3])){
                  $sql_4 = mysqli_query($koneksi, "SELECT pencegahan.*, penyakit.*, solusi.* , pakar.*, gejala.*
                                  FROM pencegahan, penyakit, solusi, pakar,gejala
                                  WHERE 
                                  pencegahan.kode=penyakit.kode AND
                                  solusi.kd_pencegahan=pencegahan.kd_pencegahan AND
                                  pakar.kode=penyakit.kode AND
                                  pakar.kd_gejala = gejala.kd_gejala AND
                                  pakar.kd_gejala = '$a[3]'");
                  if(mysqli_num_rows($sql_4) == 0){
                    echo "";
                  }else{
                    $row_4 = mysqli_fetch_array($sql_4);
                  }

                  $kode = $row_4['nama_penyakit'];
                  $bobot = $row_4['bobot'];
                  $waktu = date("Y-m-d H:i:s");
                  mysqli_query($koneksi,"insert into log values('','$kode','$bobot','$waktu')");
                }

                //5
                if(isset($a[4])){
                  $sql_5 = mysqli_query($koneksi, "SELECT pencegahan.*, penyakit.*, solusi.* , pakar.*, gejala.*
                                  FROM pencegahan, penyakit, solusi, pakar,gejala
                                  WHERE 
                                  pencegahan.kode=penyakit.kode AND
                                  solusi.kd_pencegahan=pencegahan.kd_pencegahan AND
                                  pakar.kode=penyakit.kode AND
                                  pakar.kd_gejala = gejala.kd_gejala AND
                                  pakar.kd_gejala = '$a[4]'");
                  if(mysqli_num_rows($sql_5) == 0){
                    echo "";
                  }else{
                    $row_5 = mysqli_fetch_array($sql_5);
                  }

                  $kode = $row_5['nama_penyakit'];
                  $bobot = $row_5['bobot'];
                  $waktu = date("Y-m-d H:i:s");
                  mysqli_query($koneksi,"insert into log values('','$kode','$bobot','$waktu')");
                }
              
                //6
                if(isset($a[5])){
                  $sql_6 = mysqli_query($koneksi, "SELECT pencegahan.*, penyakit.*, solusi.* , pakar.*, gejala.*
                                  FROM pencegahan, penyakit, solusi, pakar,gejala
                                  WHERE 
                                  pencegahan.kode=penyakit.kode AND
                                  solusi.kd_pencegahan=pencegahan.kd_pencegahan AND
                                  pakar.kode=penyakit.kode AND
                                  pakar.kd_gejala = gejala.kd_gejala AND
                                  pakar.kd_gejala = '$a[5]'");
                  if(mysqli_num_rows($sql_6) == 0){
                    echo "";
                  }else{
                    $row_6 = mysqli_fetch_array($sql_6);
                  }

                  $kode = $row_6['nama_penyakit'];
                  $bobot = $row_6['bobot'];
                  $waktu = date("Y-m-d H:i:s");
                  mysqli_query($koneksi,"insert into log values('','$kode','$bobot','$waktu')");
                }
              }  
            ?>  
            <!-- gejala -->
            <table class="table table-bordered table-hover">
              <tr>
                <td>Gejala</td>
                <td>:</td>
                <td>
                  <?php 
                    if(isset($a[0])){
                      $sql1 = mysqli_query($koneksi, "SELECT * FROM  gejala WHERE kd_gejala='$a[0]'");
                      $row1 = mysqli_fetch_array($sql1);
                      echo "<ul><li>$row1[gejala]</li>";
                    } else {
                      echo "";
                    }
                  ?>
                  <?php
                    if(isset($a[1])){
                      $sql2 = mysqli_query($koneksi, "SELECT * FROM  gejala WHERE kd_gejala='$a[1]'");
                      $row2 = mysqli_fetch_array($sql2);
                      echo "<li>$row2[gejala]</li>";
                    } else {
                      echo "";
                    }
                  ?>
                  <?php
                    if(isset($a[2])){
                      $sql3 = mysqli_query($koneksi, "SELECT * FROM  gejala WHERE kd_gejala='$a[2]'");
                      $row3 = mysqli_fetch_array($sql3);
                      echo "<li>$row3[gejala]</li>";
                    } else {
                      echo "";
                    }
                  ?>
                  <?php
                    if(isset($a[3])){
                      $sql4 = mysqli_query($koneksi, "SELECT * FROM  gejala WHERE kd_gejala='$a[3]'");
                      $row4 = mysqli_fetch_array($sql4);
                      echo "<li>$row4[gejala]</li>";
                    } else {
                      echo "";
                    }
                  ?>
                  <?php
                    if(isset($a[4])){
                      $sql4 = mysqli_query($koneksi, "SELECT * FROM  gejala WHERE kd_gejala='$a[4]'");
                      $row4 = mysqli_fetch_array($sql4);
                      echo "<li>$row4[gejala]</li>";
                    } else {
                      echo "";
                    }
                  ?>
                  <?php
                    if(isset($a[5])){
                      $sql4 = mysqli_query($koneksi, "SELECT * FROM  gejala WHERE kd_gejala='$a[5]'");
                      $row4 = mysqli_fetch_array($sql4);
                      echo "<li>$row4[gejala]</li></ul>";
                    } else {
                      echo "";
                    }
                  ?>
                </td>
              </tr>
            </table>
            <br/>
            
            <!-- hasil 1 -->
            <table class="table table-bordered table-hover">
              <tr>
                <td>Jenis Kerusakan</td>
                <td>:</td>
                <td colspan="2"><?php echo $row_1['nama_penyakit']; ?></td>
              </tr>
              <tr>
                <td>Penyebab</td>
                <td>:</td>
                <td colspan="2"><?php echo $row_1['penyebab']; ?></td>
              </tr>
              <tr>
                <td>Pencegahan</td>
                <td>:</td>
                <td colspan="2"><?php echo $row_1['deskripsi']; ?></td>
              </tr>
              <tr>
                <td>Solusi</td>
                <td>:</td>
                <td colspan="2">
                  <?php
                    $nomor = $row_1['kd_pencegahan'];
                    $query = mysqli_query($koneksi,"SELECT * FROM solusi WHERE kd_pencegahan='$nomor'");
                    $no=0;
                    while ($data=mysqli_fetch_array($query)) {
                  ?>
                  <?php echo $data['solusi']; ?>
                  <?php 
                    }
                  ?>
                </td>
              </tr>
            </table>
            <br/>
                    
            <!-- hasil 2 -->
            <?php
              if(isset($a[1])){
            ?>  
              <table class="table table-bordered table-hover">
                <tr>
                  <td>Jenis Kerusakan</td>
                  <td>:</td>
                  <td colspan="2"><?php echo $row_2['nama_penyakit']; ?></td>
                </tr>
                <tr>
                  <td>Penyebab</td>
                  <td>:</td>
                  <td colspan="2"><?php echo $row_2['penyebab']; ?></td>
                </tr>
                <tr>
                  <td>Pencegahan</td>
                  <td>:</td>
                  <td colspan="2"><?php echo $row_2['deskripsi']; ?></td>
                </tr>
                <tr>
                  <td>Solusi</td>
                  <td>:</td>
                  <td colspan="2">
                    <?php
                      $nomor = $row_2['kd_pencegahan'];
                      $query = mysqli_query($koneksi,"SELECT * FROM solusi WHERE kd_pencegahan='$nomor'");
                      $no=0;
                      while ($data=mysqli_fetch_array($query)) {
                    ?>
                    <?php echo $data['solusi']; ?>
                    <?php 
                      }
                    ?>
                  </td>
                </tr>
              </table>
              <br/>
            <?php
              }
            ?>

            <!-- hasil 3 -->
            <?php
              if(isset($a[2])){
            ?> 
              <table class="table table-bordered table-hover">
                <tr>
                  <td>Jenis Kerusakan</td>
                  <td>:</td>
                  <td colspan="2"><?php echo $row_3['nama_penyakit']; ?></td>
                </tr>
                <tr>
                  <td>Penyebab</td>
                  <td>:</td>
                  <td colspan="2"><?php echo $row_3['penyebab']; ?></td>
                </tr>
                <tr>
                  <td>Pencegahan</td>
                  <td>:</td>
                  <td colspan="2"><?php echo $row_3['deskripsi']; ?></td>
                </tr>
                <tr>
                  <td>Solusi</td>
                  <td>:</td>
                  <td colspan="2">
                    <?php
                      $nomor = $row_3['kd_pencegahan'];
                      $query = mysqli_query($koneksi,"SELECT * FROM solusi WHERE kd_pencegahan='$nomor'");
                      $no=0;
                      while ($data=mysqli_fetch_array($query)) {
                    ?>
                    <?php echo $data['solusi']; ?>
                    <?php 
                      }
                    ?>
                  </td>
                </tr>
              </table>
              <br/>
            <?php
              }
            ?>
            
            <!-- hasil 4 -->
            <?php
              if(isset($a[3])){
            ?> 
              <table class="table table-bordered table-hover">
                <tr>
                  <td>Jenis Kerusakan</td>
                  <td>:</td>
                  <td colspan="2"><?php echo $row_4['nama_penyakit']; ?></td>
                </tr>
                <tr>
                  <td>Penyebab</td>
                  <td>:</td>
                  <td colspan="2"><?php echo $row_4['penyebab']; ?></td>
                </tr>
                <tr>
                  <td>Pencegahan</td>
                  <td>:</td>
                  <td colspan="2"><?php echo $row_4['deskripsi']; ?></td>
                </tr>
                <tr>
                  <td>Solusi</td>
                  <td>:</td>
                  <td colspan="2">
                    <?php
                      $nomor = $row_4['kd_pencegahan'];
                      $query = mysqli_query($koneksi,"SELECT * FROM solusi WHERE kd_pencegahan='$nomor'");
                      $no=0;
                      while ($data=mysqli_fetch_array($query)) {
                    ?>
                    <?php echo $data['solusi']; ?>
                    <?php 
                      }
                    ?>
                  </td>
                </tr>
              </table>
              <br/>
            <?php
              }
            ?>

            <!-- hasil 5 -->
            <?php
              if(isset($a[4])){
            ?> 
              <table class="table table-bordered table-hover">
                <tr>
                  <td>Jenis Kerusakan</td>
                  <td>:</td>
                  <td colspan="2"><?php echo $row_5['nama_penyakit']; ?></td>
                </tr>
                <tr>
                  <td>Penyebab</td>
                  <td>:</td>
                  <td colspan="2"><?php echo $row_5['penyebab']; ?></td>
                </tr>
                <tr>
                  <td>Pencegahan</td>
                  <td>:</td>
                  <td colspan="2"><?php echo $row_5['deskripsi']; ?></td>
                </tr>
                <tr>
                  <td>Solusi</td>
                  <td>:</td>
                  <td colspan="2">
                    <?php
                      $nomor = $row_5['kd_pencegahan'];
                      $query = mysqli_query($koneksi,"SELECT * FROM solusi WHERE kd_pencegahan='$nomor'");
                      $no=0;
                      while ($data=mysqli_fetch_array($query)) {
                    ?>
                    <?php echo $data['solusi']; ?>
                    <?php 
                      }
                    ?>
                  </td>
                </tr>
              </table>
              <br/>
            <?php
              }
            ?>

            <!-- hasil 6 -->
            <?php
              if(isset($a[5])){
            ?> 
              <table class="table table-bordered table-hover">
                <tr>
                  <td>Jenis Kerusakan</td>
                  <td>:</td>
                  <td colspan="2"><?php echo $row_6['nama_penyakit']; ?></td>
                </tr>
                <tr>
                  <td>Penyebab</td>
                  <td>:</td>
                  <td colspan="2"><?php echo $row_6['penyebab']; ?></td>
                </tr>
                <tr>
                  <td>Pencegahan</td>
                  <td>:</td>
                  <td colspan="2"><?php echo $row_6['deskripsi']; ?></td>
                </tr>
                <tr>
                  <td>Solusi</td>
                  <td>:</td>
                  <td colspan="2">
                    <?php
                      $nomor = $row_6['kd_pencegahan'];
                      $query = mysqli_query($koneksi,"SELECT * FROM solusi WHERE kd_pencegahan='$nomor'");
                      $no=0;
                      while ($data=mysqli_fetch_array($query)) {
                    ?>
                    <?php echo $data['solusi']; ?>
                    <?php 
                      }
                    ?>
                  </td>
                </tr>
              </table>
              <br/>
            <?php
              }
            ?>

            <a class="btn btn-md btn-primary-sikar" href="diagnosa.php">Kembali</a>
          </div>
        </div>
      </div>
    </section>
    <script src="js/popper.min.js"></script>
    <script src="js/jquery-slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
