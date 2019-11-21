-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2019 at 04:05 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_eng`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) DEFAULT NULL,
  `adminUser` varchar(255) DEFAULT NULL,
  `adminEmail` varchar(255) DEFAULT NULL,
  `adminPass` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`adminId`, `adminName`, `adminUser`, `adminEmail`, `adminPass`) VALUES
(1, 'Halima Binte Ashraf Sidra', 'Sidra', 'sidra@gmail.com', 'Sidra');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartid` int(11) NOT NULL,
  `sesid` varchar(255) DEFAULT NULL,
  `productid` int(11) DEFAULT NULL,
  `pdname` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `qunat` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartid`, `sesid`, `productid`, `pdname`, `price`, `qunat`, `image`) VALUES
(2, 'g1reksjruaoefiod8cei0s9vp3', 74, 'Speaker', 20000, 1, 'feature-pic2.jpg'),
(3, 'g1reksjruaoefiod8cei0s9vp3', 74, 'Speaker', 20000, 1, 'feature-pic2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryName`) VALUES
(47, 'Clothing'),
(55, 'Electronics'),
(56, 'Vegetable'),
(57, 'Fruits');

-- --------------------------------------------------------

--
-- Table structure for table `corder`
--

CREATE TABLE `corder` (
  `id` int(11) NOT NULL,
  `cmid` int(11) DEFAULT NULL,
  `productid` int(11) DEFAULT NULL,
  `productname` varchar(255) DEFAULT NULL,
  `quntutuy` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `st` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `corder`
--

INSERT INTO `corder` (`id`, `cmid`, `productid`, `productname`, `quntutuy`, `price`, `image`, `st`) VALUES
(26, 9, 71, 'Mollit anim id est laborum', 3, 12, 'p8.jpg', 0),
(27, 9, 69, 'Rreprehenderit', 4, 42, 'p5.jpg', 0),
(28, 9, 67, 'Floral Print Buttoned', 10, 12, 'p1.jpg', 0),
(29, 9, 67, 'Floral Print Buttoned', 3, 12, 'p1.jpg', 0),
(30, 10, 73, 'Monitor', 1, 1000, 'new-pic1.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cid` int(11) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `zip` int(11) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cid`, `address`, `city`, `zip`, `phone`, `email`, `pass`, `name`) VALUES
(6, '29 Rajar golli', 'Sylhet', 3100, 1745610313, 'eaamd01@gmail.com', 'Sidra', 'Ashique Abdullah'),
(7, '2', 'Sy', 31, 174, 'princ997788@gmail.com', 'Sidra', 'ami'),
(8, '29 Rajar golli', 'Sylhet', 3100, 1745610313, 'shi@gmail.com', 'shi', 'Ashique Abdullah'),
(10, '29 Rajar golli', 'Sylhet', 3100, 1765109953, 'ashiqueashique465@gmail.com', 'Sidra', 'Halima Binte Asharf Sidraa'),
(11, '29 Rajar golli', 'Sylhet', 3100, 1745610313, 'sidra@gmail.com', 'Sidra', 'Ashique Abdullah');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `productName` varchar(255) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `catid` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `body` varchar(255) DEFAULT NULL,
  `type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `productName`, `price`, `catid`, `image`, `body`, `type`) VALUES
(73, 'Monitor', 1000, 55, 'new-pic1.jpg', 'Best', 1),
(74, 'Speaker', 20000, 55, 'feature-pic2.jpg', 'best', 0),
(75, 'Orange', 200, 57, 'p4.jpg', 'sweet', 1),
(76, 'strawberry', 300, 57, 'p6.jpg', 'Sweet', 0),
(78, 'Bean', 30, 56, 'p2.jpg', 'Healthy', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `corder`
--
ALTER TABLE `corder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `corder`
--
ALTER TABLE `corder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
