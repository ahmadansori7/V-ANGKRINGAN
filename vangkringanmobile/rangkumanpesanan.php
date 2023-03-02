<?php
require("koneksi.php");

if ($_POST){

    $username = $_POST['username'];
    $id_transaksi = $_POST['id_transaksi'];

    $query3 = "SELECT transaksi.id_transaksi, produk.id_produk, produk.nama_produk, user.username, produk.harga, detail_transaksi.jumlah, detail_transaksi.totalhargaitem, SUM(totalhargaitem) AS subtotal, produk.gambar AS gambar FROM detail_transaksi JOIN transaksi ON transaksi.id_transaksi = detail_transaksi.id_transaksi JOIN produk ON produk.id_produk = detail_transaksi.id_produk JOIN user ON user.username = transaksi.username WHERE transaksi.username = '$username' AND detail_transaksi.id_transaksi = '$id_transaksi'";
       
    $eksekusi = mysqli_query($koneksi, $query3);
    $cek = mysqli_affected_rows($koneksi);

if($cek > 0){
    $response["kode"] = 1;
    $response["pesan"]= "Data Tersedia";
    $response["data"] = array();

    while($ambil = mysqli_fetch_object($eksekusi)){
        $F["id_transaksi"] = $ambil->id_transaksi;
        $F["id_produk"] = $ambil->id_produk;
        $F["nama_produk"] = $ambil->nama_produk;
        $F["username"] = $ambil->username;
        $F["harga"] = $ambil->harga;
        $F["jumlah"] = $ambil->jumlah;
        $F["totalhargaitem"] = $ambil->totalhargaitem;
        $F["subtotal"] = $ambil->subtotal;
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