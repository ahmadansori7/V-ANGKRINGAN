<?php
require("koneksi.php");

if ($_POST){

    $username = $_POST['username'];
    $id_transaksi = $_POST['id_transaksi'];

    $query1 = "SELECT SUM(totalhargaitem) as subtotal FROM detail_transaksi JOIN transaksi ON detail_transaksi.id_transaksi = transaksi.id_transaksi WHERE detail_transaksi.id_transaksi = '$id_transaksi' AND transaksi.username = '$username'";
       
    $eksekusi1 = mysqli_query($koneksi, $query1);
    $cek = mysqli_affected_rows($koneksi);

if($cek > 0){
    $response["kode"] = 1;
    $response["pesan"]= "Data Tersedia";
    $response["data"] = array();

    while($ambil2 = mysqli_fetch_object($eksekusi1)){
        $F2["subtotal"] = $ambil2->subtotal;
        array_push($response["data"], $F2);
    }
}
else{
    $response["kode"] = 0;
    $response["pesan"] = "Data Tidak Tersedia";
}
}
echo json_encode($response);
mysqli_close($koneksi);
?>