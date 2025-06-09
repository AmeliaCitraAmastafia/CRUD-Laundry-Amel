<?php
include "koneksi.php";

$kd_pelanggan= $_POST['kd_pelanggan'];
$nama_pelanggan = $_POST['nama_pelanggan'];
$alamat = $_POST['alamat'];
$no_telp = $_POST['no_telp'];



$query = mysqli_query ($koneksi, "insert into pelanggan values ('$kd_pelanggan' ,'$nama_pelanggan', '$alamat', '$no_telp')");
header ('location:pelanggan.php');
?>