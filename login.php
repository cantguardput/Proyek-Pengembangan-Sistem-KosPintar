<?php
session_start();
include 'koneksi.php';
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

<body class="hold-transition login-page">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

            </div>
        </div>
    </div>
    <div class="login-box">
        <div class="login-logo">
            <!-- <h6>Untuk Login <b>User</b> Klik dibawah ini !</h6>
            <a href="login_user.php"><b>Login</b>User</a> -->
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <div class="text-center mb-3">
                    <img src="logo/Logo-Kos-Pintar.jpg" alt="" width="200">
                </div>
                <div class="text-center mb-3">
                    <h6>Sewa Kos</h6>
                   
                </div>
                <form method="post" role="">
                    <div class="input-group mb-3">
                        <input name="username" type="text" class="form-control" placeholder="Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input name="password" type="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12">
                            <button name="login" class="btn btn-primary btn-block">Masuk</button>
                        </div>
                        <div class="col-12">
                            <a href="daftar_user.php" class="btn btn-secondary btn-block mt-2">Daftar User</a>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <?php
                if (isset($_POST['login'])) {
                    $ambil = $koneksi->query("SELECT * FROM user WHERE username_user='$_POST[username]' AND password_user ='$_POST[password]'");
                    $yangcocok = $ambil->num_rows;

                    if ($yangcocok == 1) {
                        $_SESSION['user'] = $ambil->fetch_assoc();
                        echo "<script>alert('Berhasil Login')</script>";
                        echo "<meta http-equiv='refresh' content='1;url=index.php'>";
                    } else {
                        echo "<script>alert('Gagal Login *Periksa Email dan Password yang anda masukan')</script>";
                        echo "<meta http-equiv='refresh'content='1;url='login.php'>";
                    }
                }
                ?>

                <div class="social-auth-links text-center mb-3">
                    <!-- <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a> -->
                </div>
                <!-- /.social-auth-links -->

                <p class="mb-1">
                    <a href="forgot-password.html">Lupa Password ?</a>
                </p>
                <p class="mb-0">
                    <!-- <a href="register.html" class="text-center">Register a new membership</a> -->
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
</body>

</html>