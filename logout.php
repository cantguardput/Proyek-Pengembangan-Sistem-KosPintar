<?php
session_start();
session_destroy();
echo "<script>alert('anda telah Keluar')</script>";
echo "<script>location='login.php';</script>";
