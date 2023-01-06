<?php
session_start();
if ($_SESSION['username'] == '') {
    header("location:../login.php");
}
include "../config/koneksi.php";
$idPenerbit = $_POST['id_penerbit'];
$namaPenerbit = $_POST['nama_penerbit'];
$alamat = $_POST['alamat'];
$sql = mysqli_query($koneksi, "UPDATE penerbit SET nama_penerbit='$namaPenerbit',alamat='$alamat' where id_penerbit=$idPenerbit");

if ($sql) {
    header("location: ../penerbit/index.php");
} else {
    die("ERROR" . $sql . mysqli_error($koneksi));
}