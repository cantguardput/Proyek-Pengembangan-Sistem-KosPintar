<?php
// session_start();
include 'koneksi.php';
// if (isset($_SESSION['user'])) {
//     $iduser = $_SESSION['user']['id_user'];
//     $datauser = $koneksi->query("SELECT * FROM user WHERE id_user = $iduser ");
//     $pecahuser = $datauser->fetch_assoc();
// } else {
//     echo "<script>alert['anda harus login'];</script>";
//     echo "<script>location='login.php';</script>";
//     header('location:login.php');
//     exit();
// }


$hasil = $query = $koneksi->query("SELECT max(kd_user) as maxKode FROM user");
$data = mysqli_fetch_array($hasil);
$kduser = $data['maxKode'];
$noUrut = (int) substr($kduser, 3, 3);
$noUrut++;
$char = "USR";
$kduser = $char  . sprintf("%03s", $noUrut);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KOS PINTAR</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class=" hold-transition login-page">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-12 mt-5">
                <div class="card login-card-body">
                    <div class="card-header">
                        <h5>Sewa Kos | <b>KOS PINTAR</b></h5>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h2>Daftar User</h2>
                                    <hr>
                                </div>
                                <div class="col-lg-12">
                                    <small>Data Personal</small>
                                    <hr>
                                    <div class="form-group">
                                        <h5>Kode</h5>
                                        <input type="text" class="form-control" placeholder="Input disini ..." name="kd_user" value="<?php echo $kduser ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <h5>Nama Lengkap</h5>
                                        <input type="text" class="form-control" placeholder="Input disini ..." name="nama_user">
                                    </div>
                                    <div class="form-group">
                                        <h5>Nomor Telp</h5>
                                        <input type="number" class="form-control" placeholder="Input disini ..." name="no_telp">
                                    </div>
                                    <div class="form-group">
                                        <h5>Alamat</h5>
                                        <textarea name="alamat" id="" cols="30" rows="5" class="form-control"></textarea>
                                    </div>
                                    <small>Akun User</small>
                                    <hr>
                                    <div class="form-group">
                                        <h5>Username</h5>
                                        <input type="text" class="form-control" placeholder="Input disini ..." name="username">
                                    </div>
                                    <div class="form-group">
                                        <h5>Password</h5>
                                        <input type="text" class="form-control" placeholder="Input disini ..." name="password">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="text-right">
                                <a href="data_user.php" class="btn btn-secondary">Batalkan</a>
                                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                            </div>
                    </div>
                    </form>
                    <?php
                    if (isset($_POST['simpan'])) {
                        $ambil = $koneksi->query("SELECT * FROM user WHERE username_user='$_POST[username]'");
                        $yangcocok = $ambil->num_rows;

                        if ($yangcocok == 1) {
                            echo "<script>alert('Username sudah digunakan, gunakan yang lain')</script>";
                            echo "<meta http-equiv='refresh' content='1;url=daftar_user.php'>";
                        } else {
                            $koneksi->query("INSERT INTO user
                                    
                            (kd_user, nama_user, username_user, password_user, no_telp_user,alamat, level)
                            VALUES(
                                '$_POST[kd_user]',
                                '$_POST[nama_user]',
                                '$_POST[username]',
                                '$_POST[password]',
                                '$_POST[no_telp]',
                                '$_POST[alamat]',
                                '2')");

                            echo "<script>alert('Data Telah Tersimpan')</script>";
                            echo "<meta http-equiv='refresh' content='1;url=login.php'>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>


    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
</body>

</html>