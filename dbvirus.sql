-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 03. Desember 2015 jam 00:54
-- Versi Server: 5.1.41
-- Versi PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbvirus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbladmin`
--

CREATE TABLE IF NOT EXISTS `tbladmin` (
  `pengguna` varchar(30) NOT NULL,
  `sandi` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbladmin`
--

INSERT INTO `tbladmin` (`pengguna`, `sandi`) VALUES
('admin', 'mucill');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblaturan`
--

CREATE TABLE IF NOT EXISTS `tblaturan` (
  `kd_aturan` int(11) NOT NULL AUTO_INCREMENT,
  `kd_gejala` varchar(7) NOT NULL,
  `kd_penyakit` varchar(7) NOT NULL,
  `nl_prob` decimal(2,1) NOT NULL,
  PRIMARY KEY (`kd_aturan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=107 ;

--
-- Dumping data untuk tabel `tblaturan`
--

INSERT INTO `tblaturan` (`kd_aturan`, `kd_gejala`, `kd_penyakit`, `nl_prob`) VALUES
(47, 'G10', 'P02', '0.6'),
(46, 'G09', 'P02', '0.8'),
(45, 'G08', 'P02', '0.8'),
(44, 'G07', 'P02', '0.9'),
(43, 'G06', 'P01', '0.6'),
(42, 'G05', 'P01', '0.8'),
(40, 'G03', 'P01', '0.7'),
(39, 'G02', 'P01', '0.8'),
(38, 'G01', 'P01', '0.7'),
(41, 'G04', 'P01', '0.6'),
(48, 'G11', 'P03', '0.7'),
(49, 'G02', 'P03', '0.8'),
(50, 'G12', 'P03', '0.6'),
(51, 'G13', 'P03', '0.8'),
(52, 'G14', 'P03', '0.7'),
(53, 'G15', 'P03', '0.7'),
(54, 'G16', 'P03', '0.6'),
(55, 'G17', 'P03', '0.8'),
(56, 'G18', 'P04', '0.7'),
(57, 'G12', 'P04', '0.6'),
(58, 'G19', 'P04', '0.8'),
(59, 'G20', 'P04', '0.7'),
(60, 'G21', 'P04', '0.7'),
(61, 'G22', 'P04', '0.5'),
(62, 'G23', 'P04', '0.6'),
(63, 'G24', 'P05', '0.7'),
(64, 'G25', 'P05', '0.7'),
(65, 'G01', 'P05', '0.5'),
(66, 'G26', 'P05', '0.8'),
(67, 'G27', 'P05', '0.6'),
(68, 'G28', 'P05', '0.3'),
(69, 'G29', 'P05', '0.3'),
(70, 'G30', 'P05', '0.8'),
(71, 'G02', 'P05', '0.7'),
(72, 'G31', 'P05', '0.6'),
(73, 'G32', 'P06', '0.6'),
(74, 'G33', 'P06', '0.8'),
(75, 'G34', 'P06', '0.4'),
(76, 'G35', 'P06', '0.3'),
(77, 'G04', 'P06', '0.5'),
(78, 'G36', 'P06', '0.6'),
(79, 'G37', 'P07', '0.4'),
(80, 'G02', 'P07', '0.7'),
(81, 'G04', 'P07', '0.3'),
(82, 'G38', 'P07', '0.7'),
(83, 'G01', 'P07', '0.5'),
(84, 'G20', 'P07', '0.3'),
(85, 'G39', 'P07', '0.5'),
(86, 'G40', 'P08', '0.7'),
(87, 'G41', 'P08', '0.5'),
(88, 'G20', 'P09', '0.6'),
(89, 'G32', 'P09', '0.7'),
(90, 'G19', 'P09', '0.3'),
(91, 'G42', 'P09', '0.5'),
(92, 'G43', 'P09', '0.2'),
(93, 'G22', 'P09', '0.5'),
(94, 'G02', 'P09', '0.7'),
(95, 'G44', 'P09', '0.5'),
(96, 'G45', 'P09', '0.4'),
(97, 'G04', 'P09', '0.6'),
(98, 'G25', 'P09', '0.7'),
(99, 'G46', 'P10', '0.6'),
(100, 'G47', 'P10', '0.5'),
(101, 'G48', 'P10', '0.4'),
(102, 'G49', 'P10', '0.5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblbantu`
--

CREATE TABLE IF NOT EXISTS `tblbantu` (
  `id_pengunjung` int(11) NOT NULL,
  `kd_gejala` varchar(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblbantu`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `tblbantu_2`
--

CREATE TABLE IF NOT EXISTS `tblbantu_2` (
  `id_pengunjung` int(3) NOT NULL,
  `kd_penyakit` varchar(7) NOT NULL,
  `jml_gejala` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblbantu_2`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `tbldiagnosa`
--

CREATE TABLE IF NOT EXISTS `tbldiagnosa` (
  `id_pengunjung` varchar(7) NOT NULL,
  `kd_penyakit` varchar(7) NOT NULL,
  `persen` decimal(5,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbldiagnosa`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `tblgejala`
--

CREATE TABLE IF NOT EXISTS `tblgejala` (
  `kd_gejala` varchar(7) NOT NULL,
  `nm_gejala` varchar(80) NOT NULL,
  PRIMARY KEY (`kd_gejala`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblgejala`
--

INSERT INTO `tblgejala` (`kd_gejala`, `nm_gejala`) VALUES
('G05', 'Gatal Pada Kulit Seperti Bekas Gigitan Serangga'),
('G04', 'Nafsu Makan Berkurang'),
('G03', 'Batuk Kering'),
('G02', 'Sakit kepala'),
('G01', 'Demam'),
('G06', 'Timbulnya Benjolan Berisi Cairan '),
('G07', 'Timbulnya Gelembung Kecil Dikulit'),
('G08', 'Gelembung Yang Memerah'),
('G09', 'Gelembing Terasa Panas'),
('G10', 'Gelembung Sangat Mudah Pecah'),
('G11', 'Demam Ringan Sedang'),
('G12', 'Nyeri tenggorokan'),
('G13', 'Nyeri Leher'),
('G14', 'Kaku Pada Otot'),
('G15', 'Otot Lemas'),
('G16', 'Kurangnya Kepekaan Sentuhan (Mati Rasa)'),
('G17', 'Kelumpuhan Ringan'),
('G18', 'Badan Panas'),
('G19', 'Pilek'),
('G20', 'Batuk'),
('G21', 'Bercak Komlik'),
('G22', 'Nyeri Otot'),
('G23', 'Mata Merah'),
('G24', 'Tidak Enak Badan Secara Keseluruhan'),
('G25', 'Kelelahan '),
('G26', 'Meriang'),
('G27', 'Hilang Nafsu Makan'),
('G28', 'Mual'),
('G29', 'Muntah'),
('G30', 'Diare'),
('G31', 'Rasa Sakit Diperut'),
('G32', 'Sakit Pada Tenggorokan'),
('G33', 'Kenaikan Suhu Badan'),
('G34', 'Telinga Sering Berdengung'),
('G35', 'Muliut Terasa Nyeri dan Kaku Saat mengunyah Makanan'),
('G36', 'Muncul Benjolan Kecil pada bagian leher'),
('G37', 'Sesak nafas'),
('G38', 'Infeksi Saluran Pernapasan Akut'),
('G39', 'Radang Tenggorokan'),
('G40', 'Terdapat Bintil-bintil Kecil pada Tubuh yang Keras dan Berakar'),
('G41', 'Dalam Waktu Lama dan Tanpa Pengobatan Bintil akan Membesar'),
('G42', 'Hidung Tersumbat'),
('G43', 'Bersin'),
('G44', 'Kelemahan Otot'),
('G45', 'Mengigil Tak Terkendali'),
('G46', 'Terbentuknya Pupil (Benjolan) Yang Cukup Banyak'),
('G47', 'Benjolan Yang Berbatas Tegas, Licin, Berbentuk Kubah dan Sewarna Dengan kulit'),
('G48', 'Benjolan Dapat Meradang Secara Spontan karena Akibat garukan'),
('G49', 'Benjolan yang meradangan memberikan gambaran benjolan merah dan hangat'),
('G50', 'Mengigil');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblpengunjung`
--

CREATE TABLE IF NOT EXISTS `tblpengunjung` (
  `id_pengunjung` int(7) NOT NULL AUTO_INCREMENT,
  `nm_pengunjung` varchar(40) NOT NULL,
  `tgl_diagnosa` date NOT NULL,
  `gejala` text NOT NULL,
  `penyakit` varchar(60) NOT NULL,
  `nl_bayes` decimal(5,2) NOT NULL,
  `pengobatan` text NOT NULL,
  PRIMARY KEY (`id_pengunjung`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=222 ;

--
-- Dumping data untuk tabel `tblpengunjung`
--

INSERT INTO `tblpengunjung` (`id_pengunjung`, `nm_pengunjung`, `tgl_diagnosa`, `gejala`, `penyakit`, `nl_bayes`, `pengobatan`) VALUES
(193, 'adadad', '2015-11-19', 'Timbulnya Gelembung Kecil Dikulit, Timbulnya Benjolan Berisi Cairan , Gatal Pada Kulit Seperti Bekas Gigitan Serangga, Nafsu Makan Berkurang, Batuk Kering, Sakit kepala, Demam', 'Cacar Air', '57.79', 'aadadadad, aadadad, afafafafa, afafafafaf, asfasfafasfafa ,a fafafafaf'),
(194, 'adadadad', '2015-11-19', 'Timbulnya Benjolan Berisi Cairan , Gatal Pada Kulit Seperti Bekas Gigitan Serangga, Nafsu Makan Berkurang, Batuk Kering, Sakit kepala, Demam', 'Cacar Air', '67.42', 'aadadadad, aadadad, afafafafa, afafafafaf, asfasfafasfafa ,a fafafafaf'),
(195, 'saaa', '2015-11-25', 'Rasa Sakit Diperut, Muntah, Hilang Nafsu Makan, Kelelahan , Tidak Enak Badan Secara Keseluruhan, Sakit kepala, Demam', 'Hepatitis', '71.78', ''),
(196, 'aaaa', '2015-11-25', 'Muncul Benjolan Kecil pada bagian leher, Muliut Terasa Nyeri dan Kaku Saat mengunyah Makanan, Sakit Pada Tenggorokan, Nyeri Leher, Nyeri tenggorokan', 'Gondok', '49.36', ''),
(197, 'nm', '2015-11-25', 'Dalam Waktu Lama dan Tanpa Pengobatan Bintil akan Membesar, Terdapat Bintil-bintil Kecil pada Tubuh yang Keras dan Berakar, Muncul Benjolan Kecil pada bagian leher, Muliut Terasa Nyeri dan Kaku Saat mengunyah Makanan', 'Kutil', '50.00', ''),
(198, 'klll', '2015-11-25', 'Mengigil Tak Terkendali, Kelemahan Otot, Bersin, Sakit Pada Tenggorokan, Kelelahan , Nyeri Otot, Batuk', 'Commond Cold', '68.67', ''),
(199, 'asz', '2015-11-25', 'Radang Tenggorokan, Sesak nafas, Hilang Nafsu Makan, Pilek, Demam', 'Sars', '44.91', ''),
(200, 'za', '2015-11-25', 'Sakit Pada Tenggorokan, Rasa Sakit Diperut, Mual, Hilang Nafsu Makan, Kelelahan , Sakit kepala', 'Hepatitis', '62.10', ''),
(201, 'da', '2015-11-25', 'Kelumpuhan Ringan, Timbulnya Benjolan Berisi Cairan , Gatal Pada Kulit Seperti Bekas Gigitan Serangga, Batuk Kering, Sakit kepala', 'Cacar Air', '64.79', 'aadadadad, aadadad, afafafafa, afafafafaf, asfasfafasfafa ,a fafafafaf'),
(202, 'sa', '2015-11-25', 'Benjolan yang meradangan memberikan gambaran benjolan merah dan hangat, Benjolan Dapat Meradang Secara Spontan karena Akibat garukan, Terbentuknya Pupil (Benjolan) Yang Cukup Banyak, Timbulnya Gelembung Kecil Dikulit', 'MCV', '75.00', ''),
(203, 'sa', '2015-11-25', 'Mata Merah, Batuk, Timbulnya Benjolan Berisi Cairan , Nafsu Makan Berkurang, Sakit kepala, Demam', 'Cacar Air', '34.09', 'aadadadad, aadadad, afafafafa, afafafafaf, asfasfafasfafa ,a fafafafaf'),
(204, 'cz', '2015-11-25', 'Mata Merah, Nyeri Otot, Batuk, Pilek, Badan Panas, Nyeri tenggorokan', 'Campak', '71.10', ''),
(205, 'm', '2015-11-25', 'Mata Merah, Nyeri Otot, Batuk, Badan Panas, Nyeri Leher, Nyeri tenggorokan', 'Campak', '58.45', ''),
(206, 'mz', '2015-11-25', 'Muntah, Hilang Nafsu Makan, Tidak Enak Badan Secara Keseluruhan, Timbulnya Benjolan Berisi Cairan , Batuk Kering, Sakit kepala, Demam', 'Hepatitis', '49.86', ''),
(207, 'kl', '2015-11-25', 'Sakit Pada Tenggorokan, Hilang Nafsu Makan, Kelumpuhan Ringan, Otot Lemas, Nyeri Leher, Sakit kepala', 'Polio', '54.06', ''),
(208, 'l', '2015-11-25', 'Muncul Benjolan Kecil pada bagian leher, Sakit Pada Tenggorokan, Otot Lemas, Kaku Pada Otot, Nyeri Leher, Nafsu Makan Berkurang', 'Polio', '50.00', ''),
(209, 'as', '2015-11-25', 'Terdapat Bintil-bintil Kecil pada Tubuh yang Keras dan Berakar, Gelembing Terasa Panas, Timbulnya Gelembung Kecil Dikulit', 'Herpes Simpleks', '66.67', ''),
(210, 'i', '2015-11-25', 'Infeksi Saluran Pernapasan Akut, Sesak nafas, Rasa Sakit Diperut, Mual, Hilang Nafsu Makan, Sakit kepala', 'Hepatitis', '53.20', ''),
(211, 'o', '2015-11-25', 'Mengigil Tak Terkendali, Bersin, Hidung Tersumbat, Batuk, Pilek, Badan Panas', 'Commond Cold', '59.86', ''),
(212, 'l', '2015-11-26', 'Muntah, Meriang, Kelelahan , Tidak Enak Badan Secara Keseluruhan, Mata Merah, Demam', 'Hepatitis', '63.88', ''),
(213, 'h', '2015-11-26', 'Timbulnya Gelembung Kecil Dikulit, Timbulnya Benjolan Berisi Cairan , Gatal Pada Kulit Seperti Bekas Gigitan Serangga, Nafsu Makan Berkurang', 'Cacar Air', '58.75', 'aadadadad, aadadad, afafafafa, afafafafaf, asfasfafasfafa ,a fafafafaf'),
(214, 'r', '2015-11-26', 'Otot Lemas, Timbulnya Benjolan Berisi Cairan , Nafsu Makan Berkurang, Sakit kepala, Demam', 'Cacar Air', '40.90', 'aadadadad, aadadad, afafafafa, afafafafaf, asfasfafasfafa ,a fafafafaf'),
(215, 'aadfad', '2015-11-27', 'Timbulnya Benjolan Berisi Cairan , Gatal Pada Kulit Seperti Bekas Gigitan Serangga, Nafsu Makan Berkurang, Batuk Kering, Sakit kepala, Demam', 'Cacar Air', '67.42', 'aadadadad, aadadad, afafafafa, afafafafaf, asfasfafasfafa ,a fafafafaf'),
(220, 'gjhg', '2015-11-27', 'Mengigil, Benjolan yang meradangan memberikan gambaran benjolan merah dan hangat, Benjolan Dapat Meradang Secara Spontan karena Akibat garukan, Nyeri Otot', 'MCV', '50.00', ''),
(221, 'kjhkj', '2015-12-03', 'Gelembung Sangat Mudah Pecah, Gelembing Terasa Panas, Gelembung Yang Memerah, Gatal Pada Kulit Seperti Bekas Gigitan Serangga, Nafsu Makan Berkurang, Sakit kepala, Demam', 'Herpes Simpleks', '42.86', 'Pengobatan dengan asiklover, Pengobatan dengan valasiklovir dengan memakai asiklovir sebagai salah satu kandungan aktifnya, Pengobatan dengan famsiklovir yang mempunyai fungsi untuk menghabat terjadinya replika pada virus herpes');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblpenyakit`
--

CREATE TABLE IF NOT EXISTS `tblpenyakit` (
  `kd_penyakit` varchar(7) NOT NULL,
  `nm_penyakit` varchar(40) NOT NULL,
  `nl_penyakit` float NOT NULL,
  `pengobatan` text NOT NULL,
  PRIMARY KEY (`kd_penyakit`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblpenyakit`
--

INSERT INTO `tblpenyakit` (`kd_penyakit`, `nm_penyakit`, `nl_penyakit`, `pengobatan`) VALUES
('P04', 'Campak', 0.6696, 'Istirahat yang cukup, Mandi dengan air hangat, Minum banyak untuk menghindari dehidrasi, Gunakan parasetamol dan ibuprofen yang membantu mengatasi gejala-gejala penyakit campak'),
('P05', 'Hepatitis', 0.65, 'Hindari mengkonsumsi alkohol, Hindari Obat-obatan yang dapat merusak hati seperti acetaminophen, Diet sehat dan berimbang, Penrbanyak makan buah dan sayur, Latihan fisik secara teratur, Istirahat yang cukup'),
('P03', 'Polio', 0.7211, 'Imunisasi polio yang dilakukan pada saat bayi atau anak-anak, Bila memasak air harus mendidih dengan sempurna, Biasakan menjalanai pola hidup yang sehat, Senitasi yang baik dan bersih'),
('P02', 'Herpes Simpleks', 0.7903, 'Pengobatan dengan asiklover, Pengobatan dengan valasiklovir dengan memakai asiklovir sebagai salah satu kandungan aktifnya, Pengobatan dengan famsiklovir yang mempunyai fungsi untuk menghabat terjadinya replika pada virus herpes'),
('P01', 'Cacar Air', 0.7095, 'Mandi menggunakan air hangat, Menggunakan lotion dari dokter pada daerah yang gatal, Istirahat yang cukup, Makan makanan yang bergizi '),
('P06', 'Gondok', 0.5813, 'Terapi pergantian hormon untuk hipotirodisme dengan mengganti hormon tiroid,Obat penurunan hormon tiroid untuk menurunkan kadar hormon tiroid dengan menghambat proses produksinya, Terapi iodin radioaktif untuk menghancurkan sel-sel tiroid, Langkah operasi jika benjolan terus membesar hingga menggangu pernapasan'),
('P07', 'Sars', 0.5353, 'Tidak berkunjung ke wilayah yang sudah terjangkit sars, Hindari berdekatan dengan pernderita atau pependerita bergejala sama, Gunakan masker penutup hidung dan mulut serta sarung tangan dilakukan untuk menghindari penularan melalui cairan dan udara'),
('P08', 'Kutil', 0.6167, 'Mandi bersih, Lakukan luluran, Hindari berganti baju dengan orang lain, Hindari seks bebas, Lakukan Imunisasi HPV'),
('P09', 'Commond Cold', 0.5667, 'Pemberian obat analgetik untuk mengurangi rasa nyeri, Pemberian obat antipiretika untuk menurunkan panas badan, Pemberian obat antihistamin untuk mengurangi efek histamin tubuh, Pemberian obat tetes hidung'),
('P10', 'MCV', 0.51, 'Hindari menyentuh atau menggaruk papul, Tidak pinjam meminjam barang pribadi seperti handuk, baju atau sisir, Hindari kontak seksual sampai papul telah diobati dan sembuh\r\n');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
