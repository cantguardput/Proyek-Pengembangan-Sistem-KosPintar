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
$idbrg = $_GET['id'];

$ambildata_brg = $koneksi->query("SELECT * FROM tb_barang WHERE id_ps = $idbrg");
$pecah_brg = $ambildata_brg->fetch_assoc();
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
                                    <form method="POST">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h2>Tambah Barang</h2>
                                                <hr>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <h5>Kode Barang</h5>
                                                    <input type="text" class="form-control" placeholder="Input disini ..." name="kode_brg" value="<?php echo $pecah_brg['kode_barang'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <h5>Nama Barang</h5>
                                                    <input type="text" class="form-control" placeholder="Input disini ..." name="nama_brg" value="<?php echo $pecah_brg['nama_barang'] ?>">
                                                </div>
                                                <!-- <div class="form-group">
                                                    <h5>Jenis Barang</h5>
                                                    <input type="text" class="form-control" placeholder="Input disini ..." name="jns_brg" value="<?php echo $pecah_brg['jenis_barang'] ?>">
                                                </div> -->
                                                <div class="form-group">
                                                    <h5>Stok Barang</h5>
                                                    <input type="number" class="form-control" placeholder="Input disini ..." name="stok" value="<?php echo $pecah_brg['stok_barang'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <h5>Status</h5>
                                                    <input type="text" class="form-control" placeholder="Input disini ..." name="status" value="<?php echo $pecah_brg['setatus'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <h5>Deskripsi</h5>
                                                    <textarea class="form-control" name="deskripsi" id="" cols="30" rows="5"><?php echo $pecah_brg['deskripsi'] ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="text-right">
                                            <a href="data_sewa.php" class="btn btn-secondary">Batalkan</a>
                                            <button type="submit" name="save" class="btn btn-primary">Update</button>
                                        </div>
                                </div>
                                </form>
                                <?php
                                if (isset($_POST['save'])) {
                                    $koneksi->query("UPDATE tb_barang SET 
                                            kode_barang='$_POST[kode_brg]',
                                            nama_barang='$_POST[nama_brg]',
                                            -- jenis_barang='$_POST[jns_brg]',
                                            stok_Barang='$_POST[stok]',
                                            deskripsi='$_POST[deskripsi]',
                                            setatus='$_POST[status]'
                                            WHERE id_ps='$idbrg'");
                                    echo "<script>alert('Data Telah Diubah')</script>";
                                    echo "<meta http-equiv='refresh' content='1;url=data_sewa.php'>";
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