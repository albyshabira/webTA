<?php
session_start();
include "koneksi.php";

$result = mysqli_query($koneksi, "SELECT * FROM deteksi");
$kondisi_hama = mysqli_fetch_assoc($result);

// cek login
if (!isset($_SESSION["username"])) header("Location: login.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SISTEM MONITORING PENGUSIR HAMA BURUNG - GAMBAR HAMA</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

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
                <div class="sidebar-brand-text mx-3">Pengusir Hama Burung</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Home</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Monitoring Hama -->
            <li class="nav-item">
                <a class="nav-link" href="live.php">
                    <i class="fas fa-fw fa-images"></i>
                    <span>Monitoring Hama</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="tables.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Report Data</span></a>
            </li>

            <!-- Nav Item - Bantuan -->
            <li class="nav-item">
                <a class="nav-link" href="help.php">
                    <i class="fas fa-fw fa-comments"></i>
                    <span>Help</span></a>
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
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION["username"] ?></span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Monitoring Hama</h1>
                    <p class="mb-4">Halaman ini merupakan halaman monitoring hama yang terdeteksi oleh sensor.</p>

                    <!-- Content Row -->
                    <div class="row">

                        <div class="col-lg-6">
                            <!-- Approach -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Monitoring Hama</h6>
                                </div>
                                
                                <div class="card-body">
                                    <span id="ButtonKondisi" style="margin: 0 auto;padding: 20px;width: 200px;height:200px;display: flex;flex-direction: column;;" href="#" class="btn btn-success btn-circle btn-lg">
                                            <i id="IconKondisi" style=" font-size: 100px" class="fas fa-check"></i>
                                            <p style="font-size: 20px" id="TextKondisi">Tidak Ada Hama</p>
                                    </span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- -->
                        <div class = "col-lg-6" >
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Keterangan</h6>
                                </div>

                                <div class="card-body">
                                    <p style="font-size: 16px" id="TextKeterangan">- Tidak Ada Hama</p>
                                    <p>  - Jumlah burung :
                                        <tbody>
                                            <?php
                                            include "koneksi.php";
            
                                            $reusult = mysqli_query($koneksi, "SELECT jumlah_burung FROM databurung order by id desc limit 1");
                                            $dataHama = mysqli_fetch_all($reusult, 1);
                                            $i = 1;
                                            setlocale(LC_ALL, 'IND');
            
                                            foreach ($dataHama as $hama) {
                                            ?>
                                                <tr>
                                                    <td><?= $hama["jumlah_burung"] ?></td> 
                                                </tr>
                                            <?php $i++;
                                            } ?>
                                        </tbody>
                                    </p>
                                    <p> - Tanggal :
                                        <tbody>
                                            <?php
                                            include "koneksi.php";
            
                                            $reusult = mysqli_query($koneksi, "SELECT tanggal FROM databurung order by tanggal desc limit 1");
                                            $dataHama = mysqli_fetch_all($reusult, 1);
                                            $i = 1;
                                            setlocale(LC_ALL, 'IND');
            
                                            foreach ($dataHama as $hama) {
                                            ?>
                                            <tr>
                                                <td><?= $hama["tanggal"] ?></td>
                                            </tr>
                                            <?php $i++;
                                            } ?>
                                        </tbody>
                                    </p>
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
                        <span>Copyright &copy; Pengusir Hama Burung 2022</span>
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script>
    const textKondisi = document.getElementById("TextKondisi");
    const textKeterangan = document.getElementById("TextKeterangan");
    const buttonKondisi = document.getElementById("ButtonKondisi");
    const iconKondisi = document.getElementById("IconKondisi");
    setInterval(() => {
          fetch("http://localhost:8080/kendaliburung/getKondisi.php").then(res => res.json()).then(hasil => {
            if(hasil.kondisi == '0') {
                textKondisi.textContent = "Tidak Ada Hama";
                textKeterangan.textContent = "- Tidak Ada Hama";
                buttonKondisi.classList.remove("btn-danger");
                buttonKondisi.classList.add("btn-success");
                iconKondisi.classList.add("fa-check");
                iconKondisi.classList.remove("fa-exclamation-triangle");
            } else {
                textKondisi.textContent = "Ada Hama";
                textKeterangan.textContent = "- Ada Hama";
                buttonKondisi.classList.add("btn-danger");
                buttonKondisi.classList.remove("btn-success");
                iconKondisi.classList.remove("fa-check");
                iconKondisi.classList.add("fa-exclamation-triangle");
                console.log(iconKondisi);
            }
        });
    }, 1000);
    </script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script src="js/demo/chart-bar-demo.js"></script>

</body>

</html>