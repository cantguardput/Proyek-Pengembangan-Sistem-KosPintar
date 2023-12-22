<?php
session_start();
include 'koneksi.php';

$idbrg = $_GET['id'];
$ambildata_brg = $koneksi->query("SELECT * FROM tb_barang WHERE id_barang = $idbrg");
$pecah_brg = $ambildata_brg->fetch_assoc();

if (isset($_SESSION['admin'])) {
} else if (isset($_SESSION['user'])) {
} else {
    echo "<script>alert['anda harus login'];</script>";
    echo "<script>location='login.php';</script>";
    header('location:login.php');
    exit();
}

$stok = $pecah_brg['stok_barang'];
if ($stok == '0') {
    echo "<script>alert('Stok Barang 0 Anda tidak bisa sewa')</script>";
    echo "<meta http-equiv='refresh' content='1;url=rental.php'>";
} else {
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
    <title>AdminLTE 3 | Starter</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">

    <!-- Time -->
    <script>
        function startTime() {
            var today = new Date();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('jam').innerHTML = h + ":" + m + ":" + s;
            var t = setTimeout(function() {
                startTime()
            }, 500);
        }

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i
            }; // add zero in front of numbers < 10
            return i;
        }
    </script>
</head>

<body class="hold-transition sidebar-mini" onload="startTime()">
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
                            <h1 class="m-0">Ruang Input Data</h1>
                        </div><!-- /.col -->

                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="m-0">Featured</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h2>Detail Barang</h2>
                                            <hr>
                                        </div>
                                        <div class="col-lg-12 mt-3 mb-3">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Kode Barang</th>
                                                        <th>Nama Barang</th>
                                                        <th>Jenis Barang</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><?php echo $pecah_brg['kode_barang'] ?></td>
                                                        <td><?php echo $pecah_brg['nama_barang'] ?></td>
                                                        <td><?php echo $pecah_brg['jenis_barang'] ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.col-md-6 -->
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="m-0">Featured</h5>
                                </div>
                                <div class="card-body">
                                    <form method="POST">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h2>Data Pelanggan</h2>
                                                <hr>
                                            </div>
                                            <div class="col-lg-6">
                                                <div id="jam" style="width: 900px;"></div>
                                                <hr>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <h6>Kode Rental</h6>
                                                    <input type="text" class="form-control" placeholder="Input disini ..." name="nama_pelanggan">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <h6>NIK</h6>
                                                    <input type="text" class="form-control" placeholder="Input disini ..." name="nama_pelanggan">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <h6>Nama Pelanggan</h6>
                                                    <input type="text" class="form-control" placeholder="Input disini ..." name="nama_pelanggan">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <h6>Alamat</h6>
                                                    <input type="text" class="form-control" placeholder="Input disini ..." name="alamat">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <h6>Nomor Telpon</h6>
                                                    <input type="number" class="form-control" placeholder="Input disini ..." name="nomor_telp">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <h6>Estimasi</h6>
                                                <div class="form-group">
                                                    <select name="estimasi" id="" class="form-control">
                                                        <option value="0">//Rental Per Jam</option>
                                                        <option value="1 Jam">1 Jam</option>
                                                        <option value="2 Jam">2 Jam</option>
                                                        <option value="3 Jam">3 Jam</option>
                                                        <option value="4 Jam">4 Jam</option>
                                                        <option value="5 Jam">5 Jam</option>
                                                        <option value="6 Jam">6 Jam</option>
                                                        <option value="0">//Rental Per Hari</option>
                                                        <option value="1 Hari">1 Hari</option>
                                                        <option value="2 Hari">2 Hari</option>
                                                        <option value="3 Hari">3 Hari</option>
                                                        <option value="7 Hari">7 Hari</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <h6>Tanggal Sewa</h6>
                                                    <input type="date" class="form-control" placeholder="Input disini ..." name="tgl_sewa">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <h6>Tanggal Kembali</h6>
                                                    <input type="date" class="form-control" placeholder="Input disini ..." name="tgl_kembali">
                                                </div>
                                            </div>
                                        </div>

                                        <hr>
                                        <div class="text-right">
                                            <a href="rental.php" class="btn btn-secondary">Batalkan</a>
                                            <button type="submit" name="sewa" class="btn btn-primary">Sewa Sekarang</button>
                                        </div>
                                </div>
                                </form>
                                <?php
                                if (isset($_POST['sewa'])) {
                                    $koneksi->query("INSERT INTO tb_sewa
                                    
                                    (id_barang, tgl_sewa, tgl_kembali, nama_pelanggan, alamat, no_telp, estimasi)
                                    VALUES('$idbrg','$_POST[tgl_sewa]', '$_POST[tgl_kembali]', '$_POST[nama_pelanggan]', '$_POST[alamat]', '$_POST[nomor_telp]', '$_POST[estimasi]')");
                                    $koneksi->query("UPDATE tb_barang SET stok_barang = stok_barang - '1' WHERE id_barang ='$idbrg'");

                                    echo "<script>alert('Data Telah Tersimpan')</script>";
                                    echo "<meta http-equiv='refresh' content='1;url=rental.php'>";
                                }
                                ?>
                            </div>
                        </div>
                        <!-- /.col-md-6 -->
                    </div>
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
</body>

</html>