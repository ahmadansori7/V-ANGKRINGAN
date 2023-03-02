<?php
// Library untuk menggunakan PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

//ini sesuaikan foldernya ke file 2 ini
require 'vendor/autoload.php';
require "koneksi.php";

if ($_POST){
  // Fungsi untuk membuat kode verifikasi, menyimpan kode verifikasi ke database dan mengirimkan kode verifikasi ke Email tujuan.
  $kode = rand(pow(10, 8 - 1), pow(10, 8) - 1); 
  $email = $_POST['email'];
  $judul = $_POST['username'];
  $pesan = $_POST['alamat'];

  $query3 = "UPDATE user SET kodeotp = '$kode' WHERE email = '$email'";
       
  $eksekusi = mysqli_query($koneksi, $query3);
  $cek = mysqli_affected_rows($koneksi);

  $mail = new PHPMailer(true);
  try {
    //Server settings
    $mail->isSMTP();                                              // Kirim email menggunakan metode SMTP
    $mail->Host       = 'smtp.gmail.com';                         // Host dari server SMTP
    $mail->SMTPAuth   = true;                                     // Aktifkan autekntifikasi SMTP 
    $mail->Username   = "variousra@gmail.com";                    // SMTP username (diaktifkan di pengaturan Gmail > keamanan > Login ke Google)
    $mail->Password   = 'rokcxezbgkjicjxh';                       // SMTP kode autentikasi (diaktifkan di pengaturan Gmail > keamanan > Login ke Google)
    $mail->SMTPSecure = 'ssl';                                    // Aktifkan enkripsi SSL implisit
    $mail->Port       = 465;                                      // TCP port untuk mengkoneksikan ke SMTP Server

    //pengirim
    $mail->setFrom('variousra@gmail.com', 'Various RA');
    $mail->addAddress($email);     //email penerima

    //Content
    $mail->isHTML(true);                                          // Kirim format Email ke HTML
    $mail->Subject = $judul;
    $mail->Body    = "$pesan : $kode";
    $mail->AltBody = '';
    //$mail->AddEmbeddedImage('gambar/logo.png', 'logo');         //abaikan jika tidak ada logo
    //$mail->addAttachment(''); 

    if (!$mail->send()){
      echo "<script>alert('Message could not be sent to $email')</script>";
    } else {
      echo "<script>alert('Email sent successfully to $email!')</script>";
    }
    
  } catch (Exception $e) {
    echo "Mailer Configuration error. Can't send to $email. Cause: {$mail->ErrorInfo}";

    // Aktifkan error reporting
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
  }
}

echo json_encode($response);
mysqli_close($koneksi);

?>