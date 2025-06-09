<?php
include "koneksi.php";

$no_nota = $_POST['no_nota'];
$tgl_transaksi = $_POST['tgl_transaksi'];
$kd_pelanggan = $_POST['kd_pelanggan'];
$total_bayar = $_POST['total_bayar'];

//skrip kueri update transaksi
$query = mysqli_query ($koneksi, "update transaksi set tgl_transaksi ='$tgl_transaksi', kd_pelanggan ='$kd_pelanggan' where no_nota='$no_nota'");
if ($query)
{
	?>
	<script>
		alert ("Update Data Berhasil");
		window.location.href="order.php";
	</script>
	<?php
}
?>