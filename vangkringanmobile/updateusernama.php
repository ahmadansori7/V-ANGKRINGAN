<?php
require('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    $nama_lengkap = $_POST['nama_lengkap'];
    $username = $_POST['username'];

    $query1 = "UPDATE user SET nama_lengkap = '$nama_lengkap' WHERE username = '$username'" ;
    $query2 = "SELECT * FROM user WHERE nama_lengkap = '$nama_lengkap'" ;
    $result1 = mysqli_query($koneksi, $query1);
    $result2 = mysqli_query($koneksi, $query2);
    $check = mysqli_affected_rows($koneksi);
    //}
    
if ($check>0){
    $response['kode'] = 1;
    while ($ambil = mysqli_fetch_object($result2)){
        $data[] = $ambil;
    }
    $response['data'] = $data;
}else{
    $response['kode'] = 0;
}
echo json_encode($response);
mysqli_close($koneksi);
    
}
?>