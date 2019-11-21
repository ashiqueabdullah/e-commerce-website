-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2019 at 08:20 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

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
(58, 'Electronics'),
(59, 'Home and Kitchen'),
(61, 'Watches'),
(62, 'Jewelry');

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
(10, '29 Rajar golli', 'Sylhet', 3100, 1765109953, 'ashiqueashique465@gmail.com', 'Sidra', 'Halima Binte Asharf Sidra'),
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
(80, 'LISEN iPhone Charger', 150, 58, '61oyvoySz8L._AC_UY218_.jpg', 'Reinforced iPhone charger cable with special SR joint design that has passed 40000+ times bending tests for extra protection and durability. The solid and durable two-shade braided armour nylon shield gives the cable stronger protection and flexible perfo', 1),
(81, 'USB C Hub HDMI', 120, 58, '61y4kptvR5L._AC_UY218_.jpg', 'Features SD/TF dual USB 3.0 card readers with data transfer speed up to UHS-I (95MB/s) - much faster than most card readers in the market (One Card at a time), 4K@30Hz HDMI and three USB 3.0 ports with speed up to 5 Gbps', 1),
(82, 'PONY DANCE Throw', 320, 59, '71-kF+77ktL._AC_UY218_.jpg', 'Application of traditional embroidery technology used in pillow cover top rated cushion cover and your furniture will bring out the best in each other.\r\nSTURDY MATERIAL: PONY DANCE throw pillow cover comes with durabl', 0),
(83, 'Stylla martele', 510, 59, '41qiAxmy3rL._AC_UY218_.jpg', 'exclusive online  company delivering an authentic collection of handicrafts to discerning clients. It strives to showcase the varied items of the actual artisans of India through a common portal.', 0),
(84, 'Relaxdays Glass', 400, 59, '71wNjGJPi2L._AC_UY218_.jpg', 'This smart side table with elegant metal legs in an angular design and chic glass top impresses with its perennial beauty. It easily matches any interior seamlessly and can also be used as a plant stand and display for decorations. Thanks to two colour op', 0),
(85, 'X Rocker Hydra', 2000, 59, '51qeZDWc4eL._AC_UY218_.jpg', 'The X Rocker Hydra is a compact and comfortable floor rocker. The Hydra features a headrest mounted 2.0 analogue sound system that provides increased immersion in your favourite games. The Hydra also features a great look, available in green, blue or red ', 1),
(86, 'Relaxdays Round', 1000, 59, '81F0DxxJgeL._AC_UY218_.jpg', 'This round side of table made of matt coloured MDF and reflective metal impresses with a subtle and yet mesmerizing design. It easily matches any interior seamlessly and can also be used as a plant stand and display for decorations. Thanks to two versions', 0),
(87, 'Karcher Vacuum Paper', 240, 59, '514zzYfw6wL._AC_UY218_.jpg', 'abroad and may differ from local products, including fit, age ratings, and language of product, labeling or instructions.\r\nManufacturer warranty may not apply\r\nLearn more about Amazon Global Store.', 0),
(88, 'Astigarraga 4Caj', 3210, 59, '81o4yJxRxdL._AC_UY218_.jpg', 'Natural  wooden drawers.\r\n4 removable drawers. Wood 16 mm thick.\r\nSolid PEFC treated pine wood.', 1),
(90, 'Orient Contemporary', 7000, 61, '71BgHFFerML._AC_UL320_.jpg', 'For the professional athlete or the casual wearer there are Casio watches Sports.For the professional athlete or the casual wearer there are Casio watches Sports.For the professional athlete or the casual wearer there are Casio watches Sports.', 1),
(91, 'Floral Print Buttoned', 300, 61, '61ynEcw+-7L._UX679_.jpg', 'products, including fit, age ratings, and language of product, labeling or instructions.products, including fit, age ratings, and language of product, labeling or instructions.products, including fit, age ratings, and language of product, labeling or inst', 0),
(92, 'Wireless Earbuds', 456, 58, '51BpV6QKe-L._AC_UY218_.jpg', 'Wireless Earbuds  True  Stereo Earphones with 35Hrs Playback, Hi fi Sound Bluetooth Headset with Charging Case, One-Step Pairing (White)', 0),
(93, 'Casio Collection', 1200, 61, '61t-OxDIS4L._AC_UL320_.jpg', 'This Casio watch is part of our basic collection. A special collection, Made with a leather, steel or silicone strap. Combined with a yellow pvc case, pink gold, black, â€¦ case. This small Casio collection is the ideal watch to accompany you wherever you', 0),
(95, 'Floral Print Buttoned', 12, 62, '61FOrYAAYgL._SS160_.jpg', 'This is one of the best product ever. This are clip on earring. They are beautiful as well.', 0),
(96, 'SWEETV Pearl', 5000, 62, '61yMoj8sd7L._AC_UL160_SR160,160_.jpg', 'Beautiful Gift Box Included Ideal for Bride Wedding Prom Bridal Party Formal Affair Bridesmaids', 1),
(97, 'MUCH MORE', 7000, 62, '81sN7VM0OaL._AC_SR300,300_.jpg', 'A designer fashion Bangles Bracelet that make you feel royal. The color complement all outfits &amp; may worn as a statement piece to any occasion.', 1),
(98, 'Gold Tone Pearl', 45000, 62, '61zBxg3VR9L._AC_SR300,300_.jpg', 'Matching Earrings It is crafted through finest &amp; exclusive raw material, A Fashion Necklace set that make you feel royal. This set can be worn on any special occasion. The color complement all outfits &amp; may worn as a statement piece to any occasio', 0),
(99, 'Touchstone Indian', 65441, 62, '61zBxg3VR9L._AC_SR300,300_.jpg', 'Each individual piece is checked. We are committed to providing customers with the most meticulous service.', 0),
(100, 'Casio Baby', 2400, 61, '716EzjaFAqL._AC_UL320_.jpg', 'Typical questions asked about products Typical questions asked about products Typical questions asked about products:', 0),
(101, 'FX Viktaria', 710, 58, '71cv8jJZmpL._AC_UY218_.jpg', 'Foldable design makes it convenient to carry and easy to store them when not in use or during travels. They are foldable and stretchable, which help you save the space.', 0);

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
  MODIFY `cartid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `corder`
--
ALTER TABLE `corder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
