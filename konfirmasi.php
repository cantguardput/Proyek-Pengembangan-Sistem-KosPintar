<?php
include 'koneksi.php';
$idsewa = $_GET['id'];
$idps = $_GET['idps'];

$koneksi->query("UPDATE tb_sewa SET status = 'Disewakan' WHERE id_sewa = '$idsewa' ");
$koneksi->query("UPDATE tb_barang SET stok_barang = stok_barang - '1' WHERE id_ps =$idps");


echo "<script>alert ('data telah di konfirmasi');</script>";
echo "<script>location='orderan.php'</script>";
