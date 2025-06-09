<?php
   include "koneksi.php";
     
   //skrip kueri select untuk mengambil no_nota dan total_biaya untuk keperluan perhitungan tabel transaksi
    $kd_detil = $_GET ["kd_detil"];
    $query = mysqli_query ($koneksi, "select * from detil_transaksi where kd_detil = '$kd_detil'");
    $row = mysqli_fetch_array($query);
    $no_nota = $row['no_nota'];
    $total_biaya = $row['total_biaya'];

    //skrip untuk mengupdate tabel transaksi pada kolom total_bayar (total_bayar - total_biaya yang sudah di select tadi)
    $update = mysqli_query ($koneksi, "update transaksi set total_bayar = total_bayar - '$total_biaya' where no_nota = '$no_nota'");

    //skrip kueri delete detail_transaksi
    $delete = mysqli_query ($koneksi, "delete from detil_transaksi where kd_detil = '$kd_detil'");

        {
            ?>
            <script>
                alert("Data Detail Paket Berhasil dihapus!");
                document.location = "detail.php";
            </script>
            <?php
        }
  
?>