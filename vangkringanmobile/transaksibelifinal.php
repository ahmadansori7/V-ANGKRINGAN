<?php 
require('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    $username = $_POST['username'];
    $id_transaksi = $_POST['id_transaksi'];
    $subtotal = $_POST['subtotal'];
    $pengiriman = $_POST['pengiriman'];
    $metode = $_POST['metode'];
    $status = $_POST['status'];
    $catatan = $_POST['id_produk'];

    $kupon_ongkir = $_POST['nama_produk'];
    $kupon_cashback = $_POST['totalhargaitem'];

    $query1 = "UPDATE transaksi SET subtotal = '$subtotal', pengiriman = '$pengiriman', metode = '$metode', status = '$status', catatanpbl = '$catatan'  WHERE username = '$username' AND id_transaksi = '$id_transaksi'";
    $query2 = "DELETE FROM kupon WHERE idkupon IN ('$kupon_ongkir','$kupon_cashback') AND username = '$username'";
    $result1 = mysqli_query($koneksi, $query1);
    $result2 = mysqli_query($koneksi, $query2);
    $check = mysqli_affected_rows($koneksi);
    
if ($check>0){
    $response['kode'] = 1;
}else{
    $response['kode'] = 0;
}
echo json_encode($response);
mysqli_close($koneksi);
    
}
?>