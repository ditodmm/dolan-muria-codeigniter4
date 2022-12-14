-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Mar 2022 pada 14.09
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pariwisata`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_gambar_wisata`
--

CREATE TABLE `tb_gambar_wisata` (
  `id_gambar_wisata` int(11) NOT NULL,
  `nama_gambar_wisata` varchar(50) NOT NULL,
  `deskripsi_gambar_wisata` varchar(100) NOT NULL,
  `sumber_gambar_wisata` varchar(200) NOT NULL,
  `id_nama_wisata` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_gambar_wisata`
--

INSERT INTO `tb_gambar_wisata` (`id_gambar_wisata`, `nama_gambar_wisata`, `deskripsi_gambar_wisata`, `sumber_gambar_wisata`, `id_nama_wisata`) VALUES
(2, '1638397753_a3fafbd86643689205ac.jpg', 'Salin Luwur', 'http://kudus.kemenag.go.id/berita/read/salin-luwur-dan-haul-sunan-muria-ke-393', 22),
(3, '1638397806_f38ab4b15d95bfce6c8d.jpg', 'Pijar Park Camp Ground', 'https://www.instagram.com/p/CSdqdxvld7x/?utm_medium=copy_link', 23),
(6, '1638397877_eedd471a6cc6005e347a.jpg', 'Pemandangan Kota Dari Bukit Puteran', 'https://www.instagram.com/kudusjourney/p/CIDOgdqhy4V/?utm_medium=copy_link', 24),
(7, '1638397913_3795cf44443cb16a0b1b.jpg', 'Jalan Setapak Menuju Bukit Puteran', 'Admin', 24),
(8, '1638397934_c85a38cc3f712a72864f.jpg', 'Sendang Petilasan', 'Admin', 27),
(9, '1638397945_b53290d42f3eb66fae08.jpg', 'Sendang Petilasan', 'Admin', 27),
(10, '1644889517_21fb2aab2d532652aa0f.jpeg', 'Puncak argojembangan', 'Admin', 36);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Camp Ground'),
(2, 'Religi'),
(4, 'Outbond'),
(6, 'Alam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kuliner`
--

CREATE TABLE `tb_kuliner` (
  `id_kuliner` int(11) NOT NULL,
  `nama_kuliner` varchar(50) NOT NULL,
  `deskripsi_kuliner` text NOT NULL,
  `gambar_sampul_kuliner` varchar(50) NOT NULL,
  `gambar_kuliner_1` varchar(50) NOT NULL,
  `gambar_kuliner_2` varchar(50) NOT NULL,
  `gambar_kuliner_3` varchar(50) NOT NULL,
  `harga_kuliner` int(10) NOT NULL,
  `toko_kuliner` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kuliner`
--

INSERT INTO `tb_kuliner` (`id_kuliner`, `nama_kuliner`, `deskripsi_kuliner`, `gambar_sampul_kuliner`, `gambar_kuliner_1`, `gambar_kuliner_2`, `gambar_kuliner_3`, `harga_kuliner`, `toko_kuliner`) VALUES
(1, 'Pecel Pakis', 'Pecel pakis adalah pecel yang berbahan dasar daun pakis.', '1640517695_e5dd657b8f61708b2381.jpg', '1640528671_cc178122e89c4daaf334.jpg', '1640528684_9f109cf0a6d141e055e0.jpg', '1640528693_02e752bec058eedac3d9.jpg', 10000, 23);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penginapan`
--

CREATE TABLE `tb_penginapan` (
  `id_penginapan` int(11) NOT NULL,
  `nama_penginapan` varchar(50) NOT NULL,
  `deskripsi_penginapan` text NOT NULL,
  `alamat_penginapan` varchar(100) NOT NULL,
  `gambar_sampul_penginapan` varchar(50) NOT NULL,
  `gambar_penginapan_1` varchar(50) NOT NULL,
  `gambar_penginapan_2` varchar(50) NOT NULL,
  `no_telepon` varchar(13) NOT NULL,
  `gmaps_penginapan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_penginapan`
--

INSERT INTO `tb_penginapan` (`id_penginapan`, `nama_penginapan`, `deskripsi_penginapan`, `alamat_penginapan`, `gambar_sampul_penginapan`, `gambar_penginapan_1`, `gambar_penginapan_2`, `no_telepon`, `gmaps_penginapan`) VALUES
(1, 'Graha Muria', 'graha', 'Pesanggrahan Colo', '1640517724_b429ce4051f1aa9252b1.jpg', '1638267429_71127c7e09e76cff4af4.jpg', '1638267439_4c513fbb7d5a6187ba51.jpg', '1234', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `gambar_sampul_produk` varchar(50) NOT NULL,
  `gambar_produk_1` varchar(50) NOT NULL,
  `gambar_produk_2` varchar(50) NOT NULL,
  `gambar_produk_3` varchar(50) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `toko_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `nama_produk`, `deskripsi_produk`, `gambar_sampul_produk`, `gambar_produk_1`, `gambar_produk_2`, `gambar_produk_3`, `harga_produk`, `toko_produk`) VALUES
(4, 'Sirup Parijotho', 'Buah parijotho merupakan buah yang dipercaya berkhasiat dapat menyuburkan kandungan pada ibu hamil dan membuat bayi lahir dengan tampan atau cantik.\r\nKomposisi: Buah parijotho, air, gula', '1640527522_1a49b7bc4d04deb7cec0.jpeg', '1640527492_838ef35a0726c99b0c11.jpeg', '1640527540_97b1e612566be0b2ed84.jpeg', '1640527547_5d464d314b812db5dc2c.jpeg', 50000, 22),
(6, 'Kopi Muria', 'Haloi', '1638968434_261e3b52ab6ebd26d7c6.jpg', '1638968434_adda19b4abe13844d96d.jpg', '1638968434_ee9a8ee238a1bd4c6dbc.jpg', '1638968434_6a8d348834c392a03f6e.jpg', 50000, 41),
(7, 'Keripik Parijotho', 'Buah parijotho merupakan buah yang dipercaya berkhasiat dapat menyuburkan kandungan pada ibu hamil dan membuat bayi lahir dengan tampan atau cantik.', '1640527727_d021ccd7bbf4c6ede1a8.jpeg', '1640527727_1c2728f07ae232fe377b.jpeg', '1640527727_578f950f918d56b9c2ae.jpeg', '1640527727_537c9652bff788a8ff98.jpeg', 25000, 22),
(8, 'Teh Parijotho Celup', 'Buah parijotho merupakan buah yang dipercaya berkhasiat dapat menyuburkan kandungan pada ibu hamil dan membuat bayi lahir dengan tampan atau cantik.', '1640527839_63fd906be8ba621ffc19.jpeg', '1640527839_a703006060083cea58c9.jpeg', '1640527839_d1e76d2eb2551dd7522e.jpeg', '1640527839_f261f1ecbdff434e2cda.jpeg', 110000, 22),
(9, 'Permen Parijotho', 'Buah parijotho merupakan buah yang dipercaya berkhasiat dapat menyuburkan kandungan pada ibu hamil dan membuat bayi lahir dengan tampan atau cantik.', '1640527873_fab8357025970a43f19f.jpeg', '1640527873_c2d06dad411838373167.jpeg', '1640527873_71695f39f17d3e21472e.jpeg', '1640527873_697929b21df8c910d345.jpeg', 25000, 22),
(11, 'Keripik Pakis', 'Keripik pakis adalah keripik yang terbuat dari daun pakis.', '1644889647_ba8789110f0da6ba3e0d.jpeg', '1644889647_d718e7be8c79797c99d9.jpeg', '1644889647_0ad7bb0d26e92999794b.jpeg', '1644889647_90922df3f63203bcb9fe.jpeg', 20000, 22);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_toko`
--

CREATE TABLE `tb_toko` (
  `id_toko` int(11) NOT NULL,
  `nik_pemilik_toko` varchar(16) NOT NULL,
  `nama_pemilik_toko` varchar(50) NOT NULL,
  `nama_toko` varchar(50) NOT NULL,
  `email_toko` varchar(50) NOT NULL,
  `alamat_toko` varchar(100) NOT NULL,
  `no_telepon` varchar(13) NOT NULL,
  `gambar_toko` varchar(50) NOT NULL,
  `gmaps_toko` text NOT NULL,
  `hari_buka_dari` varchar(10) NOT NULL,
  `hari_buka_sampai` varchar(10) NOT NULL,
  `jam_buka_dari` time NOT NULL,
  `jam_buka_sampai` time NOT NULL,
  `id_user_pemilik_toko` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_toko`
--

INSERT INTO `tb_toko` (`id_toko`, `nik_pemilik_toko`, `nama_pemilik_toko`, `nama_toko`, `email_toko`, `alamat_toko`, `no_telepon`, `gambar_toko`, `gmaps_toko`, `hari_buka_dari`, `hari_buka_sampai`, `jam_buka_dari`, `jam_buka_sampai`, `id_user_pemilik_toko`) VALUES
(7, '1234512345123451', 'Alammu', 'Alammu Parijotho', 'alammu@gmail.com', 'Jalan Raya Colo-Kudus Km. 01 Desa Colo RT 01 RW 01', '081229551516', '1640527277_1f263cdcf41f53afbdcd.png', 'src=&quot;https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d247.67570894043706!2d110.90004177389407!3d-6.670284253758859!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70d979f30d56ab%3A0x7bd3226728645193!2sALAMMU%20Parijotho%20(Pusat%20Sirup%20Parijotho%20Muria)!5e0!3m2!1sen!2ssg!4v1640526852061!5m2!1sen!2ssg&quot;', 'Senin', 'Minggu', '08:00:00', '17:00:00', 22),
(8, '1122334455667788', 'Yanah', 'Warung Mbok Yanah', 'mbokyanah@gmail.com', 'Jl. Pesanggrahan No.193, Colo, Kec. Dawe, Kabupaten Kudus, Jawa Tengah 59353, Indonesia', '08157545698', '1637747408_c7098fef19358c87eef6.png', 'src=&quot;https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d833.0815044330602!2d110.90407426486233!3d-6.668495468614538!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70d78067f635fb%3A0x2b36a93f09e2ed51!2sPecel%20Pakis%20%26%20Ayam%20Bakar%20Mbok%20Yanah!5e0!3m2!1sen!2ssg!4v1640528638988!5m2!1sen!2ssg&quot;', 'Senin', 'Minggu', '07:00:00', '16:00:00', 23),
(9, '1231231231231231', 'To', 'Born', 'bt@gmail.com', 'Colo', '1231231231231', 'kosong', '', '', '', '00:00:00', '00:00:00', 24),
(25, '1232131231234456', 'co', 'coba', 'rifqidwiyana32@gmail.com', 'coba', '123456123456', 'kosong', '', '', '', '00:00:00', '00:00:00', 41),
(35, '3345673653637384', 'coba', 'coba', 'ditorifqi32@gmail.com', 'Jalan Raya Colo-Kudus Km. 01 Desa Colo RT 01 RW 01', '123456123456', 'kosong', '', '', '', '00:00:00', '00:00:00', 51);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transportasi`
--

CREATE TABLE `tb_transportasi` (
  `id_transportasi` int(11) NOT NULL,
  `nama_transportasi` varchar(50) NOT NULL,
  `deskripsi_transportasi` text NOT NULL,
  `gambar_transportasi` varchar(50) NOT NULL,
  `alamat_transportasi` varchar(100) NOT NULL,
  `gmaps_transportasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_transportasi`
--

INSERT INTO `tb_transportasi` (`id_transportasi`, `nama_transportasi`, `deskripsi_transportasi`, `gambar_transportasi`, `alamat_transportasi`, `gmaps_transportasi`) VALUES
(1, 'Ojek Muria', 'Untuk memudahkan para peziarah atau pengunjung di kawasan wisata religi sunan muria, pengunjung dapat ke puncak gunung muria tempat Makam Sunan Muria ', '1638398135_253582a0d5ae594c6cd8.jpg', 'Jl. Raya Kudus - Colo, Colo, Kec. Dawe, Kabupaten Kudus, Jawa Tengah 59353, Indonesia', 'src=&quot;https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126814.924280365!2d110.83268276879613!3d-6.651088836883167!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70d82a987913b3%3A0x71a6ad0c5f829ddd!2sPos%20Ojek!5e0!3m2!1sen!2ssg!4v1638398003098!5m2!1sen!2ssg&quot;');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `kode` varchar(12) NOT NULL,
  `status` int(1) NOT NULL,
  `role` int(1) NOT NULL,
  `tgl_dibuat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `kode`, `status`, `role`, `tgl_dibuat`) VALUES
(16, 'admin', '$2y$10$9y7sMEjlTFeXLvxpTBMX0eNdR.O97TjMXY8LDBwXi2aCrdMLRDhYG', '', 1, 1, '2021-11-26 10:54:23'),
(17, 'tes', '$2y$10$86CQ/eRCjXsuVX6szYru1eSF6DR/SmjxQm/38a1.FIWqBsjl9OcP.', '', 1, 1, '2021-11-27 23:44:36'),
(22, 'pemilik', '$2y$10$omBydtTUz4stmSHgNR8OWeYLdKlu35TgWo5n426KC9LDRyX71pQGK', '', 1, 2, '2021-11-26 11:36:44'),
(23, 'restoran', '$2y$10$3xxER/XDg1IOdCYaXnfVFuG.ZYoH9RGFckDfRN77ZjFcb4AIBDKd.', '', 1, 3, '2021-12-26 14:21:34'),
(24, 'pemilik2', '$2y$10$bOeCbdNbfc9uVMcIlhnT8eKZ74YMkNkkvwrA4U8Z82WbNfaRIb05m', '', 0, 2, '2021-11-26 10:54:23'),
(41, 'coba', '$2y$10$6ocsIq6D7IdWqLS7akAlbOe5ttHLHjKSdOxjW/auK7ezTduLl42BK', 'tCmanPX5zMk9', 1, 2, '2021-12-02 03:42:15'),
(51, 'user', '$2y$10$H4lS8zrHGlhDRo.WYngIQ.a3RRGEJof5mOSHpyMnjGI99ewzkc4CC', 'IxrzyZXbwSks', 1, 2, '2022-02-15 01:49:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_wisata`
--

CREATE TABLE `tb_wisata` (
  `id_wisata` int(11) NOT NULL,
  `nama_wisata` varchar(100) NOT NULL,
  `deskripsi_wisata` text NOT NULL,
  `kategori_wisata` int(11) NOT NULL,
  `alamat_wisata` text NOT NULL,
  `tiket_wisata` int(11) NOT NULL,
  `gambar_wisata` varchar(50) NOT NULL,
  `gmaps_wisata` text NOT NULL,
  `hari_buka_dari` varchar(10) NOT NULL,
  `hari_buka_sampai` varchar(10) NOT NULL,
  `jam_buka_dari` time NOT NULL,
  `jam_buka_sampai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_wisata`
--

INSERT INTO `tb_wisata` (`id_wisata`, `nama_wisata`, `deskripsi_wisata`, `kategori_wisata`, `alamat_wisata`, `tiket_wisata`, `gambar_wisata`, `gmaps_wisata`, `hari_buka_dari`, `hari_buka_sampai`, `jam_buka_dari`, `jam_buka_sampai`) VALUES
(22, 'Makam Sunan Muria', 'Makam Sunan Muria terletak di Desa Colo, Kecamatan Dawe, Kabupaten Kudus. Objek wisata religi makam Sunan Muria ini terletak sekitar 18 km ke arah Utara dari pusat Kota Kudus. Daerah Colo termasuk daerah dataran tinggi yang ada di wilayah Kabupaten Kudus, karena merupakan daerah pegunungan yaitu terdapat Gunung Muria yang ketinggiannya mencapai 1.602 meter di atas permukaan air laut dan merupakan kawasan dataran tinggi yang terdiri dari beberapa gunung atau bukit.', 2, 'Jl Terminal Wisata, Colo, Kec. Dawe, Kabupaten Kudus, Jawa Tengah 59353, Indonesia', 5000, '1638397769_effa6df5e9fc837eaab7.jpg', 'src=&quot;https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10889.575259747988!2d110.89964079938363!3d-6.6640979601734385!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70d9ab4fed9091%3A0xc126ac58c39562f2!2sSunan%20Muria!5e0!3m2!1sen!2sid!4v1637072030505!5m2!1sen!2sid&quot;', 'Senin', 'Minggu', '00:00:00', '23:59:00'),
(23, 'Pijar Park', 'Tempat yang dulu dikenal dengan nama Bumi Perkemahan Kajar ini, menyajikan berbagai spot wistaa yang menarik mulai dari Camping Grounds, Spot Foto Instagramable, Pasar Krempyeng, Food Court, Wedding Out Door, Outbound, Wisata Berkuda serta Eduwisata Kopi dan pembuatan Getuk Nyimut. Untuk tarif wisata yang ditawarkan cukup ekonomis. Mulai Rp 5ribu hingga Rp 25ribu.', 1, 'Dersaya, Kajar, Kec. Dawe, Kabupaten Kudus, Jawa Tengah 59353, Indonesia', 10000, '1638397205_6aa15f3bb27ed4937621.jpg', 'src=&quot;https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.7422445594516!2d110.89043321414219!3d-6.678821567149499!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70d9d1dd37b37f%3A0x37ed9c12fc2d20e!2sWisata%20Pijar%20Park!5e0!3m2!1sen!2ssg!4v1638397182572!5m2!1sen!2ssg&quot;', 'Senin', 'Minggu', '08:00:00', '23:00:00'),
(24, 'Bukit Puteran', 'Bukit puteran merupakan lokasi wisata terbaik yang sangat cocok dipilih sebagai tempat untuk camping menikmati suasana keindahan alam di lereng gunung muria disepanjang hari, atau buat kamu yang hanya sekedar ingin singgah untuk berfoto mengabadikan keindahan alamnya. Untuk menikmati suasana keindahan alam di bukit puteran, kamu bisa datang kapan pun waktunya karena lokasi wisata ini di buka 24 jam. Kamu bisa datang mulai dari pagi atau malam hari jika ingin merasakan sensasi camping dan menginap di bukit puteran ini dan Menikmati keindahan matahari terbit dari lereng bukit Muria.', 1, 'Pandak., Colo, Kec. Dawe, Kabupaten Kudus, Jawa Tengah 59353', 7000, '1638397379_56612c520aa170c2a97b.jpg', 'src=&quot;https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.82924075599!2d110.89471831414224!3d-6.668071167040181!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70d949dff6d4e1%3A0x4016c17334f8909a!2sPuteran%20Hills!5e0!3m2!1sen!2ssg!4v1638397361350!5m2!1sen!2ssg&quot;', 'Senin', 'Minggu', '00:00:00', '23:59:00'),
(27, 'Air Tiga Rasa Rejenu', 'Objek wisata ini memang beda dengan lainnya. Sebab terdapat mata air tiga rasa, yakni dengan rasa yang berbeda. Sumber mata air pertama mempunyai rasa mirip stroberi agak tawar, sumber mata air kedua mempunyai rasa yang mirip dengan minuman ringan bersoda seperti \'Sprite\', dan sumber mata air ketiga mempunyai rasa mirip tuak.', 2, 'Area Gn., Japan, Kec. Dawe, Kabupaten Kudus, Jawa Tengah 59353, Indonesia', 0, '1638397576_eb3e9c64a55af6d5836c.jpg', 'src=&quot;https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.9663439991955!2d110.90053571414195!3d-6.651093766867901!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70d8207344eb37%3A0xb2e99289f210418f!2sAir%20Tiga%20Rasa%20Rejenu!5e0!3m2!1sen!2ssg!4v1638397559054!5m2!1sen!2ssg&quot;', 'Senin', 'Minggu', '00:00:00', '23:59:00'),
(28, 'Bukit Sepuser', 'Di Bukit Sepuser, pengunjung bisa menikmati pemandangan perkotaan dari atas ketinggian Gunung Muria, berfoto di spot-spot gardu pandang. Pengunjung juga bisa camping dan bermalam dengan mendirikan tenda bersama keluarga ataupun teman. Terlebih, saat malam hari dengan kabut yang mulai menyelimuti udara dan dinginnya udara malam di pegunungan membuat suasana semakin asyik.', 1, 'Colo RT 06 / RW 01, Kec. Dawe, Kabupaten Kudus, Jawa Tengah 59353, Indonesia', 7000, '1639035673_6696bd8081b4818749e2.jpg', 'src=&quot;https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.815939468131!2d110.89789671414219!3d-6.669715967056898!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70d95e37078507%3A0xa7cae76d9a2043fd!2sSepuser%20View%20and%20Camping%20Ground!5e0!3m2!1sen!2ssg!4v1638961545900!5m2!1sen!2ssg&quot;', 'Senin', 'Minggu', '00:00:00', '23:59:00'),
(29, 'Taman Ria Colo', 'Taman Ria Colo adadalah', 4, 'Jl. Pesanggrahan No.193, Colo, Kec. Dawe, Kabupaten Kudus, Jawa Tengah 59353, Indonesia', 5000, '1639035315_122d479322b663cc6329.jpg', 'src=&quot;https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4055793.624586906!2d107.60568169113934!3d-6.922134612703075!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70d78f0f487583%3A0x1eeb539cf8e4258f!2sTaman%20Ria%20Colo!5e0!3m2!1sen!2ssg!4v1638962970182!5m2!1sen!2ssg&quot;', 'Senin', 'Minggu', '08:00:00', '16:00:00'),
(30, 'Air Terjun Montel', 'Air Terjun Montel merupakan air terjun tunggal dengan memiliki tinggi sekitar 50 meter. Aliran airnya sangat jernih dan bersih, keluar diantara tebing yang menjulang tinggi. Air Terjun Montel berada di lereng Gunung Muria sehingga udara yang kamu rasakan akan sangat sejuk. Airnya jatuh ke dasar kolam yang berada dibawahnya, kolamnya tidak terlalu besar namun tetap asyik untuk digunakan sebagai arena bermain air.', 6, 'Area Hutan, Pesanggrahan Colo, Kec. Dawe, Kabupaten Kudus, Jawa Tengah 59353', 5000, '1639035199_37d45b30ba8e12ee2b96.jpg', 'src=&quot;https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.8885634413455!2d110.90244471414208!3d-6.660730566965618!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70c37149bad171%3A0x22cae2a07649e68d!2sAir%20Terjun%20Montel!5e0!3m2!1sen!2sid!4v1639035045877!5m2!1sen!2sid&quot;', 'Senin', 'Minggu', '05:00:00', '17:30:00'),
(31, 'Guyangan Camping Ground', 'Guyangan camping ground adalah camp ground yang terletak di Japan.', 1, 'Japan 01/02, Area Hutan, Japan, Kec. Dawe, Kabupaten Kudus, Jawa Tengah 59353', 5000, '1639053094_44f3ca29a0e4742adc80.jpg', 'src=&quot;https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6474.984908639093!2d110.9041084928614!3d-6.663760776075266!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70d7e2049821a1%3A0x23bcb8988e3ed63d!2sGuyangan%20Camping%20Ground%20(GCG)!5e0!3m2!1sen!2sid!4v1639036194334!5m2!1sen!2sid&quot;', 'Senin', 'Minggu', '00:00:00', '23:59:00'),
(32, 'Air Terjun Sekar Gading', 'air terjun', 6, 'Desa Japan, Kec. Dawe, Kabupaten Kudus, Jawa Tengah 59353', 5000, '1639053148_3374e86bfe5941f1f204.jpg', 'src=&quot;https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6475.01708712297!2d110.9055985438094!3d-6.6613231484420155!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70d785e3d28f43%3A0xac37a54a884b0d1b!2sAir%20Terjun%20Sekar%20Gading!5e0!3m2!1sen!2sid!4v1639036470632!5m2!1sen!2sid&quot;', 'Senin', 'Minggu', '08:00:00', '17:30:00'),
(33, 'Air Terjun Kedung Gender', 'air terjun', 6, 'Talangwesi, Dukuhwaringin, Kec. Dawe, Kabupaten Kudus, Jawa Tengah 59353', 5000, '1639053223_cf36cd5f558a4c9138dc.jpg', 'src=&quot;https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6474.796202528211!2d110.91026152677613!3d-6.678038065896304!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70d70e7c61e7bf%3A0xe190aadf56f36f8f!2sAir%20Terjun%20Kedung%20Gender!5e0!3m2!1sen!2sid!4v1639036611945!5m2!1sen!2sid&quot;', 'Senin', 'Minggu', '07:00:00', '17:30:00'),
(34, 'Air Terjun Kedung Paso', 'Air terjun ini terletak di Desa Japan, Dawe Kudus. Untuk bisa ke lokasi ini, dibutuhkan kurang lebih 50 menit perjalanan menggunakan kendaraan roda dua maupun roda empat dari pusat Kota Kabupaten Kudus.', 6, 'Japan Lor, Japan, Kec. Dawe, Kabupaten Kudus, Jawa Tengah 59353', 5000, '1639053461_d8565a345fb248023c38.jpg', 'src=&quot;https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.7967573193782!2d110.9052732141422!3d-6.672087267080998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70d77f3df7726d%3A0x11e372ae8ac9fe0c!2sAir%20Terjun%20Kedung%20Paso!5e0!3m2!1sen!2sid!4v1639053408722!5m2!1sen!2sid&quot;', 'Senin', 'Minggu', '07:00:00', '17:30:00'),
(35, 'Puncak Argopiloso', 'Puncak Argopiloso yang terletak bersampingan dengan tempat ziarah di Gunung Muria ini menjadi alternatif para pendaki yang ingin menghabiskan weekendnya. Dari tempat ziarah ini untuk mencapai basecampnya cukup turun dan mengambil arah Air Tiga Rasa Rejenu. Di sini akan kita temukan bangunan yang tidak jauh beda di Makam Sunan Muria sebagai tempat ziarah.', 6, 'Desa Japan, Kec. Dawe, Kabupaten Kudus, Jawa Tengah 59353', 5000, '1639053638_c5b07cee790c0ce46b62.jpg', 'src=&quot;https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.062072365825!2d110.89512231414182!3d-6.63921416674761!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70d8037726cef5%3A0x8b14cb954d1dd4c2!2sPuncak%20Argopiloso!5e0!3m2!1sen!2sid!4v1639053598683!5m2!1sen!2sid&quot;', 'Senin', 'Minggu', '00:00:00', '23:59:00'),
(36, 'Puncak Argojembangan', 'Puncak argojembangan terletak di Gembong', 6, 'Area Hutan, Sitiluhur, Gembong, Pati Regency, Central Java 59162', 5000, '1644889455_ed5ab0233cbd8c9ce6db.jpeg', 'src=&quot;https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15852.003987000371!2d110.91534573483885!3d-6.646795906322941!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70d72a8aa573cd%3A0x3f5214e91f033b7b!2sPuncak%20Argojembangan!5e0!3m2!1sen!2sid!4v1644889444388!5m2!1sen!2sid&quot;', 'Senin', 'Minggu', '07:00:00', '17:00:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_gambar_wisata`
--
ALTER TABLE `tb_gambar_wisata`
  ADD PRIMARY KEY (`id_gambar_wisata`),
  ADD KEY `id_nama_wisata` (`id_nama_wisata`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tb_kuliner`
--
ALTER TABLE `tb_kuliner`
  ADD PRIMARY KEY (`id_kuliner`),
  ADD KEY `toko_kuliner` (`toko_kuliner`);

--
-- Indeks untuk tabel `tb_penginapan`
--
ALTER TABLE `tb_penginapan`
  ADD PRIMARY KEY (`id_penginapan`);

--
-- Indeks untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `toko_produk` (`toko_produk`);

--
-- Indeks untuk tabel `tb_toko`
--
ALTER TABLE `tb_toko`
  ADD PRIMARY KEY (`id_toko`),
  ADD KEY `id_user_pemilik_toko` (`id_user_pemilik_toko`);

--
-- Indeks untuk tabel `tb_transportasi`
--
ALTER TABLE `tb_transportasi`
  ADD PRIMARY KEY (`id_transportasi`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `tb_wisata`
--
ALTER TABLE `tb_wisata`
  ADD PRIMARY KEY (`id_wisata`),
  ADD KEY `kategori_wisata` (`kategori_wisata`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_gambar_wisata`
--
ALTER TABLE `tb_gambar_wisata`
  MODIFY `id_gambar_wisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_kuliner`
--
ALTER TABLE `tb_kuliner`
  MODIFY `id_kuliner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_penginapan`
--
ALTER TABLE `tb_penginapan`
  MODIFY `id_penginapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_toko`
--
ALTER TABLE `tb_toko`
  MODIFY `id_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `tb_transportasi`
--
ALTER TABLE `tb_transportasi`
  MODIFY `id_transportasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT untuk tabel `tb_wisata`
--
ALTER TABLE `tb_wisata`
  MODIFY `id_wisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_gambar_wisata`
--
ALTER TABLE `tb_gambar_wisata`
  ADD CONSTRAINT `tb_gambar_wisata_ibfk_1` FOREIGN KEY (`id_nama_wisata`) REFERENCES `tb_wisata` (`id_wisata`);

--
-- Ketidakleluasaan untuk tabel `tb_kuliner`
--
ALTER TABLE `tb_kuliner`
  ADD CONSTRAINT `tb_kuliner_ibfk_1` FOREIGN KEY (`toko_kuliner`) REFERENCES `tb_user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD CONSTRAINT `tb_produk_ibfk_1` FOREIGN KEY (`toko_produk`) REFERENCES `tb_user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `tb_toko`
--
ALTER TABLE `tb_toko`
  ADD CONSTRAINT `tb_toko_ibfk_1` FOREIGN KEY (`id_user_pemilik_toko`) REFERENCES `tb_user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `tb_wisata`
--
ALTER TABLE `tb_wisata`
  ADD CONSTRAINT `tb_wisata_ibfk_1` FOREIGN KEY (`kategori_wisata`) REFERENCES `tb_kategori` (`id_kategori`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
