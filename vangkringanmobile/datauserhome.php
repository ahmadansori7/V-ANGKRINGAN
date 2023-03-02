<?php
require('koneksi.php');

if ($_POST){
    
    $nama_lengkap = $_POST['nama_lengkap'];

    $query = "SELECT * FROM user WHERE nama_lengkap = '$nama_lengkap'" ;
    $result = mysqli_query($koneksi, $query);
    $check = mysqli_affected_rows($koneksi);
    //}
    
if ($check>0){
    $response['kode'] = 1;
    while ($ambil = mysqli_fetch_object($result)){
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