-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2020 at 02:36 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webgis-php`
--

-- --------------------------------------------------------

--
-- Table structure for table `m_kecamatan`
--

CREATE TABLE `m_kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `kd_kecamatan` varchar(10) NOT NULL,
  `nm_kecamatan` varchar(30) NOT NULL,
  `geojson_kecamatan` varchar(30) NOT NULL,
  `warna_kecamatan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_kecamatan`
--

INSERT INTO `m_kecamatan` (`id_kecamatan`, `kd_kecamatan`, `nm_kecamatan`, `geojson_kecamatan`, `warna_kecamatan`) VALUES
(53, '32.04', 'Kabupaten Bandung', 'kabbandung.geojson', '#271db9'),
(54, '32.17', 'Kabupaten Bandung Barat', 'kabbandungbarat.geojson', '#ffda1f'),
(57, '32.16', 'Kabupaten Bekasi', 'kabbekasiii.geojson', '#1dfa19'),
(58, '32.01', 'Kabupaten Bogor', 'kabbogor.geojson', '#ec18d3'),
(62, '32.03', 'Kabupaten Ciamis', 'kabciamis.geojson', '#ff33aa'),
(63, '32.09', 'Kabupaten Cirebon', 'kabcirebon.geojson', '#582222'),
(64, '32.05', 'Kabupaten Garut', 'kabgarut.geojson', '#e91c1c'),
(65, '32.12', 'Kabupaten Indramayu', 'kabindramayu.geojson', '#f2a807'),
(66, '32.15', 'Kabupaten Karawang', 'kabkarawang.geojson', '#0ca9ac'),
(67, '32.08', 'Kabupateng Kuningan', 'kabkuningan.geojson', '#00ff08'),
(68, '32.10', 'Kabupaten Majalengka', 'kabmajalengka.geojson', '#454545'),
(69, '32.18', 'Kabupaten Pangandaran', 'kabpangandaran.geojson', '#142ffa'),
(70, '32.14', 'Kabupaten Purwakarta', 'kabpurwakarta.geojson', '#0b5628'),
(71, '32.13', 'Kabupaten Subang', 'kabsubang.geojson', '#66ff7f'),
(72, '32.02', 'Kabupaten Sukabumi', 'kabsukabumi.geojson', '#250b84'),
(73, '32.11', 'Kabupaten Sumedang', 'kabsumedanggg.geojson', '#ad16e3'),
(74, '32.06', 'Kabupaten Tasikmalaya', 'kabtasik.geojson', '#d3e109'),
(75, '32.07', 'Kabupaten Cianjur', 'kabcianjurrr.geojson', '#7a4405'),
(76, '32.73', 'Kota Bandung', 'kotabandung.geojson', '#ff0000'),
(77, '32.79', 'Kota Banjar', 'kotabanjar.geojson', '#ffc800'),
(78, '32.75', 'Kota Bekasi', 'kotabekasi.geojson', '#efff0a'),
(79, '32.71', 'Kota Bogor', 'kotabogor.geojson', '#0008ff'),
(80, '32.77', 'Kota Cimahi', 'kotacimahi.geojson', '#fa00d0'),
(81, '32.74', 'Kota Cirebon', 'kotacirebon.geojson', '#ff0505'),
(82, '32.76', 'Kota Depok', 'kotadepokkk.geojson', '#183d0a'),
(83, '32.72', 'Kota Sukabumi', 'kotasukabumi.geojson', '#00fbff'),
(84, '32.78', 'Kota Tasikmalaya', 'kotatasik.geojson', '#ff4d00');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nm_pengguna` varchar(20) NOT NULL,
  `kt_sandi` varchar(150) NOT NULL,
  `level` enum('Admin','User') NOT NULL DEFAULT 'User'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nm_pengguna`, `kt_sandi`, `level`) VALUES
(1, 'admin', '$2y$10$oNX.X8jgLhNclHBeI8ytT.1vODlml8.AN1Ieb.rSIChhCa1e7cS0S', 'Admin'),
(2, 'user', '$2y$10$oNX.X8jgLhNclHBeI8ytT.1vODlml8.AN1Ieb.rSIChhCa1e7cS0S', 'User'),
(3, 'user1', '123456', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `t_kasus`
--

CREATE TABLE `t_kasus` (
  `id_kasus` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `positif` int(10) NOT NULL,
  `sembuh` int(10) NOT NULL,
  `mati` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `lat` float(9,6) NOT NULL,
  `lng` float(9,6) NOT NULL,
  `marker` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_kasus`
--

INSERT INTO `t_kasus` (`id_kasus`, `nama`, `positif`, `sembuh`, `mati`, `tanggal`, `lat`, `lng`, `marker`) VALUES
(3201, 'Kabupaten Bogor', 2409, 979, 16, '2020-12-25', -6.527502, 106.566116, 'marker14.png'),
(3202, 'Kabupaten Sukabumi', 326, 239, 4, '2020-12-25', -6.937867, 106.760269, 'marker116.png'),
(3203, 'Kabupaten Cianjur', 96, 77, 2, '2020-12-25', -7.160013, 107.115974, 'marker16.png'),
(3204, 'Kabupaten Bandung', 770, 586, 12, '2020-12-25', -7.081423, 107.619316, 'marker11.png'),
(3205, 'Kabupaten Garut', 295, 229, 14, '2020-12-25', -7.252915, 107.827545, 'marker18.png'),
(3206, 'Kabupaten Tasikmalaya', 72, 47, 2, '2020-12-25', -7.465498, 108.090309, 'marker118.png'),
(3207, 'Kabupaten Ciamis', 130, 55, 5, '2020-12-25', -7.250794, 108.392075, 'marker15.png'),
(3208, 'Kabupaten Kuningan', 723, 191, 7, '2020-12-25', -6.952723, 108.537209, 'marker111.png'),
(3209, 'Kabupaten Cirebon', 1010, 681, 53, '2020-12-25', -6.672096, 108.437141, 'marker17.png'),
(3210, 'Kabupaten Majalengka', 177, 125, 8, '2020-12-25', -6.820521, 108.261047, 'marker112.png'),
(3211, 'Kabupaten Sumedang', 223, 110, 1, '2020-12-25', -6.771797, 107.962105, 'marker117.png'),
(3212, 'Kabupaten Indramayu', 160, 113, 7, '2020-12-25', -6.435987, 108.143562, 'marker19.png'),
(3213, 'Kabupaten Subang', 255, 224, 12, '2020-12-25', -6.433130, 107.715614, 'marker115.png'),
(3214, 'Kabupaten Purwakarta', 273, 216, 7, '2020-12-25', -6.554397, 107.406776, 'marker114.png'),
(3215, 'Kabupaten Karawang', 1056, 704, 34, '2020-12-25', -6.208578, 107.360252, 'marker110.png'),
(3216, 'Kabupaten Bekasi', 3144, 2302, 43, '2020-12-25', -6.216527, 107.121658, 'marker13.png'),
(3217, 'Kabupaten Bandung Barat', 321, 197, 6, '2020-12-25', -6.876540, 107.411011, 'marker12.png'),
(3218, 'Kabupaten Pangandaran', 67, 65, 0, '2020-12-25', -7.601631, 108.488434, 'marker113.png'),
(3271, 'Kota Bogor', 1648, 1040, 39, '2020-12-25', -6.583151, 106.806648, 'marker122.png'),
(3272, 'Kota Sukabumi', 320, 244, 3, '2020-12-25', -6.928146, 106.925285, 'marker126.png'),
(3273, 'Kota Bandung', 1828, 1261, 50, '2020-12-25', -6.913615, 107.616867, 'marker119.png'),
(3274, 'Kota Cirebon', 281, 191, 17, '2020-12-25', -6.722370, 108.559319, 'marker124.png'),
(3275, 'Kota Bekasi', 5128, 3304, 100, '2020-12-25', -6.260044, 106.957947, 'marker121.png'),
(3276, 'Kota Depok', 4690, 2910, 89, '2020-12-25', -6.380974, 106.804672, 'marker125.png'),
(3277, 'Kota Cimahi', 478, 280, 4, '2020-12-25', -6.880601, 107.533859, 'marker123.png'),
(3278, 'Kota Tasikmalaya', 72, 55, 3, '2020-12-25', -7.334896, 108.215614, '11.png'),
(3279, 'Kota Banjar', 40, 10, 1, '2020-12-25', -7.357074, 108.574043, 'marker120.png');

-- --------------------------------------------------------

--
-- Table structure for table `t_rumahsakit`
--

CREATE TABLE `t_rumahsakit` (
  `id_rumahsakit` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `lat` float(9,6) NOT NULL,
  `lng` float(9,6) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `marker` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_rumahsakit`
--

INSERT INTO `t_rumahsakit` (`id_rumahsakit`, `id_kecamatan`, `nama`, `alamat`, `lat`, `lng`, `telepon`, `marker`) VALUES
(23, 6, 'RS Mitra Keluarga Timur', 'Jl. Pengasinan Jl. Rw. Semut Raya, RT.004/RW.012, Margahayu, Kec. Bekasi Timur', -6.260321, 107.010765, '02189999222', 'health.png'),
(27, 0, 'RS Hermina Grandwisata', 'Jl. Festival Boulevard Blok JA 1 No 1, Lambangsari, Kec. Tambun Sel., Bekasi', -6.276567, 107.045395, '+622182651212', 'health111.png'),
(28, 0, 'RS Sentra Medika', 'Jl. Industri Pasir Gombong, Cikarang, Kec. Cikarang Utara, Bekasi, Jawa Barat', -6.254887, 107.021835, '', 'health112.png'),
(29, 0, ' RS Siloam Cikarang', 'Jl. MH. Thamrin No.Kav. 105, Cibatu, Cikarang Sel., Bekasi, Jawa Barat 1753', -6.331542, 107.132874, '+622129636900', 'health2.png'),
(30, 0, 'RS Omni Cikarang', 'Komp The Oasis Kav No.1, Jl. Raya Cikarang - Cibarusah No.Selatan, Sukaresm', -6.326218, 107.125183, '+622129779999', 'health3.png'),
(31, 0, 'RSUD Kabupaten Bekasi', 'Jl. Raya Teuku Umar No.202, Wanasari, Kec. Cibitung, Bekasi, Jawa Barat 175', -6.266796, 107.080956, '+622188374444', 'health4.png'),
(32, 0, 'RS Mitra Keluarga Cikarang', 'RS MITRA KELUARGA CIKARANG, Jl. Raya Industri No.100, Mekarmukti, Kec. Cikarang', -6.292378, 107.148621, '+622189840900', 'health5.png'),
(34, 0, 'RSUD dr. Chasbullah Abdulmadjid', 'Jl. Pramuka No.55, RT.006/RW.006, Marga Jaya, Kec. Bekasi Sel., Kota Bks, Jawa Barat', -6.242288, 106.998291, '', 'health6.png'),
(35, 0, 'RS Bella', 'Jl. Ir. H. Juanda No.141, RT.001/RW.001, Duren Jaya, Kec. Bekasi Tim., Kota Bekasi', -6.247035, 107.008377, '+62218819377', 'health7.png'),
(36, 0, ' RS Hermina Bekasi', 'Jl. Kemakmuran No.39, RT.004/RW.003, Marga Jaya, Kec. Bekasi Sel., Kota Bks', -6.241763, 106.992493, '+62218842121', 'health8.png'),
(37, 0, 'RS Mitra Keluarga Bekasi Barat', 'Jl. Jend. Ahmad Yani, RT.002/RW.011, Kayuringin Jaya, Kec. Bekasi Sel., Kota Bekasi', -6.241061, 106.990402, '+62218853333', 'health9.png'),
(38, 0, 'RS Permata Cibubur', 'Jl. Alternatif Cibubur No.6A, RT.001/RW.002, Jatikarya, Kec. Jatisampurna, ', -6.375914, 106.909760, '+62218458806', 'health10.png'),
(39, 0, 'RS Citra Harapan', 'Jl. Harapan Indah No.28, RT.004/RW.030, Pejuang, Kecamatan Medan Satria, Kota Bekasi', -6.185130, 106.975121, '+622188870606', 'health16.png'),
(40, 0, 'RS HERMINA KARAWANG', 'Jl. Tuparev Blok Sukasari No.386A, RT.2/RW.4, Karawang Wetan, Kec. Karawang', -6.308172, 107.310364, '+622678412525', 'health12.png'),
(41, 0, 'RSUD Karawang', 'Jl. Galuh Mas Raya No.1, Sukaharja, Kec. Telukjambe Tim., Kabupaten Karawang', -6.320768, 107.290939, '+62267640444', 'health13.png'),
(42, 0, 'Rumah Sakit Lira Medika', 'Jl. Raya Syeh Quro Jl. Kp. Lamaran No.14, Palumbonsari, Kec. Karawang Tim.,', -6.302835, 107.324036, '+622678452555', 'health14.png'),
(43, 0, 'Rumah Sakit Lira Medika', 'Jl. Raya Syeh Quro Jl. Kp. Lamaran No.14, Palumbonsari, Kec. Karawang Tim.,', -6.302835, 107.324036, '+622678452555', 'health15.png'),
(44, 0, 'Dr. Hasan Sadikin Central General Hospital', 'Jl. Pasteur No.38, Pasteur, Kec. Sukajadi, Kota Bandung, Jawa Barat 40161', -6.896420, 107.596725, '+62222034953', 'health17.png'),
(45, 0, 'Dr. Hasan Sadikin Central General Hospital', 'Jl. Pasteur No.38, Pasteur, Kec. Sukajadi, Kota Bandung, Jawa Barat 40161', -6.896393, 107.590157, '+62222034953', 'health18.png'),
(46, 0, 'Rumah Sakit Umum Daerah R. Syamsudin SH', 'Jl. Rumah Sakit No.1, Cikole, Kec. Cikole, Kota Sukabumi, Jawa Barat 43113', -6.915692, 106.932167, '+62266225180', 'health19.png'),
(47, 0, 'Indramayu Regency Regional General Hospital', 'Jl. Murahnara No.7, Sindang, Kec. Indramayu, Kabupaten Indramayu, Jawa Bara', -6.329615, 108.319687, '+62234272655', 'health20.png'),
(48, 0, 'Rumah Sakit Umum Daerah Gunung Jati', 'Jl. Kesambi No.56, Drajat, Kec. Kesambi, Kota Cirebon, Jawa Barat 45134', -6.730839, 108.553223, '+62231206330', 'health21.png'),
(49, 0, 'Rumah Sakit Umum Daerah Tk. II Dustira', 'Jl. Dustira No.1, Baros, Kec. Cimahi Tengah, Kota Cimahi, Jawa Barat 40521', -6.885288, 107.532433, '+62226652207', 'health22.png'),
(50, 0, 'Rumah Sakit Umum Daerah Cibinong', 'Jl. KSR Dadi Kusmayadi No.27, Tengah, Cibinong, Bogor, Jawa Barat 16914', -6.473298, 106.828362, '+62218753487', 'health23.png'),
(51, 0, 'Rumah Sakit Umum Daerah Ciawi', 'Jl. Raya Puncak Gadog No.479, Bendungan, Kec. Ciawi, Bogor, Jawa Barat 1672', -6.661374, 106.851257, '+622518240797', 'health24.png'),
(52, 0, 'Rumah Sakit Umum Daerah Cibabat', 'Jl. Jend. H. Amir Machmud No.140, Cibabat, Kec. Cimahi Utara, Kota Cimahi, ', -6.878837, 0.000000, '+62226652025', 'health25.png'),
(53, 0, 'RSUD Kota Bogor', 'Jl. DR. Sumeru No.120, RT.03/RW.20, Menteng, Kec. Bogor Bar., Kota Bogor, Jawa Barat', -6.580422, 106.775955, '+622518312292', 'health26.png'),
(54, 0, 'Rumah Sakit Umum Daerah Singaparna Medika Citrauta', 'Jl. Raya Rancamaya, Cikunten, Kec. Singaparna, Tasikmalaya, Jawa Barat 4641', -7.358825, 108.103935, '', 'health27.png'),
(55, 0, 'Rumah Sakit Medika Dramaga', 'Jl. Raya Dramaga No.KM. 7,3, RT.01/RW.06, Margajaya, Barat, Kota Bogor, Jawa Barat', -6.571573, 106.737335, '+622518308900', 'health28.png'),
(56, 0, 'Rumah Sakit BMC Mayapada', 'Jl. Pajajaran Indah V No.97, RT.01/RW.11, Baranangsiang, Kec. Bogor Tim., Kabupaten Bogor', -6.608013, 106.808968, '+622518307900', 'health29.png'),
(57, 0, 'RSUD Bayu Asih Kabupaten', 'Jl. Veteran No.39, Nagri Kaler, Kec. Purwakarta, Kabupaten Purwakarta, Jawa Barat', -6.545682, 107.434708, '+62264202215', 'health30.png'),
(58, 0, 'RSUD Karawang', 'Jl. Galuh Mas Raya No.1, Sukaharja, Kec. Telukjambe Tim., Kabupaten Karawang, Jawa Barat', -6.320768, 107.290939, '+62267640444', 'health31.png'),
(59, 0, 'RSUD Sekarwangi Sukabumi', 'Jl. Siliwangi No.49, Cibadak, Kec. Cibadak, Sukabumi Regency, Jawa Barat 43', -6.909712, 106.783829, '+62266531261', 'health32.png'),
(60, 0, 'Rumah Sakit Umum Daerah Kabupaten Subang', 'Jl. Brigjen Katamso No.37, Dangdeur, Kec. Subang, Kabupaten Subang, Jawa Barat', -6.557821, 107.744804, '+62260411421', 'health33.png'),
(61, 0, 'RSUD Waled Cirebon', 'Jl. Prabu Kiansantang No.4, Waled Kota, Waled, Cirebon, Jawa Barat 45187', -6.913000, 108.716377, '+62231661126', 'health34.png'),
(62, 0, 'Rumah Sakit Umum Daerah 45 ', 'Jl. Jend. Sudirman No.68, Awirarangan, Kec. Kuningan, Kabupaten Kuningan', -6.984353, 108.479424, '+62232871885', 'health35.png'),
(63, 0, 'Rumah Sakit Umum Daerah Sumedang', 'Jl. Palasari No.80, Kotakulon, Kec. Sumedang Sel., Kabupaten Sumedang, Jawa Barat', -6.857182, 107.918564, '+62261201021', 'health36.png'),
(64, 0, 'Rumah Sakit Umum Daerah Kota Banjar', 'Jl. Rumah Sakit Umum No.5, Hegarsari, Kec. Pataruman, Kota Banjar, Jawa Barat', -7.369020, 108.541039, '+62265741032', 'health37.png'),
(65, 0, 'Rumah Sakit Umum Daerah Kabupaten Ciamis', 'Jl. Rumah Sakit No.76, Ciamis, Kec. Ciamis, Kabupaten Ciamis, Jawa Barat 46', -7.334770, 108.289268, '+62265771018', 'health38.png'),
(66, 0, 'Rumah Sakit Umum Daerah Cideres ', 'Jl. Raya Barat Cideres No.180, Bojongcideres, Kec. Dawuan, Kabupaten Majalengka', -6.760709, 108.192833, '+62233661003', 'health39.png'),
(67, 0, 'Rumah Sakit Umum Daerah Majalaya', 'Jl. Cipaku No.87, Cipaku, Kec. Paseh, Bandung, Jawa Barat 40383', -7.049266, 107.769630, '+62225950035', 'health40.png'),
(68, 0, 'Rumah Sakit Umum Daerah Kota Depok', 'Jl. Raya Muchtar No.99, Sawangan Lama, Kec. Sawangan, Kota Depok, Jawa Barat', -6.403644, 106.756111, '+622518602514', 'health41.png'),
(69, 0, 'Rumah Sakit Umum Daerah Sayang', 'Jl. Pasirgede Raya No.1b, Bojongherang, Kec. Cianjur, Kabupaten Cianjur, Jawa Barat', -6.811005, 107.132401, '', 'health42.png'),
(70, 0, 'Rumah Sakit Immanuel', 'Jl. Raya Kopo No.161, Situsaeur, Kec. Bojongloa Kaler, Kota Bandung, Jawa Barat', -6.810221, 106.860954, '+62225201656', 'health43.png'),
(71, 0, 'Rumah Sakit Mitra Plumbon', 'Jl. Raya Plumbon - Palimanan No.KM, RW.11, Gombang, Kec. Plumbon, Cirebon, Jawa Barat 45155', -6.701633, 108.479370, '+62231323100', 'health44.png'),
(72, 0, 'RSTP Dr. H. A. Rotinsulu', 'Jl. Bukit Jarian No.40, Hegarmanah, Kota Bandung', -6.878845, 107.603851, '+62 22 2034446', 'health1121.png'),
(73, 0, 'RSAU Dr. M. Salamun Bandung', 'Jl. Ciumbuleuit No.203, Kota Bandung', -6.864727, 107.602776, '+62 22 2032090', 'health11211.png'),
(74, 0, 'RS Santo Borromeus Bandung', 'Jl. Ir. H.Djuanda No.100, Kota Bandung', -6.893990, 107.611488, '+62 22 2552001', 'health112111.png'),
(75, 0, 'RS Santo Yusup Bandung', 'Jl. Cikutra No. 7, Kota Bandung', -6.906670, 107.640907, '+62 22 7208172', 'health1121111.png'),
(76, 0, 'RS Advent Bandung', 'Jl. Cihampelas No.161, Kota Bandung', -6.891848, 107.601067, '+62 22 2034386', 'health1121112.png'),
(77, 0, 'RS Al Islam Bandung', 'Jl. Soekarno Hatta No. 644, Kota Bandung', -6.939002, 107.666985, '+62 22 756 5588', 'health11211111.png'),
(78, 0, 'Santosa Hospital Bandung Central', 'Jl.Kebonjati No.38, Kota Bandung', -6.915439, 107.598213, '+62 22 4348 333', 'health11211121.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_kecamatan`
--
ALTER TABLE `m_kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `t_kasus`
--
ALTER TABLE `t_kasus`
  ADD PRIMARY KEY (`id_kasus`);

--
-- Indexes for table `t_rumahsakit`
--
ALTER TABLE `t_rumahsakit`
  ADD PRIMARY KEY (`id_rumahsakit`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_kecamatan`
--
ALTER TABLE `m_kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_kasus`
--
ALTER TABLE `t_kasus`
  MODIFY `id_kasus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3340;

--
-- AUTO_INCREMENT for table `t_rumahsakit`
--
ALTER TABLE `t_rumahsakit`
  MODIFY `id_rumahsakit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
