<?php
session_start();
include 'koneksi.php';
if (isset($_SESSION['admin'])) {
} else if (isset($_SESSION['user'])) {
} else {
    echo "<script>alert['anda harus login'];</script>";
    echo "<script>location='login.php';</script>";
    header('location:login.php');
    exit();
}
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RENTAL PS</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- data btables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <?php include 'Auth/navbar.php' ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->

            <!-- Sidebar -->
            <?php include 'Auth/sidebar.php' ?>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Ruang Penyewaan</h1>
                        </div><!-- /.col -->

                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <?php if (isset($_SESSION['user'])) { ?>

                    <?php } else { ?>
                        <!-- <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="m-0">Featured</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h2>Data Penyewaan</h2>
                                            </div>
                                            <table id="example1" class="table table-bordered">

                                                <head>
                                                    <tr>
                                                        <th>Nama PS</th>
                                                        <th>Nama Penyewa</th>
                                                        <th>Tanggal Sewa</th>
                                                        <th>Kembali</th>
                                                        <th>No Telp</th>
                                                        <th>Status</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </head>
                                                <tbody>
                                                    <?php $nomor = 1; ?>
                                                    <?php $ambil_rental = $koneksi->query("SELECT * FROM tb_sewa 
                                                                                            JOIN tb_barang ON tb_sewa.id_ps = tb_barang.id_ps 
                                                                                            JOIN user ON tb_sewa.id_user = user.id_user 
                                                                                            WHERE tb_sewa.status = 'Disewakan'"); ?>
                                                    <?php while ($pecah_rental = $ambil_rental->fetch_assoc()) { ?>
                                                        <tr>
                                                            <td><?php echo $pecah_rental['nama_barang'] ?></td>
                                                            <td><?php echo $pecah_rental['nama_pelanggan'] ?></td>
                                                            <td><?php echo $pecah_rental['tgl_sewa'] ?></td>
                                                            <td><?php echo $pecah_rental['tgl_kembali'] ?></td>
                                                            <td><?php echo $pecah_rental['no_telp_user'] ?></td>
                                                            <td>
                                                                <h6 class="text-danger"><i><b><?php echo $pecah_rental['status'] ?></b></i></h6>
                                                            </td>
                                                            <td>
                                                                <a href="klaim.php?id=<?php echo $pecah_rental['id_sewa'] ?>" class="btn btn-success btn-sm">Klaim</a>
                                                            </td>
                                                        </tr>
                                                        <?php $nomor++ ?>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                </div> -->
                    <?php } ?>
                    <div class="row">
                       
                        <!-- /.col-md-6 -->
                        <!-- Modal Jadwal -->
                        <!-- Button trigger modal -->
                        <!-- modal cek game -->
                        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Game yang tersedia</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Nama Game</th>
                                                    <th>Jenis PS</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $ambil_game = $koneksi->query("SELECT * FROM data_game JOIN tb_barang ON data_game.id_ps = tb_barang.id_ps"); ?>
                                                <?php while ($pecahgame = $ambil_game->fetch_assoc()) { ?>
                                                    <tr>
                                                        <td><?php echo $pecahgame['nama_game'] ?></td>
                                                        <td><?php echo $pecahgame['nama_barang'] ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Jadwal yang telah di boking</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Nama PS</th>
                                                    <th>Estimasi</th>
                                                    <th>Waktu Mulai</th>
                                                    <th>Waktu Berakhir</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $ambilsewa1 = $koneksi->query("SELECT * FROM tb_sewa JOIN tb_barang ON tb_sewa.id_ps = tb_barang.id_ps WHERE status = 'Disewakan'"); ?>
                                                <?php while ($pecahsewa1 = $ambilsewa1->fetch_assoc()) { ?>
                                                    <tr>
                                                        <td><?php echo $pecahsewa1['nama_barang'] ?></td>
                                                        <td><?php echo $pecahsewa1['estimasi'] ?></td>
                                                        <td><?php echo $pecahsewa1['waktu_sewa'] ?></td>
                                                        <td><?php echo $pecahsewa1['sewa_akhir'] ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- akhir modal cek game -->
                        <!-- Modal -->
                        <!-- akhir Modal Jadwal -->
                    </div>
                    <?php
                    if (isset($_SESSION['user'])) { ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="m-0">Featured</h5>
                                    </div>
                                    <div class="card-body">
                                        <form action="" method="POST">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <h2>Sewa Kamar Kos</h2>
                                                </div>
                                                <!-- <div class="col-lg-6 text-right">
                                                    <?php date_default_timezone_set("Asia/Jakarta")  ?>
                                                    <h4>Hari ini tanggal <?php echo date('Y-m-d') ?> | Pukul <?php echo date('H:i:s'); ?></h4>
                                                </div> -->
                                                <div class="col-lg-12">
                                                    <hr>
                                                </div>

                                                <div class="col-lg-12">
                                                    <div class="mb-3 row">
                                                    <h5  class="col-sm-1 mt-1">Nama</h5>
                                                        <div class="col-sm-11">
                                                        <input type="text" class="form-control" name="nama_user" readonly <?php if (isset($_SESSION['user'])) { ?> value="<?php echo $_SESSION['user']['nama_user'] ?>" <?php  } ?> >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="mb-3 row">
                                                    <h5  class="col-sm-1 mt-1">No Telpon</h5>
                                                        <div class="col-sm-11">
                                                        <input type="text" class="form-control" name="no_telp" readonly <?php if (isset($_SESSION['user'])) { ?> value="<?php echo $_SESSION['user']['no_telp_user'] ?>" <?php  } ?> >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="mb-3 row">
                                                    <h5  class="col-sm-1 mt-1">Alamat</h5>
                                                        <div class="col-sm-11">
                                                        <input type="text" class="form-control" readonly <?php if (isset($_SESSION['user'])) { ?> value="<?php echo $_SESSION['user']['alamat'] ?>" <?php  } ?> >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="mb-3 row">
                                                    <h5  class="col-sm-1 mt-1">Nama Kamar</h5>
                                                        <div class="col-sm-11">
                                                        <select name="nama_ps" id="" class="form-control">
                                                            <option value="">- Pilih -</option>
                                                            <?php $ambil_barang = $koneksi->query("SELECT * FROM tb_barang WHERE stok_barang >=1"); ?>
                                                            <?php while ($pecah_barang = $ambil_barang->fetch_assoc()) { ?>
                                                                <option value="<?php echo $pecah_barang['id_ps'] ?>"><?php echo $pecah_barang['nama_barang'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="mb-3 row">
                                                    <h5  class="col-sm-1 mt-1">Jumlah</h5>
                                                        <div class="col-sm-11">
                                                        <select name="nama_game" id="" class="form-control">
                                                            <option value="">- Pilih -</option>
                                                            </option>
                                                            <?php $ambil_ganme = $koneksi->query("SELECT * FROM data_game"); ?>
                                                            <?php while ($pecah_ganme = $ambil_ganme->fetch_assoc()) { ?>
                                                                <option value="<?php echo $pecah_ganme['id_game'] ?>">
                                                                    <table class="table table-bordered">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td><b><?php echo $pecah_ganme['nama_game'] ?> </b></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>

                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="mb-3 row">
                                                    <h5  class="col-sm-1 mt-1">Estimasi</h5>
                                                        <div class="col-sm-11">
                                                        <select name="estimasi" id="" class="form-control">
                                                            <option value="">- Pilih -</option>
                                                            <option value="1 hours">1 Bulan</option>
                                                            <option value="2 hours">2 Bulan</option>
                                                            <option value="3 hours">3 Bulan</option>
                                                            <option value="4 hours">4 Bulan</option>
                                                            <option value="5 hours">5 Bulan</option>
                                                            <option value="6 hours">6 Bulan</option>
                                                            <option value="12 hours">12 Bulan</option>
                                                        </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="mb-3 row">
                                                    <h5 class="col-sm-1 mt-1">Waktu Mulai</h5>
                                                        <div class="col-sm-11">
                                                        <input type="time" class="form-control" name="waktu" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="mb-3 row">
                                                    <h5 class="col-sm-1 mt-1">Tanggal</h5>
                                                        <div class="col-sm-11">
                                                        <input type="date" class="form-control" placeholder="Input disini ..." name="tgl" required>
                                                        </div>
                                                    </div>


                                                <div class="col-lg-12">
                                                    <div class="mb-3 row">
                                                    <h5 class="col-sm-1 mt-1"></h5>
                                                        <div class="col-sm-5">
                                                        <h5><b>Keterangan : </b></h5>  
                                                        <h5>Apabila penyewa tidak melakukan pembayaran dengan tepat, atau lebih dari 5 menit sesuai waktu yang ditentukan 
                                                                                        (waktu mulai) maka admin akan membatalkan pesanan.
                                                                                    </h5>
                                                        </div>
                                                        <div class="col-sm-5">
                                                        <h5><b>Harga / bulan : </b></h5>  
                                                        <h5>Kamar Biasa = Rp. 400.000</h5>
                                                        <h5>Kamar Menengah = Rp. 450.000</h5>
                                                        <h5>Kamar Mewah = Rp. 500.000</h5>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <div class="mb-3 row">
                                                    <h5 class="col-sm-1 mt-1"></h5>
                                                        <div class="col-sm-11">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="YA" id="flexCheckDefault" name="perjanjian" required>
                                                            <label class="form-check-label" for="flexCheckDefault">
                                                                <h6><i>Saya Besedia mengikuti persyaratan yang telah di tentukan sesuai peraturan yang ada.</i></h6>
                                                            </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12">
                                                    <div class="mb-3 row">
                                                    <h5 class="col-sm-1 mt-1"></h5>
                                                        <div class="col-sm-11">
                                                        <button class="btn btn-secondary">Batalkan</button>
                                                        <button type="submit" name="order" class="btn btn-primary">Order Pesanan</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                   
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                        </form>
                                       
                                        <?php
                                        if (isset($_POST['order'])) {
                                            //menjumlahkan waktu : 
                                            $waktu = date_create($_POST['waktu']) ;
                                            $sewaestimasi = $_POST['estimasi'];
                                            preg_match_all('!\d+!', $sewaestimasi, $matches);
                                            $angka = $matches[0][0];
                                            $hours = 'hours';
                                            echo $sewaestimasi;
                                            $datePlusMonth = clone $waktu;
                                            $datePlusMonth->modify('+' . $angka . ' month');
                                            $jumlahwaktu = date_format($datePlusMonth, 'Y-m-d H:i:s');

                                            //random kode
                                            $alpanumeric = "abcdefghijklmnopqrstupwxyxABCDEFGHIJKLMNOPQRSTUPWXYZ1234567890ashfhndasghufjwhegfu4hfindajcbhdsvbchashckqwijiodfjweiKJSANCKNSAJH938u49534785234hjsdbcfhdsbhvcdsbhcvajksncuehndsldlkwefoelwmcvlkmkremvCU38275R87345THFJCBSDHCY";
                                            $arr = array();
                                            $length = strlen($alpanumeric) - 2;
                                            for ($i = 0; $i < 5; $i++) {
                                                $x = rand(0, $length);
                                                $arr[] = $alpanumeric[$x];
                                            };
                                            $koderel = implode($arr);
                                            $iduser = $_SESSION['user']['id_user'];

                                           

                                          if($_POST['estimasi'] == "1 hours"){
                                            $koneksi->query("INSERT INTO tb_sewa (kd_sewa, id_ps, id_user, id_game, tgl_sewa, waktu_sewa, estimasi, perjanjian)
                                            VALUES('$koderel','$_POST[nama_ps]', '$iduser', '$_POST[nama_game]','$_POST[tgl]', '$_POST[waktu]', '1','$_POST[perjanjian]')");
                                            $idbarusan = $koneksi->insert_id;
                                            $_SESSION['order'] = $idbarusan;

                                            // $koneksi->query("INSERT INTO tb_sewa (sewa_akhir)
                                            // VALUES('$jumlahwaktu')");
                                            $koneksi->query("UPDATE tb_sewa SET sewa_akhir = '$jumlahwaktu' WHERE id_sewa = $idbarusan ");

                                            echo "<script>alert('Pesanan anda telah di rekam')</script>";
                                            echo "<meta http-equiv='refresh' content='1;url=konfir_order.php?id=$idbarusan'>";

                                          }else if ($_POST['estimasi'] == "2 hours"){
                                            $koneksi->query("INSERT INTO tb_sewa (kd_sewa, id_ps, id_user, id_game, tgl_sewa, waktu_sewa, estimasi, perjanjian)
                                            VALUES('$koderel','$_POST[nama_ps]', '$iduser', '$_POST[nama_game]','$_POST[tgl]', '$_POST[waktu]', '2','$_POST[perjanjian]')");
                                            $idbarusan = $koneksi->insert_id;
                                            $_SESSION['order'] = $idbarusan;

                                            // $koneksi->query("INSERT INTO tb_sewa (sewa_akhir)
                                            // VALUES('$jumlahwaktu')");
                                            $koneksi->query("UPDATE tb_sewa SET sewa_akhir = '$jumlahwaktu' WHERE id_sewa = $idbarusan ");

                                            echo "<script>alert('Pesanan anda telah di rekam')</script>";
                                            echo "<meta http-equiv='refresh' content='1;url=konfir_order.php?id=$idbarusan'>";
                                          }else if($_POST['estimasi'] == "3 hours"){
                                            $koneksi->query("INSERT INTO tb_sewa (kd_sewa, id_ps, id_user, id_game, tgl_sewa, waktu_sewa, estimasi, perjanjian)
                                            VALUES('$koderel','$_POST[nama_ps]', '$iduser', '$_POST[nama_game]','$_POST[tgl]', '$_POST[waktu]', '3','$_POST[perjanjian]')");
                                            $idbarusan = $koneksi->insert_id;
                                            $_SESSION['order'] = $idbarusan;

                                            // $koneksi->query("INSERT INTO tb_sewa (sewa_akhir)
                                            // VALUES('$jumlahwaktu')");
                                            $koneksi->query("UPDATE tb_sewa SET sewa_akhir = '$jumlahwaktu' WHERE id_sewa = $idbarusan ");

                                            echo "<script>alert('Pesanan anda telah di rekam')</script>";
                                            echo "<meta http-equiv='refresh' content='1;url=konfir_order.php?id=$idbarusan'>";

                                          }else if ($_POST['estimasi'] == "4 hours"){
                                            $koneksi->query("INSERT INTO tb_sewa (kd_sewa, id_ps, id_user, id_game, tgl_sewa, waktu_sewa, estimasi, perjanjian)
                                            VALUES('$koderel','$_POST[nama_ps]', '$iduser', '$_POST[nama_game]','$_POST[tgl]', '$_POST[waktu]', '4','$_POST[perjanjian]')");
                                            $idbarusan = $koneksi->insert_id;
                                            $_SESSION['order'] = $idbarusan;

                                            // $koneksi->query("INSERT INTO tb_sewa (sewa_akhir)
                                            // VALUES('$jumlahwaktu')");
                                            $koneksi->query("UPDATE tb_sewa SET sewa_akhir = '$jumlahwaktu' WHERE id_sewa = $idbarusan ");

                                            echo "<script>alert('Pesanan anda telah di rekam')</script>";
                                            echo "<meta http-equiv='refresh' content='1;url=konfir_order.php?id=$idbarusan'>";

                                          }else if ($_POST['estimasi'] == "5 hours"){
                                            $koneksi->query("INSERT INTO tb_sewa (kd_sewa, id_ps, id_user, id_game, tgl_sewa, waktu_sewa, estimasi, perjanjian)
                                            VALUES('$koderel','$_POST[nama_ps]', '$iduser', '$_POST[nama_game]','$_POST[tgl]', '$_POST[waktu]', '5','$_POST[perjanjian]')");
                                            $idbarusan = $koneksi->insert_id;
                                            $_SESSION['order'] = $idbarusan;

                                            // $koneksi->query("INSERT INTO tb_sewa (sewa_akhir)
                                            // VALUES('$jumlahwaktu')");
                                            $koneksi->query("UPDATE tb_sewa SET sewa_akhir = '$jumlahwaktu' WHERE id_sewa = $idbarusan ");

                                            echo "<script>alert('Pesanan anda telah di rekam')</script>";
                                            echo "<meta http-equiv='refresh' content='1;url=konfir_order.php?id=$idbarusan'>";

                                          }else if ($_POST['estimasi'] == "6 hours"){
                                            $koneksi->query("INSERT INTO tb_sewa (kd_sewa, id_ps, id_user, id_game, tgl_sewa, waktu_sewa, estimasi, perjanjian)
                                            VALUES('$koderel','$_POST[nama_ps]', '$iduser', '$_POST[nama_game]','$_POST[tgl]', '$_POST[waktu]', '6','$_POST[perjanjian]')");
                                            $idbarusan = $koneksi->insert_id;
                                            $_SESSION['order'] = $idbarusan;

                                            // $koneksi->query("INSERT INTO tb_sewa (sewa_akhir)
                                            // VALUES('$jumlahwaktu')");
                                            $koneksi->query("UPDATE tb_sewa SET sewa_akhir = '$jumlahwaktu' WHERE id_sewa = $idbarusan ");

                                            echo "<script>alert('Pesanan anda telah di rekam')</script>";
                                            echo "<meta http-equiv='refresh' content='1;url=konfir_order.php?id=$idbarusan'>";

                                          }else if ($_POST['estimasi'] == "12 hours"){
                                            $koneksi->query("INSERT INTO tb_sewa (kd_sewa, id_ps, id_user, id_game, tgl_sewa, waktu_sewa, estimasi, perjanjian)
                                            VALUES('$koderel','$_POST[nama_ps]', '$iduser', '$_POST[nama_game]','$_POST[tgl]', '$_POST[waktu]', '12','$_POST[perjanjian]')");
                                            $idbarusan = $koneksi->insert_id;
                                            $_SESSION['order'] = $idbarusan;

                                            // $koneksi->query("INSERT INTO tb_sewa (sewa_akhir)
                                            // VALUES('$jumlahwaktu')");
                                            $koneksi->query("UPDATE tb_sewa SET sewa_akhir = '$jumlahwaktu' WHERE id_sewa = $idbarusan ");

                                            echo "<script>alert('Pesanan anda telah di rekam')</script>";
                                            echo "<meta http-equiv='refresh' content='1;url=konfir_order.php?id=$idbarusan'>";

                                          
                                          }else{

                                          }

                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <!-- /.col-md-6 -->
                        </div>
                    <?php } ?>
                    
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <!-- <footer class="main-footer">
            <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
        </footer> -->
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- data tables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="plugins/jszip/jszip.min.js"></script>
    <script src="plugins/pdfmake/pdfmake.min.js"></script>
    <script src="plugins/pdfmake/vfs_fonts.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
</body>

</html>