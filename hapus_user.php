<?php
include 'koneksi.php';

$koneksi->query("DELETE FROM user WHERE id_user='$_GET[id]'");

echo "<script>alert ('data user telah terhapus');</script>";
echo "<script>location='data_user.php'</script>";
