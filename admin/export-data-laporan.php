<?php

require ('koneksi.php');

session_start();



$now = date('d-m-Y');



header("Content-type: application/vnd-ms-excel");

header("Content-Disposition: attachment; filename=data-laporan-$now.xls");



if (!isset($_SESSION["ses"])) {

    echo "<script>

    eval(\"parent.location='../login.php '\");

    alert (' Anda harus login terlebih dahulu');

    </script>";

	exit;



}





?>



<html>

    <head><title>Export Data Laporan</title>



</head>



    <h1 style="text-align:center;">Export Data Laporan / <?php echo $now; ?></h1>





    <table style="text-align:center;" width="70%" border="1" cellspacing="0">

                <thead>

                    <tr>

                        <th>Total Transaksi Bulan Ini</th>

                        <th>Total Penghasilan Bulan Ini</th>

                        <th>Total Transaksi Tahun Ini</th>

                       

                    </tr>

                </thead>

               

                <tbody>



        <tr>

            <td> <?php

                    $totaltransaksi  = mysqli_query($koneksi, "SELECT COUNT(id_transaksi) as totalminggu from transaksi where MONTH(tanggal_transaksi);");

                    while ($row = mysqli_fetch_array($totaltransaksi)) {

                    ?><?php echo $row['totalminggu']; } ?></td>

            <td><?php

                    $totaltransaksi  = mysqli_query($koneksi, "select sum(subtotal) as totalpenghasilan from transaksi where MONTH(tanggal_transaksi)");

                    while ($row = mysqli_fetch_array($totaltransaksi)) {

                    ?><?php 

                    function rupiah($angka){

                        $hasil_rupiah = "Rp. " . number_format($angka,2,',','.');

                        return $hasil_rupiah;

                    }

                    echo rupiah($row['totalpenghasilan']); }

                    ?></td>

            <td><?php

                    $totaltransaksi  = mysqli_query($koneksi, "SELECT COUNT(id_transaksi) as total from transaksi where YEAR(tanggal_transaksi);");

                    while ($row = mysqli_fetch_array($totaltransaksi)) {

                    ?><?php echo $row['total']; } ?></td>

        </tr>









                </tbody>

            </table>



                    <p></p>



            <table style="text-align:center;" width="70%" border="1" cellspacing="0">

                <thead>

                    <tr>

                        <th>No</th>

                        <th>Bulan</th>

                        <th>Penghasilan</th>

                       

                    </tr>

                </thead>

               

                <tbody>



        <tr>

            <td>1</td>

            <td>Januari</td>

            <td><?php

            $totaltransaksi  = mysqli_query($koneksi, "select COALESCE(sum(subtotal),0) as januari from transaksi where MONTH(tanggal_transaksi) = 01 AND YEAR(tanggal_transaksi) and status ='2'");

            while ($row = mysqli_fetch_array($totaltransaksi)) {?>

            <?php echo $row['januari']; ?>

            <?php 

            }

            ?></td>

        </tr>



        <tr>

            <td>2</td>

            <td>Februari</td>

            <td><?php

            $totaltransaksi  = mysqli_query($koneksi, "select COALESCE(sum(subtotal),0) as februari from transaksi where MONTH(tanggal_transaksi) = 02 AND YEAR(tanggal_transaksi) and status ='2'");

            while ($row = mysqli_fetch_array($totaltransaksi)) {?>

            <?php echo $row['februari']; ?>

            <?php 

            }

            ?></td>

        </tr>



        <tr>

            <td>3</td>

            <td>Maret</td>

            <td><?php

            $totaltransaksi  = mysqli_query($koneksi, "select COALESCE(sum(subtotal),0) as maret from transaksi where MONTH(tanggal_transaksi) = 03 AND YEAR(tanggal_transaksi) and status ='2'");

            while ($row = mysqli_fetch_array($totaltransaksi)) {?>

            <?php echo $row['maret']; ?>

            <?php 

            }

            ?></td>

        </tr>



        <tr>

            <td>4</td>

            <td>April</td>

            <td><?php

            $totaltransaksi  = mysqli_query($koneksi, "select COALESCE(sum(subtotal),0) as april from transaksi where MONTH(tanggal_transaksi) = 04 AND YEAR(tanggal_transaksi) and status ='2'");

            while ($row = mysqli_fetch_array($totaltransaksi)) {?>

            <?php echo $row['april']; ?>

            <?php 

            }

            ?></td>

        </tr>



        <tr>

            <td>5</td>

            <td>Mei</td>

            <td><?php

            $totaltransaksi  = mysqli_query($koneksi, "select COALESCE(sum(subtotal),0) as mei from transaksi where MONTH(tanggal_transaksi) = 05 AND YEAR(tanggal_transaksi) and status ='2'");

            while ($row = mysqli_fetch_array($totaltransaksi)) {?>

            <?php echo $row['mei']; ?>

            <?php 

            }

            ?></td>

        </tr>



        <tr>

            <td>6</td>

            <td>Juni</td>

            <td><?php

            $totaltransaksi  = mysqli_query($koneksi, "select COALESCE(sum(subtotal),0) as juni from transaksi where MONTH(tanggal_transaksi) = 06 AND YEAR(tanggal_transaksi) and status ='2'");

            while ($row = mysqli_fetch_array($totaltransaksi)) {?>

            <?php echo $row['juni']; ?>

            <?php 

            }

            ?></td>

        </tr>





        <tr>

            <td>7</td>

            <td>Juli</td>

            <td><?php

            $totaltransaksi  = mysqli_query($koneksi, "select COALESCE(sum(subtotal),0) as juli from transaksi where MONTH(tanggal_transaksi) = 07 AND YEAR(tanggal_transaksi) and status ='2'");

            while ($row = mysqli_fetch_array($totaltransaksi)) {?>

            <?php echo $row['juli']; ?>

            <?php 

            }

            ?></td>

        </tr>



        

        <tr>

            <td>8</td>

            <td>Agustus</td>

            <td><?php

            $totaltransaksi  = mysqli_query($koneksi, "select COALESCE(sum(subtotal),0) as agustus from transaksi where MONTH(tanggal_transaksi) = 08 AND YEAR(tanggal_transaksi) and status ='2'");

            while ($row = mysqli_fetch_array($totaltransaksi)) {?>

            <?php echo $row['agustus']; ?>

            <?php 

            }

            ?></td>

        </tr>





        <tr>

            <td>9</td>

            <td>September</td>

            <td><?php

            $totaltransaksi  = mysqli_query($koneksi, "select COALESCE(sum(subtotal),0) as september from transaksi where MONTH(tanggal_transaksi) = 09 AND YEAR(tanggal_transaksi) and status ='2'");

            while ($row = mysqli_fetch_array($totaltransaksi)) {?>

            <?php echo $row['september']; ?>

            <?php 

            }

            ?></td>

        </tr>



        <tr>

            <td>10</td>

            <td>November</td>

            <td><?php

            $totaltransaksi  = mysqli_query($koneksi, "select COALESCE(sum(subtotal),0) as november from transaksi where MONTH(tanggal_transaksi) = 10 AND YEAR(tanggal_transaksi) and status ='2'");

            while ($row = mysqli_fetch_array($totaltransaksi)) {?>

            <?php echo $row['november']; ?>

            <?php 

            }

            ?></td>

        </tr>



        <tr>

            <td>11</td>

            <td>Oktober</td>

            <td><?php

            $totaltransaksi  = mysqli_query($koneksi, "select COALESCE(sum(subtotal),0) as oktober from transaksi where MONTH(tanggal_transaksi) = 11 AND YEAR(tanggal_transaksi) and status ='2'");

            while ($row = mysqli_fetch_array($totaltransaksi)) {?>

            <?php echo $row['oktober']; ?>

            <?php 

            }

            ?></td>

        </tr>





        <tr>

            <td>12</td>

            <td>Desember</td>

            <td><?php

            $totaltransaksi  = mysqli_query($koneksi, "select COALESCE(sum(subtotal),0) as desember from transaksi where MONTH(tanggal_transaksi) = 12 AND YEAR(tanggal_transaksi)");

            while ($row = mysqli_fetch_array($totaltransaksi)) {?>

            <?php echo $row['desember']; ?>

            <?php 

            }

            ?></td>

        </tr>







                </tbody>

            </table>



</body>

</html>