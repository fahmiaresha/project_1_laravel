-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 14, 2020 at 09:11 PM
-- Server version: 10.2.31-MariaDB-log-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fahmiare_penjualan_triger`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` varchar(11) CHARACTER SET latin1 NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `status`, `created_at`, `updated_at`) VALUES
('CAT001', 'Minuman', 1, '2020-02-26 16:43:00', '2020-04-04 21:50:33'),
('CAT002', 'Makanan', 1, '2020-03-02 18:05:39', '2020-04-04 21:50:48'),
('CAT003', 'Baju', 1, '2020-04-04 21:50:26', '2020-04-04 21:51:17'),
('CAT004', 'Barang', 0, '2020-04-05 19:34:41', '2020-04-05 19:35:17');

--
-- Triggers `categories`
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
-- Table structure for table `customer`
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
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_Id`, `first_name`, `last_name`, `phone`, `email`, `street`, `city`, `state`, `zip_code`, `status`) VALUES
('CUS001', 'aresha', 'fahmi', '213123', 'areshafahm@gmail.com', 'Jl Kertajaya', 'surabaya', 'Indonesia', '61257', 1),
('CUS002', 'Zudi', 'Hardiansyah', '8912731', 'hardiansyah@gmail.com', 'Jl.Wonocolo', 'surabaya', 'Indonesia', '61257', 1),
('CUS003', 'Venny', 'Tauresia', '0823711123', 'Venyy@gmail.com', 'Jl. Anggur 99', 'Jakarta', 'Indonesia', '61254', 1),
('CUS004', 'Ali', 'Rans', '08912731231', 'alirans@gmail.com', 'Jl. Mangga 34', 'Jakarta', 'Indonesia', '61254', 0),
('CUS005', 'muhammad', 'aresha', '089234234', 'aresha234@gmail.com', 'jl durian 37', 'sidoarjo', 'Indonesia', '61257', 1),
('CUS006', 'Nadia', 'Amalia', '089123123', 'nadia@gmail.com', 'Jl. Anggur 312', 'Surabaya', 'Indonesia', '61254', 1);

--
-- Triggers `customer`
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
-- Table structure for table `product`
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
-- Triggers `product`
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
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `nota_id` varchar(11) NOT NULL,
  `customer_id` varchar(11) NOT NULL,
  `user_id` varchar(11) NOT NULL,
  `nota_date` date NOT NULL,
  `total_payment` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `sales`
--
DELIMITER $$
CREATE TRIGGER `sales_trigger` BEFORE INSERT ON `sales` FOR EACH ROW BEGIN
	SELECT SUBSTRING((MAX(`nota_id`)),7,4) INTO @max FROM sales;
    IF(@total >=1) THEN
    	SET new.nota_id = CONCAT(DATE_FORMAT(CURRENT_DATE,"%y%m%d"),LPAD(@max+1,4,'0'));
    ELSE
    	SET new.nota_id = CONCAT(DATE_FORMAT(CURRENT_DATE,"%y%m%d"),LPAD(1,4,'0'));
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `sales_detail`
--

CREATE TABLE `sales_detail` (
  `nota_id` varchar(11) NOT NULL,
  `product_id` varchar(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `selling_price` float NOT NULL,
  `discount` float NOT NULL,
  `total_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
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
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name2`, `last_name`, `email`, `phone`, `password`, `job_status`) VALUES
('US001', 'Fahmi', 'Aresha', 'fahmi@gmail.com', '0851231234', 'fahmi', 'Owner'),
('US002', 'Zudi', 'Hardiansyah', 'super_admin@gmail.com', '0819112323', 'zudi', 'Super Admin'),
('US003', 'Faiq', 'Anugrah', 'admin@gmail.com', '082513123', 'faiq', 'Admin'),
('US004', 'Gabriel', 'Aprilyan', 'kasir@gmail.com', '085134123', 'gabriel', 'Kasir');

--
-- Triggers `user`
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
  ADD PRIMARY KEY (`nota_id`),
  ADD KEY `fk_product_id` (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

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
  ADD CONSTRAINT `fk_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_Id`),
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `sales_detail`
--
ALTER TABLE `sales_detail`
  ADD CONSTRAINT `fk_nota_id` FOREIGN KEY (`nota_id`) REFERENCES `sales` (`nota_id`),
  ADD CONSTRAINT `fk_product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
