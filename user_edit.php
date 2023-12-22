<?php
session_start();
include 'koneksi.php';
$iduser = $_GET['id'];
if (isset($_SESSION['user'])) {
} else {
    echo "<script>alert['anda harus login'];</script>";
    echo "<script>location='login.php';</script>";
    header('location:login.php');
    exit();
}

$ambiluser = $koneksi->query("SELECT * FROM user WHERE id_user = $iduser");
$pecahuser = $ambiluser->fetch_assoc();
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
                            <h1 class="m-0">Ruang Input Data User</h1>
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
                                                <h2>Tambah User</h2>
                                                <hr>
                                            </div>
                                            <div class="col-lg-12">
                                                <small>Data Personal</small>
                                                <hr>
                                                <div class="form-group">
                                                    <h5>Kode User</h5>
                                                    <input type="text" class="form-control" placeholder="Input disini ..." name="kd_user" value="<?php echo $pecahuser['id_user'] ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <h5>Nama Penyewa</h5>
                                                    <input type="text" class="form-control" placeholder="Input disini ..." name="nama_user" value="<?php echo $pecahuser['nama_user'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <h5>Alamat Penyewa</h5>
                                                    <input type="text" class="form-control" placeholder="Input disini ..." name="alamat" value="<?php echo $pecahuser['alamat'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <h5>Nomor Penyewa</h5>
                                                    <input type="number" class="form-control" placeholder="Input disini ..." name="nomor" value="<?php echo $pecahuser['no_telp_user'] ?>">
                                                </div>
                                                <small>Akun User</small>
                                                <hr>
                                                <div class="form-group">
                                                    <h5>Username</h5>
                                                    <input type="text" class="form-control" placeholder="Input disini ..." name="username" value="<?php echo $pecahuser['username_user'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <h5>Password</h5>
                                                    <input type="text" class="form-control" placeholder="Input disini ..." name="password" value="<?php echo $pecahuser['password_user'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="text-right">
                                            <a href="data_user.php" class="btn btn-secondary">Batalkan</a>
                                            <button type="submit" name="update" class="btn btn-primary">Simpan</button>
                                        </div>
                                </div>
                                </form>
                                <?php
                                if (isset($_POST['update'])) {

                                    $koneksi->query("UPDATE user SET 
                                                nama_user='$_POST[nama_user]',
                                                username_user='$_POST[username]',
                                                no_telp_user='$_POST[nomor]',
                                                alamat='$_POST[alamat]',
                                                password_user='$_POST[password]'
                                                WHERE id_user='$iduser'");
                                    echo "<script>alert ('Data telah di Update');</script>";
                                    echo "<script>location='data_user.php'</script>";
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