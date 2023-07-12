<?php
session_start();
// agar yakin session hilang
$_SESSION=[];
// jika tidak hilang lakukan ini
session_unset();
// hapus session nya
session_destroy();

header("location: login.php");
exit;

?>