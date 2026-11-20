-- Database dump for db_sukamaju
-- Sukamaju House Web Profile & Management System
-- Generated for CodeIgniter 4 application

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+07:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sukamaju`
--
CREATE DATABASE IF NOT EXISTS `db_sukamaju` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_sukamaju`;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'odonmontfort', '$2y$10$BFHZ7FD24z4fs25QjpH94ub8aOrS7v2SJNE.Fh3Rr2aaTKkYS4Bzm');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_about`
--

DROP TABLE IF EXISTS `tbl_about`;
CREATE TABLE `tbl_about` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_about`
--

INSERT INTO `tbl_about` (`id`, `judul`, `deskripsi`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'Tentang Sukamaju House', 'Sukamaju House adalah sebuah usaha kuliner berkonsep cafe dan ruang komunitas yang mengusung tema vintage serta penjualan merchandise. Usaha ini resmi beroperasi pada tanggal 10 Februari 2025. Meskipun secara administrative berlokasi di Dusun Mekarsari Kecamatan kalijati Kabupaten Subang, pemilik atau owner lebih memilih nama Cafe nya yaitu Sukamaju House karena lokasi cafe yang berbatasan langsung dengan Jalan Raya Sukamaju Kecamatan Kalijati Kabupaten Subang, serta pertimbangan nama yang lebih mudah diingat (catchy) oleh pelanggan.\r\n\r\nSukamaju House dipimpin oleh satu pemilik sekaligus penanggung jawab utama, yaitu Bapak Odon Montfort.\r\n\r\nDi Cafe Sukamaju House ini, model bisnis yang dijalankan nya adalah sistem kolaboratif (multi-tenant) di mana terdapat tiga tenant usaha yang berbeda di dalam satu lokasi, yaitu:\r\n1. Tenant Minuman: Menyediakan menu Kopi dan non-kopi (dikelola oleh Owner Utama).\r\n2. Soekamakan: Menyediakan makanan ringan (snack) dan makanan cepat saji seperti mix platter dan sosis.\r\n3. Roepa Rasa: Menyediakan makanan berat yang lebih kompleks seperti Mie Bangladesh dan olahan Nasi.\r\n\r\nCafe Sukamaju House menyediakan berbagai fasilitas yang sangat memadai diantaranya, Area Nongkrong, perpustakaan mini, display penjualan merchandise (kaos dan pernak-pernik vintage), dan Wi-Fi. Cafe Sukamaju House beroperasional setiap hari dari mulai pukul 12.00 – 22.00 WIB.', '1766548887_f78b3c0589b2b3d55b7e.jpeg', '2025-02-10 10:00:00', '2025-12-24 16:21:27');

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

DROP TABLE IF EXISTS `galeri`;
CREATE TABLE `galeri` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL,
  `subjudul` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id`, `judul`, `subjudul`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'Roengan Depan', 'Njaman & Hangat', '1767147145_f5dbf9fb596d382e6d10.jpeg', '2025-12-31 09:12:25', '2025-12-31 09:12:25'),
(2, 'Djeritan Dinding Kamar', 'Antara Seni, Gengsi, dan Realita Hidoep djiwa muda', '1767147390_0f2813dbd5117588390d.jpeg', '2025-12-31 09:16:30', '2025-12-31 09:16:30'),
(3, 'Tjatatan Si Miskin jang Tetap Eksis', 'Gaja Hidoep Nomor Satoe, Bajar Kasbon Nomor Doea', '1767148021_47cf9337ec84cf277c08.jpeg', '2025-12-31 09:27:01', '2025-12-31 09:27:01'),
(4, 'Roeang Baca', 'Merakit Masa Depan di Soedoet Kamar', '1767148137_314fc1b7a7fb2ed25c52.jpeg', '2025-12-31 09:28:57', '2025-12-31 09:28:57'),
(5, 'Coffe Bar', 'Roeang Ketjil Oentoek Menjedoeh Rasa dan Menikmati Irama', '1767148311_567299b15c87cc8b0a25.jpeg', '2025-12-31 09:31:51', '2025-12-31 09:31:51'),
(6, 'Bar Makanan', 'Tempat Oentoek Mengisi Peroet jang Sedang Kerontjongan', '1767148429_a80497a6a612e71e3e9c.jpeg', '2025-12-31 09:33:49', '2025-12-31 09:33:49'),
(7, 'Open House Masoek Cafe', 'Langkah Awal Menoedjoe Roeang Penoeh Tjerita', '1767148620_c5d81133e246d763d1a7.jpeg', '2025-12-31 09:37:00', '2025-12-31 09:37:00'),
(8, 'Pesan di Ambang Pintoe', 'Menikmati Angin Sore dari Balik Djendela', '1767148705_cf75884362b7be4f44a8.jpeg', '2025-12-31 09:38:25', '2025-12-31 09:38:25'),
(9, 'Kamar Pengoempoel Kenangan', 'Merawat Masa Laloe di Tengah Kerioehan Masa Kini', '1767148818_21202194e8d83a3338cc.jpeg', '2025-12-31 09:40:18', '2025-12-31 09:40:18'),
(10, 'Kotak Gambar Hidoep', 'Saksi Bisoe Tjerita Doenia', '1767148941_5f7276d4da1f5ab43b57.jpeg', '2025-12-31 09:42:21', '2025-12-31 09:42:21'),
(11, 'Soedoet Poedjangga', 'Antara Tjermin, Piring Kembang, dan Kata Moetiara', '1767149034_668b3e90ed61a7af6d90.jpeg', '2025-12-31 09:43:54', '2025-12-31 09:43:54'),
(12, 'Medja Telepon', 'Saksi Bisoe di Depan Tjermin, Bersanding dengan Teknologi Masa Laloe', '1767149176_2ec523923f4c7a21e300.jpeg', '2025-12-31 09:46:16', '2025-12-31 09:46:16'),
(13, 'Galeri Dinding Retak', 'Seni dan Sedjarah dalam Satoe Roeangan', '1767149278_665e731dbe24ec51e9cb.jpeg', '2025-12-31 09:47:58', '2025-12-31 09:47:58'),
(14, 'Djendela Kabar Doenia', 'Antara Loekisan Soetji dan Berita Sensasi', '1767149375_da383bb99c957d38bb18.jpeg', '2025-12-31 09:49:35', '2025-12-31 09:49:35'),
(15, 'Roeang Komoenitas', 'Wadah Oentoek Mengikat Tali Persaoedaraan', '1767149499_dfe215e3de11b675055c.jpeg', '2025-12-31 09:51:39', '2025-12-31 09:51:39'),
(16, 'Roeang Diskoesi', 'Tempat Mengolah Pikir dan Menjemai Gagasan', '1767149606_59f8cbf44478208c5c1b.jpeg', '2025-12-31 09:53:26', '2025-12-31 09:53:26'),
(17, 'Sendja di Beranda', 'Kala Langit Biroe Memoeloek Bangoenan Toea', '1767149746_5293db139d6cb04fd4a4.jpg', '2025-12-31 09:55:46', '2025-12-31 09:55:46'),
(18, 'Spot Instagramable', 'Tempat Oentoek Berfoto Ria dan Dipamerkan Kepada Chalajak', '1767149926_d3990651d35569bf4184.jpg', '2025-12-31 09:58:46', '2025-12-31 09:58:46'),
(19, 'Noeansa Roemah Djadoel', 'Tempat Bertedoeh dengan Kenangan Masa Silam', '1767150051_1d1da5e7440b7a62576d.jpg', '2025-12-31 10:00:51', '2025-12-31 10:00:51'),
(20, 'Podjok Nostalgia', 'Mendjeladjahi Waktoe Lewat Lembaran Kertas', '1767150314_f44b45b9fe69f6ff85b9.jpeg', '2025-12-31 10:05:14', '2025-12-31 10:05:14'),
(21, 'Melamoen di Tepi Djendela', 'Menjesap Kesegaran Sambil Memandang Doenia Loear', '1767150380_0d5f83090a7e55925041.jpeg', '2025-12-31 10:06:20', '2025-12-31 10:06:20'),
(22, 'Tempat Noegas', 'Noegas Santai Ditemani Soeasana Klasik', '1767150484_7d43e915a248abd7997a.jpeg', '2025-12-31 10:08:04', '2025-12-31 10:08:04'),
(23, 'Soeasana Roeang Cafe', 'Kehangatan Tempo Doeloe dalam Satoe Bingkai', '1767150558_2408d2d85da29107d664.jpg', '2025-12-31 10:09:18', '2025-12-31 10:09:18');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_menu` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `nama_menu`, `deskripsi`, `harga`, `gambar`, `kategori`) VALUES
(1, 'SUKAMAJU KOPI', 'Kopi Sukamaju merupakan menu favorit dari Cafe Sukamaju House, di olah dari bahan pilihan dengan cita rasa yang khas.', 18000, '1767108700_93b2173d64e74ef57585.jpeg', 'custombeer'),
(2, 'MIX PLATTER', 'Mix platter adalah hidangan porsi besar berisi aneka camilan atau makanan ringan yang disajikan bersama-sama dalam satu piring atau nampan besar.', 25000, '1767108798_d9b13125db2eb1935f20.jpeg', 'soekamakan'),
(3, 'INDOMIE NYEMEK BANGLADESH', 'Indomie Nyemek Bangladesh adalah menu mi instan khas yang diolah dengan cita rasa gurih, pedas, dan kaya rempah.', 20000, '1767109147_d6bab425ea96134cc49b.jpg', 'roeparasa'),
(4, 'AMERICANO', 'Americano adalah minuman kopi yang dibuat dari campuran espresso dan air panas, dengan rasa kopi yang tetap kaya dan halus.', 15000, '1767109669_725bab8485ec3759a781.jpg', 'custombeer'),
(5, 'PEACHFUL AMERICANO', 'Perpaduan unik antara kopi Americano yang bold dengan sentuhan rasa peach manis-asam alami yang menyegarkan.', 18000, '1767110095_2e68a29a2f096bb1fbef.png', 'custombeer'),
(6, 'COMMUNISMO', 'Kopi Communismo adalah sajian kopi dengan karakter kuat, tegas, dan apa adanya untuk penikmat kopi sejati.', 18000, '1767110282_447513533502b81820d3.png', 'custombeer'),
(7, 'MILKPRESSO', 'Kopi Milkpresso adalah varian kopi susu klasik yang dibuat dari double shot espresso dicampur fresh milk dan susu kental manis creamy.', 18000, '1767110390_faaa160c1bc8e37940ec.jpg', 'custombeer'),
(8, 'HAZELNUT', 'Perpaduan sempurna antara kopi aromatik dan rasa kacang hazelnut yang lembut dan manis alami.', 20000, '1767110686_de35c53c33eb85323cf6.png', 'custombeer'),
(9, 'DANILLA', 'Sajian kopi memadukan karakter kopi yang lembut dengan aroma vanilla yang manis dan menenangkan.', 20000, '1767111063_601256897b4568ea48bc.jpg', 'custombeer'),
(10, 'MOCCA', 'Kopi moka populer yang memadukan espresso, cokelat pekat, dan susu panas berbusa lembut.', 20000, '1767111159_4ac161d7f585d048477e.jpeg', 'custombeer'),
(11, 'COFFEE BEER', 'Minuman bersoda klasik Indonesia yang menyegarkan, memadukan rasa kopi, karamel, dan soda (100% tanpa alkohol/halal).', 18000, '1767111260_c0394030739f9d0e8378.jpg', 'custombeer'),
(12, 'AQUATIC', 'Air mineral murni kemasan praktis dan segar.', 5000, '1767111490_20332942c8a2fece7faa.jpg', 'custombeer'),
(13, 'YAKULT STRAW', 'Minuman segar yang memadukan yakult asam segar dengan sirup stroberi manis buah asli.', 18000, '1767111633_d10cc8bddff6c2176542.jpg', 'custombeer'),
(14, 'YAKULT MELON', 'Minuman segar perpaduan asam manis yakult dengan aroma melon segar yang harum.', 18000, '1767111723_2216346f430828e55db6.jpg', 'custombeer'),
(15, 'DIMSUM AYAM', 'Dimsum kukus khas dari daging ayam pilihan kenyal dibungkus kulit tipis lembut dilengkapi saus cocol spesial.', 18000, '1767112669_7f5f09e92b72ed3d1999.jpeg', 'soekamakan'),
(16, 'BAKSO KUAH', 'Bola-bola bakso daging sapi kenyal disajikan dengan kuah kaldu rempah gurih hangat.', 17000, '1767113506_027a583f1982087c15ce.jpg', 'soekamakan'),
(17, 'NASI TELUR', 'Hidangan klasik nasi putih pulen hangat disandingkan dengan telur dadar/ceplok berbumbu gurih.', 15000, '1767131429_7dec674528ab27b441d9.png', 'soekamakan'),
(18, 'BAKSO GORENG', 'Bakso goreng garing renyah di luar, empuk dan gurih di dalam dengan bumbu tabur mantap.', 15000, '1767131529_4632bcbf9cbd6bf05efe.jpeg', 'soekamakan'),
(19, 'INDOMIE GORENG PAKISTAN', 'Mi goreng berpadu bumbu rempah kari pedas khas Pakistan dengan telur orak-arik harum.', 20000, '1767132501_f883cdca6d18f98fd129.png', 'roeparasa'),
(20, 'INDOMIE GORENG THAILAND', 'Mi goreng bumbu asam-pedas segar khas rempah Thailand yang menggugah selera.', 20000, '1767132749_ed59c2ca76005df2cbf4.png', 'roeparasa'),
(21, 'INDOMIE GORENG CHILI OIL', 'Mi kenyal bersalut racikan minyak cabai (chili oil) gurih pedas khas oriental.', 18000, '1767132880_fc69771fb85dcfd0ed56.jpg', 'roeparasa'),
(22, 'INDOMIE KUAH SUSU CHILI OIL', 'Mi kuah creamy gurih susu berpadu sensasi pedas hangat chili oil aromatik.', 20000, '1767133045_5329e465341b6119bf04.png', 'roeparasa'),
(23, 'BANANA PUDDING', 'Puding pisang lembut creamy dingin dengan taburan remah biskuit legit manis pas.', 15000, '1767133148_c9cc615a9e666b6966b2.jpg', 'roeparasa'),
(24, 'UBI BRULEE CREAMY MILK', 'Ubi manis panggang lembut disiram saus creamy milk dengan lapisan karamel brulee renyah.', 18000, '1767133366_ba4fe90c74bdebe462a6.jpeg', 'roeparasa');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pesan`
--

DROP TABLE IF EXISTS `tbl_pesan`;
CREATE TABLE `tbl_pesan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `subject` varchar(200) DEFAULT NULL,
  `pesan` text NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pesan`
--

INSERT INTO `tbl_pesan` (`id`, `nama`, `email`, `subject`, `pesan`, `created_at`) VALUES
(1, 'Pengunjung Setia', 'tamu@sukamajuhouse.com', 'Apresiasi Tempat', 'Tempatnya sangat nyaman, nuansa vintage klasik sangat terasa dan kopinya nikmat sekali!', '2026-01-01 14:20:00');

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
