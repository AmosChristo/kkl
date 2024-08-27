<?php
include 'system/koneksi.php';
include 'system/helper.php';

$get = $koneksi->query("SELECT * FROM konfigurasi WHERE id = '1'");
if (mysqli_num_rows($get) == 1) {
  $data = mysqli_fetch_array($get);
}

$getProd = $koneksi->query("SELECT * FROM produk WHERE slug = '$_GET[s]'");
if (mysqli_num_rows($getProd) == 1) {
  $prod = mysqli_fetch_array($getProd);
} else {
  header('location:' . base_url());
  exit();
}
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="UTF-8" />
  <meta name="description" content="Male_Fashion Template" />
  <meta name="keywords" content="Male_Fashion, unica, creative, html" />
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0" />  -->
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title><?= $data["nama_toko"]; ?></title>
  <link rel="icon" type="image/x-icon" href="<?= base_url(); ?>assets/img/<?= $data['favicon']; ?>">

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap" rel="stylesheet" />
  <!-- <link href="//db.onlinewebfonts.com/c/f19d26bddc0fd7d478ed451bb271b30d?family=UppercutAngle" rel="stylesheet" type="text/css" /> -->

  <!-- Css Styles -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css" type="text/css" />
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/elegant-icons.css" type="text/css" />
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/magnific-popup.css" type="text/css" />
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/nice-select.css" type="text/css" />
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/owl.carousel.min.css" type="text/css" />
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/slicknav.min.css" type="text/css" />
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css" type="text/css" />
  <link rel="stylesheet" href="<?= base_url(); ?>dist/css/ckeditor.css" rel="stylesheet" type="text/css" />
</head>

<body>
  <!-- Page Preloder -->
  <div id="preloder">
    <div class="loader"></div>
  </div>

  <!-- Offcanvas Menu Begin -->

  <!-- Offcanvas Menu End -->

  <!-- Header Section Begin -->
  <header class="header">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-3">
          <div class="header__logo">
            <a href="<?= base_url(); ?>" class="brand_toko"><b><?= $data["nama_toko"]; ?></b></a>
          </div>
        </div>
        <div class="col-lg-6 col-md-6">
          <nav class="header__menu mobile-menu">
            <ul>
              <li><a href="<?= base_url(); ?>">Beranda</a></li>
              <li class="active"><a href="<?= base_url(); ?>shop">Belanja</a></li>
              <li><a href="<?= base_url(); ?>about">About Us</a></li>
              <li><a href="<?= base_url(); ?>contact">Kontak Kami</a></li>
            </ul>
          </nav>
        </div>
        <div class="col-lg-3 col-md-3">
          <div class="header__nav__option">
            <a href="#" class="search-switch"><img src="<?= base_url(); ?>assets/img/icon/search.png" alt="" /></a>
            <a href="#"><img src="<?= base_url(); ?>assets/img/icon/heart.png" alt="" /></a>
          </div>
        </div>
      </div>
      <div class="canvas__open"><i class="fa fa-bars"></i></div>
    </div>
  </header>

  <!-- Header Section End -->

  <!-- Shop Details Section Begin -->
  <section class="shop-details">
    <div class="product__details__pic">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="product__details__breadcrumb">
              <a href="<?= base_url(); ?>">Home</a>
              <a href="<?= base_url(); ?>shop">Shop</a>
              <span>Product Details</span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-3">
            <ul class="nav nav-tabs" role="tablist">
              <!-- <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">
                  <div class="product__thumb__pic set-bg" data-setbg="<?= base_url(); ?>assets/img/shop-details/thumb-1.png"></div>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">
                  <div class="product__thumb__pic set-bg" data-setbg="<?= base_url(); ?>assets/img/shop-details/thumb-2.png"></div>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">
                  <div class="product__thumb__pic set-bg" data-setbg="<?= base_url(); ?>assets/img/shop-details/thumb-3.png"></div>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tabs-4" role="tab">
                  <div class="product__thumb__pic set-bg" data-setbg="<?= base_url(); ?>assets/img/shop-details/thumb-4.png">
                    <i class="fa fa-play"></i>
                  </div>
                </a>
              </li> -->
            </ul>
          </div>
          <div class="col-lg-6 col-md-9">
            <div class="tab-content">
              <div class="tab-pane active" id="tabs-1" role="tabpanel">
                <div class="product__details__pic__item">
                  <img src="<?= base_url(); ?>assets/img/product/<?= $prod['cover']; ?>" alt="" />
                </div>
              </div>
              <!-- <div class="tab-pane" id="tabs-2" role="tabpanel">
                <div class="product__details__pic__item">
                  <img src="<?= base_url(); ?>assets/img/shop-details/product-big-3.png" alt="" />
                </div>
              </div>
              <div class="tab-pane" id="tabs-3" role="tabpanel">
                <div class="product__details__pic__item">
                  <img src="<?= base_url(); ?>assets/img/shop-details/product-big.png" alt="" />
                </div>
              </div>
              <div class="tab-pane" id="tabs-4" role="tabpanel">
                <div class="product__details__pic__item">
                  <img src="<?= base_url(); ?>assets/img/shop-details/product-big-4.png" alt="" />
                  <a href="https://www.youtube.com/watch?v=8PJ3_p7VqHw&list=RD8PJ3_p7VqHw&start_radio=1" class="video-popup"><i class="fa fa-play"></i></a>
                </div>
              </div> -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="product__details__content">
      <div class="container">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-8">
            <div class="product__details__text">
              <h4><?= $prod['nama_produk']; ?></h4>
              <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
                <span> - 5 Reviews</span>
              </div>
              <h3>Rp. <?= number_format($prod['harga_produk'], 0, ',', '.'); ?></h3>
              <div class="product__details__option mt-4">
                <form action="#">
                  <input type="hidden" id="wa_tujuan" value="<?= cvt_no($data['whatsapp']); ?>">
                  <input type="hidden" id="wa_harga" value="<?= $prod['harga_produk']; ?>">
                  <input type="hidden" id="wa_produk" value="<?= $prod['nama_produk']; ?>">
                  <!-- <div class="product__details__option__size">
                    <span>Opsi 1</span>
                    <?php
                    $ukuran = explode(",", $prod['ukuran']);
                    foreach ($ukuran as $ukur) {
                      $ukur = trim($ukur);
                    ?>
                      <label><?= $ukur; ?>
                        <input type="radio" name="ukuran" value="<?= $ukur; ?>" />
                      </label>
                    <?php }; ?>
                  </div>
                  <div class="product__details__option__warna">
                    <span>Opsi 2</span>
                    <?php
                    $warna = explode(",", $prod['warna']);
                    foreach ($warna as $warn) {
                      $warn = trim($warn);
                    ?>
                      <label><?= $warn; ?>
                        <input type="radio" name="warna" value="<?= $warn; ?>" required />
                      </label>
                    <?php }; ?>
                  </div> -->
                  <div class="contact__form">

                    <div class="row mt-4">
                      <div class="col-lg-6">
                        <input type="text" id="wa_nama" placeholder="Nama" required />
                      </div>
                      <div class="col-lg-6">
                        <input type="email" id="wa_email" placeholder="Email" required />
                      </div>
                      <div class="col-lg-6">
                        <input type="number" id="wa_nomor" placeholder="Nomor Yang Dapat Dihubungi" required />
                      </div>
                      <div class="col-lg-6">
                        <input type="number" id="wa_pos" placeholder="Kode Pos" required />
                      </div>
                      <div class="col-lg-12">
                        <textarea id="wa_alamat" placeholder="Alamat Lengkap" required></textarea>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="product__details__cart__option">
                <div class="quantity">
                  <div class="pro-qty">
                    <input type="text" id="wa_jumlah" value="1" />
                  </div>
                </div>
                <a class="primary-btn text-white btn_checkout" type="submit">Checkout</a>
              </div>
              </form>
              <div class="product__details__last__option">
                <h5><span>Guaranteed Safe Checkout</span></h5>
                <img src="<?= base_url(); ?>assets/img/shop-details/details-payment.png" alt="" />
                <ul>
                  <li><span>Categories:</span> <?= $prod['kategori']; ?></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="product__details__tab">
              <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="#tabs-5" role="tab">Description</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#tabs-6" role="tab">Customer Reviews</a>
                </li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="tabs-5" role="tabpanel">
                  <div class="product__details__tab__content">
                    <p class="note">
                      <?= $prod['deskripsi']; ?>
                    </p>
                  </div>
                </div>
                <div class="tab-pane" id="tabs-6" role="tabpanel">
                  <div class="product__details__tab__content">
                    <div class="product__details__tab__content__item">
                      <h5>FITUR BELUM TERSEDIA !!!</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Shop Details Section End -->

  <!-- Footer Section Begin -->
  <footer class="footer mt-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="footer__about">
            <div class="footer__logo">
              <a href="<?= base_url(); ?>" class="text-white"><b><?= $data["nama_toko"]; ?></b></a>
            </div>
            <p>
              <?= $data["sambutan"]; ?>
            </p>
            <a href="#"><img src="<?= base_url(); ?>assets/img/payment.png" alt="" /></a>
          </div>
        </div>
        <!-- <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
          <div class="footer__widget"></div>
        </div> -->
        <div class="col-lg-4 col-md-3 col-sm-6">
          <div class="footer__widget">
            <h6 class="d-flex justify-content-center"><b>Sosial Media Kami</b></h6>
            <div class="ml-4 mt-5">
              <p><span class="text-white"><i class="fa fa-facebook"></i>&emsp; : &ensp;<?= $data['facebook']; ?></span></p>
              <p><span class="text-white"><i class="fa fa-envelope-o"></i>&emsp; : &ensp;<?= $data['email']; ?></span></p>
              <p><span class="text-white"><i class="fa fa-whatsapp"></i>&emsp; : &ensp;<?= $data['whatsapp']; ?></span></p>
              <p><span class="text-white"><i class="fa fa-instagram"></i>&emsp; : &ensp;<?= $data['instagram']; ?></span></p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="footer__widget">
            <h6><b>Alamat Toko</b></h6>
            <div class="mt-5 text-white">
              <p><i class="fa fa-map-marker" aria-hidden="true"></i>&ensp;<?= $data['alamat']; ?></p>
              <iframe src="<?= $data['maps']; ?>" height="250" width="400" style="border: 0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12 text-center">
          <div class="footer__copyright__text">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            <p>
              Copyright ©
              <script>
                document.write(new Date().getFullYear());
              </script>
              2022 Copyright • All rights reserved • Made in Klaten <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#" target="_blank"> Mustika Jaya Utama </a>
            </p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- Footer Section End -->

  <!-- Search Begin -->
  <div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
      <div class="search-close-switch">+</div>
      <form action="shop" method="get" class="search-model-form">
        <input type="text" id="search-input" name="s" placeholder="Cari Produk" />
      </form>
    </div>
  </div>
  <!-- Search End -->

  <!-- Js Plugins -->
  <script src="<?= base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/jquery.nice-select.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/jquery.nicescroll.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/jquery.magnific-popup.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/jquery.countdown.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/jquery.slicknav.js"></script>
  <script src="<?= base_url(); ?>assets/js/mixitup.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/owl.carousel.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/main.js"></script>
</body>

</html>