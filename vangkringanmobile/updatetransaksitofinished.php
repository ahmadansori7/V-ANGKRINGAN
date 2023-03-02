<?php
require("koneksi.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    $id_transaksi = $_POST['id_transaksi'];
    $username = $_POST['username'];

    $query1 = "UPDATE transaksi SET status = '2' WHERE id_transaksi = '$id_transaksi' AND username = '$username'";
       
    $eksekusi1 = mysqli_query($koneksi, $query1);
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