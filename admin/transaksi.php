<?php
require ('koneksi.php');
session_start();
error_reporting(0); 

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


    if(isset($_POST['batal'])) {

        $id = $_POST['id_transaksi'];
        $alasan = $_POST['alasan'];
    
        $query  = mysqli_query($koneksi, "UPDATE `transaksi` SET `status`='3',`catatan`='$alasan' WHERE `id_transaksi` = '$id'");
        $result = mysqli_query($koneksi, $query);
        echo "<script>
        alert (' Transaksi Berhasil Dibatalkan!');
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

    <title>Transaksi</title>

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
            <li class="nav-item active">
                <a class="nav-link" href="transaksi.php">
                    <i class="fas fa-fw fa-dollar-sign"></i>
                    <span>Transaksi</span></a>
            </li>

            <!-- Nav Item - Transaksi -->
                        <li class="nav-item">
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
                        <h1 class="h3 mb-0 text-gray-800">Transaksi</h1> <a href="export-data-transaksi.php" class="btn btn-sm btn-primary shadow-sm"><i class="fas fa-clipboard-list fa-sm text-white-50"></i> Export Data</a>
                        
                    </div>

                    <!-- Content Row -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100px" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Id Transaksi</th>
                                            <th>Tanggal</th>
                                            <th>Nama Customer</th>
                                            <th>Pengiriman</th>
                                            <th>Catatan</th>
                                            <th>Order Produk</th>
                                            <th>Total</th>
                                            <th>Metode Pembayaran</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                       
                            <?php
                            $query = "SELECT id_transaksi as id, tanggal_transaksi as tanggal,nama_lengkap as nama, subtotal as total,  transaksi.pengiriman as alamat, transaksi.metode as metode, transaksi.status as status, transaksi.catatanpbl as catatan, transaksi.gambarbukti as gambar FROM transaksi JOIN user ON transaksi.username = user.username order by id desc";
                            $result = mysqli_query($koneksi, $query);
                            $no1 = 1;
                            while ($row = mysqli_fetch_array($result)) {
                                $idtransaksi = $row['id'];
                                $tgltransaksi = $row['tanggal'];
                                $namalengkap = $row['nama'];
                                $alamat = $row['alamat'];
                                $totalbayar = $row['total'];
                                $status = $row['status'];
                                $metode = $row['metode'];
                                $catatan = $row['catatan'];
				$gambar = $row['gambar'];

                                ?>

                            <tr>
                                <td><?php echo $no1; ?></td>
                                <td><?php echo $idtransaksi; ?></td>
                                <td><?php echo $tgltransaksi; ?></td>
                                <td><?php echo $namalengkap; ?></td>
                                <td><?php echo $alamat; ?></td>
                                <td><?php 
                                
                                if($catatan==null) {
                                 echo "-";

                                } else {
                                    echo $catatan;
                                }
                                
                                ?></td>
                                <td><a class="btn btn-sm btn-primary shadow-sm" title="Detail Order" href="" data-toggle="modal" data-target="#myorder<?php echo $row['id']; ?>"><i class="fas fa-clipboard-list fa-sm text-white-50"></i> Detail Order</a></a>
                            
                                <!-- Modal Detail Order -->
                         <div class="modal fade" id="myorder<?php echo $row['id']; ?>" role="dialog">
                            <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title"><i class="fas fa-clipboard-list"></i> Detail Order (<?php echo $row['id']; ?>)</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Produk</th>
                                            <th>Harga@</th>
                                            <th>Jumlah</th>
                                            <th>Total Harga Item</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                       
                            <?php

                            $id = $idtransaksi; 
                            $query1 = "SELECT produk.nama_produk as produk, produk.harga as harga, detail_transaksi.jumlah as jumlah, detail_transaksi.totalhargaitem as total from detail_transaksi join produk on detail_transaksi.id_produk = produk.id_produk where detail_transaksi.id_transaksi = '$id';";
                            $result1 = mysqli_query($koneksi, $query1);
                            $no = 1;
                            while ($row = mysqli_fetch_array($result1)) {
                                
                                $produk = $row['produk'];
                                $harga = $row['harga'];
                                $jumlah = $row['jumlah'];
                                $total = $row['total'];
                                ?>

                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $produk; ?></td>
                                <td><?php echo $harga; ?></td>
                                <td><?php echo $jumlah; ?>x</td>
                                <td><?php echo $total; ?></td>
                            </tr>  

                            <?php
                            $no++;
                            } ?>

                            
                                    </tbody>
                                </table>
                    
                

                            </div>
                            </div>
                            </div>
                            
                            </td>


                                
                                <td><?php echo $totalbayar; ?></td>
                               
                                <td><?php echo $metode; ?> (<a href="" data-toggle="modal" data-target="#cekbukti<?php echo $idtransaksi; ?>">cek bukti</a>)
                                 <!-- Modal Detail Order -->
                         <div class="modal fade" id="cekbukti<?php echo $idtransaksi; ?>" role="dialog">
                            <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title"><i class="fas fa-clipboard-list"></i> Cek Bukti (<?php echo $idtransaksi; ?>)</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <tbody>
                                       
                            <?php

                            $id =  $idtransaksi; 
                            $query4 = "SELECT gambarbukti from transaksi where id_transaksi = '$id';";
                            $result4 = mysqli_query($koneksi, $query4);
                        
                            while ($row = mysqli_fetch_array($result4)) {
                                $gambar = $row['gambarbukti'];
                                ?>
				
				
				<?php
				if ($gambar == null) {
                                echo '<p> belum bayar</p>';
				} else {
				echo "<img src='$gambar' width='400px'>";
				}
				?>


                            <?php
                            } ?>

                            
                                    </tbody>
                                </table>
                    
                

                            </div>
                            </div>
                            </div>
                            
                            
                            
                            </td>
                                <td>

                                <?php 
                                    if($status=="0") {
                                        echo "<a class='btn btn-warning btn-circle' title='Transaksi sedang Diproses' href='proses-trans.php?id=$idtransaksi'><i class='fas fa-clock'></i></a>";
                                        echo " ";
                                        echo "<a class='btn btn-danger btn-circle' title='Batalkan Transaksi' href='batalkan-trans.php?id=$idtransaksi' onclick='if (confirm('Apakah yakin ingin membatalkan pesanan?')){return true;}else{event.stopPropagation(); event.preventDefault();};'>&times;</a>";

                                        
                                    }
                                    elseif ($status=="1") {
                                        echo "<a class='btn btn-primary btn-circle' title='Transaksi Dikirim' href='#'><i class='fas fa-truck'></i></a>";
                                    }elseif ($status=="2") {
                                        echo "<a class='btn btn-success btn-circle' title='Transaksi Selesai' href='#'><i class='fas fa-check'></i></a>";
                                    }

                                     else {
                                        echo "<a class='btn btn-danger btn-circle' title='Transaksi Dibatalkan' href='#'>&times;</a>";
                                    }
                                    ?>
            
                                </td>
                            </tr>

                            <?php
                            $no1++;
                            } ?>

                                    </tbody>
                                </table>
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

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>