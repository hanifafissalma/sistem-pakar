<?php
	// untuk memanggil file
	include './admin/Crud.php';
	// untuk mendeklarasikan class menjadi variabel
	$crud = new Crud();
	$arrayName = $crud->readGejala();
 ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="SISTEM PAKAR DIAGNOSA KERUSAKAN PADA MOBIL">
    <link rel="icon" href="">
    <title>ADMIN SISTEM PAKAR DIAGNOSA KERUSAKAN PADA MOBIL</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/jquery.dataTables.min.css" rel="stylesheet"/>
  </head>
  <body>
    <?php include "header.php"; ?>
    <section>
      <div class="container">
        <div class="row">
            <div class="col-md-12">
              <div class="card" style="padding:20px">
                <h3>KONSULTASI</h3>
                <hr/>
                <form action="hasil.php" method="POST">
                    <div class="form-group">
                        <label>Nama Konsultan</label>
                        <input type="text" name="nama" class="form-control" />
                    </div>
                    <div class="form-group">
                      <label>Pilih Gejala</label>
                      <br/>
                      <?php
                        foreach ($arrayName as $r){
                      ?>
                        <input id="gejala<?php echo $r['id_gejala']; ?>" name="gejala[]" type="checkbox" value="<?php echo $r['id_gejala']; ?>">
                        <?php echo $r['gejala']; ?><br/>
                      <?php
                        }
                      ?>
                      <br/>
					            <input type="submit" name="button" class="btn btn-md btn-danger" value="Proses">
                  </form>
              </div>
            </div>
        </div>
      </div>
    </section>
  </body>
</html>
