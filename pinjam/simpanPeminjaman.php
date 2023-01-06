<?php
session_start();
if ($_SESSION['username'] == '') {
    header("location:../login.php");
}
include "../config/koneksi.php";

$idPinjam = $_POST['id_pinjam'];
$kdAnggota = $_POST['kd_anggota'];
$kdBuku = $_POST['buku'];
$pinjam = mysqli_query($koneksi, "INSERT INTO peminjaman (id_pinjam,kd_anggota) 
    VALUES('$idPinjam','$kdAnggota')");
for ($i = 0; $i < sizeof($_POST['buku']); $i++) {
    $detailPinjam = mysqli_query($koneksi, "INSERT INTO detail_peminjaman (id_pinjam,kd_buku) 
            VALUES ('$idPinjam','$kdBuku[$i]')");
}
header("Location: ../pinjam/index.php");
die();