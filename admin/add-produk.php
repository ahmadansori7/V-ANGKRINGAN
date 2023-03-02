<?php

require ('koneksi.php');



//fungsi insert database

if(isset($_POST['tambah'])) {



    $id = $_POST['txt_id'];

    $nama_produk = $_POST['txt_nama'];

    $harga = $_POST['txt_harga'];

    $stok = $_POST['txt_stok'];

    $deskripsi_produk = $_POST['txt_deskripsi'];

    $kategori = $_POST['kategori'];



    $nama_file = $_FILES ['gambar']['name'];

    $source = $_FILES ['gambar']['tmp_name'];
    $tipe = $_FILES ['gambar']['type'];

    $folder = 'gambarproduk/';

    if ($tipe =='image/jpeg' or $tipe == 'image/png') {

    move_uploaded_file($source, $folder.$nama_file);

    $query  = mysqli_query($koneksi, "INSERT INTO `produk`(`id_produk`, `nama_produk`, `deskripsi_produk`, `harga`, `gambar`, `stok`, `kategori`) VALUES ('$id','$nama_produk','$deskripsi_produk','$harga','$nama_file','$stok','$kategori')");

    $result = mysqli_query($koneksi, $query);

    echo "<script>

    eval(\"parent.location='produk.php '\");

    alert (' Data Berhasil ditambahkan!');

    </script>";

    }  else {

        echo "<script>

        eval(\"parent.location='produk.php '\");

        alert (' Data Gagal ditambahkan!');

        </script>";

    }
}