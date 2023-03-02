<?php
require ('koneksi.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Homapage | V-Angkringan</title>
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
          <li><a class="nav-link scrollto active" href="#hero">Beranda</a></li>
          <li><a class="nav-link scrollto" href="#profil">Profil</a></li>
          <li><a class="nav-link scrollto" href="#daftarmenu">Produk</a></li>
          <li><a class="nav-link scrollto" href="#lokasi">Lokasi</a></li>
          <li><a class="getstarted scrollto" href="login.php">Masuk</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">ANGKRINGAN MBAH SINGO.</h1>
          <p data-aos="fade-up" data-aos-delay="400">Tempat nongkrong rekomended di Nganjuk untuk menikmati waktu luang bersama teman dan sahabat anda.</p>
          <div data-aos="fade-up" data-aos-delay="600">
            <div class="text-center text-lg-start">
              <a href="/v-angkringan.apk" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                <span>Download Aplikasi</span>
                <i class="bi bi-download"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
          <img src="assets/gambar/mbah-singo.png" class="img-fluid" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= About Section ======= -->
    <section id="profil" class="profil">

      <div class="container" data-aos="fade-up">
        <div class="row gx-0">

          <div class="col-lg-12 justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <div class="section-title text-center">
              <h3>MENGAPA MEMILIH </br>MBAH SINGO ?</h3>
              <img src="assets/gambar/line.png" class="img-fluid" alt="" style="width:50px;">
              <p>Berikut ini mengapa anda harus nongkrong di <i>Angkringan Mbah Singo.</i></p>
        </div>
    
        <div class="row gy-4 pricing col-lg-12 justify-content-center" data-aos="fade-left">

<div class="col-lg-3 col-md-8 " data-aos="zoom-in" data-aos-delay="100">
  <div class="box">
   
    <img src="assets/gambar/murah.png" class="img-fluid" alt="">
    </br>
    <h3>Harga Terjangkau</h3>
  </div>
</div>

<div class="col-lg-3 col-md-8" data-aos="zoom-in" data-aos-delay="200">
  <div class="box">
   
  <img src="assets/gambar/ramah.png" class="img-fluid" alt="">
</br>
    <h3>Pelayanan Ramah</h3>
  </div>
</div>

<div class="col-lg-3 col-md-8" data-aos="zoom-in" data-aos-delay="300">
  <div class="box">
   
  <img src="assets/gambar/bersih.png" class="img-fluid" alt="">
  </br>
    <h3>Lokasi Bersih</h3>
  </div>
</div>
   
         </div>
        


</div>
</div>

    </section><!-- End About Section -->

    <!-- ======= Values Section ======= -->
    <section id="daftarmenu" class="values bg-primary">

      <div class="container" data-aos="fade-up">

      <div class="section-title text-white text-center">
              <h3>DAFTAR MENU</h3>
              <img src="assets/gambar/line2.png" class="img-fluid" alt="" style="width:50px;">
              <p class="text-white">Berikut ini daftar makanan dan minuman di <i>Angkringan Mbah Singo.</i></p>
        </div>

        <div class="row gy-4 pricing col-lg-12 justify-content-center" data-aos="fade-left">
<?php
                    $produk1  = mysqli_query($koneksi, "SELECT `id_produk`, `nama_produk`, `deskripsi_produk`, `harga`, `gambar`, `stok` FROM `produk` order by id_produk desc limit 4;");
                    while ($row = mysqli_fetch_array($produk1)) {
                    ?>
<div class="col-lg-3 col-md-8" data-aos="zoom-in" data-aos-delay="200">
<div class="box">
   
<img src="admin/gambarproduk/<?php echo $row['gambar']; ?>" class="img-fluid rounded-circle" style="width:250px;height:200px;" alt="">
<hr>
  
   <div class="text-center">
   <h5><?php echo $row['nama_produk']; ?></h5>
    <p>Rp. <?php echo $row['harga']; ?></p>
   </div>
 </div>
</div>

<?php 
 }
?> 
   
         </div>
        

      </div>

    </section><!-- End Values Section -->

    <!-- ======= Lokasi Section ======= -->
    <section id="lokasi" class="portfolio">

      <div class="container" data-aos="fade-up">

      <div class="col-lg-12 justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <div class="section-title text-center">
              <h3>LOKASI </br>MBAH SINGO</h3>
              <img src="assets/gambar/line.png" class="img-fluid" alt="" style="width:50px;">
              <p>Berikut ini adalah lokasi <i>Angkringan Mbah Singo.</i></p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12 d-flex justify-content-center">
            
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1012471.4128978538!2d111.02878596017436!3d-7.5786302434302435!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e784b040b42c417%3A0x7c3edde05a27a7ed!2sAngkringan%20Mbah%20Singo!5e0!3m2!1sid!2sid!4v1667967953828!5m2!1sid!2sid" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

          </div>
        </div>
      
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact" >

      <div class="container" data-aos="fade-up">

      <div class="section-title text-center">
              <h3>KRITIK DAN SARAN</h3>
              <img src="assets/gambar/line.png" class="img-fluid" alt="" style="width:50px;">
              <p>Kritik dan saran anda berguna bagi kami untuk ke depannya.</i></p>
        </div>
        <div class="row gy-4 ">

          <div class="col-md-4 ">

          <img src="assets/gambar/cs.png" class="img-fluid" alt="">

          </div>

          <div class="col-lg-8" >
          <form id="salsa" method="POST" accept-charset="utf-8">
          <div class="row gy-4">

          <div class="col-md-12">
          <div class="form-group">
          <div class="input nama"><label for="nama">Nama</label><input placeholder="" name="nama" type="text" class="form-control" id="nama" required /></div>
          </div>
          </div>

          <div class="col-md-12">
          <div class="form-group">
          <div class="input pesan"><label for="pesan">Kritik dan Saran</label><textarea class="form-control" rows="4" id="pesan" name="pesan" placeholder=""></textarea></div>
          </div>
          </div>

          <div class="col-md-12">
          <div class="form-group">
          <div class="submit"><button href="javascript:void" type="submit" class="send_form btn btn-primary btn-user btn-block col-md-12 text-center">Send</button>

          </div>
          </div>

          </div>
          </form>

          </div>

        </div>

      </div>

    </section><!-- End Contact Section -->


  </main><!-- End #main -->


        <script type="text/javascript"> 
      //<![CDATA[ 
      $(document).on('click','.send_form', function(){ 
      var input_blanter = document.getElementById('nama'); 
      
      /* Whatsapp Settings */ 
      var walink = 'https://web.whatsapp.com/send', 
          phone = '6289504990855', 
          walink2 = 'Halo saya ingin ', 
          text_yes = 'Terkirim.', 
          text_no = 'Isi semua Formulir lalu klik Send.'; 
      
      /* Smartphone Support */ 
      if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) { 
      var walink = 'whatsapp://send'; 
      } 
      
      if("" != input_blanter.value){ 
      
      /* Call Input Form */ 
      var  
         input_name1 = $("#nama").val(), 
          input_email1 = $("#pesan").val(), 
      
      /* Final Whatsapp URL */ 
      var blanter_whatsapp = walink + '?phone=' + phone + '&text=' + walink2 + '%0A%0A' + 
          '*Nama* : ' + input_name1 + '%0A' + 
          '*Kritik dan Saran* : ' + input_email1 + '%0A' + 
          
      
      /* Whatsapp Window Open */ 
      window.open(blanter_whatsapp,'_blank'); 
      document.getElementById("text-info").innerHTML = '<span class="yes">'+text_yes+'</span>'; 
      } else { 
      document.getElementById("text-info").innerHTML = '<span class="no">'+text_no+'</span>'; 
      } 
      }); 
      //]]> 
      </script>

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

        

    

          <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

          </footer>

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