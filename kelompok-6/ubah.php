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

// ambil data di URL
$id = $_GET["id"];

// query data karyawan berdasarkan id. [0] itu yg diambil element pertama
$karyawan = query("SELECT * FROM tbbio WHERE id = $id")[0];


// cek tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {

    // cek data berhasil di ubah atau tidak
    if (ubah($_POST) > 0) {
        // pake js untuk melihat hasilnya agar langsung di alihkan ke halaman index.php
        echo "
            <script>
                alert ('data berhasil diubah!');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert ('data gagal diubah!');
                document.location.href = 'index.php';
            </script>
        ";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah data karyawan</title>

    <!-- css boostrap -->
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
    </ul>

    <div class="mb-3"></div>

    <h1>Ubah data karyawan</h1>

    <form action="" method="post">

        <input type="hidden" name="id" value="<?= $karyawan["id"]; ?>">

        <div class="mb-3">
            <label for="nik" class="form-label">Nomor Induk Karyawan (NIK)</label>
            <input class="form-control" type="text" name="nik" id="nik" value="<?= $karyawan["nik"]; ?>" required>
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Lengkap</label>
            <input class="form-control" type="text" name="nama" id="nik" value="<?= $karyawan["nama"]; ?>" required>
        </div>
        <div class="mb-3">
            <label for="jabatan" class="form-label">Jabatan</label>
            <input class="form-control" type="text" name="jabatan" id="jabatan" value="<?= $karyawan["jabatan"]; ?>" required>
        </div>
        <div class="mb-3">
            <label for="bag" class="form-label">Bagian</label>
            <input class="form-control" type="text" name="bag" id="bag" value="<?= $karyawan["bag"]; ?>" required>
        </div>
        <div class="mb-3">
            <label for="tglmasuk" class="form-label">Tanggal Masuk</label>
            <input class="form-control" type="date" name="tglmasuk" id="tglmasuk" value="<?= $karyawan["tglmasuk"]; ?>" required>
        </div>
        <div>
            <button class="btn btn-primary" type="submit" name="submit">Ubah</button>
        </div>

    </form>
</body>

</html>