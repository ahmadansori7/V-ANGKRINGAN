<?php
require("koneksi.php");

if ($_POST){

    $id_transaksi = $_POST['id_transaksi'];
    $id_produk = $_POST['id_produk'];

    $query3 = "DELETE FROM detail_transaksi WHERE id_transaksi = '$id_transaksi' AND id_produk = '$id_produk'";
       
    $eksekusi = mysqli_query($koneksi, $query3);
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