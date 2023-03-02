<?php
require("koneksi.php");

if ($_SERVER['REQUEST_METHOD']==='GET') {
$perintah = "SELECT * FROM produk WHERE kategori = 'frozenfood'";
            
// $perintah1 = "SELECT * FROM jenis_barang";
// $perintah2 = "SELECT * FROM jenis_ukuran";
// $perintah3 = "SELECT * FROM jenis_warna";
// $perintah4 = "SELECT * FROM barang";
$eksekusi = mysqli_query($koneksi, $perintah);
$cek = mysqli_affected_rows($koneksi);

if($cek > 0){
    $response["kode"] = 1;
    $response["pesan"]= "Data Tersedia";
    $response["data"] = array();

    while($ambil = mysqli_fetch_object($eksekusi)){
        $F["id_produk"] = $ambil->id_produk;
        $F["nama_produk"] = $ambil->nama_produk;
        $F["kategori"] = $ambil->kategori;
        $F["deskripsi_produk"] = $ambil->deskripsi_produk;
        $F["harga"] = $ambil->harga;
        $F["gambar"] = $ambil->gambar;
        $F["stok"] = $ambil->stok;
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