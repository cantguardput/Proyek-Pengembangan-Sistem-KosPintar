<?php
include 'koneksi.php';
$idsewa = $_GET['id'];
$idbrg = $_GET['idbrg'];
$waktu = $_GET['waktu'];
$koneksi->query("UPDATE tb_sewa SET status = 'Sukses' WHERE id_sewa = '$idsewa' ");

$koneksi->query("UPDATE tb_sewa SET waktu_klaim = '$waktu' WHERE id_sewa = '$idsewa' ");
$koneksi->query("UPDATE tb_barang SET stok_barang = stok_barang + '1' WHERE id_ps ='$idbrg'");

echo "<script>alert ('data telah di konfirmasi');</script>";
echo "<script>location='orderan.php'</script>";
