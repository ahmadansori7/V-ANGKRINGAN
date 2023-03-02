<?php

require ('koneksi.php');



// menangkap data id yang di kirim dari url

$id = $_GET['id'];

 

 

// menghapus data dari database

mysqli_query($koneksi,"UPDATE `transaksi` SET `status`='1' WHERE `id_transaksi` = '$id'");

 

// mengalihkan halaman kembali ke index.php

echo "<script>

eval(\"parent.location='transaksi.php '\");

alert (' Makanan sudah selesai, dan siap dikirim!');

</script>";



?>