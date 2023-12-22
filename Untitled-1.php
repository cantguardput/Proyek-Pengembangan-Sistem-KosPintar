    

<html>

    <head>
        <title>Latihan Pencarian Tanggal</title>
        <!-- bootstrap cdn  -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    </head>
    
    <body>
        <?php 
            $servername     = "localhost";
            $database       = "latihan";
            $username       = "root";
            $password       = "";
    
            // membuat koneksi
            $conn = mysqli_connect($servername, $username, $password, $database);
        ?>
        <div class="container mt-4">
            <!-- form filter data berdasarkan range tanggal  -->
            <form action="index.php" method="get">
                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                        <label class="col-form-label">Periode</label>
                    </div>
                    <div class="col-auto">
                        <input type="date" class="form-control" name="dari" required>
                    </div>
                    <div class="col-auto">
                        -
                    </div>
                    <div class="col-auto">
                        <input type="date" class="form-control" name="ke" required>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </div>
            </form>
    
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Tanggal Transaksi</td>
                                <td>Keterangan Transaksi</td>
                                <td>Jumlah Transaksi</td>
                            </tr>
                        </thead>
                        <?php 
                            //jika tanggal dari dan tanggal ke ada maka
                            if(isset($_GET['dari']) && isset($_GET['ke'])){
                                // tampilkan data yang sesuai dengan range tanggal yang dicari 
                                $data = mysqli_query($conn, "SELECT * FROM transaksi WHERE tgl_transaksi BETWEEN '".$_GET['dari']."' and '".$_GET['ke']."'");
                            }else{
                                //jika tidak ada tanggal dari dan tanggal ke maka tampilkan seluruh data
                                $data = mysqli_query($conn, "select * from transaksi");		
                            }
                            // $no digunakan sebagai penomoran 
                            $no = 1;
                            // while digunakan sebagai perulangan data 
                            while($d = mysqli_fetch_array($data)){
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $d['tgl_transaksi']; ?></td>
                            <td><?php echo $d['keterangan_transaksi']; ?></td>
                            <td><?php echo $d['total_transaksi']; ?></td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </body>
    
    </html>
    