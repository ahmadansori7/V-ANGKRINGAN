<?php
require("koneksi.php");

if ($_POST){

    $username = $_POST['username'];
    $idkupon = $_POST['idkupon'];
    $nilai = $_POST['nilai'];
    $minimal = $_POST['minimal'];

    $query1 = "INSERT INTO kupon VALUES ('$username','$idkupon','Kupon Gratis Ongkir A','$nilai','$minimal')";
       
    $eksekusi = mysqli_query($koneksi, $query1);
    $cek = mysqli_affected_rows($koneksi);

if($cek > 0){
    $response["kode"] = 1;
}
else{
    $response["kode"] = 0;
}
}
echo json_encode($response);
mysqli_close($koneksi);
?>