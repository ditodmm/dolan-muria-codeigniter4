<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dolan Muria - Admin Toko</title>

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
                            <a href="<?= base_url();?>/pemilikdashboard" class='sidebar-link'>
                                <i data-feather="home" width="20"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>                     

                        <?php if($session->get('role') == 2): ?>
                            <li class="sidebar-item">
                                <a href="<?= base_url();?>/pemilikproduk" class='sidebar-link'>
                                    <i data-feather="package" width="20"></i>
                                    <span>Data Produk</span>
                                </a>
                            </li>

                            <?php elseif($session->get('role') == 3): ?>
                                <li class="sidebar-item">
                                    <a href="<?= base_url();?>/pemilikkuliner" class='sidebar-link'>
                                        <i data-feather="coffee" width="20"></i>
                                        <span>Data Kuliner</span>
                                    </a>
                                </li>

                            <?php endif; ?>

                            <li class="sidebar-item">
                                <a href="<?= base_url();?>/pemilikuser" class='sidebar-link'>
                                    <i data-feather="settings" width="20"></i>
                                    <span>Pengaturan Akun</span>
                                </a>
                            </li>

                            <li class="sidebar-item">
                                <a href="<?= base_url();?>/login/logout" class='sidebar-link'>
                                    <i data-feather="log-out" width="20"></i>
                                    <span>Logout</span>
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
                            <div class="d-none d-md-block d-lg-inline-block">Halo, <?= $session->get('username'); ?></div>
                        </a>
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