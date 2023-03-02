<?php
require ('koneksi.php');

if(isset($_POST['register'])) {
  $user = $_POST['txt_user'];
  $email = $_POST['txt_email'];
  $pass = $_POST['txt_pass'];
  $nohp = $_POST['txt_nohp'];
  $nama = $_POST['txt_nama'];
  $alamat = $_POST['txt_alamat'];
  

  $result = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$user'");
if (mysqli_num_rows($result) > 0) {
  echo "<script>
  eval(\"parent.location='register.php '\");
  alert (' Username sudah terdaftar!');
  </script>";
} else {

    $query  = "insert into user values('$user','$email','$pass','$nama','$nohp','$alamat','pelanggan','','')";
    $result = mysqli_query($koneksi, $query);
    echo "<script>
    eval(\"parent.location='login.php '\");
    alert (' Pendaftaran Berhasil!');
    </script>";
    }
  }

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Register | V-Angkringan</title>
  <meta content="" name="description">

  <meta content="" name="keywords">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="#" class="logo d-flex align-items-center">
        <!-- <img src="assets/gambar/Logo.png" alt=""> -->
        <span>V-Angkringan</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="index.php">Home</a></li>
          <li><a class="nav-link scrollto" href="index.php#profil">Profil</a></li>
          <li><a class="nav-link scrollto" href="index.php#daftarmenu">Produk</a></li>
          <li><a class="nav-link scrollto" href="index.php#lokasi">Lokasi</a></li>
          <li><a class="getstarted scrollto" href="login.php">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">

    <div class="container">
      <div class="row">

      <div class="col-lg-6 d-flex hero-img justify-content-center" data-aos="zoom-out" data-aos-delay="200">
          <img src="assets/gambar/va5.png" class="img-fluid" alt="">
        </div>

        <div class="col-lg-6 d-flex flex-column justify-content-center">
          <h2 data-aos="fade-up">Register</h2>
          <hr data-aos="fade-up">
          <div data-aos="fade-up" data-aos-delay="600">
          
          
          <form class="user" action="register.php" method="POST">
                                        <div class="form-group">
                                            <input name="txt_nama" class="form-control form-control-user"
                                               
                                                placeholder="Nama Lengkap" required>
                                        </div>
                                        <div class="form-group">
                                            <input name="txt_alamat" class="form-control form-control-user"
                                               
                                                placeholder="Alamat Lengkap" required>
                                        </div>
                                        <div class="form-group">
                                            <input name="txt_nohp" type="number" class="form-control form-control-user"
                                                
                                                placeholder="No. HP" required>
                                        </div>

                                        <div class="form-group">
                                            <input type="email" name="txt_email"  class="form-control form-control-user"
                                             
                                                placeholder="Email" required>
                                        </div>
                                        <div class="form-group">
                                            <input name="txt_user" class="form-control form-control-user"
                                               
                                                placeholder="Username" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="txt_pass"  class="form-control form-control-user"
                                             
                                                placeholder="Password" required>
                                        </div>
                                  
                                        
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                  
                                      
                                        
                                        <button  type="submit" name="register" class="btn-get-started border-0 scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                <span>Register</span>
                
</button>

              <a href="login.php" class="btn align-items-center justify-content-center align-self-center">
                <span>Login</span>
               
              </a>
  

                                    </form>

            
          </div>
        </div>
       
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">
    

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-top bg-black">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-4 col-md-12 footer-info">
            <a href="index.html" class="logo d-flex align-items-center">
              <img src="assets/gambar/a5-img.png">
            </a>
            <p style="color:white;">Jl. Jaksa Agung Suprapto No.29, Kauman, Kec. Nganjuk,  Kabupaten Nganjuk, Jawa Timur 64411.</p>
           
          </div>

          <div class="col-lg-4 col-md-12 footer-links">
            <h4 style="color:white;">Sosial Media</h4>
            <div class="social-links mt-3">
              <a href="#" class="facebook text-primary"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram text-danger"><i class="bi bi-instagram"></i></a>
              <a href="#" class="whatsapp text-success"><i class="bi bi-whatsapp"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-6 footer-links">
            <h4 style="color:white;">Supported By</h4>
            <img src="assets/gambar/polije.png" class="img-fluid" alt=""> | <img src="assets/gambar/a5.png" class="img-fluid" alt="">
          </div>

          <div class="container">
      <div class="copyright " style="color:white;">
       <p> Copyright &copy; <strong><span>2022</span></strong>. V-Angkringan</p>
      </div>
          </div>

        </div>
      </div>
    </div>

          </footer>

    

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>