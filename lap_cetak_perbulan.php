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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <style>
        @media print{
            .hapus {
                display : none;
            }
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        

                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <?php if ($pecahuser['level']=="2") { ?>
                        <h5>Data Kosong</h5>
                    <?php } else { ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <!-- <div class="card-header">
                                        <h5 class="m-0">Featured</h5>
                                    </div> -->
                                    <div class="card-body">
                                    <form action="lap.php" method="get">
                                               
                                               <div class="row">

                                               <div class="col-lg-12">
                                                <h2>Laporan Pesanan</h2>
                                                <hr>
                                            </div>

                                                <!-- <div class="col-lg-2">
                                                    <h5 class="mt-1">Mulai Tanggal : </h5>
                                                </div>
                                                 <div class="col-lg-3">
                                                             <div class="input-group mb-3">
                                                                 <input name="dari" type="date" class="form-control" placeholder="Recipient's username" required>
                                                             </div>
                                                         </div>
                                                         <div class="col-lg-2">
                                                    <h5 class="mt-1">Sampai Tanggal : </h5>
                                                </div>
                                                         <div class="col-lg-3">
                                                             <div class="input-group mb-3">
                                                                 <input name="ke" type="date" class="form-control" placeholder="Recipient's username" required>
                                                             </div>
                                                         </div>
                                                     
                                                        <div class="col-1 mb-3">
                                                             <button type="submit" class="btn btn-primary btn-md btn-block">Cari data</button>
                                                         </div>
                                                         <div class="col-1 mb-3">
                                                             <a href="lap.php" type="submit" class="btn btn-warning btn-md btn-block">Refresh</a>
                                                         </div>
                                               </div> -->

                                               <?php
                                               if (isset($_GET['dari'])){?>
                                                <div class="col-lg-12">
                                                <h5>Laporan Sewa PS dari <b><?php echo date('d F Y', strtotime($_GET['dari']))  ?> </b> hingga <b><?php echo date('d F Y', strtotime($_GET['ke'])) ?></b></h5>
                                               </div>
                                               <?php }else {

                                               }
                                               ?>
                                           
                                               <div class="col-lg-12">
                                               <table  class="table ">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Kode Pemesanan</th>
                                                        <th>Bulan</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php $nomor = 1; ?>
                                                    <?php 
                                                                //jika tanggal dari dan tanggal ke ada maka
                                                                if(isset($_GET['dari']) && isset($_GET['ke'])){
                                                                    // tampilkan data yang sesuai dengan range tanggal yang dicari 
                                                                    $data =  $koneksi->query("SELECT * FROM tb_sewa WHERE tgl_sewa BETWEEN '".$_GET['dari']."' and '".$_GET['ke']."'");
                                                                }else{
                                                                    //jika tidak ada tanggal dari dan tanggal ke maka tampilkan seluruh data
                                                                    $data = $koneksi->query("select * from tb_sewa");		
                                                                }
                                                                // $no digunakan sebagai penomoran 
                                                                $no = 1;
                                                                // while digunakan sebagai perulangan data 
                                                                while($d = mysqli_fetch_array($data)){
                                                                    
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $no++; ?></td>
                                                                <td><b><?php echo $d['kd_sewa']; ?></b></td>
                                                                <td><?php echo date('d F Y', strtotime($d['tgl_sewa']))?></td>
                                                                <td>
                                                                <?php echo $d['status']; ?>
                                                                </td>
                                                            </tr>
                                                           
                                                        <?php $nomor++ ?>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                               </div>
                                              <div class="col-lg-12">
                                              <a href="lap.php" type="button" class="btn btn-secondary hapus">Kembali</a>
                                            <input type="button" value="Cetak" class="btn btn-primary hapus" onclick="window.print()" />
                                              </div>
                                                     </form>
                                                     
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
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#example4').DataTable();
        });
    </script>
  <script type="text/javascript">
    window.print();
    </script>
</body>

</html>