<?php
   include "koneksi.php";
     
     $no_nota = $_GET ["no_nota"];

     $delete = mysqli_query ($koneksi, "delete from transaksi where no_nota = '$no_nota'");

        {
            ?>
            <script>
                alert("Data Transaksi Berhasil dihapus!");
                document.location = "order.php";
            </script>
            <?php
        }
  
?>