<?php
require("koneksi.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    $username = $_POST['username'];
    $id_produk = $_POST['id_produk'];
    $jumlah = $_POST['jumlah'];
    $totalhargaitem = $_POST['totalhargaitem'];

    $query1 = "INSERT INTO keranjang (username, id_produk, jumlah, totalhargaitem) VALUES ('$username', '$id_produk', '$jumlah', '$totalhargaitem')";
       
    $eksekusi = mysqli_query($koneksi, $query1);
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