<?php
session_start();
if ($_SESSION['username'] == '') {
    header("location:../login.php");
}
include "../config/koneksi.php";
$kdBuku = $_POST['kd_buku'];
$judulBuku = $_POST['judul_buku'];
$idPenerbit = $_POST['id_penerbit'];
$thnTerbit = $_POST['thn_terbit'];

$sql = mysqli_query($koneksi, "INSERT INTO buku (kd_buku,judul_buku,id_penerbit, thn_terbit)
      values ('$kdBuku','$judulBuku','$idPenerbit','$thnTerbit')");
if ($sql) {
    header("location: ../buku/index.php");
} else {
    die;
}