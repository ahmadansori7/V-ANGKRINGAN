<?php
require("koneksi.php");

if ($_POST){

    $username = $_POST['username'];

    $query1 = "SELECT produk.id_produk, produk.nama_produk, produk.harga, produk.gambar, keranjang.jumlah, keranjang.totalhargaitem FROM keranjang JOIN produk ON produk.id_produk = keranjang.id_produk WHERE keranjang.username = '$username'";
       
    $eksekusi = mysqli_query($koneksi, $query1);
    $cek = mysqli_affected_rows($koneksi);

    if($cek > 0){
        $response["kode"] = 1;
        $response["pesan"]= "Data Tersedia";
        $response["data"] = array();
    
        while($ambil = mysqli_fetch_object($eksekusi)){
            $F["id_produk"] = $ambil->id_produk;
            $F["nama_produk"] = $ambil->nama_produk;
            $F["harga"] = $ambil->harga;
            $F["pengiriman"] = $ambil->gambar;
            $F["jumlah"] = $ambil->jumlah;
            $F["totalhargaitem"] = $ambil->totalhargaitem;
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