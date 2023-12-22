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
                    <?php if ($pecahuser['level'] == "2") { ?>
                    <?php } else { ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="m-0">Featured</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h2>Data Kamar Kos</h2>
                                            </div>
                                            <table id="example1" class="table table-bordered">

                                                <head>
                                                    <tr>
                                                        <th>Kode Kamar</th>
                                                        <th>Nama Kamar</th>
                                                        <th>Jumlah</th>
                                                        <th>Status</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </head>
                                                <tbody>
                                                    <?php $nomor = 1; ?>
                                                    <?php $ambil_rental = $koneksi->query("SELECT * FROM tb_barang"); ?>
                                                    <?php while ($pecah_rental = $ambil_rental->fetch_assoc()) { ?>
                                                        <tr>
                                                            <td><?php echo $pecah_rental['kode_barang'] ?></td>
                                                            <td><?php echo $pecah_rental['nama_barang'] ?></td>
                                                            <td><?php echo $pecah_rental['stok_barang'] ?></td>
                                                            <td>
                                                                <h6 class="text-warning"><i><b><?php echo $pecah_rental['setatus'] ?></b></i></h6>
                                                            </td>
                                                            <td>
                                                                <a href="hapus_barang.php?id=<?php echo $pecah_rental['id_ps'] ?>" class="btn btn-danger btn-sm ">Hapus</a>
                                                                <a href="edit_barang.php?id=<?php echo $pecah_rental['id_ps'] ?>" class="btn btn-primary btn-sm ">Update</a>
                                                                <!-- <button name="idsaja" type="button" data-toggle="modal" data-id="<?php echo $pecah_rental['id_sewa'] ?>" data-target="#exampleModal1" class="btn btn-secondary btn-sm order">View</button> -->
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
    <script>
        $('.order').click(function() {
            $('#exampleModal1').modal();
            var ido = $(this).attr('data-id')
            $('#id').val(ido)
        })
    </script>
</body>

</html>