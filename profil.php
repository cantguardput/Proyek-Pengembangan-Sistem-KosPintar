<?php
session_start();
include 'koneksi.php';
if (isset($_SESSION['user'])) {
    $iduser = $_SESSION['user']['id_user'];
    $datauser = $koneksi->query("SELECT * FROM user WHERE id_user = $iduser ");
    $pecahuser = $datauser->fetch_assoc();
} else {
    echo "<script>alert['anda harus login'];</script>";
    echo "<script>location='login.php';</script>";
    header('location:login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RENTAL PS</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->

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
                            <ol class="breadcrumb float-sm-right">
                            </ol>
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
                                <div class="card-header border-0">
                                    <div class="d-flex justify-content-between">
                                    </div>
                                </div>
                                <div class="card-body">
                                <div class="mb-3 row">
                                        <h1><b>INFORMASI AKUN USER</b></h1>
                                        <hr>
                                    </div>

                                    <form method="POST">
                                <div class="mb-3 row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-10">
                                        <input type="text" name="nama" class="form-control" value="<?php echo $_SESSION['user']['nama_user'] ?>">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label">Username</label>
                                        <div class="col-sm-10">
                                        <input name="username" type="text" class="form-control" value="<?php echo $_SESSION['user']['username_user'] ?>">
                                        </div>
                                </div>
                                <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-10">
                                        <input name="password" type="text" class="form-control" value="<?php echo $_SESSION['user']['password_user'] ?>">
                                        </div>
                                </div>

                                <div class="mb-3 row">
                                    <div class="col-sm-2"></div>
                                <div class="col-sm-10">
                                                                <button type="submit" name="setting" class="btn btn-secondary">UPDATE AKUN</button>
                                </div>
                                                            
                                </div>

                                </form>
                                    <?php
                                    if (isset($_POST['setting'])) {
                                        $iduser = $_SESSION['user']['id_user'];
                                        $koneksi->query("UPDATE user SET 
                                            nama_user='$_POST[nama]',
                                            username_user='$_POST[username]',
                                            password_user='$_POST[password]'
                                            WHERE id_user='$iduser'");
                                        echo "<script>alert('Data Telah Diubah, Namun anda Harus Login Ulang')</script>";
                                        echo "<meta http-equiv='refresh' content='1;url=logout.php'>";
                                    }
                                    ?>
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <!-- <footer class="main-footer">
            <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.1.0-rc
            </div>
        </footer> -->
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE -->
    <script src="dist/js/adminlte.js"></script>

    <!-- OPTIONAL SCRIPTS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard3.js"></script>
</body>

</html>