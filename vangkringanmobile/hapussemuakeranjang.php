<?php
require("koneksi.php");

if ($_POST){

    $username = $_POST['username'];

    $query1 = "DELETE krj.* FROM keranjang AS krj INNER JOIN user AS user ON krj.username = user.username WHERE krj.username = '$username'";
       
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