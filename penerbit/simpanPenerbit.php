<?php
session_start();
if ($_SESSION['username'] == '') {
    header("location:../login.php");
}
include "../config/koneksi.php";

$namaPenerbit = $_POST['nama_penerbit'];
$alamat = $_POST['alamat'];
$sql = mysqli_query($koneksi, "INSERT INTO penerbit (nama_penerbit,alamat)
      values ('$namaPenerbit','$alamat')");

if ($sql) {
    header("location: ../penerbit/index.php");
} else {
    die("ERROR" . $sql . mysqli_error($koneksi));
}