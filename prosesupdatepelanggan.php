<?php 
include "koneksi.php";


$kd_pelanggan= $_POST['kd_pelanggan'];
$nama_pelanggan = $_POST['nama_pelanggan'];
$alamat = $_POST['alamat'];
$no_telp = $_POST['no_telp'];

$query = mysqli_query ($koneksi, "update pelanggan set nama_pelanggan='$nama_pelanggan',alamat='$alamat',no_telp='$no_telp' where kd_pelanggan='$kd_pelanggan'");
if ($query)
{
       ?>
       <script>
       	alert ("Update Data Berhasil");
       	window.location.href="pelanggan.php";
       </script>
       <?php
}

