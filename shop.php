<?php
include 'system/koneksi.php';
include 'system/helper.php';

$get = $koneksi->query("SELECT * FROM konfigurasi WHERE id = '1'");
if (mysqli_num_rows($get) == 1) {
  $data = mysqli_fetch_array($get);
}

if (empty($_GET['s']) && empty($_GET['k'])) {
  $keyword = "";
  $kat = "";
  $getProd = $koneksi->query("SELECT * FROM produk");
  $jmlProd = mysqli_num_rows($getProd);
  $hasil_cari = "";
} elseif (!empty($_GET['s']) && empty($_GET['k'])) {
  $keyword = $_GET['s'];
  $getProd = $koneksi->query("SELECT * FROM produk WHERE nama_produk LIKE '%$keyword%'");
  $jmlProd = mysqli_num_rows($getProd);
  $hasil_cari = "<b>Keyword :</b> $keyword";
} elseif (empty($_GET['s']) && !empty($_GET['k'])) {
  $keyword = "";
  $kat = $_GET['k'];
  $getProd = $koneksi->query("SELECT * FROM produk WHERE kategori LIKE '%$kat%'");
  $jmlProd = mysqli_num_rows($getProd);
  $hasil_cari = "<b>Kategori :</b> $kat";
} elseif (!empty($_GET['s']) && !empty($_GET['k'])) {
  $keyword = $_GET['s'];
  $kat = $_GET['k'];
  $getProd = $koneksi->query("SELECT * FROM produk WHERE nama_produk LIKE '%$keyword%' AND kategori LIKE '%$kat%'");
  $jmlProd = mysqli_num_rows($getProd);
  $hasil_cari = "<b>Keyword :</b> $keyword | <b>Kategori :</b> $kat";
};


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

  <!-- Breadcrumb Section Begin -->
  <section class="breadcrumb-option">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="breadcrumb__text">
            <h4>Shop</h4>
            <div class="breadcrumb__links">
              <a href="<?= base_url(); ?>">Home</a>
              <span>Shop</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Breadcrumb Section End -->

  <!-- Shop Section Begin -->
  <section class="shop spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <div class="shop__sidebar">
            <div class="shop__sidebar__search">
              <form action="shop" method="get">
                <input type="text" placeholder="Search..." name="s" value="" />
                <input type="hidden" name="k" value="<?= $kat; ?>" />
                <button type="submit"><span class="icon_search"></span></button>
              </form>
            </div>
            <div class="shop__sidebar__accordion">
              <div class="accordion" id="accordionExample">
                <div class="card">
                  <div class="card-heading">
                    <a data-toggle="collapse" data-target="#collapseOne">Categories</a>
                  </div>
                  <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                    <div class="card-body">
                      <div class="shop__sidebar__categories">
                        <ul class="nice-scroll">
                          <?php
                          $getKat = $koneksi->query("SELECT * FROM kategori");
                          while ($pecah = $getKat->fetch_assoc()) {
                            echo "<li><a href='shop?s=$keyword&k=$pecah[nama_kategori]'>$pecah[nama_kategori]</a></li>";
                          }; ?>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-9">
          <div class="shop__product__option">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="shop__product__option__left">
                  <p><?= $hasil_cari; ?></p>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="shop__product__option__right">
                  <p><b>Jumlah Produk : </b><?= $jmlProd; ?></p>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <?php
            while ($pecah = $getProd->fetch_assoc()) {
            ?>
              <div class="col-lg-4 col-md-6 col-sm-6">
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
        </div>
      </div>
  </section>
  <!-- Shop Section End -->

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