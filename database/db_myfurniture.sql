-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Sep 2021 pada 09.20
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_myfurniture`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(10) NOT NULL,
  `nm_admin` varchar(20) NOT NULL,
  `username` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `nm_admin`, `username`, `email`, `password`) VALUES
(1, 'administrator', 'admin', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detail_order`
--

CREATE TABLE `tbl_detail_order` (
  `id_detail_order` int(10) NOT NULL,
  `id_order` int(10) NOT NULL,
  `id_produk` int(10) NOT NULL,
  `nm_produk` varchar(50) NOT NULL,
  `harga` int(10) NOT NULL,
  `jml_order` int(3) NOT NULL,
  `berat` int(10) NOT NULL,
  `subberat` int(10) NOT NULL,
  `subharga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_detail_order`
--

INSERT INTO `tbl_detail_order` (`id_detail_order`, `id_order`, `id_produk`, `nm_produk`, `harga`, `jml_order`, `berat`, `subberat`, `subharga`) VALUES
(40, 80, 37, 'Windmill Sofa Tidur - Oranye', 2599000, 1, 38, 38, 2599000),
(42, 82, 41, 'Ashley Baxenburg Meja Makan', 7299000, 1, 74, 74, 7299000),
(43, 83, 46, 'Timmy Bangku - Hijau', 299000, 2, 27, 54, 598000),
(44, 83, 47, 'Heinz Kursi Makan - Merah', 899000, 3, 13, 39, 2697000),
(45, 84, 46, 'Timmy Bangku - Hijau', 299000, 1, 27, 27, 299000),
(46, 85, 37, 'Windmill Sofa Tidur - Oranye', 2599000, 2, 38, 76, 5198000),
(47, 85, 47, 'Heinz Kursi Makan - Merah', 899000, 1, 13, 13, 899000),
(48, 85, 49, 'Summer Kursi Teras Panjang', 899000, 2, 12, 24, 1798000),
(49, 86, 50, 'Manolo Organizer Sepatu - Putih', 899000, 1, 26, 26, 899000),
(50, 87, 44, 'Aaron Meja Tamu Keren', 1999000, 2, 15, 30, 3998000),
(51, 88, 36, 'Ashley Harleson Sofa 2 Dudukan - Krem', 13499000, 1, 56, 56, 13499000),
(52, 88, 42, 'Eton Rak Tv Hig Stand - Putih', 3599000, 1, 51, 51, 3599000),
(53, 89, 36, 'Ashley Harleson Sofa 2 Dudukan - Krem', 13499000, 3, 56, 168, 40497000),
(54, 90, 36, 'Ashley Harleson Sofa 2 Dudukan - Krem', 13499000, 5, 56, 280, 67495000),
(55, 91, 42, 'Eton Rak Tv Hig Stand - Putih', 3599000, 1, 51, 51, 3599000),
(56, 91, 48, 'Muggle Bangku - Cokelat Muda', 899000, 2, 6, 12, 1798000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kat_pos`
--

CREATE TABLE `tbl_kat_pos` (
  `id_kategori` int(10) NOT NULL,
  `nm_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kat_pos`
--

INSERT INTO `tbl_kat_pos` (`id_kategori`, `nm_kategori`) VALUES
(6, 'Dekorasi Apartemen'),
(7, 'Desain Dapur'),
(8, 'Desain Kamar Mandi'),
(9, 'Desain Kamar Tidur'),
(10, 'Desain Ruang Tamu'),
(11, 'Design Ruang Makan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kat_produk`
--

CREATE TABLE `tbl_kat_produk` (
  `id_kategori` int(10) NOT NULL,
  `nm_kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kat_produk`
--

INSERT INTO `tbl_kat_produk` (`id_kategori`, `nm_kategori`) VALUES
(1, 'Kursi'),
(2, 'Meja'),
(3, 'Lemari'),
(11, 'Sofa'),
(12, 'Tempat Tidur'),
(13, 'Rak Penyimpanan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id_order` int(10) NOT NULL,
  `id_pelanggan` int(10) NOT NULL,
  `nm_penerima` varchar(30) NOT NULL DEFAULT '',
  `telp` varchar(13) NOT NULL,
  `provinsi` varchar(30) NOT NULL,
  `kota` varchar(30) NOT NULL,
  `kode_pos` int(10) NOT NULL,
  `alamat_pengiriman` varchar(50) NOT NULL,
  `tgl_order` date NOT NULL,
  `ongkir` int(10) NOT NULL,
  `total_order` int(10) NOT NULL,
  `status` varchar(30) DEFAULT 'Belum Dibayar',
  `no_resi` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_order`
--

INSERT INTO `tbl_order` (`id_order`, `id_pelanggan`, `nm_penerima`, `telp`, `provinsi`, `kota`, `kode_pos`, `alamat_pengiriman`, `tgl_order`, `ongkir`, `total_order`, `status`, `no_resi`) VALUES
(80, 1, 'jjjkk', '9898989898', '18', '458', 88787, 'kklklkl', '2019-12-27', 0, 3161500, 'Menyiapkan Produk', ''),
(82, 1, 'Terbaru', '88787878787', '14', '296', 787878, 'kjkjkjkjkj', '2019-12-27', 1125000, 8424000, 'Produk Diterima', '55454dgdgdg'),
(83, 1, 'Jack Ber', '997997979', '14', '221', 87878, 'hjhjhjhjhj', '2019-12-27', 1100000, 4395000, 'Produk Dikirim', 'A65AS6AS6SA7A'),
(84, 1, 'jkj', '87878787878', '15', '215', 87878, 'hjsdsd', '2019-12-27', 950000, 1249000, 'Sudah Dibayar', NULL),
(85, 1, 'Arif', '081225789373', '10', '249', 76253, 'Jalan Suka Aku', '2019-12-30', 400000, 8295000, 'Belum Dibayar', NULL),
(86, 4, 'Bintang Reny', '082255305424', '14', '205', 74114, 'Jl.Pakanegara Gg.Ramania', '2020-01-08', 1000000, 1899000, 'Belum Dibayar', NULL),
(87, 5, 'Rizal Wijoyo', '85652385926', '5', '419', 78212, 'Jl.Turi 6. NO 153', '2020-01-08', 250000, 4248000, 'Sudah Dibayar', NULL),
(88, 1, '1222221212', '08754323332', '5', '39', 55792, '121341414', '2020-01-10', 250000, 17348000, 'Sudah Dibayar', NULL),
(89, 7, 'Wisnu Nugroho Aji', '0817779996858', '5', '501', 55223, 'Terban', '2020-01-11', 250000, 40747000, 'Belum Dibayar', NULL),
(90, 1, 'Arief Gilang', '0812266537363', '10', '196', 57474, 'Jl Suka saya', '2020-01-11', 450000, 67945000, 'Produk Diterima', 'A65AS6AS6SA7A'),
(91, 7, 'Wisnu Nugroho Aji', '087846915184', '2', '56', 12223, 'Situ', '2020-01-11', 600000, 5997000, 'Belum Dibayar', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pelanggan`
--

CREATE TABLE `tbl_pelanggan` (
  `id_pelanggan` int(10) NOT NULL,
  `nm_pelanggan` varchar(30) NOT NULL,
  `username` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pelanggan`
--

INSERT INTO `tbl_pelanggan` (`id_pelanggan`, `nm_pelanggan`, `username`, `email`, `password`) VALUES
(1, 'Arif Nur R', 'arifnur', 'arif@gmail.com', '123'),
(2, 'Arief Gilang', 'ariefgilan', 'arief@gmail.com', '123'),
(4, ' Bintang Reny', 'Bintang', 'Bintangre10@gmail.com', 'Kepo56789_'),
(5, ' Rizal Wijoyo', 'Rizal', 'Wijal16@gmail.com', 'Kambing123'),
(6, ' aris Juliyanto', 'aris', 'aris@gmail.com', '12345'),
(7, ' Wisnu', 'Ajik', 'wisnu@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pembayaran`
--

CREATE TABLE `tbl_pembayaran` (
  `id_pembayaran` int(10) NOT NULL,
  `id_order` int(10) NOT NULL,
  `nm_pembayar` varchar(30) NOT NULL,
  `nm_bank` varchar(20) NOT NULL,
  `jml_pembayaran` int(10) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `bukti_transfer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pembayaran`
--

INSERT INTO `tbl_pembayaran` (`id_pembayaran`, `id_order`, `nm_pembayar`, `nm_bank`, `jml_pembayaran`, `tgl_bayar`, `bukti_transfer`) VALUES
(7, 80, 'Jack Berwin', 'Mandiri', 889778888, '2019-12-27', '7.jpeg'),
(8, 82, 'JAck Berwin', 'MANDIRI', 789977667, '2019-12-27', 'sky.jpg'),
(9, 83, 'JackBer', 'BCA', 2147483647, '2019-12-27', '10.jpg'),
(10, 87, 'Rizal Wijoyo', 'Bank Bersama', 4248000, '2020-01-08', 'userphoto.png'),
(11, 84, '', '', 0, '2020-01-10', '9.jpg'),
(12, 88, '1212', '1212', 17348000, '2020-01-10', '5.jpg'),
(13, 90, 'Arief Gilang', 'BRI', 67945000, '2020-01-11', '8.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pos`
--

CREATE TABLE `tbl_pos` (
  `id_pos` int(10) NOT NULL,
  `id_kategori` int(10) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` longtext NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pos`
--

INSERT INTO `tbl_pos` (`id_pos`, `id_kategori`, `judul`, `isi`, `gambar`, `tgl`) VALUES
(16, 6, 'Ruang Tamu Apartemen Bohemian Minimalis', '<p>Penggunaan kayu sebagai material dan warna lantai dapat menjadi pilihan untuk ruang tamu apartemen bergaya bohemian minimallis. Kehadiran sofa polos berwarna abu-abu, hijau, atau coklat juga merupakan pilihan yang tepat.</p>\r\n<p>Gunakan warna putih atau warna netral untuk bagian dinding, atau gunakan wallpaper atau kain motif yang dibentangkan pada salah satu bagiannya. Aksen boho yang khas sudah bisa Anda dapatkan di ruang tamu apartemen mungil Anda.</p>\r\n<p>Hadirkan juga karpet dan sofa bantal yang memiliki motif dan pola unik serta warna yang beragam. Tanaman juga bisa ditambahkan sebagai elemen dekoratif alami yang memberikan kesan sejuk dan segar.</p>\r\n<p>sumber : https://interiordesign.id/apartemen-bohemian-minimalis/</p>', '1.jpg', '2019-12-09'),
(17, 6, 'Mengenal Gaya Bohemian', '<p>Bohemian, atau yang akrab disebut boho, adalah gaya yang mencerminkan kepribadian yang bebas, dengan penggunaan banyak pola, warna dan juga motif.</p>\r\n<p>Beragam motif dan pola pada gaya ini sengaja dikombinasikan agar tampak saling menabrak satu sama lain, acak, dan tidak beraturan.</p>\r\n<p>sumber : https://interiordesign.id/apartemen-bohemian-minimalis/</p>', '2.jpg', '2019-12-10'),
(18, 6, 'Desain Apartemen Studio Gaya Skandinavian', '<p>Skandinavian adalah jurus yang tepat mengubah tampilan rumah maupun apartemen menjadi cantik, luas, dan fungsional, dengan kenyamanan ekstra. Anda bisa menggunakan coba gaya interior ala Nordic ini untuk mendapatkan kesan simpel dan mewah sekaligus.</p>\r\n<p>Cukup hadirkan dinding dengan warna cat putih yang dominan, serta penggunaan furniture dengan model yang khas dan desain yang compact, apartemen kecil Anda bisa terlihat lebih minimalis, simpel, dan tidak kehilangan gaya. Pencahayaan juga merupakan salah satu elemen kunci dalam interior skandinavia. Pencahayaan yang sesuai mampu melahirkan kesan luas dan nyaman ke dalam ruangan kecil.</p>\r\n<p>Install pencahayaan terbaik di apartemen studio Anda. Dengan penchayaan yng tepat, apartemen studio bakalan terasa luas, bersih, dan nyaman.</p>\r\n<p>sumber : https://interiordesign.id/ide-desain-apartemen-studio/</p>', '3.jpg', '2019-12-11'),
(19, 7, 'Gaya Desain Untuk Dapur Khas Eropa ', '<p>Desain mediterania terkenal sebagai gaya desain khas Eropa. Pengaruh gaya ini bisa terlihat dan sangat tipikal digunakan sebagai pilihan gaya desain rumah-rumah di Eropa, khususnya Italia, Yunani dan Spanyol.</p>\r\n<p>Gaya interior Mediterania ini banyak memasukan unsur-unsur alam yang menjadi karakter dan ciri khasnya. Ia banyak bermain dengan pola warna. Mediterania sangat cocok untuk menampilkan ruangan yang sederhana namun mampu memperlihatkan kesan mewah.</p>\r\n<p>Tidak hanya itu, gaya mediterania juga sangat cocok untuk Negara Indonesia yang beriklim tropis. Sentuhan natural dan dominasi material kayu, mampu merefleksikan kekhasan alam khas pantai Eropa selatan. Konsep desain yang berhasil membawa kenyamanan dan cita rasa unik pada rancangan sebuah ruang.</p>\r\n<p>Selain pure-mediterania, terdapat juga konsep desain mod-mediterania. Ia adalah gaya desain interior modern-mediterania.</p>\r\n<p>Ini merupakan gaya desain eklektik yang memadukan unsur modern dengan tradisional khas Mediterania. Tampilan ruang yang kaya warna, simpel, elegan dan mengedepankan kenyamanan.</p>\r\n<p>sumber : https://interiordesign.id/desain-dapur-gaya-mediterania/</p>', '4.jpg', '2019-12-12'),
(20, 7, 'Inspirasi Desain mediterania Untuk Dapur', '<p>Desain mediterania terkenal sebagai gaya desain khas Eropa. Pengaruh gaya ini bisa terlihat dan sangat tipikal digunakan sebagai pilihan gaya desain rumah-rumah di Eropa, khususnya Italia, Yunani dan Spanyol.</p>\r\n<p>Gaya interior Mediterania ini banyak memasukan unsur-unsur alam yang menjadi karakter dan ciri khasnya. Ia banyak bermain dengan pola warna. Mediterania sangat cocok untuk menampilkan ruangan yang sederhana namun mampu memperlihatkan kesan mewah.</p>\r\n<p>Tidak hanya itu, gaya mediterania juga sangat cocok untuk Negara Indonesia yang beriklim tropis. Sentuhan natural dan dominasi material kayu, mampu merefleksikan kekhasan alam khas pantai Eropa selatan. Konsep desain yang berhasil membawa kenyamanan dan cita rasa unik pada rancangan sebuah ruang.</p>\r\n<p>Selain pure-mediterania, terdapat juga konsep desain mod-mediterania. Ia adalah gaya desain interior modern-mediterania.</p>\r\n<p>Ini merupakan gaya desain eklektik yang memadukan unsur modern dengan tradisional khas Mediterania. Tampilan ruang yang kaya warna, simpel, elegan dan mengedepankan kenyamanan.</p>\r\n<p>sumber : https://interiordesign.id/desain-dapur-gaya-mediterania/</p>', '5.jpg', '2019-12-13'),
(21, 7, 'Desain dapur dinding batu gaya Rustic', '<p>Kombinasi kayu dan sedikit ornamen besi menjadikan gaya desain rustic mampu menampilkan kesan hangat. Langit-langit yang terekspose memberikan ruang lapang untuk keperluan sirkulasi udara yang sangat penting saat merancang ruang dapur. Sirkulasi ini melahirkan suasana hangat dan jauh dari kesan pengap.</p>\r\n<p>sumber : https://interiordesign.id/desain-dapur-dinding-batu-yang-hangat-nyaman/</p>\r\n<p>&nbsp;</p>', '6.jpg', '2019-12-14'),
(22, 7, 'Desain dapur dinding batu gaya modern', '<p>Pilihan warna netral juga cocok dikombinasikan dengan dinding batu. Kesan elegan terpancar ketika memasuki runag dapur anda. Apalagi dengan konsep lantai terbuka rumah atau apartemen kecil seperti tampak pada gambar. Benar-benar desain ruang yang sangat liveable.</p>\r\n<p>sumber : https://interiordesign.id/desain-dapur-dinding-batu-yang-hangat-nyaman/</p>', '7.jpg', '2019-12-15'),
(23, 8, 'Tata Ruang Kamar Mandi Gaya Rustic', '<p>Seperti sama-sama kita ketahui, gaya desain rustic adalah perumpamaan tata ruang yang identik dengan suasana pedesaan. Suasana natural bin alami yang di kedepankannya, ditandai dengan penggunaan material kayu yang dominan.</p>\r\n<p>Tata ruang kamar mandi gaya rustic sangat cocok digunakan jika konsep desain interior rumah Anda juga menerapkan gagasan desain ini.</p>\r\n<p>Konsep interior rustic menampilkan suasana alami dan menyenangkan.</p>\r\n<p>sumber : https://interiordesign.id/5-model-tata-ruang-kamar-mandi-berdasarkan-konsep-desain-interior/</p>\r\n<p>&nbsp;</p>', '8.jpg', '2019-12-16'),
(24, 8, 'Tata Ruang Kamar Mandi Gaya Eklektik', '<p>Dalam desain interior, eklektik merupakan perpaduan dari dua atau lebih konsep interior. Gaya ini menawarkan fleksibilitas dan keluwesan dalam menerapkan berbagai gagasan dekorasi.</p>\r\n<p>Tidak terkecuali pada area kamar mandi, gaya eklektik menjamin memberikan kemudahan dan suasana yang tidak kaku pada ruangan kecil ini.</p>\r\n<p>Dengan model tata ruang seperti ini, dekorasi dan penataan kamar mandi bisa disesuaikan dengan suasana yang ingin dihadirkan. Mulai dari furniture, pemilihan warna, hingga gaya dekorasi yang menjadi selera Anda.</p>\r\n<p>sumber : https://interiordesign.id/5-model-tata-ruang-kamar-mandi-berdasarkan-konsep-desain-interior/</p>', '9.jpg', '2019-12-17'),
(25, 8, 'Tata Ruang Kamar Mandi Minimalis Modern', '<p>Ini adalah tata ruang kamar mandi yang paling populer dan paling banyak digunakan saat sekarang. Gaya ini dianggap paling mewakili gaya hidup modern yang simpel, sederhana, luwes, dan serba instan.</p>\r\n<p>Desain kamar mandi seperti ini tentu menawarkan ketenangan dan layout interior yang tidak neko-neko, dengan pengutamaan pada fungsi, efektivitas, serta efisiensi, baik dekorasi secara keseluruhan maupun juga pada penggunaan furniture yang digunakan.</p>\r\n<p>sumber : https://interiordesign.id/5-model-tata-ruang-kamar-mandi-berdasarkan-konsep-desain-interior/</p>', '10.jpg', '2019-12-18'),
(26, 9, 'Room Divider Kaca Berbingkai Besi', '<p>Room divider dari kaca berbingkai besi hitam yang tampak seperti dalam gambar, bisa menjadi pilihan menarik untuk mendapatkan area kamar tidur dengan privasi yang cukup terjaga.</p>\r\n<p>Selain sanggup mengurangi kebisingan yang dibutuhkan untuk kenyamanan saat Anda tidur, model pemisah ruangan dari kaca berbingkai besi ini juga menampilkan visualisasi interior gaya industrial yang cukup unik.</p>\r\n<p>sumber : https://interiordesign.id/5-desain-cara-kreatif-bagaimana-memisahkan-area-kamar-tidur-dengan-area-lain-pada-ruangan-open-space/</p>', '11.jpg', '2019-12-20'),
(27, 9, 'Room Divider dari Tirai atau Gorden', '<p>Memberikan batasan area tidur menggunakan tirai atau gorden mungkin tidak membuat ruang menjadi kedap suara. Namun, konsep pembatas dengan menggunakan tirai atau gorden ini, merupakan alternatif paling mudah, murah, serta cukup praktis.</p>\r\n<p>sumber : https://interiordesign.id/5-desain-cara-kreatif-bagaimana-memisahkan-area-kamar-tidur-dengan-area-lain-pada-ruangan-open-space/</p>', '12.jpg', '2019-12-21'),
(28, 9, 'Inspirasi Kamar Tidur Dengan Cat Berwarna Cokelat', '<p>Warna klasik ini tidak saja mampu melahirkan kesan sederhana dan nyaman, tetapi juga romantis.</p>\r\n<p>Warna coklat yang hangat sangat cocok untuk menampilkan suasana yang romantis. Dan jika anda menginginkan tampilan kamar terasa lebih dramatis, warna dark brown atau cokelat tua bisa jadi pilihan.</p>\r\n<p>Namun, karena karakternya yang gelap, ketimbang mewarnai seluruh bagian dinding kamar dengan cokelat tua, sebaiknya gunakan warna ini hanya sebagai aksen saja. Sementara untuk warna utamanya, anda bisa mencoba warna putih atau abu-abu, atau warna-warna netral lainnya.</p>\r\n<p>sumber : https://interiordesign.id/ide-warna-cat-kamar-tidur-romantis/</p>', '13.jpg', '2019-12-22'),
(29, 9, 'Desain Kamar Tidur Artistik', '<p>Bagi para pecinta seni, menunjukkan kepribadian dalam kamar tidur adalah bagian dari kreativitas. Penampilan kamar tidur yang unik dan nyeni adalah pilihan yang tepat. Desain kamar tidur dengan berbagai perabotan dan aksesori &ldquo;do-it-Yourself&rdquo; membuktikan hal tersebut. Memanfaatkan barang tidak terpakai, gunakan kembali dan jadikan sesuatu yang pantas digunakan di kamar tidur Anda.</p>\r\n<p>sumber : https://interiordesign.id/tip-desain-kamar-tidur/</p>', '14.jpg', '2019-12-23'),
(30, 9, 'Desain Kamar Tidur Feminin', '<p>Feminin tidak selalu didominasi oleh aneka deretan barang dan dekorasi berwarna merah muda. Terutama bagi Anda yang tidak terlalu menyukai warna merah muda, Anda bisa mengkreasikan kamar feminin dengan sentuhan yang sedikit berbeda.</p>\r\n<p>Nuansa feminin tetap dapat ditampilkan dengan memadukan furnitur minimalis kayu, sprei berwarna putih, sarung bantal berwarna coklat yang juga mampu mewakili kesan feminin</p>\r\n<p>sumber : https://interiordesign.id/tip-desain-kamar-tidur/</p>', '15.jpg', '2019-12-24'),
(31, 10, 'Desain Ruang yang Mewah dan Elegan', '<p>Apa yang membuat ruang tamu gaya Mediterania terlihat begitu mewah dan elegan? Tetapi sekaligus memiliki penampilan yang sangat berbeda dengan desain klasik?</p>\r\n<p>Gaya Mediterania mungkin bukan desain yang murah dan terjangkau. Unsur desain dan elemen dekoratif ruang yang digunakan merupakan campuran elemen-elemen vintage dengan material kualitas tinggi yang cukup mahal.</p>\r\n<p>Gaya desain ini memanfaatkan penggunaan kayu berkualitas tinggi dan menggabungkannya dengan banyak furniture dan dekorasi, serta dinding yang selaras dalam skema warna. Ia melahirkan penampilan ruang yang terlihat sangat berkelas.</p>\r\n<p>sumber : https://interiordesign.id/desain-ruang-tamu-gaya-mediterania/</p>', '16.jpg', '2019-12-26'),
(32, 10, 'Ruang Tamu Lesehan ala Jepang Tradisional', '<p>Jika Anda sangat menginginkan gaya Jepang yang dominan dan kentara, konsep Jepang tradisional bisa jadi pilihan.</p>\r\n<p>Namun, meski tradisional, ia tetap bisa selaras dan terlihat kontemporer dengan pemilihan dan penggunaan elemen desain yang sesuai dan seimbang.</p>\r\n<p>sumber : https://interiordesign.id/ruang-tamu-lesehan-ala-jepang/</p>', '17.jpg', '2019-12-27'),
(33, 10, 'Desain Ruang Tamu Gaya Varsity Park', '<p>Desain ruang tamu yang terletak di pojok ruangan adalah contoh sempurna bagaimana implementasi gagasan untuk sebuah ruang yang memiliki ukuran kecil. Memadukan warna menjadi sesuatu yang sangat signifikan daam mengubah suasana ruang tamu seperti ini. Ungu, krem, dan putih mampu menciptakan suasana yang nyaman, atau anda bisa tentukan sendiri paduan warna yang menjadi kegemaran anda.</p>\r\n<p>sumber : https://interiordesign.id/7-desain-ruang-tamu-yang-akan-membuat-para-tamu-anda-enggan-pulang/</p>', '18.jpg', '2019-12-28'),
(34, 11, 'Konsep Desain Informal Untuk Ruang Makan', '<p>Ketika orang-orang lebih menyukai kenyamanan dibanding formalitas, desain ruang makan terbuka menjadi pilihan paling logis. Ruang makan tanpa sekat dan menyatu dengan ruangan lainnya ini dianggap sebagai sebuah gagasan desain yang jauh dari suasana kaku dan formal.</p>\r\n<p>Ruang makan formal yang menawarkan kehangatan dan keseriusan saat aktivitas makan bersama, memang sudah tidak mungkin didapatkan dengan mudah. Meski menawarkan suasana ruang yang ekslusif, menikmati sajian tanpa distraksi apapun, klaim besar sebagai sumber kebahagiaan yang bisa meningkatkan family bonding, konsep desain ruang makan yang terpisah merupakan investasi yang sangat mahal.</p>\r\n<p>Saatnya mengubah mindset dan bahkan kultur. Di saat semua orang lebih menginginkan suasana santai, informal, dan lebih mementingkan kenyamanan, ruang makan terbuka yang dirancang dengan kesederhanaan dan jauh dari kesan ekslusif, merupakan pilihan tepat.</p>\r\n<p>sumber : https://interiordesign.id/desain-ruang-makan-terbuka/</p>\r\n<p>&nbsp;</p>', '19.jpg', '2019-12-29'),
(35, 11, 'Ruang Makan Kecil Gaya Eklektik', '<p>Untuk mencapai tampilan atau visualisasi gaya bohemian dengan mudah dan efisien, cobalah gunakan kursi dengan berbagai varian warna, bahan, bentuk dan juga model. Kombinasi tersebut akan mendatangkan sesuatu yang terlihat sangat unik dan anti mainstream.</p>\r\n<p>Penggunaan kursi kayu tua juga dapat menjadi alternatif yang baik. Pemakaian warna-warna yang cenderung terang alias ngejreng, seperti warna kuning, merah, biru, pink atau hijau, adalah ciri lain interior bohemian.</p>\r\n<p>Gaya interior bohemian memperbolehkan kombinasi. Hal ini bertujuan untuk menampilkan kesan dan cita rasa eklektik pada interior ruangan. Selain itu, gaya desain interior ini juga memiliki kecenderungan membawa warna dalam dosis dan kadar yang beragam. Gaya eklektik yang memungkinkan penerapan beragam elemen desain yang bisa memperlihatkan penampilan yang ruang tampak semakin unik serta berbeda.</p>\r\n<p>sumber : https://interiordesign.id/desain-ruang-makan-kecil-gaya-bohemian/</p>\r\n<p>&nbsp;</p>', '20.jpg', '2019-12-29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `id_produk` int(10) NOT NULL,
  `id_kategori` int(10) NOT NULL,
  `nm_produk` varchar(50) NOT NULL,
  `berat` int(10) NOT NULL,
  `harga` int(10) NOT NULL,
  `stok` int(3) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_produk`
--

INSERT INTO `tbl_produk` (`id_produk`, `id_kategori`, `nm_produk`, `berat`, `harga`, `stok`, `gambar`, `deskripsi`) VALUES
(36, 11, 'Ashley Harleson Sofa 2 Dudukan - Krem', 56, 13499000, 11, '1.jpg', '<ul>\r\n<li style=\"text-align: left;\">Desain klasik</li>\r\n<li style=\"text-align: left;\">Kualitas bantalan yang empuk dan nyaman</li>\r\n<li style=\"text-align: left;\">Rangka kuat dan kokoh</li>\r\n<li style=\"text-align: left;\">Material : fabric, kayu</li>\r\n<li style=\"text-align: left;\">Finishing : fabric</li>\r\n<li style=\"text-align: left;\">Dimensi produk : 185 x 104 x 101 cm</li>\r\n</ul>\r\n<p>Optimalkan waktu santai atau istirahat Anda di rumah dengan Harleson Sofa dari Ashley. Sofa ini terbuat dari material berkualitas yang kuat dan kokoh. Dilengkapi kualitas bantalan duduk yang empuk, nyaman dan tahan lama. Memiliki desain klasik, cocok dipadukan dengan ragam tema dekorasi pada ruang keluarga atau ruang tamu Anda.</p>'),
(37, 11, 'Windmill Sofa Tidur - Oranye', 38, 2599000, 21, '2.jpg', '<ul>\r\n<li>Fungsional, sebagai sofa dan tempat tidur</li>\r\n<li>Desain modern minimalis</li>\r\n<li>Dimensi sofa : 185 x 91 x 89 cm</li>\r\n<li>Dimensi tempat tidur : 185 x 116 x 41 cm</li>\r\n<li>Material : fabric, busa, kayu</li>\r\n<li>Tidak termasuk bantal sofa</li>\r\n</ul>\r\n<p>Windmill Sofa Tidur menawarkan cara terbaik untuk menikmati waktu santai Anda. Sofa bergaya modern ini hadir dengan bentuk fungsional, dimana sofa bisa diubah menjadi tempat tidur. Cara mengubahnya pun mudah, cukup rebahkan bagian sandara sofa untuk mendapatkan bentuk single bed. Windmill Sofa dibuat menggunakan material berkualitas dengan tingkat kepadatan busa yang optimal agar mampu memberikan rasa nyaman bagi Anda. Rangka sofa pun memiliki konstruksi kokoh agar tahan lama digunakan. Dapatkan segera produk ini dengan penawaran spesial dari Ruparupa.</p>'),
(39, 11, 'Dixie Sofa Tidur Leaf Motif', 26, 2499000, 26, '4.jpg', '<ul>\r\n<li>Fungsional, sebagai sofa dan tempat tidur</li>\r\n<li>Dimensi sofa : 140 x 85 x 86 cm</li>\r\n<li>Material : fabric</li>\r\n<li>Finishing : metal</li>\r\n</ul>\r\n<p>Dengan Dixie Sofa Tidur, Anda bisa memiliki kenyamanan optimal di ruangan berkapasitas tidak terlalu luas. Selain sebagai tempat duduk, sofa ini bisa digunakan sebagai tempat tidur. Cukup rebahkan bagian penopang lengan untuk mengubah sofa duduk menjadi single bed.</p>'),
(40, 2, 'Hedvin Meja Makan - Hitam Silver', 47, 2599000, 18, '5.jpg', '<ul>\r\n<li>Dimensi produk : 135 x 80 x 75 cm</li>\r\n<li>Material : metal, kaca tempered, MDF</li>\r\n<li>Finishing : kaca tempered, painting</li>\r\n<li>Bentuk Table Top Meja Ruang Makan : persegi panjang</li>\r\n<li>Meja Ruang Makan Dapat Dilipat : tidak</li>\r\n<li>Meja Ruang Makan Extendable : tidak</li>\r\n</ul>\r\n<p>Penuhi kebutuhan ruang makan di rumah dengan Meja Makan Hedvin dari Informa. Meja makan ini memiliki desain modern minimalis dengan nuansa warna hitam yang elegan. Padukan meja dengan kursi makan bernuansa senada untuk melengkapi kenyamanan di waktu santap Anda.</p>'),
(41, 2, 'Ashley Baxenburg Meja Makan', 74, 7299000, 19, '6.jpg', '<ul>\r\n<li>Desain klasik</li>\r\n<li>Konstruksi kuat dan simetris</li>\r\n<li>Dimensi produk : 77 x 228 x 112 cm</li>\r\n<li>Material : kayu, veneer</li>\r\n<li>Tinggi Kaki Meja Ruang Makan : 112</li>\r\n<li>Bentuk Table Top Meja Ruang Makan : persegi panjang</li>\r\n<li>Unit/Part : unit</li>\r\n<li>Meja Ruang Makan Dapat Dilipat : tidak</li>\r\n<li>Meja Ruang Makan Extendable : tidak</li>\r\n</ul>\r\n<p>Momen santap bersama keluarga menjadi lebih spesial dengan Baxenburg Meja Makan dari Ashley. Terbuat dari kayu berkualitas dengan finishing veneer, melalui proses pembuatan yang detail agar menghasilkan meja dengan konstruksi kuat. Padukan meja dengan kursi makan bergaya senada untuk melengkapi kenyamanan ruang makan. Segera dapatkan produk ini dengan rangkaian penawaran menarik di Ruparupa.</p>'),
(42, 2, 'Eton Rak Tv Hig Stand - Putih', 51, 3599000, 19, '7.jpg', '<ul>\r\n<li>Untuk TV ukuran maksimum 60 inci</li>\r\n<li>Dilengkapi laci penyimpanan</li>\r\n<li>Material : particle board, MDF</li>\r\n<li>Finishing : lacquered</li>\r\n<li>Dimensi produk : 160 x 40 x 80 cm</li>\r\n</ul>\r\n<p>Gunakan Eton Rak TV untuk kelengkapan furnitur Anda pada ruang tamu atau ruang keluarga. Rak TV ini dilengkapi dengan berbagai laci penyimpanan yang dapat Anda gunakan untuk menyimpan perlengkapan hiburan lainnya seperti DVD player, game konsol atau berbagai barang lainnya. Memiliki desain minimalis untuk tampilan ruangan Anda yang lebih menarik.</p>'),
(43, 2, 'Selina Meja Tamu Dilengkapi Rak', 35, 2999000, 17, '8.jpg', '<ul>\r\n<li>Dilengkapi rak</li>\r\n<li>Dimensi produk : 120 x 70 x 36.2 cm</li>\r\n<li>Material : particle board</li>\r\n<li>Finishing : melamine</li>\r\n</ul>\r\n<p>Kehadiran meja di ruang tamu bisa menambah nilai estetika untuk gaya ruangan. Jika Anda mengusung konsep interior modern, Selina Meja Tamu bisa menjadi pelengkap yang tepat. Desain unik, dengan rak terbuka di bagian bawah meja membawa nuansa baru untuk ruang tamu. Dengan adanya meja tamu, Anda juga bisa dengan mudah menyajikan hidangan bagi tamu yang berkunjung. Segera dapatkan produk ini dengan penawaran spesial dari Ruparupa.</p>'),
(44, 2, 'Aaron Meja Tamu Keren', 15, 1999000, 15, '9.jpg', '<ul>\r\n<li>Dimensi produk : 42.5 x 78.1 x 80 cm</li>\r\n<li>Material : metal, kayu</li>\r\n<li>Finishing : powder coating</li>\r\n</ul>\r\n<p>Keberadaan meja di ruang tamu bisa menjadikan segalanya lebih praktis, seperti untuk menaruh hidangan bagi tamu, memajang ornamen ataupun menaruh perlengkapan. Untuk itu, tidak ada salahnya melengkapi ruangan di rumah dengan Aaron Meja Tamu. Terbuat dari material metal dan kayu berkualitas, dengan rangka yang stabil dan kokoh.</p>'),
(45, 1, 'Melinda Bangku Bar - Merah Glossy', 12, 459000, 24, '10.jpg', '<ul>\r\n<li>Dimensi produk : 44 x 41 x 67 - 90 cm</li>\r\n<li>Material : ABS Metal</li>\r\n<li>Cocok untuk di bar atau cafe</li>\r\n</ul>\r\n<p>Melinda 2 Bangku Bar - Merah Glossy merupakan bangku bergaya modern untuk kafe atau bar. Bangku ini terbuat dari bahan berkualitas, dengan lapisan khrom yang elegan. Bagian dasar bangku berbentuk lingkaran sehingga dapat menopang bangku dengan kuat dan stabil. Dengan tuas di bagian bawah dudukan, Anda dapat mengatur ketinggian dudukan sesuai keinginan. Terdapat juga pijakan logam untuk tempat menopang kaki saat duduk, sehingga Anda dapat duduk dengan nyaman.</p>'),
(46, 1, 'Timmy Bangku - Hijau', 27, 299000, 13, '11.jpg', '<ul>\r\n<li>Modern minimalis</li>\r\n<li>Dimensi produk : 32 x 32 x 46 cm</li>\r\n<li>Material : metal, PVC</li>\r\n<li>Finishing : powder coating</li>\r\n</ul>\r\n<p>Bangku merupakan salah satu alternatif tempat duduk yang sering digunakan di berbagai kesempatan. Selain bentuknya yang minimalis, bangku juga cenderung lebih ringan untuk dipindahkan. Dengan Timmy Bangku, duduk pun semakin nyaman kapan pun dan dimana pun. Bangku bergaya modern ini terbuat dari material berkualitas dengan konstruksi kokoh. Cocok digunakan di rumah, perkantoran hingga kafe. Segera dapatkan produk ini dengan rangkaian penawaran spesial dari Ruparupa.</p>'),
(47, 1, 'Heinz Kursi Makan - Merah', 13, 899000, 13, '12.jpg', '<ul>\r\n<li>Desain scandinavian</li>\r\n<li>Dimensi produk : 54 x 60 x 81.5 cm</li>\r\n<li>Material : fabric, metal</li>\r\n<li>Finishing : fabric, paint</li>\r\n</ul>\r\n<p>Waktu makan menjadi salah satu momen akrab bagi keluarga. Jadikan momen tersebut lebih menyenangkan dan nyaman dengan Heinz Kursi Makan. Dudukan kursi berlapis fabric yang lembut, dengan kaki kursi yang kuat menopang. Heinz Kursi Makan hadir dengan desain scandinavian dengan nuansa warna merah.</p>'),
(48, 1, 'Muggle Bangku - Cokelat Muda', 6, 899000, 11, '13.jpg', '<ul>\r\n<li>Desain modern</li>\r\n<li>Dimensi produk : 40 x 40 x 41 cm</li>\r\n<li>Material : metal, polyurethane</li>\r\n<li>Finishing : powder coating</li>\r\n</ul>\r\n<p>Berkualitas, kuat dan nyaman digunakan, Muggle Bangku dapat menjadi pilihan ideal untuk ruang tamu, ruang tunggu, ruang kerja hingga kafe. Bangku dengan desain minimalis ini terbuat dari material berkualitas dengan konstruksi yang kokoh dan stabil. Dapatkan segera koleksi pilihan di ruparupa.com ini dengan penawaran spesial.</p>'),
(49, 1, 'Summer Kursi Teras Panjang', 12, 899000, 15, '14.jpg', '<ul>\r\n<li>Dimensi produk : 110 x 59.5 x 93.5 cm</li>\r\n<li>Material : metal</li>\r\n<li>Finishing : powder coating</li>\r\n</ul>\r\n<p>Buat suasana teras semakin nyaman dengan Summer Bangku Teras. Dengan adanya bangku ini, bersantai sambil bercengkrama bersama keluarga di halaman rumah akan semakin menyenangkan. Bangku ini hadir dengan desain klasik yang cantik, terbuat dari metal berkualitas berlapis powder coating yang tahan karat. Segera dapatkan produk ini dengan berbagai penawaran menarik dari Ruparupa.</p>'),
(50, 13, 'Manolo Organizer Sepatu - Putih', 26, 899000, 14, '15.jpg', '<ul>\r\n<li>Desain modern</li>\r\n<li>Menyimpan hingga 18 pasang sepatu</li>\r\n<li>Dilengkapi bracket</li>\r\n<li>Material : particle board</li>\r\n<li>Finishing : PVC</li>\r\n<li>Dimensi produk : 73 x 23 x 118 cm</li>\r\n</ul>\r\n<p>Simpan koleksi sepatu kesayangan agar tidak berantakan di Manolo Kabinet Sepatu. Kabinet bergaya modern ini menyediakan rak untuk menyimpan hingga 18 pasang sepatu agar rapi dan tidak terkena debu. Cocok ditempatkan di sudut ruangan atau dekat pintu masuk.</p>'),
(51, 12, 'Serena Set Tempat Tidur Queen 4 Pcs', 301, 899000, 21, '16.jpg', '<ul>\r\n<li>Set terdiri dari ranjang, nakas 2 pcs, meja rias dan lemari pakaian</li>\r\n<li>Dimensi tempat tidur : 160 x 200 cm</li>\r\n<li>Dimensi lemari pakaian : 159.6 x 60.7 x 210 cm</li>\r\n<li>Dimensi laci penyimpanan : 80 x 39.6 x 165 cm</li>\r\n<li>Dimensi nakas : 54 x 39 x 34.9 cm</li>\r\n<li>Material : MDF</li>\r\n<li>Finishing : high gloss melamine</li>\r\n</ul>\r\n<p>Untuk Anda yang tidak ingin repot saat mengisi kamar tidur, Hadirkan Serena set tempat tidur dari Informa untuk solusinya. Set ini sangat ideal digunakan untuk Anda yang ingin mengisi ruangan dengan tema tertentu. Hadir dengan warna putih yang lembut, dengan desain minimalis elegan. Cocok digunakan sebagai alternatif perabotan untuk kamar utama Anda. Dalam satu set terdiri dari dipan dengan head board, nakas, meja rias dan lemari pakaian. Material terbuat dari bahan partikel board padat yang kuat. Dapatkan segala kebutuhan dengan produk berkualitas dari Ruparupa.com.</p>'),
(52, 12, 'Anya Tempat Tidur Anak - Biru', 45, 899000, 20, '17.jpg', '<ul>\r\n<li>Untuk kasur ukuran : 120 x 200 x 20 cm</li>\r\n<li>Material : MDF, rubber wood</li>\r\n<li>Dimensi produk : 219 x 136 x 101 cm</li>\r\n<li>Termasuk spring mattress (khusus member Informa)</li>\r\n</ul>\r\n<p>Lengkapi kenyamanan ruang tidur untuk anak dengan Anya Tempat Tidur. Tempat tidur ini memiliki desain minimalis dengan permukaan yang halus dan lembut. Memiliki konstruksi yang kokoh, rangka tempat tidur ini terbuat dari MDF, dan rubber wood berkualitas.</p>'),
(54, 1, 'we', 22, 23, 2, 'test_megamendung_10.jpg', '<p>Motif batik megamendung merupakan motif batik dengan pola awan yang berasal dari Cirebon. Kepopuleran batik megamendung juga mengangkat kota Cirebon salah satu sentra batik di Jawa Barat. Dibalik motif awan ternyata batik megamendung mengandung filosofi yang mendalam di setiap motifnya.</p>\r\n<p>Sejarah munculnya motif batik megamendung di Cirebon berawal dari kedatangan bangsa China. Kedatangan bangsa China ini membuat wawasan warga pribumi semakin bertambah berbagai seni kesenian dari China kemudian ditularkan seperti pembuatan keramik, piring dan pembuatan motif kain.</p>\r\n<p style=\"font-weight: 400;\">Pada budaya China motif awan memiliki makna yang melambangkan nirwana sebagai dunia yang luas, abadi, bebas dan bermakna transidental konsep ketuhanan. Awan juga direpresentasikan oleh kaum sufi sebagai ungkapan yang sama yaitu konsep luas dan bebas.</p>\r\n<p style=\"font-weight: 400;\">Ditangan para pengrajin batik Cirebon, mereka membuat motif batik awan tersebut dalam wujud kain batik dan sekarang motif tersebut dikenal sebagi motif batik megamendung. Meskipun inspirasi motif ini berasal dari China, batik megamendung dengan kain motif awan khas China terdapat sedikit perbedaan.&nbsp; Jika kain motif awan China memiliki garis awan berbentuk bulatan atau lingkaran, berbeda dengan batik mega mendung cirebon, yang motif awan berupa garis awan yang cenderung lancip, lonjong, dan segitiga.</p>\r\n<p style=\"font-weight: 400;\">Motif batik megamendung menggambarkan format sekumpulan awan di langit. Konon menurut keterangan dari sejarah Cirebon, motif ini terbentuk saat seseorang melihat format awan pada genangan air sesudah hujan dan cuaca saat tersebut sedang mendung. Sehingga seseorang tersebut menuangkan idenya guna menggambar awan yang sudah di lihat melewati genangan air itu dengan format awan yang bergelombang.</p>\r\n<p style=\"font-weight: 400;\">Oleh karena itu, terbentuklah motif Mega Mendung (Mega= Awan, Mendung=cuaca yang sejuk/adem) dengan warna dasar merah dan awan yang berwarna biru dengan tujuh gradasi warna sebagai warna orisinilnya yang familiar dari Cirebon.</p>\r\n<p style=\"font-weight: 400;\">Arti dan filosofi motif Mega Mendung merupakan awan yang muncul saat cuaca sedang mendung. Di samping arti, motif Mega Mendung pun mempunyai makna atau filosofi bahwa setiap insan harus dapat meredam amarah/emosinya dalam kondisi dan situasi apapun, dengan kata lain, hati insan diharapkan dapat tetap &lsquo;adem&rsquo; meskipun dalam suasana marah, laksana halnya awan yang hadir saat cuaca mendung yang bisa menyejukkan keadaan di sekitarnya.</p>\r\n<p style=\"font-weight: 400;\">Kemudian arti dari warna batik Mega Mendung ini merupakan emblem dari seorang pemimpin dan awan biru sebagai sifat seorang pemimpin yang mesti dapat mengayomi semua masyarakat yang dipimpinnya. Beralih untuk gradasi warna yang sedang di ornamen awannya, gradasi pribumi dari batik Mega Mendung ini ialah tujuh gradasi yang maknanya dipungut dari lapisan langit yang mempunyai 7 lapis, begitupun bumi yang tersusun atas 7 lapisan tanah, dan jumlah hari dalam seminggu&nbsp; sejumlah 7&nbsp; hari. Batik motif Mega Mendung memang nampak sederhana, akan namun motif ini dalam bakal makna/ filosofi yang dimilikinya.</p>\r\n<p style=\"font-weight: 400;\">Sebagai ekstra informasi supaya tidak salah kaprah dengan arti gradasi warna, bahwa kini gradasi warna batik Mega Mendung sudah disesuaikan dengan keperluan pasar. Sehingga, gradasinya bisa dikurangi atau diminimalkan menjadi 3-5 gradasi cocok pesanan. Bahkan telah ada pun batik Mega Mendung yang sengaja tidak diberi gradasi warna pada motif awannya sebab tuntutan yang diperlukan oleh pasar.</p>\r\n<p style=\"font-weight: 400;\">Batik megamendung kini sudah menjadi salah satu motif batik paling populer di tanah air maupun mancanegara. Keelokan batik motif megamendung juga sudah mengangkat Cirebon sebagai centra batik di pesisir utara pulau jawa yang tak kalah dengan batik Jogja, Solo maupun Pekalongan.&nbsp;</p>\r\n<p style=\"font-weight: 400;\"><strong>sumber</strong> :&nbsp;<em>https://www.motifbatik.web.id/2019/01/filosofi-motif-batik-megamendung-dan.html</em></p>');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tbl_detail_order`
--
ALTER TABLE `tbl_detail_order`
  ADD PRIMARY KEY (`id_detail_order`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `tbl_kat_pos`
--
ALTER TABLE `tbl_kat_pos`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tbl_kat_produk`
--
ALTER TABLE `tbl_kat_produk`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indeks untuk tabel `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_order2` (`id_order`);

--
-- Indeks untuk tabel `tbl_pos`
--
ALTER TABLE `tbl_pos`
  ADD PRIMARY KEY (`id_pos`),
  ADD KEY `id_kat_pos` (`id_kategori`);

--
-- Indeks untuk tabel `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_detail_order`
--
ALTER TABLE `tbl_detail_order`
  MODIFY `id_detail_order` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT untuk tabel `tbl_kat_pos`
--
ALTER TABLE `tbl_kat_pos`
  MODIFY `id_kategori` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tbl_kat_produk`
--
ALTER TABLE `tbl_kat_produk`
  MODIFY `id_kategori` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id_order` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT untuk tabel `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  MODIFY `id_pelanggan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  MODIFY `id_pembayaran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tbl_pos`
--
ALTER TABLE `tbl_pos`
  MODIFY `id_pos` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `id_produk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_detail_order`
--
ALTER TABLE `tbl_detail_order`
  ADD CONSTRAINT `id_order` FOREIGN KEY (`id_order`) REFERENCES `tbl_order` (`id_order`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_produk` FOREIGN KEY (`id_produk`) REFERENCES `tbl_produk` (`id_produk`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `id_pelanggan` FOREIGN KEY (`id_pelanggan`) REFERENCES `tbl_pelanggan` (`id_pelanggan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD CONSTRAINT `id_order2` FOREIGN KEY (`id_order`) REFERENCES `tbl_order` (`id_order`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `tbl_pos`
--
ALTER TABLE `tbl_pos`
  ADD CONSTRAINT `id_kat_pos` FOREIGN KEY (`id_kategori`) REFERENCES `tbl_kat_pos` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD CONSTRAINT `id_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `tbl_kat_produk` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
