<?php
session_start();

include 'koneksi.php';

if (isset($_SESSION['user'])){
    $koneksi->query("UPDATE tb_sewa SET status = 'Dibatalkan' WHERE id_sewa = '$_GET[id]' ");

echo "<script>alert ('data telah Dibatalkan');</script>";
echo "<script>location='history.php'</script>";
}else{
    $koneksi->query("UPDATE tb_sewa SET status = 'Dibatalkan' WHERE id_sewa = '$_GET[id]' ");

echo "<script>alert ('data telah Dibatalkan');</script>";
echo "<script>location='orderan.php'</script>";
}
