    
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
                            <h1 class="m-0">Laporan</h1>
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
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="m-0">Featured</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h2>Pesanan</h2>
                                            </div>
                                            <hr>

                                        <form action="cari.php" method="get">
                                            
                                          <div class="row">
                                          <div class="col-lg-1">
                                                Dari Tanggal
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="input-group mb-3">
                                                    <input name="dari" type="date" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                </div>
                                            </div>

                                            <div class="col-lg-1">
                                                Sampai Tanggal
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="input-group mb-3">
                                                    <input name="ke" type="date" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                </div>
                                            </div>
                                                <div class="col-lg-12 mb-3">
                                                <button type="submit" class="btn btn-primary btn-md btn-block">Cari data</button>
                                                </div>
                                          </div>
                                         </form>


                                            <table id="example1" class="table table-bordered">
                                                <head>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Bulan</th>
                                                        <th>Total Rental</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </head>
                                                <tbody>
                                                   
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.col-md-6 -->
                        </div>
                    <?php } ?>
                    <div class="row">
                        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Orderan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="POST">
                                            <input type="text" id="id" name="ip">
                                        </form>


                                        <table class="table table-bordered">
                                            <tbody>
                                                <?php
                                                $ambildata = $koneksi->query("SELECT * FROM tb_sewa 
                                                                                            JOIN tb_barang ON tb_sewa.id_ps = tb_barang.id_ps 
                                                                                            JOIN user ON tb_sewa.id_user = user.id_user 
                                                                                            WHERE tb_sewa.id_sewa"); ?>
                                                <?php $pecahdata = $ambildata->fetch_assoc(); ?>
                                                <tr>
                                                    <td>Kode Order</td>
                                                    <td>:</td>
                                                    <td><?php echo $pecahdata['kd_sewa'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Nama</td>
                                                    <td>:</td>
                                                    <td>:</td>
                                                </tr>
                                                <tr>
                                                    <td>Nama PS</td>
                                                    <td>:</td>
                                                    <td>:</td>
                                                </tr>
                                                <tr>
                                                    <td>Nama Game</td>
                                                    <td>:</td>
                                                    <td>:</td>
                                                </tr>
                                                <tr>
                                                    <td>Estimasi</td>
                                                    <td>:</td>
                                                    <td>:</td>
                                                </tr>
                                                <tr>
                                                    <td>Mulai Main</td>
                                                    <td>:</td>
                                                    <td>:</td>
                                                </tr>
                                                <tr>
                                                    <td>Akhir Main</td>
                                                    <td>:</td>
                                                    <td>:</td>
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
