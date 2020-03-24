-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2020 at 09:06 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `created_at`, `updated_at`) VALUES
(21, 'minuman', '2020-02-26 23:43:00', '2020-02-26 23:43:00'),
(23, 'barang', '2020-02-26 23:45:15', '2020-02-26 23:45:15'),
(31, 'makanan', '2020-03-03 01:05:39', '2020-03-03 01:05:39');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_Id` int(11) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `street` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zip_code` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_Id`, `first_name`, `last_name`, `phone`, `email`, `street`, `city`, `state`, `zip_code`) VALUES
(103, 'Lintang Julia Purwanti', 'Diana Oktaviani S.T.', '5208', 'umi.simanjuntak@sudiati.or.id', 'Setia Budi', 'Administrasi Jakarta Pusat', 'Bengkulu', '61254'),
(104, 'Jasmani Rajasa S.Kom', 'Opung Candra Prabowo', '8134', 'ipermata@prasetyo.mil.id', 'Salak', 'Sungai Penuh', 'Kepulauan Riau', '61250'),
(105, 'Chelsea Halimah', 'Carla Winarsih', '7366', 'dongoran.irma@hardiansyah.ac.id', 'Bahagia ', 'Jayapura', 'Bali', '61256'),
(106, 'Hamima Winda Purwanti S.E.', 'Chandra Mansur', '7020', 'upermata@adriansyah.biz.id', 'Gotong Royong', 'Bekasi', 'Jawa Barat', '61254'),
(107, 'Okto Kasim Prasasta M.Pd', 'Cornelia Suartini S.Pd', '8987', 'owijaya@mandala.info', 'Bacang', 'Sungai Penuh', 'Sulawesi Barat', '61251'),
(108, 'Shania Aryani', 'Janet Utami', '8149', 'indra.wahyudin@yolanda.net', 'Halim', 'Tanjungbalai', 'Sumatera Barat', '61251'),
(109, 'Raden Akarsana Saputra', 'Jarwa Wibowo', '6387', 'kemba.hidayanto@jailani.net', 'Surapati', 'Pagar Alam', 'Sulawesi Utara', '61251'),
(110, 'Paulin Mayasari', 'Adhiarja Virman Winarno', '6523', 'cici08@megantara.desa.id', 'Nangka', 'Mataram', 'Sulawesi Tengah', '61259'),
(111, 'Hilda Prastuti', 'Balijan Ajimat Lazuardi', '9578', 'budiyanto.ifa@nasyiah.ac.id', 'Raya Ujungberung', 'Parepare', 'Sulawesi Tengah', '61255'),
(112, 'Gamblang Wasita S.Farm', 'Oskar Megantara', '8824', 'cager21@prastuti.web.id', 'Juanda', 'Sukabumi', 'Sulawesi Barat', '61251'),
(114, 'Umi Suryatmi', 'Purwanto Simbolon M.Ak', '5055', 'hasanah.anita@saefullah.mil.id', 'Diponegoro', 'Padangpanjang', 'Jawa Barat', '61251'),
(115, 'Julia Melani', 'Dadap Dalimin Sihombing', '7229', 'ldabukke@januar.biz', 'Soekarno Hatta', 'Bitung', 'Kalimantan Barat', '61251'),
(116, 'Mariadi Arta Ramadan', 'Ami Siska Zulaika', '5540', 'saragih.anita@mustofa.name', 'Arifin', 'Kediri', 'Sulawesi Barat', '61255'),
(117, 'Marsudi Simanjuntak', 'Langgeng Himawan Dongoran S.Kom', '5856', 'wulan.wasita@manullang.co.id', 'Kiaracondong', 'Ambon', 'Maluku', '61259'),
(118, 'Warta Wibowo S.Farm', 'Ibrahim Nashiruddin', '6701', 'puspa97@waluyo.tv', 'Ketandan', 'Kotamobagu', 'Jawa Barat', '61252'),
(119, 'Nabila Halimah', 'Laila Utami', '6049', 'titin.lailasari@kusumo.info', 'Suniaraja', 'Madiun', 'Kalimantan Timur', '61256'),
(120, 'Cecep Gadang Prasasta S.Kom', 'Gada Harja Latupono', '5111', 'sabrina.megantara@usamah.asia', 'S. Parman', 'Metro', 'Aceh', '61254'),
(121, 'Farhunnisa Wulandari', 'Among Salahudin S.Farm', '5939', 'ayu.laksita@prabowo.com', 'Acordion', 'Parepare', 'Papua Barat', '61253'),
(122, 'Umi Natalia Hariyah', 'Teddy Pranowo', '5949', 'kuswoyo.kasusra@ardianto.com', 'Jend. Sudirman', 'Magelang', 'Sulawesi Utara', '61250'),
(123, 'Ana Padmasari', 'Surya Uda Siregar', '5174', 'yuliarti.rahayu@wasita.co.id', 'Daan', 'Lhokseumawe', 'Kepulauan Riau', '61257'),
(124, 'Kariman Siregar', 'Emas Galuh Irawan', '8141', 'ayu57@kurniawan.in', 'Radio', 'Pagar Alam', 'Kalimantan Selatan', '61250'),
(125, 'Bella Mardhiyah', 'Jaeman Utama', '6139', 'wijayanti.tira@astuti.asia', 'Nanas', 'Padang', 'Jawa Timur', '61250'),
(126, 'Lamar Waluyo', 'Irsad Manah Nainggolan', '6145', 'halima.pertiwi@rajata.biz', 'Antapani Lama', 'Gorontalo', 'Papua', '61253'),
(127, 'Capa Viktor Budiyanto S.Pd', 'Rini Faizah Zulaika', '5012', 'yance06@pudjiastuti.go.id', 'Sudirman', 'Bekasi', 'Maluku Utara', '61252'),
(128, 'Emong Saptono M.M.', 'Keisha Ajeng Wijayanti M.TI.', '5477', 'waskita.titi@halimah.biz', 'Yohanes', 'Mataram', 'Sumatera Utara', '61252'),
(129, 'Anggabaya Jailani', 'Lintang Dian Suartini', '8814', 'lestari.ilyas@damanik.co', 'Sunaryo', 'Bitung', 'Maluku Utara', '61253'),
(130, 'Himawan Tamba', 'Abyasa Banara Dongoran', '7187', 'clazuardi@lazuardi.ac.id', 'Untung Suropati', 'Mataram', 'Kalimantan Barat', '61250'),
(131, 'Candrakanta Haryanto', 'Jaswadi Tamba', '6264', 'dono21@hidayat.desa.id', 'Baranang Siang', 'Sawahlunto', 'Jawa Barat', '61255'),
(132, 'Balijan Samosir S.Pd', 'Syahrini Almira Kusmawati', '6984', 'kamidin.kuswandari@safitri.desa.id', 'W.R. Supratman', 'Administrasi Jakarta Utara', 'Nusa Tenggara Timur', '61254'),
(133, 'Ratna Safitri M.Ak', 'Warji Prayoga', '9335', 'suryono.soleh@permata.biz', 'Industri', 'Pontianak', 'DKI Jakarta', '61253'),
(134, 'Gilda Cornelia Usamah', 'Makuta Prasasta', '8740', 'abyasa.rahmawati@mustofa.ac.id', 'Abdul Rahmat', 'Serang', 'Kalimantan Tengah', '61258'),
(135, 'Zaenab Maryati', 'Teguh Arta Adriansyah S.Sos', '8960', 'utama.firmansyah@yuliarti.ac.id', 'Jamika', 'Payakumbuh', 'Sulawesi Tenggara', '61253'),
(136, 'Ade Uli Yuliarti M.Farm', 'Rahayu Keisha Kusmawati', '9772', 'smaryati@yolanda.org', 'Dipenogoro', 'Denpasar', 'Papua', '61255'),
(137, 'Kiandra Namaga S.Gz', 'Farah Mardhiyah M.Pd', '9664', 'restu63@yulianti.my.id', 'Bah Jaya', 'Palopo', 'Gorontalo', '61255'),
(138, 'Maria Zulaika S.T.', 'Clara Yance Yolanda', '9119', 'mulyani.waluyo@utama.org', 'Wahidin', 'Jayapura', 'Sulawesi Tengah', '61251'),
(139, 'Juli Permata', 'Jane Rahimah', '7123', 'salahudin.nadia@saragih.co', 'Pasirkoja', 'Tanjung Pinang', 'Sumatera Utara', '61258'),
(140, 'zzz', 'fahmi', '8912731', 'areshafahm@gmail.com', 'wonocolo', 'surabaya', 'Singapore', '61257'),
(141, 'aresha', 'fahmiwsq', '213123', 'areshafahm@gmail.com', 'wonocolo', 'surabaya', 'Singapore', '61257'),
(142, 'aresha', 'fahmi', '8912731', 'areshafahm@gmail.com', 'wonocolo', 'surabaya', 'Singapore', '61257');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2020_02_24_022934_create_categories_table', 1),
(2, '2020_03_23_101120_create_model_users_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `murid`
--

CREATE TABLE `murid` (
  `Id` int(11) NOT NULL,
  `Nama` varchar(250) NOT NULL,
  `Alamat` varchar(250) NOT NULL,
  `Telpon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `murid`
--

INSERT INTO `murid` (`Id`, `Nama`, `Alamat`, `Telpon`) VALUES
(1, 'Aresha', 'Wonocolo', '0312137123'),
(2, 'Muhammad', 'Wonocolo', '0891231273');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_price` float NOT NULL,
  `product_stok` int(10) NOT NULL,
  `explanation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `category_id`, `product_name`, `product_price`, `product_stok`, `explanation`) VALUES
(6, 23, 'chikuu', 8000, 1, 'sddd'),
(7, 31, 'chiki', 8000, 2, 'asd'),
(8, 31, 'casdj', 8000, 2, 'asd'),
(9, 31, 'sayaaa', 8000, 2, 'asd'),
(10, 31, 'chikuu', 9000, 1, '2133123'),
(11, 31, 'chikuu', 8000, 22, '2133123'),
(13, 21, 'fanta', 9000, 2, 'murah'),
(14, 21, 'Sprit', 900, 6, 'murah');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `nota_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nota_date` date NOT NULL,
  `total_payment` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`nota_id`, `customer_id`, `user_id`, `nota_date`, `total_payment`) VALUES
(4, 52, 4, '2020-03-14', 213),
(5, 53, 4, '2020-03-14', 213213000),
(6, 52, 3, '2020-03-14', 9888),
(7, 87, 4, '2020-03-21', 93000),
(9, 82, 4, '2020-03-21', 93000),
(10, 91, 4, '2020-03-22', 93000),
(11, 93, 4, '2020-03-22', 12000),
(12, 100, 3, '2020-03-22', 555),
(13, 92, 5, '2020-03-22', 123),
(14, 106, 4, '2020-03-23', 99999),
(15, 107, 5, '2020-03-23', 7456460),
(16, 108, 4, '2020-03-23', 678678);

-- --------------------------------------------------------

--
-- Table structure for table `sales_detail`
--

CREATE TABLE `sales_detail` (
  `nota_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `selling_price` float NOT NULL,
  `discount` float NOT NULL,
  `total_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_detail`
--

INSERT INTO `sales_detail` (`nota_id`, `product_id`, `quantity`, `selling_price`, `discount`, `total_price`) VALUES
(1, 11, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name2` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(12) NOT NULL,
  `password` char(8) NOT NULL,
  `job_status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name2`, `last_name`, `email`, `phone`, `password`, `job_status`) VALUES
(3, 'fa', 'ar', 'areshafahm@gmail.com', 8912731, 'jhhgasd', 'hfh'),
(4, 'aresha', 'fahmi', 'areshafahm@gmail.com', 8912731, 'asdd', 'aresha fahmi'),
(5, 'aresha', 'fahmi', 'areshafahm@gmail.com', 8912731, '123123', 'aresha fahmi'),
(7, '1', '2', 'areshafahm@gmail.com', 8912731, 'asd', '1 2');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'admin@gmail.com', '$2y$10$8YGtvXEDqHZctZsRpxQ.YulkorBpNcvqc/jkpIR9XEuIojNdvaEwa', 'admin', NULL, '2020-03-23 04:37:59', '2020-03-23 04:37:59'),
(5, 'fahmi@gmail.com', '$2y$10$P7Pxw4qe9f1Ya/kFJUn5CuGdtfPgzCUYrTE6ciSoN7HmDnqDLsvKy', 'fahmi', NULL, '2020-03-23 04:40:49', '2020-03-23 04:40:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_Id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `murid`
--
ALTER TABLE `murid`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `fk_category_id` (`category_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`nota_id`),
  ADD KEY `fk_customer_id` (`customer_id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexes for table `sales_detail`
--
ALTER TABLE `sales_detail`
  ADD KEY `fk_nota_id` (`nota_id`),
  ADD KEY `fk_product_id` (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `murid`
--
ALTER TABLE `murid`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `nota_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `sales_detail`
--
ALTER TABLE `sales_detail`
  ADD CONSTRAINT `fk_product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
