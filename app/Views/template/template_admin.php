<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dolan Muria - Admin</title>

    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/bootstrap.css">

    <link rel="stylesheet" href="<?= base_url(); ?>/assets/vendors/simple-datatables/style.css">

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
                            <a href="<?= base_url();?>/admindashboard" class='sidebar-link'>
                                <i data-feather="home" width="20"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="<?= base_url();?>/adminuser" class='sidebar-link'>
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
                                    <a href="<?= base_url();?>/adminwisata">Data Tempat Wisata</a>
                                </li>

                                <li>
                                    <a href="<?= base_url();?>/adminkategori">Data Kategori Wisata</a>
                                </li>

                                <li>
                                    <a href="<?= base_url();?>/admingambar">Data Gambar Wisata</a>
                                </li>

<!--                                 <li>
                                    <a href="adminulasan">Data Ulasan Wisata</a>
                                </li> -->
                            </ul>

                            <li class="sidebar-item">
                                <a href="<?= base_url();?>/admintoko" class='sidebar-link'>
                                    <i data-feather="shopping-cart" width="20"></i>
                                    <span>Data Toko</span>
                                </a>
                            </li>

                            <li class="sidebar-item">
                                <a href="<?= base_url();?>/adminproduk" class='sidebar-link'>
                                    <i data-feather="gift" width="20"></i>
                                    <span>Data Produk</span>
                                </a>
                            </li>                        

                            <li class="sidebar-item">
                                <a href="<?= base_url();?>/adminkuliner" class='sidebar-link'>
                                    <i data-feather="coffee" width="20"></i>
                                    <span>Data Kuliner</span>
                                </a>
                            </li>

                            <li class="sidebar-item">
                                <a href="<?= base_url();?>/adminpenginapan" class='sidebar-link'>
                                    <i data-feather="moon" width="20"></i>
                                    <span>Data Penginapan</span>
                                </a>
                            </li>

                            <li class="sidebar-item">
                                <a href="<?= base_url();?>/admintransportasi" class='sidebar-link'>
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

        <?= $this->renderSection('content') ?>

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