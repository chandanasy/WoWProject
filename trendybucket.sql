-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2020 at 03:35 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trendybucket`
--

-- --------------------------------------------------------

--
-- Table structure for table `coupon_code`
--

CREATE TABLE `coupon_code` (
  `coupon_name` varchar(50) NOT NULL,
  `coupon_amt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupon_code`
--

INSERT INTO `coupon_code` (`coupon_name`, `coupon_amt`) VALUES
('HAPPY100', 100),
('LUCKY50', 50),
('SAVE60', 60),
('FLASH25', 25),
('WINTER20', 20);

-- --------------------------------------------------------

--
-- Table structure for table `login_log`
--

CREATE TABLE `login_log` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(30) NOT NULL,
  `try_time` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `ref` text NOT NULL,
  `tags` text NOT NULL,
  `gender` varchar(20) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `code`, `image`, `price`, `quantity`, `ref`, `tags`, `gender`, `description`) VALUES
(1, 'Mandarin Collar Slim Fit Shirt', '1000', 'img/men/shop-1.jpg', 1499.00, -20, 'shop-1.jpg', 'Mandarin Collar Slim Fit Shirt', 'M', ''),
(2, 'Polo T-shirt with Signature Branding', '1001', 'img/men/shop-2.jpg', 499.00, 0, 'shop-2.jpg', 'Polo T-shirt with Signature Branding', 'M', 'Accented by the tipping along the collar and sleeve hems, this classic polo T-shirt makes for an endlessly preppy and versatile casual wear option.'),
(3, 'Washed Slim Fit Jeans', '1002', 'img/men/shop-3.jpg', 1899.00, 17, 'shop-3.jpg', 'Washed Slim Fit Jeans', 'M', ''),
(4, 'Slim Fit Chinos with Insert Pockets', '1003', 'img/men/shop-4.jpg', 1899.00, 20, 'shop-4.jpg', 'Slim Fit Chinos with Insert Pockets', 'M', ''),
(5, 'Denim Jacket with Fleece Collar', '1004', 'img/men/shop-5.jpg', 4899.00, 15, 'shop-5.jpg', 'Denim Jacket with Fleece Collar', 'M', ''),
(6, 'Slim Fit Shirt with Patch Pocket', '1005', 'img/men/shop-6.jpg', 999.00, 20, 'shop-6.jpg', 'Slim Fit Shirt with Patch Pocket', 'M', ''),
(7, 'Polo T-shirt with Vented Hem', '1006', 'img/men/shop-7.jpg', 3799.00, 18, 'shop-7.jpg', 'Polo T-shirt with Vented Hem', 'M', ''),
(8, 'Flat-Front Trousers with Insert Pockets', '1007', 'img/men/shop-8.jpg', 1699.00, 13, 'shop-8.jpg', 'Flat-Front Trousers with Insert Pockets', 'M', ''),
(9, 'Zip-Front Hoodie', '1008', 'img/men/shop-9.jpg', 2999.00, 20, 'shop-9.jpg', 'Zip-Front Hoodie', 'M', ''),
(10, 'Tie-Up Flared Sleeves Cotton Shirt', '2001', 'img/women/shop-1.jpg\r\n', 649.00, 5, 'shop-01.jpg', 'Tie-Up Flared Sleeves Cotton Shirt', 'F', ''),
(11, 'High-Rise Mustard Culottes', '2002', 'img/women/shop-2.jpg', 1799.00, 14, 'shop-02.jpg', 'High-Rise Mustard Culottes', 'F', ''),
(12, 'Zip-Front Hoodie with Insert Pockets', '2003', 'img/women/shop-3.jpg', 1599.00, 9, 'shop-03.jpg\r\n', 'Zip-Front Hoodie with Insert Pockets', 'F', ''),
(13, 'High-Rise Black Culottes', '2004', 'img/women/shop-4.jpg\r\n', 1799.00, 5, 'shop-04.jpg', 'High-Rise Black Culottes', 'F', ''),
(14, 'Balloon Sleeves Grey Shirt', '2005', 'img/women/shop-5.jpg\r\n', 1599.00, 20, 'shop-05.jpg', 'Balloon Sleeves Grey Shirt', 'F', ''),
(15, 'Leather Zip-Front Biker Jacket', '2006', 'img/women/shop-6.jpg', 9999.00, 12, 'shop-06.jpg', 'Leather Zip-Front Biker Jacket', 'F', ''),
(16, 'Scoop-Neck Top with Criss-Cross Neckline', '2007', 'img/women/shop-7.jpg', 3999.00, 10, 'shop-07.jpg', 'Scoop-Neck Top with Criss-Cross Neckline', 'F', ''),
(17, 'Wrap Dress with Belted Waist', '2008', 'img/women/shop-8.jpg', 7699.00, 10, 'shop-08.jpg', 'Wrap Dress with Belted Waist', 'F', ''),
(18, 'Strappy T-shirt with Scoop Neck', '2009', 'img/women/shop-9.jpg', 2999.00, 3, 'shop-09.jpg', 'Strappy T-shirt with Scoop Neck', 'F', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `FirstName` text NOT NULL,
  `LastName` text NOT NULL,
  `Email` varchar(30) NOT NULL,
  `MobileNo` text NOT NULL,
  `Account_Bal` int(30) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `CVV` int(4) NOT NULL,
  `Address` text NOT NULL,
  `City` text NOT NULL,
  `State` text NOT NULL,
  `Pincode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `Name`, `FirstName`, `LastName`, `Email`, `MobileNo`, `Account_Bal`, `Password`, `CVV`, `Address`, `City`, `State`, `Pincode`) VALUES
(2, 'CharmeeM', '', '', 'charmee.m@somaiya.edu', '', 9740, 'charmeeuser', 3003, 'Borivali West', '', '', 0),
(3, 'TestUser', '', '', 'test123@gmail.com', '', 10000, 'testUser', 8105, 'Borivali West', '', '', 0),
(5, 'IamUtsavP', 'Utsav', 'Parekh', 'parekhutsav13@gmail.com', '09004525005', -1493, '12', 1383, 'New Ratan Apartment, S.v.road Borivali West. 23', 'Mumbai', 'Maharashtra', 400092);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login_log`
--
ALTER TABLE `login_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login_log`
--
ALTER TABLE `login_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
