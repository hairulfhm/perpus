<?php
session_start();
if ($_SESSION['username'] == '') {
    header("location:../login.php");
}
include "../config/koneksi.php";
$idPenerbit = $_GET['id_penerbit'];
$sql = mysqli_query($koneksi, "DELETE FROM penerbit where id_penerbit=$idPenerbit");

if ($sql) {
    header("location: ../penerbit/index.php");
} else {
    die("ERROR" . $sql . mysqli_error($koneksi));
}