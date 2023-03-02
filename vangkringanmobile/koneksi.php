<?php
$koneksi = mysqli_connect("localhost", "vangkrin_admin", "@qBv8ikH39d6kcB","vangkrin_vangringan");

if (mysqli_connect_errno()) {
    echo "koneksi gagal : ".mysqli_connect_error();
} 
?>