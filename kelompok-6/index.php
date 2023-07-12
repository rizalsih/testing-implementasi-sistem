<?php
// jalankan session
session_start();

// cek ada ga sessionnya, user sudah berhasil login atau belum. if tidak ada session login
if (!isset($_SESSION["login"])) {
    // kembalikan
    header("location: login.php");
    //hentikan
    exit;
}


require 'fungsi.php';
// ambil baskomnya
$karyawan = query("SELECT * FROM tbbio");

// kalo tombol cari ditekan
if (isset($_POST["cari"])) {
    // ambil yg apapun yg diketikan sama user, masukan ke fungsi cari
    $karyawan = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data karyawan</title>

    <!-- csss boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>

<body class="container-fluid">

    <ul class="nav nav-underline">
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.php">Beranda</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="tambah.php">Tambah Data</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="registrasi.php">Registrasi</a>
        </li>
        <li class="nav-item">
            <a class="btn btn-outline-danger" href="logout.php">logout</a>
        </li>
    </ul>

    <div class="mb-3"></div>

    <h2>Daftar Karyawan</h2>

    <div class="row g-4">
        <div class="col-md-4">
            <form action="" method="post" class="d-flex">
                <input type="text" name="keyword" placeholder="Masukan yang anda cari .." autocomplete="off" autofocus class="form-control me-2">
                <button type="submit" name="cari" class="btn btn-outline-success me-2">Cari</button>
            </form>
        </div>
    </div>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">NIK</th>
                <th scope="col">Nama Karyawan</th>
                <th scope="col">Jabatan</th>
                <th scope="col">Bagian</th>
                <th scope="col">Masuk Kerja</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>

        <!-- akhir buat nomor urut-->
        <?php $i = 1; ?>
        <!-- pengulangan pada array dari $karyawan -->
        <?php foreach ($karyawan as $row) : ?>
            <tbody>
                <tr>
                    <td scope="row">
                        <?= $i; ?>
                    </td>
                    <td>
                        <?= $row["nik"] ?>
                    </td>
                    <td>
                        <?= $row["nama"] ?>
                    </td>
                    <td>
                        <?= $row["jabatan"] ?>
                    </td>
                    <td>
                        <?= $row["bag"] ?>
                    </td>
                    <td>
                        <?= $row["tglmasuk"] ?>
                    </td>
                    <td>

                        <a class="btn btn-outline-success" href="ubah.php?id=<?= $row["id"] ?>">Ubah</a>

                        <!-- ini ngambilnya dari id karena dia int, kalo bukan int gabisa-->
                        <a class="btn btn-outline-danger" href="hapus.php?id=<?= $row["id"] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">Hapus</a>
                        <!-- diatas ini pake fitur js, kalo ya itu akan terhapus, kalo ga galakuin apapa-->
                    </td>
                </tr>
            </tbody>
            <!-- akhir buat nomor urut-->
            <?php $i++; ?>
            <!-- akhir pengulangan  -->
        <?php endforeach; ?>
    </table>
</body>

</html>