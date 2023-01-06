<?php
session_start();
if ($_SESSION['username'] == '') {
    header("location:../login.php");
}
include "../config/koneksi.php";

$kdAnggota = $_GET['kd_anggota'];

// echo $email;
$sql = mysqli_query($koneksi, "DELETE FROM anggota where kd_anggota='$kdAnggota'");
if ($sql) {
    header("location: ../anggota/index.php");
} else {
    die;
}