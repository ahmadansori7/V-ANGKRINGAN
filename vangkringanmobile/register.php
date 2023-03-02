<?php
require("koneksi.php");

if ($_POST){
    
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $nama_lengkap= $_POST['nama_lengkap'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST ['alamat'];
    // $level = $_POST ['level'];

    $level = "pelanggan";
    $otp = "";

    $query = "INSERT INTO user VALUES ('$username', '$email', '$password', '$nama_lengkap', '$no_hp', '$alamat', '$level', '$otp', '')";
    $result = mysqli_query($koneksi, $query);
    $check = mysqli_affected_rows($koneksi);

    if ($check>0){
        $response['kode'] = 1;
        
    }else{
        $response['kode'] = 0;
    }
    echo json_encode($response);
    mysqli_close($koneksi);
//}
}
?>