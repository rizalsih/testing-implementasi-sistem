<?php
// jalankan session
session_start();

// kalo udah pernah login
if (isset($_SESSION["login"])) {
    header("location: index.php");
    exit;
}

require 'fungsi.php';

if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $pass = $_POST["pass"];

    // ada ga username di tabel tertentu
    $lemari = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    // cek username, ada berapa bais yg dikembalikan
    if (mysqli_num_rows($lemari) === 1) {

        // cek password
        $baskom = mysqli_fetch_assoc($lemari);

        // password verify
        if (password_verify($pass, $baskom["pass"])) {

            // set session, gaada gaboleh login
            $_SESSION["login"] = true;


            // kalo berhasil, masukan ke index
            header("location: index.php");
            // biar berhenti di header aja
            exit;
        }
    }

    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>

    <!-- csss boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>

<body class="container-fluid">

    <div class="mb-3"></div>

    <div class="card" style="width: 18rem;">

        <!-- untuk menampilkan tulisan errror ngambil dari error diatas yg akhir -->
        <?php if (isset($error)) :  ?>
            <div class="alert alert-danger" role="alert">
                Username/Password salah!
            </div>
        <?php endif; ?>

        <div class="card-body">
            <h5 class="card-title text-primary text-center">Login</h5>
            <hr>
            <form action="" method="post">
                <div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input class="form-control" type="text" name="username" autocomplete="off" id="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="pass" class="form-label">Password</label>
                        <input class="form-control" type="password" name="pass" autocomplete="off" id="pass" required>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary" type="submit" name="login">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</body>

</html>