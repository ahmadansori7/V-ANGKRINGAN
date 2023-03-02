<?php

require ('koneksi.php');
//function start lagi
session_start();

//cek apakah session terdaftar
if(!isset($_SESSION["ses"])){

//session terdaftar, saatnya logout
session_unset();
session_destroy();
}
else{

//variabel session salah, user tidak seharusnya ada dihalaman ini. Kembalikan ke login
echo "<script>
eval(\"parent.location='../login.php '\");
alert (' Anda berhasil logout!');
</script>";
}
?>