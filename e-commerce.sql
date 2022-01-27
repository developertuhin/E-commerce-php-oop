-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2022 at 10:25 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `id` int(32) NOT NULL,
  `admin_email` varchar(56) NOT NULL,
  `admin_password` varchar(72) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`id`, `admin_email`, `admin_password`) VALUES
(1, 'admin@gmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(30) NOT NULL,
  `category_name` text NOT NULL,
  `category_description` varchar(255) NOT NULL,
  `category_status` tinyint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_description`, `category_status`) VALUES
(6, 'Fresh Fruit', 'Fresh fruit are helpful to prevent health diseases', 1),
(7, 'Fresh Vegetables', 'Fresh vegetables are needed to get healty life', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(55) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` int(55) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_category` int(200) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_status` tinyint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_price`, `product_description`, `product_category`, `product_image`, `product_status`) VALUES
(32, 'Tomatoo', 23, 'Red fresh tomato', 7, 'tomatoo.jpg', 1),
(33, 'Fresh Mango', 50, 'Fresh and cool mango to take best taste', 6, 'baganpali-mango-500x500.jpg', 1),
(34, 'Apple', 150, 'Fresh apple to take best taste ', 6, 'apple.jpg', 1),
(35, 'Lichi', 200, 'Fresh lichi', 6, 'depositphotos_5362508-stock-photo-lychee.jpg', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `product_category_info`
-- (See below for the actual view)
--
CREATE TABLE `product_category_info` (
`product_id` int(55)
,`product_name` varchar(255)
,`product_price` int(55)
,`product_description` varchar(255)
,`product_image` varchar(255)
,`product_status` tinyint(5)
,`category_id` int(30)
,`category_name` text
);

-- --------------------------------------------------------

--
-- Structure for view `product_category_info`
--
DROP TABLE IF EXISTS `product_category_info`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `product_category_info`  AS SELECT `product`.`product_id` AS `product_id`, `product`.`product_name` AS `product_name`, `product`.`product_price` AS `product_price`, `product`.`product_description` AS `product_description`, `product`.`product_image` AS `product_image`, `product`.`product_status` AS `product_status`, `category`.`category_id` AS `category_id`, `category`.`category_name` AS `category_name` FROM (`product` join `category`) WHERE `product`.`product_category` = `category`.`category_id` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
