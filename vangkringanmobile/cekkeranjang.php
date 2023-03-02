<?php
require("koneksi.php");

if ($_POST){

    $username = $_POST['username'];
    $id_produk = $_POST['id_produk'];

    $query1 = "SELECT id_produk FROM keranjang WHERE username = '$username' AND id_produk = '$id_produk'";
       
    $eksekusi = mysqli_query($koneksi, $query1);
    $cek = mysqli_affected_rows($koneksi);

    if($cek > 0){
        $response["kode"] = 1;
        $response["pesan"]= "Data Tersedia";
        $response["data"] = array();
    
        while($ambil = mysqli_fetch_object($eksekusi)){
            $F["id_produk"] = $ambil->id_produk;
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