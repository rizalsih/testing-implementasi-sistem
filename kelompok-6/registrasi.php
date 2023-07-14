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

if (isset($_POST["register"])) {

    if (registrasi($_POST) > 0) {
        echo "
        <script>
        alert('user baru berhasil ditambahkan!');
        </script>";
    } else {
        echo mysqli_error($conn);
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>

    <!-- csss boostrap -->
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
            <h5 class="card-title text-primary text-center">Registrasi user</h5>
            <hr>

            <form action="" method="post">
                <div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input class="form-control" type="text" name="username" id="username" pattern="[a-z]{1,10}" title="data harus berisi huruf kecil maks. 1-10 karakter " autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="pass" class="form-label">Password</label>
                        <input class="form-control" type="password" name="pass" id="pass" pattern="[0-9]{6}" title="data harus berisi angka 6 karakter" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="pass2" class="form-label">Konfirmasi Password</label>
                        <input class="form-control" type="text" name="pass2" id="pass2" pattern="[0-9]{6}" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary" type="submit" name="register">Register</button>
                    </div>
                </div>
            </form>

        </div>
    </div>


</body>

</html>