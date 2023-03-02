<?php
require("koneksi.php");

if ($_POST){

    $username = $_POST['username'];
    $id_transaksi = $_POST['id_transaksi'];

    $query1 = "SELECT detail_transaksi.id_transaksi, transaksi.username, produk.id_produk, produk.nama_produk, produk.harga, detail_transaksi.jumlah, detail_transaksi.totalhargaitem, produk.gambar FROM detail_transaksi JOIN transaksi ON detail_transaksi.id_transaksi = transaksi.id_transaksi JOIN produk ON detail_transaksi.id_produk = produk.id_produk WHERE detail_transaksi.id_transaksi = '$id_transaksi' AND transaksi.username = '$username'";
    $query2 = "SELECT SUM(totalhargaitem) as subtotal FROM detail_transaksi JOIN transaksi ON detail_transaksi.id_transaksi = transaksi.id_transaksi WHERE detail_transaksi.id_transaksi = '$id_transaksi' AND transaksi.username = '$username'";
       
    $eksekusi1 = mysqli_query($koneksi, $query1);
    $cek = mysqli_affected_rows($koneksi);

if($cek > 0){
    $response["kode"] = 1;
    $response["pesan"]= "Data Tersedia";
    $response["data"] = array();

    while($ambil = mysqli_fetch_object($eksekusi1)){
        $F["id_transaksi"] = $ambil->id_transaksi;
        $F["id_produk"] = $ambil->id_produk;
        $F["nama_produk"] = $ambil->nama_produk;
        $F["username"] = $ambil->username;
        $F["harga"] = $ambil->harga;
        $F["jumlah"] = $ambil->jumlah;
        $F["totalhargaitem"] = $ambil->totalhargaitem;
        $F["pengiriman"] = $ambil->gambar;
        array_push($response["data"], $F);
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