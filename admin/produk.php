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

$query = mysqli_query($koneksi, "SELECT max(id_produk) as kodeTerbesar FROM produk");
$data = mysqli_fetch_array($query);
$kodeBarang = $data['kodeTerbesar'];
$urutan = (int) substr($kodeBarang, 7, 7);
$urutan++;
$huruf = "PDK";
$kodeBarang = $huruf . sprintf("%07s", $urutan);

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


    if(isset($_GET['btncari'])){
      $cari = $_GET['cari'];
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

    <title>Produk</title>

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
            <li class="nav-item active">
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

                            <!-- Topbar Search -->
                            <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="GET" action="">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Cari produk..." value="<?php echo $_GET['cari']; ?>"
                                aria-label="Search" aria-describedby="basic-addon2" name="cari">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button" name="cari">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>


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
                        <h1 class="h3 mb-0 text-gray-800">Produk</h1> 
                        
                        <a href="#" data-toggle="modal" title="Tambahkan Produk" data-target="#addProduk" class="btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus-circle fa-sm text-white-50"></i> Tambahkan Produk</a>

                         <!-- Modal Tambahkan Data -->
            <div class="modal fade" id="addProduk" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title"><i class="fas fa-plus-circle"></i> Tambah Produk</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                    <form method="POST" action="add-produk.php" enctype="multipart/form-data">

                     <input type="hidden" name="txt_id" value="<?php echo $kodeBarang; ?>">
                        <div class="form-group">
                          <label>Nama Produk</label>
                          <input type="text" name="txt_nama" class="form-control" required>      
                        </div>
                        <div class="form-group">
                          <label>Harga</label>
                          <input type="number" name="txt_harga" class="form-control" required>      
                        </div>

                        <div class="form-group">
                          <label>Stok</label>
                          <input type="number" name="txt_stok" class="form-control" required>      
                        </div>
                        <div class="form-group">
                          <label>Deskripsi</label>
                          <input type="text" name="txt_deskripsi" class="form-control" required>      
                        </div>

                  

                        <div class="form-group">
                          <label>Gambar</label>
                          <input type="file" name="gambar" value="" accept=".jpg, .jpeg, .png, .gif" value="" class="form-control" required>       
                          <small style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .gif</small>
                    

                        </div>

                        <div class="form-group">
                          <label>Kategori</label>
                          <select name="kategori">
                          <option value="">--Pilih salah satu--</option>
                          <option value="makanan">Makanan</option>
                          <option value="cemilan">Cemilan</option>
                          <option value="frozenfood">Frozen Food</option>
                          <option value="minumanpanas">Minuman Panas</option>
                          <option value="minumandingin">Minuman Dingin</option>
                          <option value="minumanherbal">Minuman Herbal</option>
                          <option value="minumanlainnya">Minuman Lainnya</option>
				<option value="promo">Promo</option>
                        
                      </select>
                        </div>

                        <div class="modal-footer">  
                          <button type="submit" name="tambah" class="btn btn-primary">Tambahkan</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                        </div>       
                      </form>
                  </div>
                </div>
              </div>
            </div>
                        
                    </div>

                    <!-- Content Row -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Image</th>
                                            <th>Nama Produk</th>
                                            <th>Harga</th>
                                            <th>Stok</th>
                                            <th>Deskripsi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>

                                  
                                       
                            <?php

                        if(isset($_GET['cari'])){
                          $cari = $_GET['cari'];
                          $query = "SELECT * FROM `produk` WHERE `nama_produk` like '%".$cari."%';";			
                        }else{
                            $query = "Select * from produk order by nama_produk asc";

                        }
                            $result = mysqli_query($koneksi, $query);
                            $no = 1;
                            while ($row = mysqli_fetch_array($result)) {
                                $idproduk = $row['id_produk'];
                                $gambar = $row['gambar'];
                                $namaproduk = $row['nama_produk'];
                                $harga = $row['harga'];
                                $stok = $row['stok'];
                                $deskripsi = $row['deskripsi_produk'];
                                $gambar = $row['gambar'];

                                ?>

                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><img title="<?php echo $namaproduk; ?>" style="width:5em;height:5em;" class="rounded-circle" src="gambarproduk/<?php echo $gambar; ?>" ></td>
                                <td><?php echo $namaproduk; ?></td>
                                <td><?php echo $harga; ?></td>
                                <td><?php echo $stok; ?></td>
                                <td><?php echo $deskripsi; ?></td>
                                <td>
                                    <a class="btn btn-success btn-circle" title="Edit Produk" href="#" data-toggle="modal" data-target="#myUpdate<?php echo $row['id_produk']; ?>"><i class="fas fa-edit"></i></a>

                                     <!-- Modal Edit -->
            <div class="modal fade" id="myUpdate<?php echo $row['id_produk']; ?>" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                  <h4 class="modal-title"><i class="fas fa-edit"></i> Edit Produk</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                    <form method="POST" action="edit-produk.php" enctype="multipart/form-data">
                        <?php
                        $id = $row['id_produk']; 
                        $query_edit = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk='$id'");
                        while ($row = mysqli_fetch_array($query_edit)) {  
                        ?>
                        <input type="hidden" name="idproduk" value="<?php echo $id; ?>">
                        <div class="form-group">
                          <label>Nama Produk</label>
                          <input type="text" name="txt_nama" value="<?php echo $row['nama_produk']; ?>" class="form-control" required>      
                        </div>
                        <div class="form-group">
                          <label>Harga</label>
                          <input type="number" name="txt_harga" value="<?php echo $row['harga']; ?>" class="form-control" required>      
                        </div>

                        <div class="form-group">
                          <label>Stok</label>
                          <input type="number" name="txt_stok" value="<?php echo $row['stok']; ?>" class="form-control" required>      
                        </div>
                        <div class="form-group">
                          <label>Deskripsi</label>
                          <input type="text" name="txt_deskripsi" value="<?php echo $row['deskripsi_produk']; ?>" class="form-control" required>      
                        </div>
                        <div class="form-group">
                          <label>Gambar</label>
                          <p><img style="width:80px;" class="rounded-circle" src="gambarproduk/<?php echo $gambar; ?>" ></p>
                          <small>Update gambar</small>
                          <input type="file" name="gambar" value="" accept=".jpg, .jpeg, .png, .gif" class="form-control">       
                          <small style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .gif</small>
                        </div>

                        <div class="modal-footer">  
                          <button name="update"  class="btn btn-primary">Update</button>
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

            <a class="btn btn-danger btn-circle"  title="Delete Produk" href="del-produk.php?id=<?php echo $id ?>" onclick="if (confirm('Apakah yakin ingin menghapus produk?')){return true;}else{event.stopPropagation(); event.preventDefault();};"><i class="fas fa-trash"></i></a>

    
            
                                </td>
                            </tr>

                            <?php
                            $no++;
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