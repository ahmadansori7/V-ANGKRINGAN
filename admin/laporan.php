<?php
require ('koneksi.php');
session_start();

if (!isset($_SESSION["ses"])) {
    echo "<script>
    eval(\"parent.location='../login.php '\");
    alert (' Anda harus login terlebih dahulu');
    </script>";
	exit;
}

$user = $_SESSION['ses'];

if(isset($_POST['updateprofile'])) {

    $email = $_POST['txt_email'];
    $pass = $_POST['txt_pass'];
    $nama = $_POST['txt_nama'];
    $nohp = $_POST['txt_nohp'];
    $alamat = $_POST['txt_alamat'];


    $query  = mysqli_query($koneksi, "UPDATE `user` SET `email`='$email',`password`='$pass',`nama_lengkap`='$nama',`no_hp`=$nohp,`alamat`='$alamat' WHERE `username`='$user'");
    $result = mysqli_query($koneksi, $query);
    echo "<script>
    alert (' Profile Berhasil Diupdate!');
    </script>";
    } 
    
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Laporan</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon">
                    <img src="..\assets\gambar\a5-img.png" style="width:70%">
                </div>
            
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Nav Item - Produk -->
            <li class="nav-item">
                <a class="nav-link" href="produk.php">
                    <i class="fas fa-fw fa-calendar"></i>
                    <span>Produk</span></a>
            </li>

            <!-- Nav Item - Transaksi -->
            <li class="nav-item">
                <a class="nav-link" href="transaksi.php">
                    <i class="fas fa-fw fa-dollar-sign"></i>
                    <span>Transaksi</span></a>
            </li>

            <!-- Nav Item - Transaksi -->
                        <li class="nav-item active">
                <a class="nav-link" href="laporan.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Laporan</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['ses'] ?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#ProfileDetail">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
            
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Keluar
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                 
                <?php
                        
                        $query_edit1 = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$user'");
                        while ($row = mysqli_fetch_array($query_edit1)) {  
        
                        ?>

             <!-- Modal Profile Detail -->
             <div class="modal fade" id="ProfileDetail" role="dialog" tabindex="-1">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                  <h4 class="modal-title"><i class="fas fa-user"></i> Informasi Profile</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                    
                  
                  <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Nama</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $row['nama_lengkap']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $row['email']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">No. HP</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $row['no_hp']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Alamat</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $row['alamat']; ?>
                    </div>
                  </div>
                
                  <hr>

                  <?php 
                        }
                        ?>    

                  <div class="row">
                    <div class="col-sm-12 text-right">
                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#myProfile" data-bs-dismiss="modal">Update</button>
                    </div>
                  </div>
                  </div>
              
                  </div>
                </div>
              </div>
            </div>


                         <!-- Modal Edit -->
                         <div class="modal fade" id="myProfile" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                  <h4 class="modal-title"><i class="fas fa-edit"></i> Edit Profile</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                    <form method="POST" action="#" enctype="multipart/form-data">
                        <?php
                        
                        $query_edit1 = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$user'");
                        while ($row = mysqli_fetch_array($query_edit1)) {  
        
                        ?>
                      
                          
                            
                          <input type="hidden" name="txt_user" value="<?php echo $row['username']; ?>" class="form-control" disabled>      
                       
                        
                        <div class="form-group">
                          <label>Email</label>
                          <input type="text" name="txt_email" value="<?php echo $row['email']; ?>" class="form-control" required>      
                        </div>
                        <div class="form-group">
                          <label>Password</label>
                          <input type="password" name="txt_pass" value="<?php echo $row['password']; ?>" class="form-control" required>      
                        </div>
                        <div class="form-group">
                          <label>Nama Lengkap</label>
                          <input type="text" name="txt_nama" value="<?php echo $row['nama_lengkap']; ?>" class="form-control" required>      
                        </div>

                        <div class="form-group">
                          <label>No. HP</label>
                          <input type="number" name="txt_nohp" value="<?php echo $row['no_hp']; ?>" class="form-control" required>      
                        </div>
                        <div class="form-group">
                          <label>Alamat Lengkap</label>
                          <input type="text" name="txt_alamat" value="<?php echo $row['alamat']; ?>" class="form-control" required>      
                        </div>
                       
                        <div class="modal-footer">  
                          <button name="updateprofile" id="updateprofile" class="btn btn-primary">Update</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                        <?php 
                        }
                        ?>        
                      </form>
                  </div>
                </div>
              </div>
            </div>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Laporan</h1> <a href="export-data-laporan.php" class="btn btn-sm btn-primary shadow-sm"><i class="fas fa-clipboard-list fa-sm text-white-50"></i> Export Data</a>
                        
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                    <?php
                    $totaltransaksi  = mysqli_query($koneksi, "SELECT COUNT(id_transaksi) as total from transaksi where YEAR(tanggal_transaksi);");
                    while ($row = mysqli_fetch_array($totaltransaksi)) {
                    ?>
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Transaksi per Tahun</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row['total']; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <?php 
                        }
                        ?>  

                    <?php
                    $totaltransaksi  = mysqli_query($koneksi, "SELECT COUNT(id_transaksi) as totalminggu from transaksi where MONTH(tanggal_transaksi);");
                    while ($row = mysqli_fetch_array($totaltransaksi)) {
                    ?>
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Total Transaksi Bulan Ini</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row['totalminggu']; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php 
                        }
                        ?>  


                   <?php
                    $totaltransaksi  = mysqli_query($koneksi, "select sum(subtotal) as totalpenghasilan from transaksi where MONTH(tanggal_transaksi) and status ='2'");
                    while ($row = mysqli_fetch_array($totaltransaksi)) {
                    ?>
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Penghasilan Bulan Ini</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php 
                                            function rupiah($angka){
                                                $hasil_rupiah = "Rp. " . number_format($angka,2,',','.');
                                                return $hasil_rupiah;
                                            }
                                            echo rupiah($row['totalpenghasilan']); 
                                            ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                        }
                        ?>  


                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Statistik Penghasilan per Bulan</h6>
                                    <div class="dropdown no-arrow">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="chart2"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                    </div>

                    
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; V-Angkringan <?php echo date('Y'); ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

 <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apakah ingin keluar ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Klik tombol "keluar" untuk meninggalkan sistem.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    
                    <a class="btn btn-primary" href="logout.php">Keluar</a>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script>

        // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

// Area Chart Example
var ctx = document.getElementById("chart2");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    datasets: [{
      label: "Penghasilan",
      lineTension: 0.3,
      backgroundColor: "rgba(78, 115, 223, 0.05)",
      borderColor: "rgba(78, 115, 223, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",
      pointBorderColor: "rgba(78, 115, 223, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: [
        
        <?php
        $totaltransaksi  = mysqli_query($koneksi, "select COALESCE(sum(subtotal),0) as januari from transaksi where MONTH(tanggal_transaksi) = 01 AND YEAR(tanggal_transaksi) and status ='2'");
        while ($row = mysqli_fetch_array($totaltransaksi)) {?>
        <?php echo $row['januari']; ?>
        <?php 
          }
        ?>, <?php
        $totaltransaksi  = mysqli_query($koneksi, "select COALESCE(sum(subtotal),0) as februari from transaksi where MONTH(tanggal_transaksi) = 02 AND YEAR(tanggal_transaksi) and status ='2'");
        while ($row = mysqli_fetch_array($totaltransaksi)) {?>
<?php echo $row['februari']; ?>
<?php 
}
?>, <?php
$totaltransaksi  = mysqli_query($koneksi, "select COALESCE(sum(subtotal),0) as maret from transaksi where MONTH(tanggal_transaksi) = 03 AND YEAR(tanggal_transaksi) and status ='2'");
while ($row = mysqli_fetch_array($totaltransaksi)) {?>
<?php echo $row['maret']; ?>
<?php 
}
?>, <?php
$totaltransaksi  = mysqli_query($koneksi, "select COALESCE(sum(subtotal),0) as april from transaksi where MONTH(tanggal_transaksi) = 04 AND YEAR(tanggal_transaksi) and status ='2'");
while ($row = mysqli_fetch_array($totaltransaksi)) {?>
<?php echo $row['april']; ?>
<?php 
}
?>, <?php
$totaltransaksi  = mysqli_query($koneksi, "select COALESCE(sum(subtotal),0) as mei from transaksi where MONTH(tanggal_transaksi) = 05 AND YEAR(tanggal_transaksi) and status ='2'");
while ($row = mysqli_fetch_array($totaltransaksi)) {?>
<?php echo $row['mei']; ?>
<?php 
}
?>, <?php
$totaltransaksi  = mysqli_query($koneksi, "select COALESCE(sum(subtotal),0) as juni from transaksi where MONTH(tanggal_transaksi) = 06 AND YEAR(tanggal_transaksi) and status ='2'");
while ($row = mysqli_fetch_array($totaltransaksi)) {?>
<?php echo $row['juni']; ?>
<?php 
}
?>, <?php
$totaltransaksi  = mysqli_query($koneksi, "select COALESCE(sum(subtotal),0) as juli from transaksi where MONTH(tanggal_transaksi) = 07 AND YEAR(tanggal_transaksi) and status ='2'");
while ($row = mysqli_fetch_array($totaltransaksi)) {?>
<?php echo $row['juli']; ?>
<?php 
}
?>, <?php
$totaltransaksi  = mysqli_query($koneksi, "select COALESCE(sum(subtotal),0) as agustus from transaksi where MONTH(tanggal_transaksi) = 08 AND YEAR(tanggal_transaksi) and status ='2'");
while ($row = mysqli_fetch_array($totaltransaksi)) {?>
<?php echo $row['agustus']; ?>
<?php 
}
?>, <?php
$totaltransaksi  = mysqli_query($koneksi, "select COALESCE(sum(subtotal),0) as september from transaksi where MONTH(tanggal_transaksi) = 09 AND YEAR(tanggal_transaksi) and status ='2'");
while ($row = mysqli_fetch_array($totaltransaksi)) {?>
<?php echo $row['september']; ?>
<?php 
}
?>, <?php
$totaltransaksi  = mysqli_query($koneksi, "select COALESCE(sum(subtotal),0) as oktober from transaksi where MONTH(tanggal_transaksi) = 10 AND YEAR(tanggal_transaksi) and status ='2'");
while ($row = mysqli_fetch_array($totaltransaksi)) {?>
<?php echo $row['oktober']; ?>
<?php 
}
?>, <?php
$totaltransaksi  = mysqli_query($koneksi, "select COALESCE(sum(subtotal),0) as november from transaksi where MONTH(tanggal_transaksi) = 11 AND YEAR(tanggal_transaksi) and status ='2'");
while ($row = mysqli_fetch_array($totaltransaksi)) {?>
<?php echo $row['november']; ?>
<?php 
}
?>, <?php
$totaltransaksi  = mysqli_query($koneksi, "select COALESCE(sum(subtotal),0) as desember from transaksi where MONTH(tanggal_transaksi) = 12 AND YEAR(tanggal_transaksi) and status ='2'");
while ($row = mysqli_fetch_array($totaltransaksi)) {?>
<?php echo $row['desember']; ?>
<?php 
}
?>],
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return 'Rp.' + number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': Rp.' + number_format(tooltipItem.yLabel);
        }
      }
    }
  }
});


    </script>
</body>

</html>