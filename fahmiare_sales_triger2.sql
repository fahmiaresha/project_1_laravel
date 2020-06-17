-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 14 Bulan Mei 2020 pada 14.18
-- Versi server: 10.2.31-MariaDB-log-cll-lve
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fahmiare_sales_triger2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `about`
--

CREATE TABLE `about` (
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `about`
--

INSERT INTO `about` (`first_name`, `last_name`, `email`, `phone_number`, `message`) VALUES
('fahmi', 'aresha', 'aresha234@gmail.com', '089234234', 'asd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `category_id` varchar(11) CHARACTER SET latin1 NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `status`, `created_at`, `updated_at`) VALUES
('CAT001', 'Minuman', 1, '2020-02-26 16:43:00', '2020-04-04 21:50:33'),
('CAT002', 'Makanan', 1, '2020-03-02 18:05:39', '2020-04-04 21:50:48'),
('CAT003', 'Baju', 1, '2020-04-04 21:50:26', '2020-04-04 21:51:17'),
('CAT004', 'Barang', 0, '2020-04-05 19:34:41', '2020-04-05 19:35:17');

--
-- Trigger `categories`
--
DELIMITER $$
CREATE TRIGGER `cat_triger` BEFORE INSERT ON `categories` FOR EACH ROW BEGIN
	SELECT SUBSTRING((MAX(`category_id`)),4,3) INTO @total FROM categories;
    IF(@total >=1) THEN
    	SET new.category_id = CONCAT('CAT',LPAD(@total+1,3,'0'));
    ELSE
    	SET new.category_id = CONCAT('CAT',LPAD(1,3,'0'));
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `customer_Id` varchar(11) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `street` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zip_code` varchar(5) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`customer_Id`, `first_name`, `last_name`, `phone`, `email`, `street`, `city`, `state`, `zip_code`, `status`) VALUES
('CUS001', 'Abdullah', 'Faiq', '0851236557', 'faiq@gmail.com', 'Jl. Kertajaya', 'Surabaya', 'Indonesia', '61257', 1),
('CUS002', 'Zudi', 'Hardiansyah', '08512312557', 'hardiansyah@gmail.com', 'Jl. Wonocolo', 'Surabaya', 'Indonesia', '61257', 1),
('CUS003', 'Venny', 'Tauresia', '0823711123', 'venyy@gmail.com', 'Jl. Anggur ', 'Jakarta', 'Indonesia', '61254', 1),
('CUS004', 'Ali', 'Rans', '08912731231', 'alirans@gmail.com', 'Jl. Mangga ', 'Jakarta', 'Indonesia', '61254', 0),
('CUS005', 'Melinda', 'Aulia', '08744536557', 'melinda@gmail.com', 'Jl. Durian', 'Sidoarjo', 'Indonesia', '61257', 1),
('CUS006', 'Nadia', 'Amalia', '081156126557', 'nadia@gmail.com', 'Jl. Anggur', 'Surabaya', 'Indonesia', '61254', 1);

--
-- Trigger `customer`
--
DELIMITER $$
CREATE TRIGGER `cus_trigger` BEFORE INSERT ON `customer` FOR EACH ROW BEGIN
	SELECT SUBSTRING((MAX(`customer_Id`)),4,3) INTO @total FROM customer;
    IF(@total >=1) THEN
    	SET new.customer_Id = CONCAT('CUS',LPAD(@total+1,3,'0'));
    ELSE
    	SET new.customer_Id = CONCAT('CUS',LPAD(1,3,'0'));
    END IF;
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

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2020_02_24_022934_create_categories_table', 1),
(2, '2020_03_23_101120_create_model_users_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `product_id` varchar(11) NOT NULL,
  `category_id` varchar(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_price` float NOT NULL,
  `product_stok` int(10) NOT NULL,
  `explanation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`product_id`, `category_id`, `product_name`, `product_price`, `product_stok`, `explanation`) VALUES
('PR001', 'CAT002', 'Siomay', 10000, 100, '-'),
('PR002', 'CAT001', 'fanta', 7000, 100, '-'),
('PR003', 'CAT002', 'Chitatos', 7000, 70, '-'),
('PR004', 'CAT001', 'Sprite', 9000, 50, '-'),
('PR005', 'CAT002', 'Oreo Coklat', 10000, 20, '-'),
('PR006', 'CAT002', 'Oreo Vanilla', 10000, 200, '-'),
('PR007', 'CAT002', 'Oreo Keju', 10000, 150, '-');

--
-- Trigger `product`
--
DELIMITER $$
CREATE TRIGGER `product_trigger` BEFORE INSERT ON `product` FOR EACH ROW BEGIN
	SELECT SUBSTRING((MAX(`product_id`)),3,3) INTO @total FROM product;
    IF(@total >=1) THEN
    	SET new.product_id = CONCAT('PR',LPAD(@total+1,3,'0'));
    ELSE
    	SET new.product_id = CONCAT('PR',LPAD(1,3,'0'));
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sales`
--

CREATE TABLE `sales` (
  `nota_id` varchar(11) NOT NULL,
  `customer_id` varchar(11) NOT NULL,
  `user_id` varchar(11) NOT NULL,
  `nota_date` date NOT NULL,
  `total_payment` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sales`
--

INSERT INTO `sales` (`nota_id`, `customer_id`, `user_id`, `nota_date`, `total_payment`) VALUES
('2004160001', 'CUS002', 'US001', '2020-04-16', 36300),
('2004160002', 'CUS003', 'US001', '2020-04-09', 4900),
('2004160003', 'CUS002', 'US001', '2020-04-16', 18700),
('2004170004', 'CUS003', 'US002', '2020-04-17', 15400),
('2004210005', 'CUS001', 'US001', '2020-04-21', 7700),
('2004210006', 'CUS001', 'US001', '2020-04-21', 26400),
('2004210007', 'CUS006', 'US003', '2020-04-21', 36300),
('2004220008', 'CUS006', 'US001', '2020-04-22', 7700),
('2004230009', 'CUS003', 'US001', '2020-04-23', 44000),
('2004230010', 'CUS006', 'US001', '2020-04-23', 69300),
('2004230011', 'CUS004', 'US001', '2020-04-23', 33500),
('2004230012', 'CUS006', 'US001', '2020-04-23', 22000),
('2004230013', 'CUS004', 'US001', '2020-04-23', 63600),
('2004230014', 'CUS006', 'US001', '2020-04-23', 104900),
('2004270015', 'CUS002', 'US001', '2020-04-27', 26200),
('2004270016', 'CUS006', 'US004', '2020-04-27', 106700),
('2005140017', 'CUS006', 'US001', '2020-05-14', 10200);

--
-- Trigger `sales`
--
DELIMITER $$
CREATE TRIGGER `sales_trigger` BEFORE INSERT ON `sales` FOR EACH ROW BEGIN
	SELECT SUBSTRING((MAX(`nota_id`)),7,4) INTO @max FROM sales;
    IF(@max >=1) THEN
    	SET new.nota_id = CONCAT(DATE_FORMAT(CURRENT_DATE,"%y%m%d"),LPAD(@max+1,4,'0'));
    ELSE
    	SET new.nota_id = CONCAT(DATE_FORMAT(CURRENT_DATE,"%y%m%d"),LPAD(1,4,'0'));
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sales_detail`
--

CREATE TABLE `sales_detail` (
  `nota_id` varchar(11) NOT NULL,
  `product_id` varchar(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `selling_price` float NOT NULL,
  `discount` float NOT NULL,
  `total_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sales_detail`
--

INSERT INTO `sales_detail` (`nota_id`, `product_id`, `quantity`, `selling_price`, `discount`, `total_price`) VALUES
('2004160001', 'PR001', 1, 10000, 0, 10000),
('2004160001', 'PR002', 1, 7000, 0, 7000),
('2004160001', 'PR003', 1, 7000, 0, 7000),
('2004160001', 'PR004', 1, 9000, 0, 9000),
('2004160002', 'PR002', 1, 7000, 3500, 7000),
('2004160002', 'PR003', 1, 7000, 7000, 7000),
('2004160003', 'PR001', 1, 10000, 0, 10000),
('2004160003', 'PR002', 1, 7000, 0, 7000),
('2004170004', 'PR002', 1, 7000, 0, 7000),
('2004170004', 'PR003', 1, 7000, 0, 7000),
('2004210005', 'PR003', 1, 7000, 0, 7000),
('2004210006', 'PR001', 1, 10000, 0, 10000),
('2004210006', 'PR002', 2, 7000, 0, 14000),
('2004210007', 'PR001', 1, 10000, 0, 10000),
('2004210007', 'PR002', 1, 7000, 0, 7000),
('2004210007', 'PR003', 1, 7000, 0, 7000),
('2004210007', 'PR004', 1, 9000, 0, 9000),
('2004220008', 'PR003', 1, 7000, 0, 7000),
('2004230009', 'PR005', 2, 10000, 0, 20000),
('2004230009', 'PR006', 1, 10000, 0, 10000),
('2004230009', 'PR007', 1, 10000, 0, 10000),
('2004230010', 'PR001', 1, 10000, 0, 10000),
('2004230010', 'PR002', 1, 7000, 0, 7000),
('2004230010', 'PR003', 1, 7000, 0, 7000),
('2004230010', 'PR004', 1, 9000, 0, 9000),
('2004230010', 'PR005', 1, 10000, 0, 10000),
('2004230010', 'PR006', 1, 10000, 0, 10000),
('2004230010', 'PR007', 1, 10000, 0, 10000),
('2004230011', 'PR003', 3, 7000, 10500, 21000),
('2004230011', 'PR004', 1, 9000, 0, 9000),
('2004230011', 'PR006', 1, 10000, 0, 10000),
('2004230012', 'PR006', 1, 10000, 0, 10000),
('2004230012', 'PR007', 1, 10000, 0, 10000),
('2004230013', 'PR003', 8, 7000, 28000, 56000),
('2004230013', 'PR006', 2, 10000, 10000, 20000),
('2004230013', 'PR007', 3, 10000, 15000, 30000),
('2004230014', 'PR001', 3, 10000, 30000, 30000),
('2004230014', 'PR002', 7, 7000, 0, 49000),
('2004230014', 'PR005', 5, 10000, 25000, 50000),
('2004230014', 'PR006', 3, 10000, 15000, 30000),
('2004270015', 'PR003', 2, 7000, 0, 14000),
('2004270015', 'PR004', 2, 9000, 9000, 18000),
('2004270016', 'PR003', 1, 7000, 0, 7000),
('2004270016', 'PR004', 10, 9000, 0, 90000),
('2005140017', 'PR001', 1, 10000, 5000, 10000),
('2005140017', 'PR002', 1, 7000, 3500, 7000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` varchar(11) NOT NULL,
  `first_name2` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `password` varchar(15) NOT NULL,
  `job_status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `first_name2`, `last_name`, `email`, `phone`, `password`, `job_status`) VALUES
('US001', 'Fahmi', 'Aresha', 'fahmi@gmail.com', '0851231234', 'fahmi', 'Owner'),
('US002', 'Zudi', 'Hardiansyah', 'super_admin@gmail.com', '0819112323', 'zudi', 'Super Admin'),
('US003', 'Faiq', 'Anugrah', 'admin@gmail.com', '082513123', 'faiq', 'Admin'),
('US004', 'Gabriel', 'Aprilyan', 'kasir@gmail.com', '085134123', 'gabriel', 'Kasir');

--
-- Trigger `user`
--
DELIMITER $$
CREATE TRIGGER `user_trigger` BEFORE INSERT ON `user` FOR EACH ROW BEGIN
	SELECT SUBSTRING((MAX(`user_id`)),3,3) INTO @total FROM user;
    IF(@total >=1) THEN
    	SET new.user_id = CONCAT('US',LPAD(@total+1,3,'0'));
    ELSE
    	SET new.user_id = CONCAT('US',LPAD(1,3,'0'));
    END IF;
END
$$
DELIMITER ;

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
  ADD PRIMARY KEY (`customer_Id`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `fk_category_id` (`category_id`);

--
-- Indeks untuk tabel `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`nota_id`),
  ADD KEY `fk_customer_id` (`customer_id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indeks untuk tabel `sales_detail`
--
ALTER TABLE `sales_detail`
  ADD PRIMARY KEY (`nota_id`,`product_id`),
  ADD KEY `fk_product_id` (`product_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);

--
-- Ketidakleluasaan untuk tabel `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `fk_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_Id`),
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Ketidakleluasaan untuk tabel `sales_detail`
--
ALTER TABLE `sales_detail`
  ADD CONSTRAINT `fk_nota_id` FOREIGN KEY (`nota_id`) REFERENCES `sales` (`nota_id`),
  ADD CONSTRAINT `fk_product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
