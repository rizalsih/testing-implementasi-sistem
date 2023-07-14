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

// cek tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {

    // cek data berhasil di masukan atau tidak
    if (tambah($_POST) > 0) {
        // pake js untuk melihat hasilnya agar langsung di alihkan ke halaman index.php
        echo "
            <script>
                alert ('data berhasil ditambahkan!');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert ('data gagal ditambahkan!');
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
    <title>Tambah data karyawan</title>

    <!-- css boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>

<body class="container-fluid">

    <ul class="nav nav-underline">
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.php">Daftar Karyawan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="registrasi.php">Registrasi</a>
        </li>
    </ul>

    <div class="mb-3"></div>

    <div class="card" style="width: 22rem;">
        <div class="card-body">
            <h5 class="card-title text-primary text-center">Tambah data</h5>
            <hr>

            <form action="" method="post">

                <input type="hidden" name="id">

                <div class="mb-3">
                    <label for="nik" class="form-label">Nomor Induk Karyawan (NIK)</label>
                    <input class="form-control" type="text" name="nik" id="nik" pattern="[0-9]{7}" title="Data harus diisi angka, dan 7 karakter" required>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input class="form-control" type="text" name="nama" id="nik" pattern="[A-Z ]{1,25}" title="Data hanya bisa diisi huruf besar mks. 1-25 karakter" required>
                </div>
                <div class="mb-3">
                    <select name="jabatan" class="form-select form-select-lg mb-3" required>
                        <option selected disabled>Pilih Jabatan</option>
                        <option value="Manager">Manager</option>
                        <option value="Koordinator">Koordinator</option>
                        <option value="Supervisor">Supervisor</option>
                        <option value="Staff">Staff</option>
                        <option value="Non Jabatan">Non Jabatan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <select name="bag" class="form-select form-select-lg mb-3" required>
                        <option selected disabled>Pilih Bagian</option>
                        <option value="Management">Management</option>
                        <option value="Accounting">Accounting</option>
                        <option value="Marketing">Marketing</option>
                        <option value="Administrasi">Administrasi</option>
                        <option value="Research and Development">Research and Development</option>
                        <option value="Maintenance">Maintenance</option>
                        <option value="Warehouse">Warehouse</option>
                        <option value="Produksi">Produksi</option>
                        <option value="PPIC">PPIC</option>
                        <option value="Office Boy">Office Boy</option>
                </div>
                <div class="mb-3">
                    <label for="tglmasuk" class="form-label">Tanggal Masuk</label>
                    <input class="form-control" type="date" name="tglmasuk" id="tglmasuk" value="<?= $karyawan["tglmasuk"]; ?>" required>
                </div>
                <div>
                    <button class="btn btn-primary" type="submit" name="submit">Tambah</button>
                </div>

            </form>
        </div>
</body>

</html>