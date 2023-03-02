<?php
require("koneksi.php");

if ($_POST){

    $username = $_POST['username'];
    $id_transaksi = $_POST['id_transaksi'];

    $query3 = "SELECT produk.nama_produk, detail_transaksi.jumlah, detail_transaksi.totalhargaitem, produk.gambar AS gambar FROM detail_transaksi JOIN produk ON produk.id_produk = detail_transaksi.id_produk JOIN transaksi ON detail_transaksi.id_transaksi = transaksi.id_transaksi JOIN user ON user.username = transaksi.username WHERE transaksi.username = '$username' AND transaksi.id_transaksi = '$id_transaksi'";
       
    $eksekusi = mysqli_query($koneksi, $query3);
    $cek = mysqli_affected_rows($koneksi);

if($cek > 0){
    $response["kode"] = 1;
    $response["pesan"]= "Data Tersedia";
    $response["data"] = array();

    while($ambil = mysqli_fetch_object($eksekusi)){
        $F["nama_produk"] = $ambil->nama_produk;
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