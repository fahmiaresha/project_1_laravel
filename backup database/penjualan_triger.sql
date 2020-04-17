-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Apr 2020 pada 08.33
-- Versi server: 10.1.34-MariaDB
-- Versi PHP: 7.2.7

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
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `category_id` char(5) NOT NULL,
  `category_name` varchar(50) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `status`) VALUES
('CAT01', 'Makanan', 1),
('CAT02', 'MinumanN', 1),
('CAT03', 'Kosmetik', 1);

--
-- Trigger `categories`
--
DELIMITER $$
CREATE TRIGGER `ID_CATEGORY` BEFORE INSERT ON `categories` FOR EACH ROW BEGIN 
	INSERT INTO tsequancecategory VALUES ("");
	SELECT MAX(CATEGORY_ID) INTO @ID
	FROM tsequancecategory;
	SET new.category_id=CONCAT('CAT',LPAD(@ID,2,'0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `customer_id` char(6) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `phone` decimal(12,0) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `street` varchar(100) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `zip_code` decimal(5,0) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`customer_id`, `first_name`, `last_name`, `phone`, `email`, `street`, `city`, `state`, `zip_code`, `status`) VALUES
('CUS003', 'ayu', 'nind', '85111222333', 'ayunindyarista@gmail.com', 'kedurus', 'Surabaya', 'STATE', '5', 1),
('CUS004', 'hanum', 'dwi', '85111222333', 'hanumdwi@gmail.com', 'JL Mojo', 'Surabaya', 'Indonesia', '9', 1);

--
-- Trigger `customer`
--
DELIMITER $$
CREATE TRIGGER `ID_CUSTOMER` BEFORE INSERT ON `customer` FOR EACH ROW BEGIN 
	INSERT INTO tsequancecustomer2 VALUES ("");
	SELECT MAX(CUSTOMER_ID) INTO @ID
	FROM tsequancecustomer2;
	SET new.customer_id=CONCAT('CUS',LPAD(@ID,3,'0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `user_id` char(5) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` decimal(12,0) DEFAULT NULL,
  `password` char(8) DEFAULT NULL,
  `job_status` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`user_id`, `first_name`, `last_name`, `email`, `phone`, `password`, `job_status`) VALUES
('US001', 'M Risky', 'Alfiansyah', 'alfiansyah@gmail.com', '85111222333', 'fian123', 'admin'),
('US002', 'M Risky', 'Alfiansyah', 'alfiansyah@gmail.com', '85111222333', 'fian123', 'admin'),
('US003', 'M Risky', 'Alfiansyah', 'alfiansyah@gmail.com', '85111222333', 'fian123', 'super admin');

--
-- Trigger `pegawai`
--
DELIMITER $$
CREATE TRIGGER `ID_USER` BEFORE INSERT ON `pegawai` FOR EACH ROW BEGIN 
	INSERT INTO tsequanceuser VALUES ("");
	SELECT MAX(USER_ID) INTO @ID
	FROM tsequanceuser;
	SET new.user_id=CONCAT('US',LPAD(@ID,3,'0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `product_id` char(6) NOT NULL,
  `category_id` char(5) NOT NULL,
  `product_name` varchar(50) DEFAULT NULL,
  `product_price` float DEFAULT NULL,
  `product_stock` int(11) DEFAULT NULL,
  `explanation` text,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`product_id`, `category_id`, `product_name`, `product_price`, `product_stock`, `explanation`, `status`) VALUES
('PRO001', 'CAT01', 'Indomie', 2500, 50, 'ini makanan', 1),
('PRO002', 'CAT02', 'Aqua', 3000, 20, 'air mineral', 1);

--
-- Trigger `product`
--
DELIMITER $$
CREATE TRIGGER `ID_PRODUCT` BEFORE INSERT ON `product` FOR EACH ROW BEGIN 
	INSERT INTO tsequanceproduct VALUES ("");
	SELECT MAX(PRODUCT_ID) INTO @ID
	FROM tsequanceproduct;
	SET new.product_id=CONCAT('PRO',LPAD(@ID,3,'0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sales`
--

CREATE TABLE `sales` (
  `nota_id` char(7) NOT NULL,
  `user_id` char(5) DEFAULT NULL,
  `customer_id` char(6) DEFAULT NULL,
  `nota_date` date DEFAULT NULL,
  `total_payment` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sales_detail`
--

CREATE TABLE `sales_detail` (
  `nota_id` char(7) NOT NULL,
  `product_id` char(6) NOT NULL,
  `quantity` decimal(2,0) DEFAULT NULL,
  `selling_price` float DEFAULT NULL,
  `discount` float DEFAULT NULL,
  `total_price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tsequancecategory`
--

CREATE TABLE `tsequancecategory` (
  `CATEGORY_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tsequancecategory`
--

INSERT INTO `tsequancecategory` (`CATEGORY_ID`) VALUES
(1),
(2),
(3),
(4),
(5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tsequancecustomer2`
--

CREATE TABLE `tsequancecustomer2` (
  `CUSTOMER_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tsequancecustomer2`
--

INSERT INTO `tsequancecustomer2` (`CUSTOMER_ID`) VALUES
(3),
(4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tsequanceproduct`
--

CREATE TABLE `tsequanceproduct` (
  `PRODUCT_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tsequanceproduct`
--

INSERT INTO `tsequanceproduct` (`PRODUCT_ID`) VALUES
(1),
(2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tsequanceuser`
--

CREATE TABLE `tsequanceuser` (
  `USER_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tsequanceuser`
--

INSERT INTO `tsequanceuser` (`USER_ID`) VALUES
(1),
(2),
(3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'dwi', 'dwi@gmail.com', NULL, '$2y$10$tv6aWcEZamFK1.xqxbk6tOY7nc6OjfPxgDBE/6Rt.we9gZxIbcGci', 'RZD2GycJGTOl7tb9s45AzYRNgzRiBsSqq56BeCF6gg2UT7pNGhQgVDjVUwTG', '2020-04-12 21:51:27', '2020-04-12 21:51:27');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`user_id`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `FK_CATEGORI_TO_PRODUCT` (`category_id`);

--
-- Indeks untuk tabel `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`nota_id`),
  ADD KEY `FK_CUST_TO_SALES` (`customer_id`),
  ADD KEY `FK_USER_TO_SALES` (`user_id`);

--
-- Indeks untuk tabel `sales_detail`
--
ALTER TABLE `sales_detail`
  ADD PRIMARY KEY (`nota_id`,`product_id`),
  ADD KEY `FK_DETAIL_TO_PRODUCT` (`product_id`);

--
-- Indeks untuk tabel `tsequancecategory`
--
ALTER TABLE `tsequancecategory`
  ADD PRIMARY KEY (`CATEGORY_ID`);

--
-- Indeks untuk tabel `tsequancecustomer2`
--
ALTER TABLE `tsequancecustomer2`
  ADD PRIMARY KEY (`CUSTOMER_ID`);

--
-- Indeks untuk tabel `tsequanceproduct`
--
ALTER TABLE `tsequanceproduct`
  ADD PRIMARY KEY (`PRODUCT_ID`);

--
-- Indeks untuk tabel `tsequanceuser`
--
ALTER TABLE `tsequanceuser`
  ADD PRIMARY KEY (`USER_ID`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tsequancecategory`
--
ALTER TABLE `tsequancecategory`
  MODIFY `CATEGORY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tsequancecustomer2`
--
ALTER TABLE `tsequancecustomer2`
  MODIFY `CUSTOMER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tsequanceproduct`
--
ALTER TABLE `tsequanceproduct`
  MODIFY `PRODUCT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tsequanceuser`
--
ALTER TABLE `tsequanceuser`
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_CATEGORI_TO_PRODUCT` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);

--
-- Ketidakleluasaan untuk tabel `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `FK_CUST_TO_SALES` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `FK_USER_TO_SALES` FOREIGN KEY (`user_id`) REFERENCES `pegawai` (`user_id`);

--
-- Ketidakleluasaan untuk tabel `sales_detail`
--
ALTER TABLE `sales_detail`
  ADD CONSTRAINT `FK_DETAIL_TO_PRODUCT` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `FK_SALES_TO_DETAIL` FOREIGN KEY (`nota_id`) REFERENCES `sales` (`nota_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
