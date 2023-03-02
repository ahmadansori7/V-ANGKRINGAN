<?php
require("koneksi.php");

if ($_POST){

    $username = $_POST['username'];

    $query3 = "SELECT produk.nama_produk, produk.harga, detail_transaksi.jumlah, transaksi.tanggal_transaksi, produk.gambar AS gambar FROM detail_transaksi JOIN transaksi ON transaksi.id_transaksi = detail_transaksi.id_transaksi JOIN produk ON produk.id_produk = detail_transaksi.id_produk JOIN user ON user.username = transaksi.username WHERE kategori IN ('minumanpanas', 'minumandingin', 'minumansachet', 'minumanherbal', 'minumanlainnya') AND user.username = '$username'";
       
    $eksekusi = mysqli_query($koneksi, $query3);
    $cek = mysqli_affected_rows($koneksi);

if($cek > 0){
    $response["kode"] = 1;
    $response["pesan"]= "Data Tersedia";
    $response["data"] = array();

    while($ambil = mysqli_fetch_object($eksekusi)){
        $F["nama_produk"] = $ambil->nama_produk;
        $F["harga"] = $ambil->harga;
        $F["jumlah"] = $ambil->jumlah;
        $F["subtotal"] = $ambil->tanggal_transaksi;
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