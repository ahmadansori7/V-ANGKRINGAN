<?php

require ('koneksi.php');



//fungsi update database

if(isset($_POST['update'])) {

    $id = $_POST['idproduk'];

    $nama_produk = $_POST['txt_nama'];

    $harga = $_POST['txt_harga'];

    $stok = $_POST['txt_stok'];

    $deskripsi_produk = $_POST['txt_deskripsi'];



    $nama_file = $_FILES ['gambar']['name'];

    $source = $_FILES ['gambar']['tmp_name'];

    $folder = 'gambarproduk/';



   



     //Cek Photo

     if (strlen($nama_file)>0) {

        //upload Photo

        if (is_uploaded_file($_FILES['gambar']['tmp_name'])) {

            move_uploaded_file($source, $folder.$nama_file);

            $query  = mysqli_query($koneksi, "UPDATE produk SET gambar='$nama_file' WHERE `id_produk`='$id'");

            $result = mysqli_query($koneksi, $query);

        }

    }





    $query  = mysqli_query($koneksi, "UPDATE `produk` SET `nama_produk`='$nama_produk',`deskripsi_produk`='$deskripsi_produk',`harga`='$harga',`stok`='$stok'  WHERE `id_produk`='$id'");

    $result = mysqli_query($koneksi, $query);

    echo "<script>

    eval(\"parent.location='produk.php '\");

    alert (' Data Berhasil Diupdate!');

    </script>";



    } else {

        echo "<script>

        eval(\"parent.location='produk.php '\");

        alert (' Data Gagal Diupdate!');

        </script>";

    }



?>