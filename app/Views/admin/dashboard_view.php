<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dolan Muria - Admin</title>

    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/bootstrap.css">

    <link rel="stylesheet" href="<?= base_url(); ?>/assets/vendors/chartjs/Chart.min.css">

    <link rel="stylesheet" href="<?= base_url(); ?>/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/app.css">
    <link rel="shortcut icon" href="<?= base_url(); ?>/assets/images/favicon.png" type="image/x-icon">
</head>

<body>
    <div id="app">
        <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <img src="<?= base_url(); ?>/assets/images/logo.png" alt="" srcset="">
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">

                        <li class="sidebar-item">
                            <a href="admindashboard" class='sidebar-link'>
                                <i data-feather="home" width="20"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="adminuser" class='sidebar-link'>
                                <i data-feather="users" width="20"></i>
                                <span>Data User</span>
                            </a>
                        </li>                      

                        <li class="sidebar-item has-sub">
                            <a href="#" class='sidebar-link'>
                                <i data-feather="image" width="20"></i>
                                <span>Data Wisata</span>
                            </a>

                            <ul class="submenu ">

                                <li>
                                    <a href="adminwisata">Data Tempat Wisata</a>
                                </li>

                                <li>
                                    <a href="adminkategori">Data Kategori Wisata</a>
                                </li>

                                <li>
                                    <a href="admingambar">Data Gambar Wisata</a>
                                </li>

<!--                                 <li>
                                    <a href="adminulasan">Data Ulasan Wisata</a>
                                </li> -->
                            </ul>

                            <li class="sidebar-item">
                                <a href="admintoko" class='sidebar-link'>
                                    <i data-feather="shopping-cart" width="20"></i>
                                    <span>Data Toko</span>
                                </a>
                            </li>

                            <li class="sidebar-item">
                                <a href="adminproduk" class='sidebar-link'>
                                    <i data-feather="gift" width="20"></i>
                                    <span>Data Produk</span>
                                </a>
                            </li>                        

                            <li class="sidebar-item">
                                <a href="adminkuliner" class='sidebar-link'>
                                    <i data-feather="coffee" width="20"></i>
                                    <span>Data Kuliner</span>
                                </a>
                            </li>

                            <li class="sidebar-item">
                                <a href="adminpenginapan" class='sidebar-link'>
                                    <i data-feather="moon" width="20"></i>
                                    <span>Data Penginapan</span>
                                </a>
                            </li>

                            <li class="sidebar-item">
                                <a href="admintransportasi" class='sidebar-link'>
                                    <i data-feather="truck" width="20"></i>
                                    <span>Data Transportasi</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
                </div>
            </div>
            <div id="main">
                <nav class="navbar navbar-header navbar-expand navbar-light">
                    <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
                    <button class="btn navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex align-items-center navbar-light ms-auto">
                        <li class="dropdown">
                            <a href="#" data-bs-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <div class="avatar me-1">
                                <img src="<?= base_url(); ?>/assets/images/avatar/avatar-s-1.png" alt="" srcset="">
                            </div>
                            <div class="d-none d-md-block d-lg-inline-block">Halo, <?= $session->get('username');?></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="<?= base_url(); ?>/login/logout"><i data-feather="log-out"></i> Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="main-content container-fluid">
            <div class="page-title">
                <h3>Dashboard</h3>
                <p class="text-subtitle text-muted">Dashboard Admin</p>
            </div>
            <section class="section">
                <div class="row mb-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-heading p-1 pl-3" style="text-align: center;">Selamat Datang Admin</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-12 col-md-3">
                        <div class="card card-statistic">
                            <div class="card-body p-0">
                                <div class="d-flex flex-column">
                                    <div class='px-3 py-3 d-flex justify-content-between'>
                                        <h3 class='card-title'>JUMLAH WISATA</h3>
                                        <div class="card-right d-flex align-items-center" style="height:130px !important">
                                            <?php foreach($tb_wisata as $row): ?>
                                                <p><?= $row->jumlah; ?></p>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-3">
                        <div class="card card-statistic">
                            <div class="card-body p-0">
                                <div class="d-flex flex-column">
                                    <div class='px-3 py-3 d-flex justify-content-between'>
                                        <h3 class='card-title'>JUMLAH TOKO</h3>
                                        <div class="card-right d-flex align-items-center" style="height:130px !important">
                                            <?php foreach($tb_toko as $row): ?>
                                                <p><?= $row->jumlah; ?></p>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-3">
                        <div class="card card-statistic">
                            <div class="card-body p-0">
                                <div class="d-flex flex-column">
                                    <div class='px-3 py-3 d-flex justify-content-between'>
                                        <h3 class='card-title'>JUMLAH PENGINAPAN</h3>
                                        <div class="card-right d-flex align-items-center" style="height:130px !important">
                                            <?php foreach($tb_penginapan as $row): ?>
                                                <p><?= $row->jumlah; ?></p>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-3">
                        <div class="card card-statistic">
                            <div class="card-body p-0">
                                <div class="d-flex flex-column">
                                    <div class='px-3 py-3 d-flex justify-content-between'>
                                        <h3 class='card-title'>JUMLAH TRANSPORTASI</h3>
                                        <div class="card-right d-flex align-items-center" style="height:130px !important">
                                            <?php foreach($tb_transportasi as $row): ?>
                                                <p><?= $row->jumlah; ?></p>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <footer>
            <div class="footer clearfix mb-0 text-muted">
                <div class="float-start">
                    <p>2021 &copy; Dolan Muria</p>
                </div>
                <div class="float-end">
                    <p>Crafted with <span class='text-danger'><i data-feather="heart"></i></span> by <a href="http://ahmadsaugi.com">Ahmad Saugi</a></p>
                </div>
            </div>
        </footer>
    </div>
</div>
<script src="<?= base_url(); ?>/assets/js/feather-icons/feather.min.js"></script>
<script src="<?= base_url(); ?>/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="<?= base_url(); ?>/assets/js/app.js"></script>

<script src="<?= base_url(); ?>/assets/vendors/chartjs/Chart.min.js"></script>
<script src="<?= base_url(); ?>/assets/vendors/apexcharts/apexcharts.min.js"></script>
<script src="<?= base_url(); ?>/assets/js/pages/dashboard.js"></script>

<script src="<?= base_url(); ?>/assets/js/main.js"></script>
</body>

</html>