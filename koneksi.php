<?php



$server     = 'localhost';

$username   = 'vangkrin_admin';

$password   = '@qBv8ikH39d6kcB';

$db         = 'vangkrin_vangringan';



$koneksi    = mysqli_connect($server, $username, $password, $db);

//pastikan urutan pemanggilan variabelnya sama



if(mysqli_connect_errno()){

    echo 'koneksi gagal : '.mysqli_connect_error();

}