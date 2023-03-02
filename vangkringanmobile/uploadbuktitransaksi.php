<?php
require('koneksi.php');

    $part = "gambar/";
    $imagename = "gambar".rand(1, 100).".jpg";
    $tujuanfile = $part.$imagename;
    $imagedb = "https://v-angkringan.my.id/vangkringanmobile/gambar/".$imagename;

    if ($_POST){
    
        $id_transaksi = $_POST['id_transaksi'];
    
        $query1 = "UPDATE transaksi SET gambarbukti = '$imagedb' WHERE id_transaksi = '$id_transaksi'";
        $result1 = mysqli_query($koneksi, $query1);
        $check = mysqli_affected_rows($koneksi);
        
    if ($check>0){
        $response['kode'] = 1;
        move_uploaded_file($_FILES["gambarbukti"]["tmp_name"],$tujuanfile);
    }else{
        $response['kode'] = 0;
    }
    echo json_encode($response);
    mysqli_close($koneksi);
}
?>