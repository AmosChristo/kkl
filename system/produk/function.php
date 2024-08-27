<?php
include '../koneksi.php';
include '../helper.php';

// Tambah Berita
if (isset($_POST['add_produk'])) {
    // Data Form
    $nama_produk = test_input($_POST['nama_produk']);
    $slug = slug($_POST['nama_produk']);
    $deskripsi = $_POST['isi_desc'];
    $kategori = test_input($_POST['kategori']);
    $warna = test_input($_POST['warna_produk']);
    $size = test_input($_POST['ukuran_produk']);
    $harga = test_input($_POST['harga_produk']);
    $waktu = date('Y-m-d H:i:s');

    // Data File Sampul
    $nama = $_FILES['foto']['name'];
    $lokasi = $_FILES['foto']['tmp_name'];
    $ukuran = $_FILES['foto']['size'];
    $allowed_extension = array('jpg', 'jpeg', 'png');
    $dot = explode('.', $nama);
    $ekstensi = strtolower(end($dot));
    $cover = md5(uniqid($nama, true) . time()) . '.' . $ekstensi;

    $get = $koneksi->query("SELECT * FROM produk WHERE slug='$slug'");
    if (mysqli_num_rows($get) == 1) {
        echo "<script>alert('Nama Produk sudah ada'); window.location.replace('" . base_url('system/produk/add') . "');</script>";
    } else {
        if (!empty($lokasi)) {
            if (in_array($ekstensi, $allowed_extension) === true) {
                if ($ukuran <= 2000000) {
                    move_uploaded_file($lokasi, "../../assets/img/product/" . $cover);
                    $koneksi->query("INSERT INTO produk(nama_produk,slug,cover,deskripsi,kategori,warna,ukuran,harga_produk) VALUES('$nama_produk','$slug','$cover','$deskripsi','$kategori','$warna','$size','$harga')");
                } else {
                    echo "<script>alert('Ukuran Max 2MB');</script>";
                    echo "<script>location='" . base_url('system/produk/') . "';</script>";
                }
            } else {
                echo "<script>alert('Pastikan File Foto (jpg,jpeg,png)');</script>";
                echo "<script>location='" . base_url('system/produk/') . "';</script>";
            }
        } else {
            $koneksi->query("INSERT INTO produk(nama_produk,slug,cover,deskripsi,kategori,warna,ukuran,harga) VALUES('$nama_produk','$slug','default.jpg','$deskripsi','$kategori','$warna','$ukuran','$harga)");
        }
        echo "<script>alert('Produk Berhasil Ditambahkan');</script>";
        echo "<script>location='" . base_url('system/produk/') . "';</script>";
    }
}

// Edit Berita
if (isset($_POST['edt_produk'])) {
    // Data Form
    $id_produk = $_POST['id_produk'];
    $old_slug = $_POST['old_slug'];
    $nama_produk = test_input($_POST['edt_nama']);
    $slug = slug($_POST['edt_nama']);
    $deskripsi = $_POST['edt_deskripsi'];
    $kategori = test_input($_POST['edt_kategori']);
    $warna = test_input($_POST['edt_warna']);
    $size = test_input($_POST['edt_ukuran']);
    $harga = test_input($_POST['edt_harga']);
    $waktu = date('Y-m-d H:i:s');
    $cover_skrg = test_input($_POST['nama_cover']);

    // Data File Sampul
    $nama = $_FILES['foto']['name'];
    $lokasi = $_FILES['foto']['tmp_name'];
    $ukuran = $_FILES['foto']['size'];
    $allowed_extension = array('jpg', 'jpeg', 'png');
    $dot = explode('.', $nama);
    $ekstensi = strtolower(end($dot));
    $sampul = md5(uniqid($nama, true) . time()) . '.' . $ekstensi;

    // Cek judul baru atau lama
    if ($slug !== $old_slug) {
        $get = $koneksi->query("SELECT * FROM produk WHERE slug='$slug'");
        $row = mysqli_num_rows($get);
    } else {
        $row = 0;
    };

    if ($row == 1) {
        echo "<script>alert('Nama produk sudah ada'); window.location.replace('" . base_url('system/produk/') . "');</script>";
    } else {
        if (!empty($lokasi)) {
            if (in_array($ekstensi, $allowed_extension) === true) {
                if ($ukuran <= 2000000) {
                    ($sampul_skrg !== 'default.jpg') ? unlink("../../assets/img/product/$sampul_skrg") : '';
                    move_uploaded_file($lokasi, "../../assets/img/product/" . $sampul);
                    $koneksi->query("UPDATE produk SET nama_produk = '$nama_produk', harga_produk = '$harga', slug = '$slug', cover = '$cover', deskripsi = '$deskripsi', kategori = '$kategori', warna = '$warna', ukuran = '$size' WHERE id = '$id_produk'");
                } else {
                    echo "<script>alert('Ukuran Max 2MB');</script>";
                    echo "<script>location='" . base_url('system/produk/') . "';</script>";
                }
            } else {
                echo "<script>alert('Pastikan File Foto (jpg,jpeg,png)');</script>";
                echo "<script>location='" . base_url('system/produk/') . "';</script>";
            }
        } else {
            $koneksi->query("UPDATE produk SET nama_produk = '$nama_produk', harga_produk = '$harga', slug = '$slug', deskripsi = '$deskripsi', kategori = '$kategori', warna = '$warna', ukuran = '$size' WHERE id = '$id_produk'");
        }
        echo "<script>alert('Produk Berhasil Diupdate');</script>";
        echo "<script>location='" . base_url('system/produk/') . "';</script>";
    }
}

// Hapus Berita
if (!empty($_GET['slug'])) {

    $ambil = $koneksi->query("SELECT * FROM produk WHERE slug = '$_GET[slug]'");
    $pecah = $ambil->fetch_assoc();
    $sampul = $pecah['cover'];

    if (file_exists("../../assets/img/product/$sampul")) {
        ($sampul !== 'default.jpg') ? unlink("../../assets/img/product/$sampul") : '';
    }

    $koneksi->query("DELETE FROM produk WHERE slug = '$_GET[slug]'");
    header('location:' . base_url('system/produk/'));
}
