<!doctype html>
<html class="no-js" lang="zxx">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Dolan Muria - <?= $tb_kuliner->nama_kuliner; ?></title>
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
                            <img src="<?= base_url() ?>/user/img/logo.png" alt="">
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
          <div  style="background-image: url(<?= base_url(); ?>/uploads/gambarkuliner/<?= $tb_kuliner->gambar_sampul_kuliner; ?>);" class="destination_banner_wrap overlay">
            <div class="destination_text text-center">
              <h3><?= $tb_kuliner->nama_kuliner; ?></h3>
              <br>
              <p>Rp. <?= number_format($tb_kuliner->harga_kuliner,2,",","."); ?></p>
              <p>Toko <?= $tb_kuliner->nama_toko; ?></p>
            </div>
          </div>

          <div class="destination_details_info">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-lg-8 col-md-9">
                  <div class="destination_info">
                    <div class="single_destination">
                      <h3>Deskripsi Kuliner</h3>
                      <p>&emsp;<?= $tb_kuliner->deskripsi_kuliner; ?></p>
                      <img style="display:block; margin-left: auto; margin-right: auto; width: 60%;" class="rounded" src="<?= base_url() . "/uploads/gambarkuliner/" . $tb_kuliner->gambar_kuliner_1; ?>" alt="Gambar Kuliner">
                    </div>
                    <div class="single_destination">
                      <div class="row">
                        <div class="col-6">
                          <h3>Hari dan Jam Buka</h3>
                          <p><i class="fa fa-calendar-o"></i>&ensp;<?= $tb_kuliner->hari_buka_dari." - ".$tb_kuliner->hari_buka_sampai ?></p>
                          <p><i class="fa fa-clock-o"></i>&ensp;<?= substr($tb_kuliner->jam_buka_dari,0,5)." - ".substr($tb_kuliner->jam_buka_sampai,0,5) ?></p>
                        </div>
                        <div class="col-6">
                          <h3>Alamat Warung Makan</h3>
                          <p><i class="fa fa-map-marker"></i>&ensp;<?= $tb_kuliner->alamat_toko; ?></p>
                        </div>
                      </div>
                    </div>
                    <div class="single_destination">
                      <div class="row">
                        <div class="col-6">
                          <h3>Email</h3>
                          <p><i class="fa fa-envelope-o"></i>&ensp;<?= $tb_kuliner->email_toko; ?></p>
                        </div>
                        <div class="col-6">
                          <h3>Nomor Telepon</h3>
                          <p><i class="fa fa-phone"></i>&ensp;<?= $tb_kuliner->no_telepon; ?></p>
                        </div>
                      </div>
                    </div>
                    <div class="single_destination">
                      <h3>Google Maps</h3>
                      <iframe <?= htmlspecialchars_decode($tb_kuliner->gmaps_toko); ?> width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                    <div class="single_destination">
                      <h3>Gambar Lainnya</h3>
                      <div class="row">
                        <div style="margin-top: 25px;" class="col-md-6">
                          <a class="btn-tampil-gambar" data-gambar="<?= $tb_kuliner->gambar_kuliner_2;?>" data-deskripsi="Gambar Kuliner">
                            <img style="cursor: pointer; transition: 0.3s;" width="100%" class="img-thumbnail" src="<?= base_url() . "/uploads/gambarkuliner/" . $tb_kuliner->gambar_kuliner_2; ?>" alt="Gambar Kuliner">
                          </a>
                        </div>
                        <div style="margin-top: 25px;" class="col-md-6">
                          <a class="btn-tampil-gambar" data-gambar="<?= $tb_kuliner->gambar_kuliner_3;?>" data-deskripsi="Gambar Kuliner">
                            <img style="cursor: pointer; transition: 0.3s;" width="100%" class="img-thumbnail" src="<?= base_url() . "/uploads/gambarkuliner/" . $tb_kuliner->gambar_kuliner_3; ?>" alt="Gambar Kuliner">
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="popular_places_area">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-6">
                <div class="section_title text-center mb_70">
                  <h3>Kuliner Lainnya</h3>
                </div>
              </div>
            </div>
            <div class="row">
              <?php foreach ($tb_kuliner_rekomendasi as $row): ?>
                <div class="col-lg-4 col-md-6">
                  <div class="single_place">
                    <div class="thumb">
                      <a href="<?= base_url() . '/userkuliner/detail/' . $row->id_kuliner; ?>">
                        <img src="<?= base_url() . "/uploads/gambarkuliner/" . $row->gambar_sampul_kuliner; ?>" alt="">
                      </a>
                    </div>
                    <div class="place_info">
                      <a href="#"><h3><?= $row->nama_kuliner; ?></h3></a>
                      <p><?= $row->nama_toko; ?></p>
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
              <?php endforeach ?>
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
        <div class="modal fade" id="tampilgambarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="deskripsi"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <img width="100%" class="img-thumbnail" id="tampil_gambar">
                </div>                      
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

      $('body').on('click','.btn-tampil-gambar',function(){
        // get data from button edit
        const gambar = $(this).data('gambar');
        const deskripsi = $(this).data('deskripsi');
        // Set data to Form Edit
        $('.modal-header #deskripsi').html(deskripsi);
        $('.modal-body #tampil_gambar').attr('src','<?= base_url(); ?>/uploads/gambarkuliner/'+gambar);
        // Call Modal Edit
        $('#tampilgambarModal').modal('show');
      });
    </script>
  </body>

  </html>