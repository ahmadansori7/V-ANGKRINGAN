<?php 
require('koneksi.php');

if ($_POST){
    
    //if (isset ($username) || isset ($password) || isset ($query) || isset ($result)) {
     $username = $_POST['username'];
     $password = $_POST['password'];
    // WHERE username = '$username' AND password = '$password'"

    $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'" ;
    $result = mysqli_query($koneksi, $query);
    $check = mysqli_affected_rows($koneksi);
    //}
    
if ($check>0){
    $response['kode'] = 1;
    while ($row = mysqli_fetch_object($result)){
        $data[] = $row;
    }
    $response['data'] = $data;
}else{
    $response['kode'] = 0;
}
echo json_encode($response);
mysqli_close($koneksi);
    
}
?>