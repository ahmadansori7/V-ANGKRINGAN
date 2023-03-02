<?php
require("koneksi.php");

if ($_POST){

    $username = $_POST['username'];
    $id_transaksi = $_POST['id_transaksi'];

    $query1 = "INSERT INTO transaksi (id_transaksi, username, tanggal_transaksi) VALUES ('$id_transaksi', '$username', CURRENT_TIMESTAMP)";
    $query2 = "INSERT INTO detail_transaksi (id_transaksi, id_produk, jumlah, totalhargaitem) SELECT '$id_transaksi', id_produk, jumlah, totalhargaitem FROM keranjang WHERE username = '$username'";
       
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