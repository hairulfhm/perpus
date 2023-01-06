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
$sql = mysqli_query($koneksi, "INSERT INTO anggota (kd_anggota,nama_anggota,tlp,email)
        VALUES ('$kdAnggota','$namaAnggota','$tlp','$email')");
if ($sql) {
    header("location: ../anggota/index.php");
} else {
    die;
}