<?php
require("koneksi.php");

if ($_POST){

    $email = $_POST['email'];

    $query1 = "DELETE FROM user WHERE email = '$email'";
       
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