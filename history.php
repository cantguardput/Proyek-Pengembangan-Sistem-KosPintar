<?php
session_start();
include 'koneksi.php';
if (isset($_SESSION['admin'])) {
    $idadmin = $_SESSION['admin']['id_admin'];
} else if (isset($_SESSION['user'])) {
    $idsewa = $_SESSION['user']['id_user'];
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
                            <h1 class="m-0">Konfirmasi Pesanan</h1>
                        </div><!-- /.col -->

                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <?php if (isset($_SESSION['user'])) { ?>
                        <?php
                        $ambilsewa = $koneksi->query("SELECT * FROM tb_sewa JOIN user ON tb_sewa.id_user = user.id_user
                                                    JOIN tb_barang ON tb_sewa.id_ps = tb_barang.id_ps
                                                    JOIN data_game ON tb_sewa.id_game = data_game.id_game WHERE tb_sewa.id_user = $idsewa ORDER BY tb_sewa.id_sewa DESC");
                        while ($pecahsewa = $ambilsewa->fetch_assoc()) {;

                        ?>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="m-0">Featured</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row ">
                                                <div class="col-lg-12 text-center">
                                                    <h1 class="text-success"><b>Sukses Order !</b></h1>
                                                    <h6><i>Pesanan anda telah dibuatkan dan berstatus <b><?php echo $pecahsewa['status'] ?></b> dengan rincian berikut ini !</i></h6>
                                                    <h6><i>Tanggal <?php echo $pecahsewa['tgl_sewa'] ?></i></h6>
                                                </div>
                                                <div class="col-lg-2"></div>
                                                <div class="col-lg-8">
                                                    <table class="table table-bordered">
                                                        <tbody>
                                                            <tr>
                                                                <td style="width: 200px;">
                                                                    Kode Pesanan
                                                                </td>
                                                                <td style="width: 50px;">
                                                                    :
                                                                </td>
                                                                <td>
                                                                    <b><?php echo $pecahsewa['kd_sewa'] ?></b>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Status
                                                                </td>
                                                                <td>:</td>
                                                                <td>
                                                                    <?php if ($pecahsewa['status'] == "Sukses") { ?>
                                                                        <b class="text-success"><?php echo $pecahsewa['status'] ?></b>

                                                                    <?php } else if ($pecahsewa['status'] == "Disewakan") { ?>
                                                                        <b class="text-danger"><?php echo $pecahsewa['status'] ?></b>
                                                                    <?php } else { ?>
                                                                        <b class="text-warning"><?php echo $pecahsewa['status'] ?></b>
                                                                    <?php } ?>
                                                                </td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                    <p class="text-center"><i>Keterangan : Jika pesanan anda belum di konfirmasi segera hubungi melalui Whatsup 082121554432</i></p>
                                                </div>
                                                <div class="cpl-lg-2"></div>
                                                <div class="col-lg-12 text-center">
                                                    <a href="index.php" type="button" class="btn btn-secondary">Kembali</a>
                                                    <a href="konfir_order.php?id=<?php echo $pecahsewa['id_sewa'] ?>" type="button" class="btn btn-primary">View</a>
                                                    <?php if ($pecahsewa['status'] == 'Pending') { ?>
                                                        <a href="batal_order.php?id=<?php echo $pecahsewa['id_sewa'] ?>" type="button" class="btn btn-warning">Batalkan</a>
                                                    <?php } ?>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
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
                                                        <tr>
                                                            <td>sP</td>
                                                            <td>x</td>
                                                        </tr>
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
                                                <h5 class="modal-title" id="exampleModalLabel">Jadwal Ketersediaan</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Nama PS</th>
                                                            <th>Waktu Berakhir</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>x</td>
                                                            <td>x</td>
                                                        </tr>
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
                        <?php } ?>
                    <?php }
                    if (isset($_SESSION['admin'])) { ?>
                        <?php
                        $ambilsewa = $koneksi->query("SELECT * FROM tb_sewa JOIN user ON tb_sewa.id_user = user.id_user
                                                    JOIN tb_barang ON tb_sewa.id_ps = tb_barang.id_ps
                                                    JOIN data_game ON tb_sewa.id_game = data_game.id_game ORDER BY tb_sewa.id_sewa DESC");
                        while ($pecahsewa = $ambilsewa->fetch_assoc()) {;

                        ?>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="m-0">Featured</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row ">
                                                <div class="col-lg-12 text-center">
                                                    <h1 class="text-success"><b>Sukses !</b></h1>
                                                    <h6><i>Pesanan berstatus <b><?php echo $pecahsewa['status'] ?></b> dengan rincian berikut ini !</i></h6>
                                                </div>
                                                <div class="col-lg-2"></div>
                                                <div class="col-lg-8">
                                                    <table class="table table-bordered">
                                                        <tbody>
                                                            <tr>
                                                                <td style="width: 200px;">
                                                                    Kode Pesanan
                                                                </td>
                                                                <td style="width: 50px;">
                                                                    :
                                                                </td>
                                                                <td>
                                                                    <b><?php echo $pecahsewa['kd_sewa'] ?></b>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Status
                                                                </td>
                                                                <td>:</td>
                                                                <td>
                                                                    <?php if ($pecahsewa['status'] == "Sukses") { ?>
                                                                        <b class="text-success"><?php echo $pecahsewa['status'] ?></b>

                                                                    <?php } else if ($pecahsewa['status'] == "Disewakan") { ?>
                                                                        <b class="text-danger"><?php echo $pecahsewa['status'] ?></b>
                                                                    <?php } else { ?>
                                                                        <b class="text-warning"><?php echo $pecahsewa['status'] ?></b>
                                                                    <?php } ?>
                                                                </td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="cpl-lg-2"></div>
                                                <div class="col-lg-12 text-center">
                                                    <a href="index.php" type="button" class="btn btn-secondary">Kembali</a>
                                                    <a href="konfir_order.php?id=<?php echo $pecahsewa['id_sewa'] ?>" type="button" class="btn btn-primary">View</a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
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
                                                        <tr>
                                                            <td>sP</td>
                                                            <td>x</td>
                                                        </tr>
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
                                                <h5 class="modal-title" id="exampleModalLabel">Jadwal Ketersediaan</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Nama PS</th>
                                                            <th>Waktu Berakhir</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>x</td>
                                                            <td>x</td>
                                                        </tr>
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
                        <?php } ?>
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
        <!-- <div class="float-right d-none d-sm-inline">
            Anything you want
        </div> -->
        <!-- Default to the left -->
        <!-- <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
        </footer> --> -->
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