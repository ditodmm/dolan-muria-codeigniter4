<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dolan Muria - Oleh-Oleh</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url(); ?>/user/img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="<?= base_url(); ?>/user/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/user/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/user/css/magnific-popup.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/user/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/user/css/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/user/css/nice-select.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/user/css/flaticon.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/user/css/jquery-ui.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/user/css/gijgo.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/user/css/animate.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/user/css/slick.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/user/css/slicknav.css">

    <link rel="stylesheet" href="<?= base_url(); ?>/user/css/style.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

        <!-- header-start -->
        <header>
            <div class="header-area ">
                <div id="sticky-header" class="main-header-area">
                    <div class="container-fluid">
                        <div class="header_bottom_border">
                            <div class="row align-items-center">
                                <div class="col-xl-2 col-lg-2">
                                    <div class="logo">
                                        <a href="<?= base_url() ?>">
                                            <img src="<?= base_url(); ?>/user/img/logo.png" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-xl-10 col-lg-10">
                                    <div class="main-menu  d-none d-lg-block">
                                        <nav>
                                            <ul id="navigation">
                                                <li><a href="<?= base_url() ?>">Beranda</a></li>
                                                <li><a href="<?= base_url() ?>/userwisata">Wisata</a></li>
                                                <li><a href="<?= base_url() ?>/userkuliner">Kuliner</a></li>
                                                <li><a href="<?= base_url() ?>/userproduk">Oleh-Oleh</a></li>
                                                <li><a href="<?= base_url() ?>/userpenginapan">Penginapan</a></li>
                                                <li><a href="<?= base_url() ?>/usertransportasi">Transportasi</a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                                <div class="seach_icon">
                                    <a href="<?= base_url() ?>/login">
                                        <i class="fa fa-sign-in"></i>
                                    </a>
                                </div>
                                <div class="col-12">
                                    <div class="mobile_menu d-block d-lg-none"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </header>
        <!-- header-end -->

        <!-- bradcam_area  -->
        <div class="bradcam_area bradcam_bg_2">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="bradcam_text text-center">
                            <h3>Oleh-Oleh Khas Muria</h3>
                            <p>Ayo telusuri Muria dari kaki sampai pucuk gunung.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ bradcam_area  -->


        <div class="popular_places_area">
            <div class="container">

                <div class="filters-content col-lg-12">
                    <div class="row">
                    	<?php foreach($tb_toko as $row): ?>
                            <div class="item col-lg-4 col-md-4 all">
                                <div class="single_place">
                                    <div class="thumb">
                                        <img src="<?= base_url() . "/uploads/gambartoko/" . $row->gambar_toko; ?>" onerror="this.src='<?= base_url()?>/assets/images/blank.jpg'" alt="Gambar Toko">
                                    </div>
                                    <div class="place_info">
                                        <a href="<?= base_url() . '/userproduk/listproduk/' . $row->id_user_pemilik_toko; ?>"><h3><?= $row->nama_toko ?></h3></a>
                                        <p><?= $row->no_telepon; ?></p>
                                        <div class="rating_days d-flex justify-content-between">
                                            <span class="d-flex justify-content-center align-items-center">
                                                <a></a>
                                            </span>
                                            <div class="days">
                                                <i class="fa fa-clock-o"></i>
                                                <a><?= substr($row->jam_buka_dari,0,5)." - ".substr($row->jam_buka_sampai,0,5); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="copy-right_text">
            <div class="container">
                <div class="footer_border"></div>
                <div class="row">
                    <div class="col-xl-12">
                        <p class="copy_right text-center">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <!-- Modal -->
    <div class="modal fade custom_search_pop" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="serch_form">
                <input type="text" placeholder="Search" >
                <button type="submit">search</button>
            </div>
        </div>
    </div>
</div>
<!-- link that opens popup -->


<!-- JS here -->
<script src="<?= base_url(); ?>/user/js/vendor/modernizr-3.5.0.min.js"></script>
<script src="<?= base_url(); ?>/user/js/vendor/jquery-1.12.4.min.js"></script>
<script src="<?= base_url(); ?>/user/js/popper.min.js"></script>
<script src="<?= base_url(); ?>/user/js/bootstrap.min.js"></script>
<script src="<?= base_url(); ?>/user/js/owl.carousel.min.js"></script>
<script src="<?= base_url(); ?>/user/js/isotope.pkgd.min.js"></script>
<script src="<?= base_url(); ?>/user/js/ajax-form.js"></script>
<script src="<?= base_url(); ?>/user/js/waypoints.min.js"></script>
<script src="<?= base_url(); ?>/user/js/jquery.counterup.min.js"></script>
<script src="<?= base_url(); ?>/user/js/imagesloaded.pkgd.min.js"></script>
<script src="<?= base_url(); ?>/user/js/scrollIt.js"></script>
<script src="<?= base_url(); ?>/user/js/jquery.scrollUp.min.js"></script>
<script src="<?= base_url(); ?>/user/js/wow.min.js"></script>
<script src="<?= base_url(); ?>/user/js/jquery-ui.min.js"> </script>
<script src="<?= base_url(); ?>/user/js/nice-select.min.js"></script>
<script src="<?= base_url(); ?>/user/js/jquery.slicknav.min.js"></script>
<script src="<?= base_url(); ?>/user/js/jquery.magnific-popup.min.js"></script>
<script src="<?= base_url(); ?>/user/js/plugins.js"></script>
<script src="<?= base_url(); ?>/user/js/range.js"></script>
<!-- <script src="js/gijgo.min.js"></script> -->
<script src="<?= base_url(); ?>/user/js/slick.min.js"></script>



<!--contact js-->
<script src="<?= base_url(); ?>/user/js/contact.js"></script>
<script src="<?= base_url(); ?>/user/js/jquery.ajaxchimp.min.js"></script>
<script src="<?= base_url(); ?>/user/js/jquery.form.js"></script>
<script src="<?= base_url(); ?>/user/js/jquery.validate.min.js"></script>
<script src="<?= base_url(); ?>/user/js/mail-script.js"></script>

<script src="<?= base_url(); ?>/user/js/main.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('body').on('click','.list', function(){
            const value = $(this).attr('data-filter');
            if (value == 'all'){
                $('.item').show('500');
            }
            else{
                $('.item').not('.'+value).hide('500');
                $('.item').filter('.'+value).show('500');
            }
        })
        $('body').on('click','.list', function(){
            $(this).addClass('active').siblings().removeClass('active')
        })
    })
</script>

</body>

</html>