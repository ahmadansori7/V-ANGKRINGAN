<?php

require ('koneksi.php');

session_start();



$now = date('d-m-Y');







header("Content-type: application/vnd-ms-excel");

header("Content-Disposition: attachment; filename=data-transaksi-$now.xls");



if (!isset($_SESSION["ses"])) {

    echo "<script>

    eval(\"parent.location='../login.php '\");

    alert (' Anda harus login terlebih dahulu');

    </script>";

	exit;



}



?>



<html>

    <head><title>Export Data Transaksi</title>



</head>

    <body>



    <h1 style="text-align:center;">Data Transaksi / <?php echo $now; ?></h1>



            <table style="text-align:center;" width="0%" border="1" cellspacing="0">

                <thead>

                <tr>

                                            <th>No</th>

                                            <th>Id Transaksi</th>

                                            <th>Tanggal</th>

                                            <th>Nama Customer</th>

                                            <th>Pengiriman</th>

                                            <th>Total</th>

                                            <th>Metode Pembayaran</th>

                                            <th>Status</th>

                                        </tr>

                </thead>

               

                <tbody>

                   

                <?php

                            $query = "SELECT id_transaksi as id, tanggal_transaksi as tanggal,nama_lengkap as nama, subtotal as total, user.alamat as alamat, transaksi.metode as metode, transaksi.status as status FROM transaksi JOIN user ON transaksi.username = user.username";

                            $result = mysqli_query($koneksi, $query);

                            $no1 = 1;

                            while ($row = mysqli_fetch_array($result)) {

                                $idtransaksi = $row['id'];

                                $tgltransaksi = $row['tanggal'];

                                $namalengkap = $row['nama'];

                                $alamat = $row['alamat'];

                                $totalbayar = $row['total'];

                                $status = $row['status'];

                                $metode = $row['metode'];

                                ?>



                            <tr>

                                <td><?php echo $no1; ?></td>

                                <td><?php echo $idtransaksi; ?></td>

                                <td><?php echo $tgltransaksi; ?></td>

                                <td><?php echo $namalengkap; ?></td>

                                <td><?php echo $alamat; ?></td>

                        



                                

                                <td><?php echo $totalbayar; ?></td>

                                <td><?php echo $metode; ?></td>

                                <td>



                                <?php 

                                    if($status=="0") {

                                        echo "Diproses";

                                        

                                        

                                    }

                                    elseif ($status=="1") {

                                        echo "Dikirim";

                                    }  elseif ($status=="2") {

                                        echo "Selesai";

                                    } 

                                     else {

                                        echo "Dibatalkan";

                                    }

                                    ?>

            

                                </td>

                            </tr>



                            <?php

                            $no1++;

                            } ?>



                                    </tbody>

            </table>



</body>

</html>