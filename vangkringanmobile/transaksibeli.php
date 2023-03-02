<?php
require('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    $id_transaksi = $_POST['id_transaksi'];
    $id_produk = $_POST['id_produk'];
    $username = $_POST['username'];
    $jumlah = $_POST['jumlah'];
    $totalhargaitem = $_POST['totalhargaitem'];
    // $subtotal = $_POST['subtotal'];
    // $pengiriman = $_POST['pengiriman'];
    // $metode = $_POST['metode'];

    $query1 = "INSERT INTO transaksi (id_transaksi, username, tanggal_transaksi) VALUES ('$id_transaksi', '$username', CURRENT_TIMESTAMP)";
    $query2 = "INSERT INTO detail_transaksi (id_transaksi, id_produk, jumlah, totalhargaitem) VALUES ('$id_transaksi', '$id_produk', '$jumlah', '$totalhargaitem')";
    // $query2s = "INSERT INTO detail_transaksi VALUES ('$id_transaksi', '$id_produk', '$username', '$jumlah', '$totalhargaitem', '$subtotal', '$pengiriman', '$metode' )";
    $result1 = mysqli_query($koneksi, $query1);
    $result2 = mysqli_query($koneksi, $query2);
    $check = mysqli_affected_rows($koneksi);
    //}
    
if ($check>0){
    $response['kode'] = 1;
}else{
    $response['kode'] = 0;
}
echo json_encode($response);
mysqli_close($koneksi);
    
}
?>