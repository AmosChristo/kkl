<?php
include '../koneksi.php';
include '../helper.php';

// Update Konfigurasi
if (isset($_POST['updt_konfigurasi'])) {
    $nama = test_input($_POST['nama_toko']);
    $sambutan = $_POST['sambutan'];
    $tentang = $_POST['tentang'];
    $visi_misi = $_POST['visi_misi'];
    $instagram = test_input($_POST['instagram']);
    $facebook = test_input($_POST['facebook']);
    $email = test_input($_POST['email']);
    $whatsapp = test_input($_POST['whatsapp']);
    $maps = test_input($_POST['maps']);
    $alamat = $_POST['alamat'];

    $tags = $_POST['tag-input'];

    $sql = $koneksi->query("UPDATE konfigurasi SET nama_toko = '$nama', sambutan = '$sambutan', tentang = '$tentang', visi_misi = '$visi_misi', instagram = '$instagram', facebook = '$facebook', email = '$email', whatsapp = '$whatsapp', maps = '$maps', alamat = '$alamat', tags = '$tags' WHERE id = '1' ");

    if ($sql) {
        echo "<script>alert('Konfigurasi Berhasil Diupdate');</script>";
        echo "<script>location='" . base_url('system/konfigurasi/') . "';</script>";
    } else {
        echo "<script>alert('Konfigurasi Gagal Diupdate');</script>";
        echo "<script>location='" . base_url('system/konfigurasi/') . "';</script>";
    }
}

// Update Hero
if (isset($_POST['edt_hero'])) {
    $nama = $_FILES['foto']['name'];
    $lokasi = $_FILES['foto']['tmp_name'];
    $ukuran = $_FILES['foto']['size'];
    $allowed_extension = array('jpg', 'jpeg', 'png');
    $dot = explode('.', $nama);
    $ekstensi = strtolower(end($dot));
    $hero = md5(uniqid($nama, true) . time()) . '.' . $ekstensi;
    $hero_old = $_POST['hero_old'];

    if (in_array($ekstensi, $allowed_extension) === true) {
        if ($ukuran <= 2000000) {
            unlink("../../assets/img/$hero_old");
            move_uploaded_file($lokasi, "../../assets/img/" . $hero);
            $koneksi->query("UPDATE konfigurasi SET hero = '$hero' WHERE id = '1'");

            echo "<script>alert('Hero Berhasil Diupdate');</script>";
            echo "<script>location='" . base_url('system/konfigurasi/') . "';</script>";
        } else {
            echo "<script>alert('Ukuran Max 2MB');</script>";
            echo "<script>location='" . base_url('system/konfigurasi/') . "';</script>";
        }
    } else {
        echo "<script>alert('Pastikan File Foto (jpg,jpeg,png)');</script>";
        echo "<script>location='" . base_url('system/konfigurasi/') . "';</script>";
    }
}

// Update Favicon
if (isset($_POST['edt_favicon'])) {
    $nama = $_FILES['foto']['name'];
    $lokasi = $_FILES['foto']['tmp_name'];
    $ukuran = $_FILES['foto']['size'];
    $allowed_extension = array('jpg', 'jpeg', 'png', 'ico');
    $dot = explode('.', $nama);
    $ekstensi = strtolower(end($dot));
    $favicon = md5(uniqid($nama, true) . time()) . '.' . $ekstensi;
    $favicon_old = $_POST['favicon_old'];

    if (in_array($ekstensi, $allowed_extension) === true) {
        if ($ukuran <= 2000000) {
            unlink("../../assets/img/$favicon_old");
            move_uploaded_file($lokasi, "../../assets/img/" . $favicon);
            $koneksi->query("UPDATE konfigurasi SET favicon = '$favicon' WHERE id = '1'");

            echo "<script>alert('Favicon Berhasil Diupdate');</script>";
            echo "<script>location='" . base_url('system/konfigurasi/') . "';</script>";
        } else {
            echo "<script>alert('Ukuran Max 2MB');</script>";
            echo "<script>location='" . base_url('system/konfigurasi/') . "';</script>";
        }
    } else {
        echo "<script>alert('Pastikan File Favicon (jpg,jpeg,png,ico)');</script>";
        echo "<script>location='" . base_url('system/konfigurasi/') . "';</script>";
    }
}
