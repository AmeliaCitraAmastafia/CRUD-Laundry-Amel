<?php
include "koneksi.php";

//deklarasi variabel untuk menampung variabel dari formupdatedetil.php
$kd_detil = $_POST['kd_detil'];
$no_nota = $_POST['no_nota'];
$kd_paket = $_POST['kd_paket'];
$total_biaya = $_POST['total_biaya'];
$berat = $_POST['berat'];

//skrip untuk mengambil total_biaya yang lama, untuk proses pengurangan dengan tabel transaksi nanti
$select_detil = mysqli_query ($koneksi, "select * from detil_transaksi where kd_detil = '$kd_detil'");
$row = mysqli_fetch_array($select_detil);
$total_biaya_old = $row['total_biaya'];

//skrip update tabel transaksi, yaitu untuk mengupdate total_bayar (total_bayar - total_biaya_old yang tadi sudah diselect)
$update_transaksi1 = mysqli_query ($koneksi, "update transaksi set total_bayar = total_bayar - '$total_biaya_old' where no_nota = '$no_nota'");

//skrip untuk select harga dari tabel paket
$select_paket = mysqli_query ($koneksi, "select * from paket where kd_paket = '$kd_paket'");
$row1 = mysqli_fetch_array($select_paket);

//skrip untuk menghitung total_biaya_new dan mengupdate data detail_transaksi
$total_biaya_new = (int)$berat * (int)$row1['harga'];
$query = mysqli_query ($koneksi, "update detil_transaksi set no_nota ='$no_nota', kd_paket ='$kd_paket' , berat ='$berat', total_biaya ='$total_biaya_new' where kd_detil='$kd_detil'");

//skrip update tebel transaksi, untuk menambahkan kembali tota_bayar yang sudah terkurangi tadi dan menambahkan kembali dengan total_biaya yang baru saja dihitung
$update_transaksi2 = mysqli_query ($koneksi, "update transaksi set total_bayar = total_bayar + '$total_biaya_new' where no_nota = '$no_nota'");

if ($query)
{
	?>
	<script>
		alert ("Update Data Berhasil");
		window.location.href="transaksi.php";
	</script>
	<?php
}
?>