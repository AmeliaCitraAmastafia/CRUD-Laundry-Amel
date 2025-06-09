<?php
include "koneksi.php";
$kd_pelanggan = $_GET['kd_pelanggan'];

$delete = mysqli_query ($koneksi, "delete from pelanggan where kd_pelanggan='$kd_pelanggan'");
?>

    <script>
    alert ("Data Berhasil Dihapus");
    document.location = "pelanggan.php";
    </script>