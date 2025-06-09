<?php
include "koneksi.php";

$kd_paket= $_POST['kd_paket'];
$nama_paket = $_POST['nama_paket'];
$jenis_paket = $_POST['jenis_paket'];
$harga = $_POST['harga'];



$query = mysqli_query ($koneksi, "insert into paket values ('$kd_paket' ,'$nama_paket', '$jenis_paket', '$harga')");
header ('location:paket.php');
?>