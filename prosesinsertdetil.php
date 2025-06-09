<?php
include "koneksi.php";

//menambahkan kueri select untuk mengambil harga dari tabel paket berdasar kd_paket
$kd_paket = $_POST['kd_paket']; 
$query = mysqli_query ($koneksi, "select * from paket where kd_paket = '$kd_paket'");
$row = mysqli_fetch_array($query);

//deklarasi variabel berdasar forminsertdetil.php
$kd_detil = $_POST['kd_detil'];
$no_nota = $_POST['no_nota'];

//skrip perhitungan total biaya
$berat = $_POST['berat'];
$total_biaya = (int)$berat * (int)$row['harga'];

//skrip untuk insert data ke tabel detail_transaksi
$query1 = mysqli_query ($koneksi, "insert into detil_transaksi values ('$kd_detil' , '$no_nota' , '$kd_paket','$berat' , '$total_biaya')");

//skrip untuk mengudate total_bayar di tabel transaksi (total_bayar lama + total_biaya baru)
$query2 = mysqli_query ($koneksi, "update transaksi set total_bayar = total_bayar + '$total_biaya' where no_nota = '$no_nota'");

//skrip untuk mengirimkan variabel no_nota menuju ke popuptambah.php
session_start();
$_SESSION['no_nota']=$no_nota;
header ("location:popuptambah.php");
?>