<?php
session_start();
if ($_SESSION['username'] == '') {
    header("location:../login.php");
}
include "../config/koneksi.php";
//cek akhir kode peminjaman
$getKode = mysqli_query($koneksi, "SELECT max(id_pinjam) as kode from peminjaman");
$rs = mysqli_fetch_array($getKode);
$hasil = $rs['kode'];
$noPinjam = (int) substr($hasil, 3, 3);
$noPinjam++;
$hurup = 'TR';
$idPinjam = $hurup . sprintf("%03s", $noPinjam);

$buku = mysqli_query($koneksi, "SELECT * from buku");
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Dashboard Template · Bootstrap v5.2</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/dashboard/">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }

    .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
    }

    .bi {
        vertical-align: -.125em;
        fill: currentColor;
    }

    .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
    }

    .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
    }
    </style>


    <!-- Custom styles for this template -->
    <link href="../assets/dashboard.css" rel="stylesheet">
</head>

<body>

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">Perpustakaan</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search"
            aria-label="Search"> -->
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="../../keluar.php">Keluar</a>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3 sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="../dashboard/index.php">
                                <span data-feather="home" class="align-text-bottom"></span>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../anggota/index.php">
                                <span data-feather="users" class="align-text-bottom"></span>
                                Data Anggota
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../buku/index.php">
                                <span data-feather="file" class="align-text-bottom"></span>
                                Data Buku
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../penerbit/index.php">
                                <span data-feather="users" class="align-text-bottom"></span>
                                Data Penerbit
                            </a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link active" href="../pinjam/index.php">
                                <span data-feather="bar-chart-2" class="align-text-bottom"></span>
                                Transaksi Pinjam
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../laporan.php">
                                <span data-feather="bar-chart-2" class="align-text-bottom"></span>
                                Laporan
                            </a>
                        </li>

                    </ul>


                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Transaksi Pinjam Buku</h1>

                </div>

                <h4>Form Peminjaman</h4>
                <form action="simpanPeminjaman.php" method="post">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="" class="form-label">Kode Peminjam</label>
                            <input type="text" readonly name="id_pinjam" class="form-control"
                                value="<?php echo $idPinjam; ?>">
                            <br>
                            <label for="" class="form-label">Kode Anggota</label>
                            <select class="form-select" name="kd_anggota">
                                <option selected>-- Pilih Id Anggota --</option>
                                <?php
                                $sql = mysqli_query($koneksi, "SELECT * FROM anggota");
                                while ($rs = mysqli_fetch_array($sql)) {
                                    echo "<option value=" . $rs['kd_anggota'] . ">" . $rs['kd_anggota'] . ' ' . $rs['nama_anggota'] . "</option>";
                                }
                                ?>


                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Kode Buku</td>
                                    <td>Judul Buku</td>
                                    <td>Penerbit</td>
                                    <td>Tahun Terbit</td>
                                    <td>#</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($row = mysqli_fetch_array($buku)) {
                                ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $row["kd_buku"]; ?></td>
                                    <td><?php echo $row["judul_buku"]; ?></td>
                                    <td><?php echo $row["id_penerbit"]; ?></td>
                                    <td><?php echo $row["thn_terbit"]; ?></td>
                                    <td>
                                        <input class="form-check-input" type="checkbox" name="buku[]"
                                            value="<?php echo $row['kd_buku']; ?>">
                                    </td>
                                </tr>
                                <?php
                                    $no++;
                                }
                                ?>
                            </tbody>

                        </table>
                        <br>
                        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                    </div>
                </form>
            </main>
        </div>
    </div>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
        integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous">
    </script>
    <script src="../assets/dashboard.js"></script>
</body>

</html>