<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dolan Muria</title>
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
    <link rel="stylesheet" href="<?= base_url(); ?>/user/css/gijgo.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/user/css/animate.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/user/css/slick.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/user/css/slicknav.css">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">

    <link rel="stylesheet" href="<?= base_url(); ?>/user/css/welcomestyle.css">
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
                                                <li><a href="<?= base_url() ?>/usertransportasi">Kuesioner</a></li>
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

        <!-- slider_area_start -->
        <div class="slider_area">
            <div class="slider_active owl-carousel">
                <div class="single_slider  d-flex align-items-center slider_bg_1 overlay">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-xl-12 col-md-12">
                                <div class="slider_text text-center">
                                    <h3>Dolan Muria</h3>
                                    <p>Ayo Liburan ke Muria Sekarang</p>
                                    <a href="#telusuri" class="boxed-btn3">Telusuri Sekarang</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!-- slider_area_end -->

        <div class="popular_places_area" id="telusuri">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="section_title text-center mb_70">
                            <h3>Destinasi Wisata Muria</h3>
                            <p>Ayo telusuri Muria dari kaki sampai pucuk gunung.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                 <?php foreach($tb_wisata as $row): ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="single_place">
                            <div class="thumb">
                                <a href="<?= base_url() . '/userwisata/detail/' . $row->id_wisata; ?>">
                                    <img src="<?= base_url() . "/uploads/gambarwisata/" . $row->gambar_wisata; ?>" alt="Gambar Wisata">
                                </a>
                            </div>
                            <div class="place_info">
                                <a href="<?= base_url() . '/userwisata/detail/' . $row->id_wisata; ?>"><h3><?= $row->nama_wisata; ?></h3></a>
                                <p><?= $row->nama_kategori; ?></p>
                                <div class="rating_days d-flex justify-content-between">
                                    <span class="d-flex justify-content-center align-items-center">
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
            <div class="row">
                <div class="col-lg-12">
                    <div class="more_place_btn text-center">
                        <a class="boxed-btn4" href="<?= base_url() ?>/userwisata">Destinasi Lainnya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="popular_destination_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb_70">
                        <h3>Kuliner Khas Muria</h3>
                        <p>Ayo coba kuliner khas Muria.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php foreach($tb_kuliner as $row): ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="single_place">
                            <div class="thumb">
                                <img src="<?= base_url() . "/uploads/gambarkuliner/" . $row->gambar_sampul_kuliner; ?>" alt="">
                            </div>
                            <div class="place_info">
                                <a href="<?= base_url() . '/userkuliner/detail/' . $row->id_kuliner; ?>"><h3><?= $row->nama_kuliner; ?></h3></a>
                                <p><?= $row->nama_toko; ?></p>
                                <div class="rating_days d-flex justify-content-between">
                                    <span class="d-flex justify-content-center align-items-center">
                                        <a>Rp. <?= number_format($row->harga_kuliner,2,",","."); ?></a>
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
            <div class="row">
                <div class="col-lg-12">
                    <div class="more_place_btn text-center">
                        <a class="boxed-btn4" href="<?= base_url() ?>/userkuliner">Kuliner Lainnya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- popular_destination_area_end  -->

    <div class="popular_places_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb_70">
                        <h3>Oleh-Oleh Khas Muria</h3>
                        <p>Bawakan oleh-oleh khas Muria untuk teman dan keluarga tercinta.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php foreach($tb_produk as $row): ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="single_place">
                            <div class="thumb">
                                <img src="<?= base_url() . "/uploads/gambarproduk/" . $row->gambar_sampul_produk; ?>" alt="">
                            </div>
                            <div class="place_info">
                                <a href="<?= base_url() . '/userproduk/detail/' . $row->id_produk; ?>"><h3><?= $row->nama_produk; ?></h3></a>
                                <p><?= $row->nama_toko; ?></p>
                                <div class="rating_days d-flex justify-content-between">
                                    <span class="d-flex justify-content-center align-items-center">
                                        <a>Rp. <?= number_format($row->harga_produk,2,",","."); ?></a>
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
            <div class="row">
                <div class="col-lg-12">
                    <div class="more_place_btn text-center">
                        <a class="boxed-btn4" href="<?= base_url() ?>/userproduk">Oleh-Oleh Lainnya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="popular_destination_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb_70">
                        <h3>Penginapan dan Hotel</h3>
                        <p>Dapatkan tempat istirahat yang berkualitas setelah berlibur seharian.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php foreach($tb_penginapan as $row): ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="single_place">
                            <div class="thumb">
                                <img src="<?= base_url() . "/uploads/gambarpenginapan/" . $row->gambar_sampul_penginapan; ?>" alt="">
                            </div>
                            <div class="place_info">
                                <a href="<?= base_url() . '/userpenginapan/detail/' . $row->id_penginapan; ?>"><h3><?= $row->nama_penginapan; ?></h3></a>
                                <p><?= $row->no_telepon; ?></p>
                                <div class="rating_days d-flex justify-content-between">
                                    <span class="d-flex justify-content-center align-items-center">
                                     <i class="fa fa-star"></i> 
                                     <i class="fa fa-star"></i> 
                                     <i class="fa fa-star"></i> 
                                     <i class="fa fa-star"></i> 
                                     <i class="fa fa-star"></i>
                                     <a href="#">(20 Review)</a>
                                 </span>
                                 <div class="days">
                                    <i class="fa fa-clock-o"></i>
                                    <a href="#">5 Days</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="more_place_btn text-center">
                    <a class="boxed-btn4" href="<?= base_url() ?>/userpenginapan">Penginapan Lainnya</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- popular_destination_area_end  -->

<div class="popular_places_area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section_title text-center mb_70">
                    <h3>Transportasi</h3>
                    <p>Transportasi untuk mencapai titik destinasi wisata di Muria.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach($tb_transportasi as $row): ?>
                <div class="col-lg-4 col-md-6">
                    <div class="single_place">
                        <div class="thumb">
                            <img src="<?= base_url() . "/uploads/gambartransportasi/" . $row->gambar_transportasi; ?>" alt="Gambar Transportasi">
                        </div>
                        <div class="place_info">
                            <a href="<?= base_url() . '/usertransportasi/detail/' . $row->id_transportasi; ?>"><h3><?= $row->nama_transportasi; ?></h3></a>
                            <p><?= $row->alamat_transportasi; ?></p>
                            <div class="rating_days d-flex justify-content-between">
                                <span class="d-flex justify-content-center align-items-center">
                                 <i class="fa fa-star"></i> 
                                 <i class="fa fa-star"></i> 
                                 <i class="fa fa-star"></i> 
                                 <i class="fa fa-star"></i> 
                                 <i class="fa fa-star"></i>
                                 <a href="#">(20 Review)</a>
                             </span>
                             <div class="days">
                                <i class="fa fa-clock-o"></i>
                                <a href="#">Buka</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="more_place_btn text-center">
                <a class="boxed-btn4" href="<?= base_url() ?>/usertransportasi">Transportasi Lainnya</a>
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
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> Dolan Muria | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
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
<!--     
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-de7e2ef6bfefd24b79a3f68b414b87b8db5b08439cac3f1012092b2290c719cd.js"></script>

    <script src=" https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"> </script> -->
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
    <script src="<?= base_url(); ?>/user/js/nice-select.min.js"></script>
    <script src="<?= base_url(); ?>/user/js/jquery.slicknav.min.js"></script>
    <script src="<?= base_url(); ?>/user/js/jquery.magnific-popup.min.js"></script>
    <script src="<?= base_url(); ?>/user/js/plugins.js"></script>
    <script src="<?= base_url(); ?>/user/js/gijgo.min.js"></script>
    <script src="<?= base_url(); ?>/user/js/slick.min.js"></script>


    
    <!--contact js-->
    <script src="<?= base_url(); ?>/user/js/contact.js"></script>
    <script src="<?= base_url(); ?>/user/js/jquery.ajaxchimp.min.js"></script>
    <script src="<?= base_url(); ?>/user/js/jquery.form.js"></script>
    <script src="<?= base_url(); ?>/user/js/jquery.validate.min.js"></script>
    <script src="<?= base_url(); ?>/user/js/mail-script.js"></script>


    <script src="<?= base_url(); ?>/user/js/main.js"></script>
    <script>
        $('#datepicker').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
             rightIcon: '<span class="fa fa-caret-down"></span>'
         }
     });
 </script>
</body>

</html>