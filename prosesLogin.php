<?php
session_start();
include 'config/koneksi.php';
if (isset($_POST['login'])) {
    $userName = $_POST['username'];
    $password = md5($_POST['password']);
    $sql = mysqli_query($koneksi, "SELECT * FROM login where username='$userName' and password='$password'");
    $row  = mysqli_fetch_array($sql);
    if ($row) {
        $_SESSION["username"] = $row['username'];
        $_SESSION["pesan"] = "Simpan Berhasil";
        $_SESSION["gagal"] = "Gagal Di Simpan";
        header("Location: dashboard/index.php");
    } else {
        // echo "Invalid Email ID/Password";
        die("ERROR " . $row . mysqli_error($koneksi));
    }
    // echo md5($password);
}