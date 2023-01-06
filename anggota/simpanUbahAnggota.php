<?php
session_start();
if ($_SESSION['username'] == '') {
    header("location:../login.php");
}
include "../config/koneksi.php";

$kdAnggota = $_POST['kd_anggota'];
$namaAnggota = $_POST['nama_anggota'];
$tlp = $_POST['tlp'];
$email = $_POST['email'];
// echo $email;
$sql = mysqli_query($koneksi, "UPDATE anggota SET nama_anggota='$namaAnggota',tlp='$tlp',
        email='$email' where kd_anggota='$kdAnggota'");
if ($sql) {
    header("location: ../anggota/index.php");
} else {
    die;
}