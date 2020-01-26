<?php
    include 'Crud.php';
    $crud = new Crud();
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
                    <h3>Hasil Konsultasi</h3>
                    <br/>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <tbody>   
                                    <tr>
                                        <td>Nama Konsultan</td>
                                        <td>:</td>
                                        <td><?php echo $_POST['nama']?></td>
                                    </tr> 
                                    <tr>
                                        <td>Tanggal Konsultasi</td>
                                        <td>:</td>
                                        <td><?php echo date("Y-m-d H:i:s")?></td>
                                    </tr> 
                                    <tr>
                                        <td>Jumlah Gejala</td>
                                        <td>:</td>
                                        <td>
                                            <?php
                                                if(isset($_POST['button'])){
                                                    echo count($_POST['gejala']);
                                                }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Kemungkinan Penyakit</td>
                                        <td>:</td>
                                        <td>
                                        <?php
                                            if (isset($_POST['button'])){
                                                // group kemungkinan terdapat penyakit
                                                $groupKemungkinanPenyakit = $crud->getGroupPengetahuan(implode(",", $_POST['gejala']));

                                                // menampilkan kode gejala yang di pilih
                                                $sql = $_POST['gejala'];

                                                if (isset($sql)) {
                                                    // mencari data penyakit kemungkinan dari gejala
                                                    for ($h=0; $h < count($sql); $h++) {
                                                        $kemungkinanPenyakit[] = $crud->getKemungkinanPenyakit($sql[$h]);
                                                        for ($x=0; $x < count($kemungkinanPenyakit[$h]); $x++) {
                                                            for ($i=0; $i < count($groupKemungkinanPenyakit); $i++) {
                                                                $namaPenyakit = $groupKemungkinanPenyakit[$i]['nama_penyakit'];
                                                                if ($kemungkinanPenyakit[$h][$x]['nama_penyakit'] == $namaPenyakit) {
                                                                // list di kemungkinan dari gejala
                                                                $listIdKemungkinan[$namaPenyakit][] = $kemungkinanPenyakit[$h][$x]['id_pengetahuan'];
                                                                }
                                                            }
                                                        }
                                                    }
                                                    $id_penyakit_terbesar = '';
                                                    $nama_penyakit_terbesar = '';
                                                    // list penyakit kemungkinan
                                                    for ($h=0; $h < count($groupKemungkinanPenyakit); $h++) { 
                                                        $namaPenyakit = $groupKemungkinanPenyakit[$h]['nama_penyakit'];
                                                        echo "Proses Penyakit ".$h.".<br/><b>".$namaPenyakit."</b>";
                        
                                                        // list penyakit kemungkinan dari gejala
                                                        for ($x=0; $x < count($listIdKemungkinan[$namaPenyakit]); $x++) { 
                                                            $daftarKemungkinanPenyakit = $crud->getListPenyakit($listIdKemungkinan[$namaPenyakit][$x]);
                                                             echo "<br/>proses ".$x."<br/>";
                                  
                                                            for ($i=0; $i < count($daftarKemungkinanPenyakit); $i++) {
                                                                if (count($listIdKemungkinan) == 1) {
                                                                    echo "<br/>Jumlah Gejala = ".count($listIdKemungkinan[$namaPenyakit])."<br/>";
                                    
                                                                    // bila list kemungkinan terdapat 1
                                                                    $mb = $daftarKemungkinanPenyakit[$i]['mb'];
                                                                    $md = $daftarKemungkinanPenyakit[$i]['md'];
                                                                    $cf = $mb - $md;
                                                                    $daftar_cf[$namaPenyakit][] = $cf;

                                                                    echo "<br/>proses 1<br/>------------------------<br/>";
                                                                    echo "mb = ".$mb."<br/>";
                                                                    echo "md = ".$md."<br/>";
                                                                    echo "cf = mb - md = ".$mb." - ".$md." = ".$cf."<br/><br/><br/>";
                                                                    // end bila list kemungkinan terdapat 1
                                                                } else {
                                                                    // list kemungkinanan lebih dari satu
                                                                    if ($x == 0){
                                                                        echo "<br/>Jumlah Gejala = ".
                                                                        count($listIdKemungkinan[$namaPenyakit])."<br/>";
                                                                        // record md dan mb sebelumnya
                                                                        $mblama = $daftarKemungkinanPenyakit[$i]['mb'];
                                                                        $mdlama = $daftarKemungkinanPenyakit[$i]['md'];
                                                                        // md yang di esekusi
                                                                        $mb = $daftarKemungkinanPenyakit[$i]['mb'];
                                                                        $md = $daftarKemungkinanPenyakit[$i]['md'];
                                                                        echo "<br/>";
                                                                        echo "mbbaru = ".$mb."<br/>";
                                                                        echo "mdbaru = ".$md."<br/>";
                                                                        $cf = $mb - $md;
                                                                        echo "cf = mb - md = ".$mb." - ".$md." = ".$cf."<br/><br/><br/>";

                                                                        $daftar_cf[$namaPenyakit][] = $cf;
                                                                    } else {
                                                                        $mbbaru = $daftarKemungkinanPenyakit[$i]['mb'];
                                                                        $mdbaru = $daftarKemungkinanPenyakit[$i]['md'];
                                                                        echo "mbbaru = ".$mbbaru."<br/>";
                                                                        echo "mdbaru = ".$mdbaru."<br/>";
                                                                        $mbsementara = $mblama + ($mbbaru * (1 - $mblama));
                                                                        $mdsementara = $mdlama + ($mdbaru * (1 - $mdlama));
                                                                        echo "mbsementara = mblama + (mbbaru * (1 - mblama)) = $mblama + ($mbbaru * (1 - $mblama)) = ".$mbsementara."<br/>";
                                                                        echo "mdsementara = mdlama + (mdbaru * (1 - mdlama)) = $mdlama + ($mdbaru * (1 - $mdlama)) = ".$mdsementara."<br/>";

                                                                        $mb = $mbsementara;
                                                                        $md = $mdsementara;
                                                                        $cf = $mb - $md;
                                                                        echo "cf = mblama - mdlama = ".$mb." - ".$md." = ".$cf."<br/><br/><br/>";
                                                                        $daftar_cf[$namaPenyakit][] = $cf;;
                                                                    }
                                                                    // end list kemungkinanan lebih dari satu
                                                                }
                                                            }
                                                        }  
                                                    }
                                                }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Hasil Diagnosa</td>
                                        <td>:</td>
                                        <td>
                                            <?php 
                                                    $crud->hasilCFTertinggi($daftar_cf,$groupKemungkinanPenyakit);
                                                    $crud->hasilAkhir($daftar_cf,$groupKemungkinanPenyakit);
                                                }
                                            ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  </body>
</html>
