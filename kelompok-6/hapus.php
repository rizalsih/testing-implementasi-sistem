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
// ambil id yg dikirimkan lewat url
$id = $_GET["id"];
// ngirim id ke funsi hapus
if (hapus($id) > 0) {
    // pake js untuk melihat hasilnya agar langsung di alihkan ke halaman index.php
    echo "
    <script>
        alert ('data berhasil dihapus!');
        document.location.href = 'index.php';
    </script>
";
} else {
    echo "
    <script>
        alert ('data gagal dihapus!');
        document.location.href = 'index.php';
    </script>
";
}
