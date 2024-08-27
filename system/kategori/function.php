<?php
include '../koneksi.php';
include '../helper.php';

// Tambah Kategori
if (isset($_POST['submitkat'])) {
    $namakategori = test_input($_POST['kategori']);
    $koneksi->query("INSERT INTO kategori(nama_kategori) VALUES('$namakategori')");
    echo "<script>alert('Kategori Berhasil Ditambahkan');</script>";
    echo "<script>location='" . base_url('system/kategori/') . "';</script>";
}

// Edit Kategori
if (isset($_POST['submiteditkat'])) {
    $id_kat = test_input($_POST['ideditkat']);
    $nama_kat = test_input($_POST['kategori']);
    $koneksi->query("UPDATE kategori SET nama_kategori = '$nama_kat' WHERE id = '$id_kat'");
    echo "<script>alert('Kategori Berhasil Diubah');</script>";
    echo "<script>location='" . base_url('system/kategori/') . "';</script>";
}

// Hapus Kategori
if (!empty($_GET['id_kat'])) {
    $koneksi->query("DELETE FROM kategori WHERE id = '$_GET[id_kat]'");
    header('location:' . base_url('system/kategori/'));
}
