<?php
require("koneksi.php");

if ($_SERVER['REQUEST_METHOD']==='GET') {
$perintah = "SELECT MAX(RIGHT(idkupon, 17)) AS max_col1 FROM kupon";
            
$eksekusi = mysqli_query($koneksi, $perintah);
$cek = mysqli_affected_rows($koneksi);

if($cek > 0){
    $response["kode"] = 1;
    $response["pesan"]= "Data Tersedia";
    $response["data"] = array();

    while($ambil = mysqli_fetch_array($eksekusi)){
        $kodekupon = $ambil["max_col1"];
        $urutan = (int) substr($kodekupon, 4, 20);
        $urutan++;
        $huruf = "KSB";
        $kodekupon = $huruf.sprintf("%017s", $urutan);

        $F["idkupon"] = $kodekupon;
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