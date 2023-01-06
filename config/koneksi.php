<?php
$host = 'localhost';
$username = 'root';
$password = '';
$db = 'projek_perpus';
//koneksi ke database
$koneksi = mysqli_connect($host, $username, $password, $db);
if (!$koneksi) {
    die('Tidak bisa terkoneksi ke database:');
}