-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2020 at 03:29 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_laravel2`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `CATEGORY_ID` char(5) NOT NULL,
  `CATEGORY_NAME` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`CATEGORY_ID`, `CATEGORY_NAME`) VALUES
('CAT01', 'Makanan'),
('CAT02', 'MinumanN'),
('CAT03', 'Kosmetik');

--
-- Triggers `categories`
--
DELIMITER $$
CREATE TRIGGER `ID_CATEGORY` BEFORE INSERT ON `categories` FOR EACH ROW BEGIN 
	INSERT INTO tsequancecategory VALUES ("");
	SELECT MAX(category_id) INTO @ID
	FROM tsequancecategory;
	SET new.CATEGORY_ID=CONCAT('CAT',LPAD(@ID,2,'0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CUSTOMER_ID` char(6) NOT NULL,
  `FIRST_NAME` varchar(50) DEFAULT NULL,
  `LAST_NAME` varchar(50) DEFAULT NULL,
  `PHONE` decimal(12,0) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `STREET` varchar(100) DEFAULT NULL,
  `CITY` varchar(50) DEFAULT NULL,
  `STATE` varchar(50) DEFAULT NULL,
  `ZIP_CODE` decimal(5,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CUSTOMER_ID`, `FIRST_NAME`, `LAST_NAME`, `PHONE`, `EMAIL`, `STREET`, `CITY`, `STATE`, `ZIP_CODE`) VALUES
('CUS003', 'ayu', 'nind', '85111222333', 'ayunindyarista@gmail.com', 'kedurus', 'Surabaya', 'STATE', '5'),
('CUS004', 'hanum', 'dwi', '85111222333', 'hanumdwi@gmail.com', 'JL Mojo', 'Surabaya', 'Indonesia', '9');

--
-- Triggers `customer`
--
DELIMITER $$
CREATE TRIGGER `ID_CUSTOMER` BEFORE INSERT ON `customer` FOR EACH ROW BEGIN 
	INSERT INTO tsequancecustomer2 VALUES ("");
	SELECT MAX(customer_id) INTO @ID
	FROM tsequancecustomer2;
	SET new.CUSTOMER_ID=CONCAT('CUS',LPAD(@ID,3,'0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `PRODUCT_ID` char(6) NOT NULL,
  `CATEGORY_ID` char(5) NOT NULL,
  `PRODUCT_NAME` varchar(50) DEFAULT NULL,
  `PRODUCT_PRICE` float DEFAULT NULL,
  `PRODUCT_STOCK` decimal(3,0) DEFAULT NULL,
  `EXPLANATION` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`PRODUCT_ID`, `CATEGORY_ID`, `PRODUCT_NAME`, `PRODUCT_PRICE`, `PRODUCT_STOCK`, `EXPLANATION`) VALUES
('PRO001', 'CAT01', 'Indomie', 2500, '50', 'ini makanan'),
('PRO002', 'CAT02', 'Aqua', 3000, '20', 'air mineral');

--
-- Triggers `product`
--
DELIMITER $$
CREATE TRIGGER `ID_PRODUCT` BEFORE INSERT ON `product` FOR EACH ROW BEGIN 
	INSERT INTO tsequanceproduct VALUES ("");
	SELECT MAX(product_id) INTO @ID
	FROM tsequanceproduct;
	SET new.PRODUCT_ID=CONCAT('PRO',LPAD(@ID,3,'0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `NOTA_ID` char(7) NOT NULL,
  `USER_ID` char(5) DEFAULT NULL,
  `CUSTOMER_ID` char(6) DEFAULT NULL,
  `NOTA_DATE` date DEFAULT NULL,
  `TOTAL_PAYMENT` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales_detail`
--

CREATE TABLE `sales_detail` (
  `NOTA_ID` char(7) NOT NULL,
  `PRODUCT_ID` char(6) NOT NULL,
  `QUANTITY` decimal(2,0) DEFAULT NULL,
  `SELLING_PRICE` float DEFAULT NULL,
  `DISCOUNT` float DEFAULT NULL,
  `TOTAL_PRICE` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tsequancecategory`
--

CREATE TABLE `tsequancecategory` (
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tsequancecategory`
--

INSERT INTO `tsequancecategory` (`category_id`) VALUES
(1),
(2),
(3),
(4),
(5);

-- --------------------------------------------------------

--
-- Table structure for table `tsequancecustomer2`
--

CREATE TABLE `tsequancecustomer2` (
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tsequancecustomer2`
--

INSERT INTO `tsequancecustomer2` (`customer_id`) VALUES
(3),
(4);

-- --------------------------------------------------------

--
-- Table structure for table `tsequanceproduct`
--

CREATE TABLE `tsequanceproduct` (
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tsequanceproduct`
--

INSERT INTO `tsequanceproduct` (`product_id`) VALUES
(1),
(2);

-- --------------------------------------------------------

--
-- Table structure for table `tsequanceuser`
--

CREATE TABLE `tsequanceuser` (
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tsequanceuser`
--

INSERT INTO `tsequanceuser` (`user_id`) VALUES
(1),
(2),
(3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `USER_ID` char(5) NOT NULL,
  `FIRST_NAME` varchar(50) DEFAULT NULL,
  `LAST_NAME` varchar(50) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `PHONE` decimal(12,0) DEFAULT NULL,
  `PASSWORD` char(8) DEFAULT NULL,
  `JOB_STATUS` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`USER_ID`, `FIRST_NAME`, `LAST_NAME`, `EMAIL`, `PHONE`, `PASSWORD`, `JOB_STATUS`) VALUES
('US001', 'M Risky', 'Alfiansyah', 'alfiansyah@gmail.com', '85111222333', 'fian123', 'admin'),
('US002', 'M Risky', 'Alfiansyah', 'alfiansyah@gmail.com', '85111222333', 'fian123', 'admin'),
('US003', 'M Risky', 'Alfiansyah', 'alfiansyah@gmail.com', '85111222333', 'fian123', 'super admin');

--
-- Triggers `user`
--
DELIMITER $$
CREATE TRIGGER `ID_USER` BEFORE INSERT ON `user` FOR EACH ROW BEGIN 
	INSERT INTO tsequanceuser VALUES ("");
	SELECT MAX(user_id) INTO @ID
	FROM tsequanceuser;
	SET new.USER_ID=CONCAT('US',LPAD(@ID,3,'0'));
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
  ADD PRIMARY KEY (`CATEGORY_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CUSTOMER_ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`PRODUCT_ID`),
  ADD KEY `FK_CATEGORI_TO_PRODUCT` (`CATEGORY_ID`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`NOTA_ID`),
  ADD KEY `FK_CUST_TO_SALES` (`CUSTOMER_ID`),
  ADD KEY `FK_USER_TO_SALES` (`USER_ID`);

--
-- Indexes for table `sales_detail`
--
ALTER TABLE `sales_detail`
  ADD PRIMARY KEY (`NOTA_ID`,`PRODUCT_ID`),
  ADD KEY `FK_DETAIL_TO_PRODUCT` (`PRODUCT_ID`);

--
-- Indexes for table `tsequancecategory`
--
ALTER TABLE `tsequancecategory`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tsequancecustomer2`
--
ALTER TABLE `tsequancecustomer2`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `tsequanceproduct`
--
ALTER TABLE `tsequanceproduct`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tsequanceuser`
--
ALTER TABLE `tsequanceuser`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`USER_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tsequancecategory`
--
ALTER TABLE `tsequancecategory`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tsequancecustomer2`
--
ALTER TABLE `tsequancecustomer2`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tsequanceproduct`
--
ALTER TABLE `tsequanceproduct`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tsequanceuser`
--
ALTER TABLE `tsequanceuser`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_CATEGORI_TO_PRODUCT` FOREIGN KEY (`CATEGORY_ID`) REFERENCES `categories` (`CATEGORY_ID`);

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `FK_CUST_TO_SALES` FOREIGN KEY (`CUSTOMER_ID`) REFERENCES `customer` (`CUSTOMER_ID`),
  ADD CONSTRAINT `FK_USER_TO_SALES` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`);

--
-- Constraints for table `sales_detail`
--
ALTER TABLE `sales_detail`
  ADD CONSTRAINT `FK_DETAIL_TO_PRODUCT` FOREIGN KEY (`PRODUCT_ID`) REFERENCES `product` (`PRODUCT_ID`),
  ADD CONSTRAINT `FK_SALES_TO_DETAIL` FOREIGN KEY (`NOTA_ID`) REFERENCES `sales` (`NOTA_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
