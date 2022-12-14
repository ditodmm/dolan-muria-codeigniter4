<!doctype html>
<html class="no-js" lang="zxx">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Dolan Muria - <?= $tb_transportasi->nama_transportasi; ?></title>
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
          <div  style="background-image: url(<?= base_url(); ?>/uploads/gambartransportasi/<?= $tb_transportasi->gambar_transportasi; ?>);" class="destination_banner_wrap overlay">
            <div class="destination_text text-center">
              <h3><?= $tb_transportasi->nama_transportasi; ?></h3>
              <p><?= $tb_transportasi->alamat_transportasi; ?></p>
            </div>
          </div>

          <div class="destination_details_info">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-lg-8 col-md-9">
                  <div class="destination_info">
                    <div class="single_destination">
                      <div class="single_destination">
                        <h3>Deskripsi Transportasi</h3>
                        <p><?= $tb_transportasi->deskripsi_transportasi; ?></p>
                        <img style="display:block; margin-left: auto; margin-right: auto; width: 60%;" class="rounded" src="<?= base_url() . "/uploads/gambartransportasi/" . $tb_transportasi->gambar_transportasi; ?>" alt="Gambar Transportasi">
                      </div>
                      <div class="single_destination">
                        <h3>Alamat Transportasi</h3>
                        <p><i class="fa fa-map-marker"></i>&emsp;<?= $tb_transportasi->alamat_transportasi; ?></p>
                      </div>
                      <div class="single_destination">
                        <h3>Google Maps</h3>
                        <iframe <?= htmlspecialchars_decode($tb_transportasi->gmaps_transportasi); ?> width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                      </div>
                    </div>

                    <div id="myModal" class="modal">

                      <!-- The Close Button -->
                      <span class="close">&times;</span>

                      <!-- Modal Content (The Image) -->
                      <img class="modal-content" id="img01">

                      <!-- Modal Caption (Image Text) -->
                      <div id="caption">asdasd</div>
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
                    <h3>Transportasi Lainnya</h3>
                  </div>
                </div>
              </div>
              <div class="row">
                <?php foreach ($tb_transportasi_rekomendasi as $row): ?>
                <div class="col-lg-4 col-md-6">
                  <div class="single_place">
                    <div class="thumb">
                      <img src="<?= base_url() . "/uploads/gambartransportasi/" . $row->gambar_transportasi; ?>" alt="">
                    </div>
                    <div class="place_info">
                      <a href="#"><h3><?= $row->nama_transportasi; ?></h3></a>
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
                        <a href="#">5 Days</a>
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

        // Get the modal
        var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}
</script>
</body>

</html>