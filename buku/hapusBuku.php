<?php
session_start();
if ($_SESSION['username'] == '') {
    header("location:../login.php");
}
include "../config/koneksi.php";

$kdBuku = $_GET['kd_buku'];

// echo $email;
$sql = mysqli_query($koneksi, "DELETE FROM buku where kd_buku='$kdBuku'");
if ($sql) {
    header("location: ../buku/index.php");
} else {
    die;
}