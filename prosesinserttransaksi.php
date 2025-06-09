<?php
session_start(); // WAJIB ADA DI ATAS

include "koneksi.php";

$no_nota = $_POST['no_nota'];
$tgl_transaksi = $_POST['tgl_transaksi'];
$kd_pelanggan = $_POST['kd_pelanggan'];

// Simpan transaksi
$query = mysqli_query($koneksi, "INSERT INTO transaksi (no_nota, tgl_transaksi, kd_pelanggan) VALUES ('$no_nota', '$tgl_transaksi', '$kd_pelanggan')");

if ($query) {
    $_SESSION['no_nota'] = $no_nota; // SET NO NOTA KE SESSION
    echo "<script>alert('Transaksi berhasil'); window.location='formdetiltransaksi.php';</script>";
} else {
    echo "<script>alert('Gagal menyimpan transaksi'); window.history.back();</script>";
}
