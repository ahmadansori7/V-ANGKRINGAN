<?php
require('koneksi.php');

if ($_POST){
    
    $id_transaksi = $_POST['id_transaksi'];
    $username = $_POST['username'];

    $query1 = "DELETE FROM detail_transaksi WHERE id_transaksi = '$id_transaksi'";
    $query2 = "DELETE FROM transaksi WHERE id_transaksi = '$id_transaksi' AND username = '$username'";
    $result1 = mysqli_query($koneksi, $query1);
    $result2 = mysqli_query($koneksi, $query2);
    $check = mysqli_affected_rows($koneksi);
    //}
    
if ($check>0){
    $response['kode'] = 1;
}else{
    $response['kode'] = 0;
}
echo json_encode($response);
mysqli_close($koneksi);
    
}
?>