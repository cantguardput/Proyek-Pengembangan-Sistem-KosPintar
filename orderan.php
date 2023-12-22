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
                    <?php if ($pecahuser['level'] == '1') { ?>
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
                                            <table id="example1" class="table table-bordered">
                                                <head>
                                                    <tr>
                                                        <th>Kode Order</th>
                                                        <th>Nama Penyewa</th>
                                                        <th>Nama Kamar</th>
                                                        <th>Estimasi</th>
                                                        <th>Mulai</th>
                                                        <th>Berakhir</th>
                                                        <!-- <th>Akhir</th> -->
                                                        <th>Status</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </head>
                                                <tbody>
                                                    <?php $nomor = 1; ?>
                                                    <?php $ambil_rental = $koneksi->query("SELECT * FROM tb_sewa 
                                                                                            JOIN tb_barang ON tb_sewa.id_ps = tb_barang.id_ps 
                                                                                            JOIN user ON tb_sewa.id_user = user.id_user 
                                                                                            WHERE tb_sewa.status = 'Pending'"); ?>
                                                    <?php while ($pecah_rental = $ambil_rental->fetch_assoc()) { ?>
                                                        <tr>
                                                            <td><?php echo $pecah_rental['kd_sewa'] ?></td>
                                                            <td><?php echo $pecah_rental['nama_user'] ?></td>
                                                            <td><?php echo $pecah_rental['nama_barang'] ?></td>
                                                            <td><?php echo $pecah_rental['estimasi'] ?> Jam </td>
                                                            <td><?php echo $pecah_rental['waktu_sewa'] ?> WIB</td>
                                                            <td><?php echo $pecah_rental['sewa_akhir'] ?> WIB</td>
                                                            <td>
                                                                <h6 class="text-warning"><i><b><?php echo $pecah_rental['status'] ?></b></i></h6>
                                                            </td>
                                                            <td>
                                                                <a href="batal_order.php?id=<?php echo $pecah_rental['id_sewa'] ?>" class="btn btn-danger btn-sm ">Batalkan</a>
                                                                <a href="konfirmasi.php?id=<?php echo $pecah_rental['id_sewa'] ?>&&idps=<?php echo $pecah_rental['id_ps'] ?>" class="btn btn-primary btn-sm ">Konfirmasi</a>
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
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="m-0">Featured</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h2>Daftar Penyewa</h2>
                                            </div>
                                            <div class="col-lg-6 text-right">
                                               <h5> Hari ini Pukul : <b><span id="jam" style="font: size 100px;"></span></b></h5>
                                            </div>
                                            <table id="example1" class="table table-bordered">

                                                <head>
                                                    <tr>
                                                        <th>Kode Order</th>
                                                        <th>Nama Penyewa</th>
                                                        <th>Waktu Mulai</th>
                                                        <th>Berakhir</th>
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
                                                            <td><?php echo $pecah_rental['kd_sewa'] ?></td>
                                                            
                                                            <td><?php $ambil_user = $koneksi->query("SELECT nama_user FROM user WHERE id_user = '{$pecah_rental['id_user']}'");
                                                            $data_user = $ambil_user->fetch_assoc();
                                                            echo $data_user['nama_user']; ?></td>

                                                            <td><?php echo $pecah_rental['waktu_sewa'] ?> WIB</td>
                                                            <td><?php echo $pecah_rental['sewa_akhir'] ?> WIB</td>
                                                         
                                                            <td>
                                                                <h6 class="text-danger"><i><b><?php echo $pecah_rental['status'] ?></b></i></h6>
                                                            </td>
                                                            <td>
                                                                <a href="klaim_sewa.php?id=<?php echo $pecah_rental['id_sewa'] ?>&&idbrg=<?php echo $pecah_rental['id_ps'] ?>&&waktu=<?php date_default_timezone_set('Asia/Jakarta'); echo date('h:i:s') ?>" class="btn btn-primary btn-sm">Klaim</a>
                                                                <!-- <button class="btn btn-secondary btn-sm">View</button> -->
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
                    <?php } else { ?>
                        
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
                                                    <td>Nama Kamar</td>
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
                                                    <th>Nama Kamar</th>
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
    <script type="text/javascript">
        window.onload = function() { jam(); }
       
        function jam() {
            var e = document.getElementById('jam'),
            d = new Date(), h, m, s;
            h = d.getHours();
            m = set(d.getMinutes());
            s = set(d.getSeconds());
       
            e.innerHTML = h +':'+ m +':'+ s;
       
            setTimeout('jam()', 1000);
        }
       
        function set(e) {
            e = e < 10 ? '0'+ e : e;
            return e;
        }
    </script>


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