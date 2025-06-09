<?php
include "koneksi.php";
$kd_paket = $_GET['kd_paket'];

$delete = mysqli_query ($koneksi, "delete from paket where kd_paket='$kd_paket'");
?>

    <script>
    alert ("Data Berhasil Dihapus");
    document.location = "paket.php";
    </script>