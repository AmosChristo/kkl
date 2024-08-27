<?php
include '../koneksi.php';
include '../helper.php';
session_start();
cek_cookie('email');
if (!isset($_SESSION['user'])) {
    header('location:' . base_url('system/login'));
    exit();
}

// Searching Feature
if (isset($_GET['s'])) {
    $cari = $_GET['s'];
    $ambil = $koneksi->query("SELECT * FROM produk WHERE nama_produk LIKE '%$cari%'");
    $hasilcari = "<h5 class=\"mt-1\"><strong>Hasil Pencarian : </strong>" . $cari . "</h5>";
} else {
    $ambil = $koneksi->query("SELECT * FROM produk");
    $hasilcari = "";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ratih Souvenir | Data Produk</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url(); ?>plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?= base_url(); ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url(); ?>dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url(); ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url(); ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?= base_url(); ?>" class="brand-link" target="_blank">
                <img src="<?= base_url(); ?>assets/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">RatihSouvenir</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= base_url(); ?>assets/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?= $_SESSION['user']['nama']; ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                        <li class="nav-header">INFORMASI</li>
                        <li class="nav-item">
                            <a href="<?= base_url('system/'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>

                        <li class="nav-header">DATA MASTER</li>
                        <li class="nav-item">
                            <a href="<?= base_url('system/kategori/'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-list-ul"></i>
                                <p>
                                    Kategori
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('system/produk/'); ?>" class="nav-link active">
                                <i class="nav-icon far fa-newspaper"></i>
                                <p>
                                    Produk
                                </p>
                            </a>
                        </li>
                        <li class="nav-header">SETTINGS</li>
                        <li class="nav-item">
                            <a href="<?= base_url('system/konfigurasi'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-cogs"></i>
                                <p>Konfigurasi Web</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('system/logout'); ?>" class="nav-link bg-danger">
                                <i class="nav-icon fas fa-power-off"></i>
                                <p>Logout</p>
                            </a>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Data Produk</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Data Produk</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <div class="card card-outline card-primary">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                                            <h2 class="card-title mt-1"><strong>Daftar Produk</strong></h2>
                                        </div>
                                        <div class="col">
                                            <button type="button" class="btn btn-primary btn-sm float-right mr-1" onclick="openformcari()">Cari Data</button>
                                            <a class="btn btn-success btn-sm float-right mr-1" href="<?= base_url(); ?>system/produk/add">Tambah Data</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <!-- FORM CARI BERITA -->
                                    <form method="GET" id="formcariberita" style="display: none" action="" class="needs-validation" novalidate>
                                        <label>Cari Berita</label>
                                        <div class="input-group input-group mb-5">
                                            <input type="text" id="s" class="form-control" placeholder="Masukan Kata Kunci" name="s" required autofocus>
                                            <span class="input-group-append">
                                                <button type="submit" class="btn btn-info">Cari</button>
                                                <button type="button" class="btn btn-secondary" onclick="closeformcari()">Batal</button>
                                            </span>
                                            <div class="invalid-feedback">
                                                Harap masukan kata kunci
                                            </div>
                                        </div>
                                    </form>
                                    <?= $hasilcari; ?>
                                    <div class="table-responsive">
                                        <table id="dtable" class="table table-bordered table-hover text-center">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Produk</th>
                                                    <th>Kategori</th>
                                                    <th>Sampul</th>
                                                    <th>Opsi 1</th>
                                                    <th>Opsi 2</th>
                                                    <th>Harga</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $nomor = 1; ?>
                                                <?php while ($pecah = $ambil->fetch_assoc()) { ?>
                                                    <tr>
                                                        <td><?= $nomor; ?></td>
                                                        <td><?= limit_text($pecah['nama_produk'], 5); ?></td>
                                                        <td><?= $pecah['kategori']; ?></td>
                                                        <td>
                                                            <img src="<?= base_url(); ?>assets/img/product/<?= $pecah['cover']; ?>" class="border img-thumbnail" width="70" height="70">
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $warna = explode(",", $pecah['warna']);
                                                            foreach ($warna as $war) {
                                                                $war = trim($war);
                                                                echo "<span class='badge badge-info mr-1'>$war</span>";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $ukuran = explode(",", $pecah['ukuran']);
                                                            foreach ($ukuran as $ukur) {
                                                                $ukur = trim($ukur);
                                                                echo "<span class='badge badge-primary mr-1'>$ukur</span>";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>Rp. <?= number_format($pecah['harga_produk'], 0, ',', '.'); ?></td>
                                                        <td>
                                                            <div class="btn-group btn-group-sm" role="group">
                                                                <a href="<?= base_url(); ?>produk?s=<?= $pecah['slug']; ?>" class="btn btn-secondary btn-sm" title="Lihat Produk" target="_blank"><i class="far fa-eye"></i></a>
                                                                <a href="<?= base_url('system/produk/'); ?>edit?slug=<?= $pecah['slug']; ?>" class="btn btn-primary btn-sm" title="Edit Data"><i class="far fa-edit"></i></a>
                                                                <a href="<?= base_url('system/produk/'); ?>function?slug=<?= $pecah['slug']; ?>" class="btn btn-danger btn-sm" title="Hapus Data" onclick="return confirm('Anda Ingin Menghapus Data Ini?')"><i class="fa fa-trash"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php $nomor++ ?>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    </div>

                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.1.0
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?= base_url(); ?>plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?= base_url(); ?>plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url(); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?= base_url(); ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="<?= base_url(); ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url(); ?>dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url(); ?>dist/js/demo.js"></script>
    <script src="<?= base_url(); ?>dist/js/script.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="<?= base_url(); ?>plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(function() {
            $('#dtable').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });

        function openformcari() {
            document.getElementById("formcariberita").style.display = "block";
        }

        function closeformcari() {
            document.getElementById("formcariberita").style.display = "none";
        }
    </script>

</body>

</html>