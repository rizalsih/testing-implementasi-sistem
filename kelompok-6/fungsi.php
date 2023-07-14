<?php
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "dbkaryawan");

// fungsi query
function query($query)
{

    // untuk mengacu kepada conn koneksi ke database
    global $conn;
    $lemari = mysqli_query($conn, $query);
    // buat baskom kosong 
    $baskom = [];
    // ngambil baskom kosong dari lemari
    while ($row = mysqli_fetch_assoc($lemari)) {
        // ngambil emas simpen di baskom kosong
        $baskom[] = $row;
    }
    // kembalikan baskomnya
    return $baskom;
}

// dungsi tambah
function tambah($data)
{
    global $conn;

    // masuk dulu ke fungsi ini >>> htmlspecialchars
    $id = ($data["id"]);
    $nik = htmlspecialchars($data["nik"]);
    $nama = htmlspecialchars($data["nama"]);
    $jabatan = htmlspecialchars($data["jabatan"]);
    $bag = htmlspecialchars($data["bag"]);
    $tglmasuk = htmlspecialchars($data["tglmasuk"]);

    $query = "INSERT INTO tbbio
                VALUES
            ('', '$nik', '$nama', '$jabatan', '$bag', '$tglmasuk')
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// fungsi hapus
function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM tbbio WHERE id = $id");
    return mysqli_affected_rows($conn);
}

// fungsi ubah
function ubah($data)
{
    global $conn;

    // masuk dulu ke fungsi ini >>> htmlspecialchars
    $id = ($data["id"]);
    $nik = htmlspecialchars($data["nik"]);
    $nama = htmlspecialchars($data["nama"]);
    $jabatan = htmlspecialchars($data["jabatan"]);
    $bag = htmlspecialchars($data["bag"]);
    $tglmasuk = htmlspecialchars($data["tglmasuk"]);

    $query = "UPDATE tbbio SET
                nik = '$nik',
                nama = '$nama',
                jabatan = '$jabatan',
                bag = '$bag',
                tglmasuk = '$tglmasuk'
                WHERE id = $id
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//fungsi cari
function cari($keyword)
{
    // rangkai string query 
    $query = "SELECT * FROM tbbio WHERE
                nik LIKE '%$keyword%' OR
                nama LIKE '%$keyword%' OR
                jabatan LIKE '%$keyword%' OR
                bag LIKE '%$keyword%' OR
                tglmasuk LIKE '%$keyword%'

    ";

    return query($query);
}


//fungsi registrasi
function registrasi($data)
{
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    // untuk masukin password biar bebas pake apa aja
    $pass = mysqli_real_escape_string($conn, $data["pass"]);
    $pass2 = mysqli_real_escape_string($conn, $data["pass2"]);

    // cek username udah ada apa belum
    $lemari = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

    if (mysqli_fetch_assoc($lemari)) {
        echo "
        <script>
        alert('username sudah terdaftar!');
        </script>";

        return false;
    }

    // cek konfirmasi password
    if ($pass !== $pass2) {
        echo "
        <script>
        alert('konfirmasi password tidak sesuai!')
        </script>";

        return false;
    }

    // enskripsi password
    $pass = password_hash($pass, PASSWORD_DEFAULT);

    // enskripsi pake md5
    //$pass = md5($pass);

    // tambahkan userbaru ke daabase
    mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$pass')");

    return mysqli_affected_rows($conn);
}

