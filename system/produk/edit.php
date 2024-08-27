<?php
include '../koneksi.php';
include '../helper.php';
session_start();
if (!isset($_SESSION['user'])) {
    header('location:' . base_url('system/login'));
    exit();
}

$get = $koneksi->query("SELECT * FROM produk WHERE slug = '$_GET[slug]'");
if (mysqli_num_rows($get) == 1) {
    $data = mysqli_fetch_array($get);
} else {
    header('location:' . base_url('system/produk/'));
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Toko Mustika | Data Produk</title>

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
    <!-- CKeditor5 & CKfinder -->
    <script src="<?= base_url(); ?>plugins/ckeditor5/ckeditor.js"></script>
    <script src="<?= base_url(); ?>plugins/ckfinder/ckfinder.js"></script>
    <link href="<?= base_url("plugins/tag-input/"); ?>tagsinput.css" rel="stylesheet" type="text/css">
    <style>
        .ck-editor__editable_inline {
            min-height: 200px !important;
        }
    </style>
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
                <span class="brand-text font-weight-light">TokoMustika</span>
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
                            <h1 class="m-0">Edit Produk</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Edit Produk</li>
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
                                    <h2 class="card-title mt-1"><strong>Edit Produk</strong></h2>
                                    <a class="btn btn-danger btn-sm float-right mr-1" href="<?= base_url(); ?>system/produk">Kembali</a>
                                </div>
                                <!-- /.card-header -->
                                <form method="POST" action="<?= base_url('system/produk/function'); ?>" class="needs-validation" enctype="multipart/form-data" novalidate>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <input type="hidden" name="id_produk" class="form-control" value="<?= $data['id']; ?>">
                                            <input type="hidden" name="old_slug" class="form-control" value="<?= $data['slug']; ?>">
                                            <label for="exampleInputEmail1">Nama produk</label>
                                            <input type="text" class="form-control" name="edt_nama" id="edt_nama" placeholder="Masukan Judul" required value="<?= $data['nama_produk']; ?>">
                                            <div class="invalid-feedback">
                                                Harap masukan nama produk
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Slug Produk</label>
                                            <input type="text" class="form-control" id="slug_produk" readonly value="<?= $data['slug']; ?>">
                                            <small class="form-text text-secondary">Slug Berita merupakan judul berita yang sudah diubah agar lebih SEO Friendly</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Harga Produk (Rp)</label>
                                            <input type="number" class="form-control" name="edt_harga" placeholder="Masukan Harga" value="<?= $data['harga_produk']; ?>" required>
                                            <small class="form-text text-secondary">Masukan hanya angka saja tanpa titik (.)</small>
                                            <div class="invalid-feedback">
                                                Harap masukan harga
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Opsi 1</label>
                                            <input type="text" autocomplete="off" data-role="tagsinput" class="form-control" name="edt_ukuran" placeholder="Masukan Ukuran" value="<?= $data['ukuran']; ?>" required>
                                            <small class="form-text text-secondary">Untuk memasukan banyak ukuran tekan Spasi/Enter.</small>
                                            <div class="invalid-feedback">
                                                Harap ketikan "Wajib_Pilih"
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Opsi 2</label>
                                            <input type="text" autocomplete="off" data-role="tagsinput" class="form-control" name="edt_warna" placeholder="Masukan Warna" value="<?= $data['warna']; ?>" required>
                                            <small class="form-text text-secondary">Untuk memasukan banyak warna tekan Spasi/Enter.</small>
                                            <div class="invalid-feedback">
                                                Harap ketikan "Wajib_Pilih"
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Kategori Produk</label>
                                            <select class="form-control" name="edt_kategori">
                                                <?php
                                                $ambil = $koneksi->query("SELECT * FROM kategori");
                                                while ($pecah = $ambil->fetch_assoc()) { ?>
                                                    <option <?= ($pecah['nama_kategori'] == $data['kategori']) ? "selected" : ''; ?> value=" <?= $pecah['nama_kategori']; ?>"><?= $pecah['nama_kategori']; ?></option>
                                                <?php } ?>

                                            </select>
                                        </div>
                                        <div class="form-group mt-2">
                                            <img src="<?= base_url(); ?>assets/img/product/<?= $data['cover']; ?>" id="preview" class="border img-thumbnail" width="200" height="150">
                                            <input type="hidden" name="nama_cover" value="<?= $data['cover']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">Cover Produk</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="foto" id="foto" accept="image/*">
                                                    <label class="custom-file-label filename_foto" for="exampleInputFile">Pilih Cover</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <strong>Deskripsi</strong>
                                            <textarea class="form-control editor-berita1" name="edt_deskripsi" required><?= $data['deskripsi']; ?></textarea>
                                            <div class="invalid-feedback errorIsi"></div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" name="edt_produk" class="btn btn-success btn-block">Simpan Perubahan</button>
                                    </div>
                                </form>
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
    <script src="<?= base_url(); ?>plugins/tag-input/tagsinput.js"></script>
    <script>
        $("#edt_nama").keyup(function() {
            $("#slug_produk").val(convertToSlug($("#edt_nama").val()));
        });

        function convertToSlug(Text) {
            return Text.toLowerCase()
                .replace(/[^\w ]+/g, '')
                .replace(/ +/g, '-');
        }
    </script>

</body>

</html>