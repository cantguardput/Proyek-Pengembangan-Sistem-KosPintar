<div class="sidebar">
  <!-- Sidebar user panel (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <img src="dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
      <?php if (isset($_SESSION['user'])) { ?>
        <a href="#" class="d-block"><?php echo $_SESSION['user']['nama_user'] ?></a>
      <?php } else { ?>
        <a href="#" class="d-block"><?php echo $_SESSION['admin']['nama_admin'] ?></a>
      <?php } ?>

    </div>
  </div>

  <!-- SidebarSearch Form -->
  <div class="form-inline">
    <div class="input-group" data-widget="sidebar-search">
      <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
      <div class="input-group-append">
        <button class="btn btn-sidebar">
          <i class="fas fa-search fa-fw"></i>
        </button>
      </div>
    </div>
  </div>

  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
      <li class="nav-item menu-open">
        <a href="index.php" class="nav-link active">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Dashboard
          </p>
        </a>
      </li>

      <?php 

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

     
      if ( $pecahuser['level'] == "1") { ?>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class=" nav-icon fas fa-user"></i>
            <p>
              Manajemen Akun
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="profil.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Profil</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="data_user.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Pengguna</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class=" nav-icon fas fa-database"></i>
            <p>
              Manajemen Sewa
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="orderan.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Orderan</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="data_sewa.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Kamar Kos </p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="input.php" class="nav-link">
            <i class="nav-icon far fa-edit"></i>
            <p>Input Data</p>
          </a>
        </li>
        
      <li class="nav-item">
        <a href="lap.php" class="nav-link">
          <i class="nav-icon fas fa fa-flag"></i>
          <p>Pelaporan</p>
        </a>
      </li>
      <?php } else { ?>
        <li class="nav-item">
          <a href="profil.php" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>Akun</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="rental.php" class="nav-link">
            <i class="nav-icon fas fa-home"></i>
            <p>Sewa Kamar Kos</p>
          </a>
        </li>
        <li class="nav-item">
        <a href="history.php" class="nav-link">
          <i class="nav-icon fas fa-history"></i>
          <p>Histori</p>
        </a>
      </li>
       
       
      <?php } ?>
      
      <li class="nav-item">
        <a href="logout.php" class="nav-link">
          <i class=" nav-icon fas fa-sign-out-alt"></i>
          <p>Logout</p>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>