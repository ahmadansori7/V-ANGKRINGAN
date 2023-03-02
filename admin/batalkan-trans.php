<?php

require ('koneksi.php');



// menangkap data id yang di kirim dari url

$id = $_GET['id'];

 

 

// menghapus data dari database

mysqli_query($koneksi,"UPDATE `transaksi` SET `status`='3', `catatan` = 'makanan sudah habis / tidak tersedia'  WHERE `id_transaksi` = '$id'");

 

// mengalihkan halaman kembali ke index.php

echo "<script>

eval(\"parent.location='transaksi.php '\");

alert (' Transaksi dibatalkan');

</script>";



?>