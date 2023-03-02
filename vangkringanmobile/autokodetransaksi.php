<?php
require("koneksi.php");

if ($_SERVER['REQUEST_METHOD']==='GET') {
$perintah = "SELECT MAX(RIGHT(id_transaksi,7)) AS max_col1 FROM transaksi";
            
$eksekusi = mysqli_query($koneksi, $perintah);
$cek = mysqli_affected_rows($koneksi);

if($cek > 0){
    $response["kode"] = 1;
    $response["pesan"]= "Data Tersedia";
    $response["data"] = array();

    while($ambil = mysqli_fetch_array($eksekusi)){
        $kodetransaksi = $ambil["max_col1"];
        $urutan = (int) substr($kodetransaksi, 4, 10);
        $urutan++;
        $huruf = "TRS";
        $kodetransaksi = $huruf.sprintf("%07s", $urutan);

        $F["id_transaksi"] = $kodetransaksi;
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