<?php
require("koneksi.php");

if ($_POST){

    $username = $_POST['username'];

    $query3 = "SELECT SUM(subtotal) AS subtotal FROM transaksi WHERE username = '$username' AND status = 2 AND tanggal_transaksi BETWEEN DATE_SUB(CURDATE(), INTERVAL 7 DAY) AND CURDATE()";
       
    $eksekusi = mysqli_query($koneksi, $query3);
    $cek = mysqli_affected_rows($koneksi);

    if($cek > 0){
        $response["kode"] = 1;
        $response["pesan"]= "Data Tersedia";
        $response["data"] = array();

        while($ambil = mysqli_fetch_object($eksekusi)){
            $F["subtotal"] = $ambil->subtotal;
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