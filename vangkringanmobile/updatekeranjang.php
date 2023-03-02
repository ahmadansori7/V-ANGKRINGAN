<?php
require("koneksi.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    $id_produk = $_POST['id_produk'];
    $username = $_POST['username'];
    $jumlah = $_POST['jumlah'];
    $totalhargaitem = $_POST['totalhargaitem'];

    $query1 = "UPDATE keranjang SET jumlah = '$jumlah', totalhargaitem = '$totalhargaitem' WHERE id_produk = '$id_produk' AND username = '$username'";
    $query2 = "SELECT jumlah, totalhargaitem FROM keranjang WHERE id_produk = '$id_produk' AND username = '$username'";
       
    $eksekusi1 = mysqli_query($koneksi, $query1);
    $eksekusi2 = mysqli_query($koneksi, $query2);
    $cek = mysqli_affected_rows($koneksi);

    if($cek > 0){
        $response["kode"] = 1;
        $response["pesan"]= "Data Tersedia";
        $response["data"] = array();
    
        while($ambil = mysqli_fetch_object($eksekusi2)){
            $F["jumlah"] = $ambil->jumlah;
            $F["totalhargaitem"] = $ambil->totalhargaitem;
            array_push($response["data"], $F);
        }
    }
    else{
        $response["kode"] = 0;
    }
}
echo json_encode($response);
mysqli_close($koneksi);
?>