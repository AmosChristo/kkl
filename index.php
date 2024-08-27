<?php
include 'system/koneksi.php';
include 'system/helper.php';

$get = $koneksi->query("SELECT * FROM konfigurasi WHERE id = '1'");
if (mysqli_num_rows($get) == 1) {
  $data = mysqli_fetch_array($get);
}

?>

<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="UTF-8" />
  <meta name="description" content="Ratih Souvenir Kebumen" />
  <meta name="keywords" content="souvenir, design, mahar, undangan" />
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0" /> -->
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title><?= $data["nama_toko"]; ?></title>
  <link rel="icon" type="image/x-icon" href="<?= base_url(); ?>assets/img/<?= $data['favicon']; ?>">

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap" rel="stylesheet" />

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

  <!-- Iframely -->
  <script async charset="utf-8" src="//cdn.iframe.ly/embed.js?api_key=8ad49ba58543f56dfb54ba"></script>
  <script async charset="utf-8" src="<?= base_url(); ?>dist/js/embedly.js"></script>

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
              <li class="active"><a href="<?= base_url(); ?>">Beranda</a></li>
              <li><a href="<?= base_url(); ?>shop">Belanja</a></li>
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

  <!-- Hero Section Begin -->
  <section class="hero">
    <div class="hero__slider owl-carousel">
      <div class="hero__items set-bg" data-setbg="<?= base_url("assets/img/" . $data['hero']) ?>">
        <div class="container">
          <div class="row">
            <div class="col-xl-5 col-lg-7 col-md-8">
              <div class="hero__text">
                <h6><?= $data["nama_toko"]; ?></h6>
                <h2></h2>
                <p>
                  <?= $data["sambutan"]; ?>
                </p>
                <a href="<?= base_url(); ?>shop" class="primary-btn">Belanja Sekarang <span class="arrow_right"></span></a> <!-- merubah pada link -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Hero Section End -->

  <!-- Banner Section Begin -->
  <section class="banner spad">
    <div class="container">
      <div class="ban_sec">
        <img src="<?= base_url(); ?>assets/img/about/ani.png" alt="">
      </div>
    </div>
  </section>
  <!-- Banner Section End -->
  <section class="banner spad">
    <div class="container">
      <div class="ban_anu">
        <img src="<?= base_url(); ?>assets/img/about/anu.png" alt="">
      </div>
    </div>
  </section>

  <!-- Product Section Begin -->
  <section class="product spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <ul class="filter__controls">
            <li class="active" data-filter="*">Produk Terbaru</li>
          </ul>
        </div>
      </div>
      <div class="row">
        <?php
        $ambil = $koneksi->query("SELECT * FROM produk LIMIT 4");
        while ($pecah = $ambil->fetch_assoc()) {
        ?>
          <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6">
            <div class="product__item">
              <div class="product__item__pic set-bg" data-setbg="<?= base_url(); ?>assets/img/product/<?= $pecah['cover']; ?>">
              </div>
              <div class="product__item__text">
                <h6><?= $pecah['nama_produk']; ?></h6>
                <div class="rating">
                  <i class="fa fa-star-o"></i>
                  <i class="fa fa-star-o"></i>
                  <i class="fa fa-star-o"></i>
                  <i class="fa fa-star-o"></i>
                  <i class="fa fa-star-o"></i>
                </div>
                <h5>Rp. <?= number_format($pecah['harga_produk'], 0, ',', '.'); ?></h5>
                <div class="product__color__select">
                  <a href="<?= base_url(); ?>produk?s=<?= $pecah['slug']; ?>" class="btn btn-primary btn-sm">Details</a>
                </div>
              </div>
            </div>
          </div>
        <?php }; ?>
      </div>
      <div class="d-flex justify-content-center">
        <a href="<?= base_url('shop'); ?>" class="primary-btn">LIHAT SELENGKAPNYA</span></a>
      </div>
    </div>
  </section>

  <!-- Latest Blog Section Begin -->
  <section class="latest spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-title">
            <h2>Visi & Misi</h2>
          </div>
          <div>
            <section class="contact spad">
              <div class="container">
                <div class="row">
                  <div class="col-lg-6 col-md-6">
                    <div class="contact__text">
                      <div class="ck-content">
                        <p><?= $data["visi_misi"]; ?></p>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6">
                    <div class="contact__form text-center">
                      <img src="<?= base_url(); ?>assets/img/about/asu.png" alt="" />
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>
      </div>
  </section>
  <!-- Latest Blog Section End -->

  <!-- Footer Section Begin -->
  <footer class="footer">
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
              • All rights reserved • Made in Kebumen <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#" target="_blank"> Ratih Souvenir Kebumen </a>
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