<?php 
require('koneksi.php');

if ($_POST){
    
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query1 = "UPDATE user SET password = '$password' WHERE email = '$email'" ;
    $result1 = mysqli_query($koneksi, $query1);
    $check = mysqli_affected_rows($koneksi);
    
if ($check>0){
    $response['kode'] = 1;
}else{
    $response['kode'] = 0;
}
echo json_encode($response);
mysqli_close($koneksi);
    
}
?>