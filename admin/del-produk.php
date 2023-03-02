<?php

require ('koneksi.php');



// menangkap data id yang di kirim dari url

$id = $_GET['id'];

 

 

// menghapus data dari database

mysqli_query($koneksi,"DELETE FROM `produk` WHERE id_produk='$id'");

 

// mengalihkan halaman kembali ke index.php

echo "<script>

eval(\"parent.location='produk.php '\");

alert (' Data Berhasil Dihapus!');

</script>";



?>