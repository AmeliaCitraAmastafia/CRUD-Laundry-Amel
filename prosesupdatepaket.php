<?php 
include "koneksi.php";


$kd_paket= $_POST['kd_paket'];
$nama_paket = $_POST['nama_paket'];
$jenis_paket = $_POST['jenis_paket'];
$harga = $_POST['harga'];

$query = mysqli_query ($koneksi, "update paket set nama_paket='$nama_paket',jenis_paket='$jenis_paket
       ',harga='$harga' where kd_paket='$kd_paket'");
if ($query)
{
       ?>
       <script>
       	alert ("Update Data Berhasil");
       	window.location.href="paket.php";
       </script>
       <?php
}

