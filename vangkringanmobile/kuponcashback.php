<?php
require("koneksi.php");

if ($_POST){

    $username = $_POST['username'];

    $query3 = "SELECT idkupon, nama_kupon, nilai, minimal FROM kupon WHERE username = '$username'  AND idkupon LIKE '%KS%' ORDER BY nilai DESC";
       
    $eksekusi = mysqli_query($koneksi, $query3);
    $cek = mysqli_affected_rows($koneksi);

if($cek > 0){
    $response["kode"] = 1;
    $response["pesan"]= "Data Tersedia";
    $response["data"] = array();

    while($ambil = mysqli_fetch_object($eksekusi)){
        $F["idkupon"] = $ambil->idkupon;
        $F["nama_kupon"] = $ambil->nama_kupon;
        $F["nilai"] = $ambil->nilai;
        $F["minimal"] = $ambil->minimal;
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