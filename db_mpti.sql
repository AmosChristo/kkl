-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Jul 2022 pada 16.02
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mpti`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`) VALUES
(1, 'Baju'),
(2, 'Celana');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id` int(11) NOT NULL,
  `nama_toko` varchar(100) NOT NULL,
  `sambutan` longtext NOT NULL,
  `tentang` longtext NOT NULL,
  `visi_misi` longtext NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `whatsapp` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `maps` longtext NOT NULL,
  `alamat` longtext NOT NULL,
  `tags` varchar(255) NOT NULL,
  `favicon` varchar(255) NOT NULL,
  `hero` varchar(255) NOT NULL,
  `memo` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `konfigurasi`
--

INSERT INTO `konfigurasi` (`id`, `nama_toko`, `sambutan`, `tentang`, `visi_misi`, `facebook`, `email`, `whatsapp`, `instagram`, `maps`, `alamat`, `tags`, `favicon`, `hero`, `memo`) VALUES
(1, 'Mustika Jaya Utama', '<p>Mustika Jaya Utama adalah konveksi yang bertempat di Klaten. Kami sudah menangani banyak permintaan dari client untuk pembuatan berbagai jenis produk garmen seperti batik, kemeja, jas, seragam kerja, sergam sekolah dan lainnya. Kami selalu bekerja sepenuh hati dan senantiasa berupaya melayani customer untuk menghasilkan produk yang berkualitas. dengan harga terjangkau.</p>', '<p>Tentang perusahaan kami</p><h4><strong>KONVEKSI MUSTIKA JAYA UTAMA</strong></h4><p>&nbsp;</p><p>Perkenalkan konveksi mustika jaya utama, sebuah unit usaha di bidang jasa konveksi yang fokus pada bidang pembuatan seragam. dengan berbagai macam tipe dan desain yang bisa dipilih dan disesuaikan dengan konsumen, serta pemilihan bahan yang menyesuaikan selera konsumen, kami hadir untuk mewujudkan pakaian seragam yang anda idamkan.</p><p>&nbsp;</p><p>Berdiri sejak tahun 2010, Selama satu dekade lebih kami melayani pesanan bermacam-macam konsumen mulai dari seragam formal untuk instansi, jas almamater, rompi kerja dan masih banyak lagi. dibantu oleh tenaga kerja yang telah expert di bidangnya, menghasilkan barang dengan kualitas yang bagus serta banderol harga yang cukup terjangkau dengan waktu pengerjaan yang disiplin sesuai dengan request anda. kami bisa menjadi pilihan utama untuk produksi pakaian anda.</p>', '<h4><strong>Visi :</strong></h4><p>Menjadi toko konveksi dan garmen yang unggul, terkemuka dan terdepan dalam pelayanan serta kinerja.</p><h4><strong>Misi :</strong></h4><ol><li>Memberikan hasil produksi yang berkualitas dan inovatif</li><li>Memberikan layanan yang baik dan solutif kepada konsumen</li><li>Menciptakan lingkungan kerja yang baik kepada karyawan guna menunjang produksi yang berkualitas</li><li>Menjadi acuan sebagai konveksi yang memiliki tata kelola yang baik khususnya di daerah Klaten</li></ol>', 'Mustika Jaya Official', 'mustikajayaofficial@gmail.com', '089504237608', '@mustikajaya', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d253035.73489156412!2d110.51367086348736!3d-7.717083461064855!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a416389cafa5d%3A0x3027a76e352bad0!2sKlaten%2C%20Kabupaten%20Klaten%2C%20Jawa%20Tengah!5e0!3m2!1sid!2sid!4v1654675733990!5m2!1sid!2sid', 'Karanganom Rt 02/Rw 06, Karaganom, Karanganom, Klaten', 'asd,qwe,sadqwe', 'b02140697d1685e18b73d3e1103195c2.png', 'hero.jpg', '<h5><strong>Senin </strong>:</h5><ul><li>Blablaasdasd</li><li>asdasdasdas</li></ul><h5><strong>Selasa </strong>:</h5><ul><li>asdbajdbajsd</li><li>asdknasldasd</li></ul>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `harga_produk` varchar(255) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `ukuran` varchar(255) NOT NULL,
  `warna` varchar(255) NOT NULL,
  `deskripsi` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `nama_produk`, `slug`, `kategori`, `harga_produk`, `cover`, `ukuran`, `warna`, `deskripsi`) VALUES
(1, 'Testing', 'testing', 'Baju', '230000', 'product-1.jpg', 'XLL,XL,S,M', 'merah,kuning,hijau', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum dignissim rhoncus molestie. Integer condimentum nisl metus, nec finibus metus cursus sit amet. Mauris id sapien et ligula auctor vestibulum sit amet sit amet erat. Sed id maximus ipsum. Suspendisse eu quam felis. Proin vel leo lectus. Etiam sed sollicitudin lacus, tincidunt molestie tellus. Mauris id mattis turpis, sed sodales turpis. Nunc aliquam, ex id pretium rutrum, urna neque elementum lacus, sed rhoncus tortor diam ut dolor. Curabitur elit risus, sagittis vel lorem vitae, commodo euismod lorem. In eu mattis risus, nec maximus massa. Ut ac massa vitae felis consectetur faucibus. Nulla tempus dui non metus ultricies euismod. Etiam id porttitor mauris. Suspendisse luctus tincidunt velit luctus tincidunt. Aliquam erat volutpat. Sed mattis purus elit, nec fermentum risus sollicitudin in. Mauris blandit pharetra libero vitae venenatis. Aenean porttitor dignissim mauris. Donec viverra malesuada mi sed vulputate. Fusce vel sagittis tortor. Donec massa nisl, porta eu dignissim at, viverra sed lorem. Vestibulum libero orci, eleifend eu rutrum et, mattis eu tortor. Proin rhoncus eget odio quis vulputate. Nullam sit amet tortor sapien. Mauris id tincidunt augue. Mauris lobortis leo sit amet vulputate lobortis. Integer mi nunc, fringilla vel ultrices sit amet, suscipit condimentum nisi. Nunc massa dolor, rutrum a sollicitudin vitae, elementum at ipsum. Nullam augue ante, ornare a urna luctus, auctor iaculis tellus.</p>'),
(2, 'Sbajsdajsdjkjasbdjaksd', 'sbajsdajsdjkjasbdjaksd', 'Baju', '250000', 'product-1.jpg', 'XL,L,S', 'merah,kuning,hijau', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum dignissim rhoncus molestie. Integer condimentum nisl metus, nec finibus metus cursus sit amet. Mauris id sapien et ligula auctor vestibulum sit amet sit amet erat. Sed id maximus ipsum. Suspendisse eu quam felis. Proin vel leo lectus. Etiam sed sollicitudin lacus, tincidunt molestie tellus. Mauris id mattis turpis, sed sodales turpis. Nunc aliquam, ex id pretium rutrum, urna neque elementum lacus, sed rhoncus tortor diam ut dolor. Curabitur elit risus, sagittis vel lorem vitae, commodo euismod lorem. In eu mattis risus, nec maximus massa. Ut ac massa vitae felis consectetur faucibus. Nulla tempus dui non metus ultricies euismod. Etiam id porttitor mauris. Suspendisse luctus tincidunt velit luctus tincidunt. Aliquam erat volutpat. Sed mattis purus elit, nec fermentum risus sollicitudin in. Mauris blandit pharetra libero vitae venenatis. Aenean porttitor dignissim mauris. Donec viverra malesuada mi sed vulputate. Fusce vel sagittis tortor. Donec massa nisl, porta eu dignissim at, viverra sed lorem. Vestibulum libero orci, eleifend eu rutrum et, mattis eu tortor. Proin rhoncus eget odio quis vulputate. Nullam sit amet tortor sapien. Mauris id tincidunt augue. Mauris lobortis leo sit amet vulputate lobortis. Integer mi nunc, fringilla vel ultrices sit amet, suscipit condimentum nisi. Nunc massa dolor, rutrum a sollicitudin vitae, elementum at ipsum. Nullam augue ante, ornare a urna luctus, auctor iaculis tellus.</p>'),
(3, 'kasnjabsdj', 'kasnjabsdj', 'Celana', '123123', 'product-1.jpg', 'XL,L,S', 'merah,kuning,hijau', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum dignissim rhoncus molestie. Integer condimentum nisl metus, nec finibus metus cursus sit amet. Mauris id sapien et ligula auctor vestibulum sit amet sit amet erat. Sed id maximus ipsum. Suspendisse eu quam felis. Proin vel leo lectus. Etiam sed sollicitudin lacus, tincidunt molestie tellus. Mauris id mattis turpis, sed sodales turpis. Nunc aliquam, ex id pretium rutrum, urna neque elementum lacus, sed rhoncus tortor diam ut dolor. Curabitur elit risus, sagittis vel lorem vitae, commodo euismod lorem. In eu mattis risus, nec maximus massa. Ut ac massa vitae felis consectetur faucibus. Nulla tempus dui non metus ultricies euismod. Etiam id porttitor mauris. Suspendisse luctus tincidunt velit luctus tincidunt. Aliquam erat volutpat. Sed mattis purus elit, nec fermentum risus sollicitudin in. Mauris blandit pharetra libero vitae venenatis. Aenean porttitor dignissim mauris. Donec viverra malesuada mi sed vulputate. Fusce vel sagittis tortor. Donec massa nisl, porta eu dignissim at, viverra sed lorem. Vestibulum libero orci, eleifend eu rutrum et, mattis eu tortor. Proin rhoncus eget odio quis vulputate. Nullam sit amet tortor sapien. Mauris id tincidunt augue. Mauris lobortis leo sit amet vulputate lobortis. Integer mi nunc, fringilla vel ultrices sit amet, suscipit condimentum nisi. Nunc massa dolor, rutrum a sollicitudin vitae, elementum at ipsum. Nullam augue ante, ornare a urna luctus, auctor iaculis tellus.</p>'),
(4, 'qjwekqweasd', 'qjwekqweasd', 'Celana', '213123', 'product-1.jpg', 'XL,L,S', 'merah,kuning,hijau', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum dignissim rhoncus molestie. Integer condimentum nisl metus, nec finibus metus cursus sit amet. Mauris id sapien et ligula auctor vestibulum sit amet sit amet erat. Sed id maximus ipsum. Suspendisse eu quam felis. Proin vel leo lectus. Etiam sed sollicitudin lacus, tincidunt molestie tellus. Mauris id mattis turpis, sed sodales turpis. Nunc aliquam, ex id pretium rutrum, urna neque elementum lacus, sed rhoncus tortor diam ut dolor. Curabitur elit risus, sagittis vel lorem vitae, commodo euismod lorem. In eu mattis risus, nec maximus massa. Ut ac massa vitae felis consectetur faucibus. Nulla tempus dui non metus ultricies euismod. Etiam id porttitor mauris. Suspendisse luctus tincidunt velit luctus tincidunt. Aliquam erat volutpat. Sed mattis purus elit, nec fermentum risus sollicitudin in. Mauris blandit pharetra libero vitae venenatis. Aenean porttitor dignissim mauris. Donec viverra malesuada mi sed vulputate. Fusce vel sagittis tortor. Donec massa nisl, porta eu dignissim at, viverra sed lorem. Vestibulum libero orci, eleifend eu rutrum et, mattis eu tortor. Proin rhoncus eget odio quis vulputate. Nullam sit amet tortor sapien. Mauris id tincidunt augue. Mauris lobortis leo sit amet vulputate lobortis. Integer mi nunc, fringilla vel ultrices sit amet, suscipit condimentum nisi. Nunc massa dolor, rutrum a sollicitudin vitae, elementum at ipsum. Nullam augue ante, ornare a urna luctus, auctor iaculis tellus.</p>'),
(7, 'Semen Batu Raja 40 Kg', 'semen-batu-raja-40-kg', 'Baju', '123123', 'f71bf30b595be2beeec1c8ece1c9bdc5.png', 'Xl,S,L', 'w,q,s', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum dignissim rhoncus molestie. Integer condimentum nisl metus, nec finibus metus cursus sit amet. Mauris id sapien et ligula auctor vestibulum sit amet sit amet erat. Sed id maximus ipsum. Suspendisse eu quam felis. Proin vel leo lectus. Etiam sed sollicitudin lacus, tincidunt molestie tellus.</p>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(10) NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `level`) VALUES
(1, 'Admin Satu', 'admin_satu@gmail.com', '$2a$12$3gWoJaoIkqQngMfWoMWVH.bCO.3ru1u50iZJ6KkRWA3ulyvpdHMq.', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
