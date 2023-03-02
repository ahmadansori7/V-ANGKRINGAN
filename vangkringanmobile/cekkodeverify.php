<?php
require("koneksi.php");

if ($_POST){

    $email = $_POST['email'];

    $query1 = "SELECT kodeotp FROM user WHERE email = '$email'";

    $eksekusi = mysqli_query($koneksi, $query1);
    $cek = mysqli_affected_rows($koneksi);

    if($cek > 0){
        $response["kode"] = 1;
        $response["pesan"]= "Data Tersedia";
        $response["data"] = array();
    
        while($ambil = mysqli_fetch_object($eksekusi)){
            $F["username"] = $ambil->kodeotp;
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