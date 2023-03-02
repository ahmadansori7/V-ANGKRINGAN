<?php
require("koneksi.php");

if ($_POST){

    $username = $_POST['username'];

    $query1 = "DELETE detail.* FROM detail_transaksi AS detail INNER JOIN transaksi AS trans ON detail.id_transaksi = trans.id_transaksi WHERE trans.username = '$username' AND trans.status LIKE '%2%' OR trans.username = '$username' AND trans.status LIKE '%3%'";
    $query2 = "DELETE FROM transaksi WHERE username = '$username'";
       
    $eksekusi = mysqli_query($koneksi, $query1);
    $eksekusi = mysqli_query($koneksi, $query2);
    $cek = mysqli_affected_rows($koneksi);

if($cek > 0){
    $response["kode"] = 1;
}
else{
    $response["kode"] = 0;
}
}
echo json_encode($response);
mysqli_close($koneksi);
?>