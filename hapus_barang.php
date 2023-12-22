<?php
session_start();
include 'koneksi.php';

$koneksi->query("DELETE FROM tb_barang WHERE id_ps='$_GET[id]'");

echo "<script>alert ('data telah terhapus');</script>";
echo "<script>location='data_sewa.php'</script>";
