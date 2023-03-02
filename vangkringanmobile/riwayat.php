<?php
require("koneksi.php");

if ($_POST){

    $username = $_POST['username'];

    $query3 = "SELECT id_transaksi, status, subtotal, catatanpbl, catatan, tanggal_transaksi FROM transaksi WHERE status LIKE '%2%' AND username = '$username' OR status LIKE '%3%' AND username = '$username' ORDER BY tanggal_transaksi";
       
    $eksekusi = mysqli_query($koneksi, $query3);
    $cek = mysqli_affected_rows($koneksi);

if($cek > 0){
    $response["kode"] = 1;
    $response["pesan"]= "Data Tersedia";
    $response["data"] = array();

    while($ambil = mysqli_fetch_object($eksekusi)){
        $F["id_transaksi"] = $ambil->id_transaksi;
        $F["metode"] = $ambil->status;
        $F["subtotal"] = $ambil->subtotal;
        $F["nama_produk"] = $ambil->catatanpbl;
        $F["totalhargaitem"] = $ambil->catatan;
        $F["jumlah"] = $ambil->tanggal_transaksi;
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