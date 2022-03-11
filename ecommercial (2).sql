-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2021 at 10:17 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommercial`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerId` int(11) NOT NULL,
  `customerName` varchar(50) NOT NULL,
  `customerEmail` varchar(150) NOT NULL,
  `password` varchar(30) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerId`, `customerName`, `customerEmail`, `password`, `address`, `phone`) VALUES
(1, 'John Snow', 'john@email.com', 'password123', '15 Kings Street, Adelaide, SA, 5000', 3455432),
(76, 'Tom Smith', 'tom@gmail.com', 'password', '2 road Adelaide', 402338853);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `total_price` decimal(6,2) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `email`, `total_price`, `status`) VALUES
('0293333111636784583', 'tom@gmail.com', '477.00', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `order_line`
--

CREATE TABLE `order_line` (
  `order_id` varchar(30) NOT NULL,
  `product_id` varchar(6) NOT NULL,
  `qty` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_line`
--

INSERT INTO `order_line` (`order_id`, `product_id`, `qty`) VALUES
('0973123131636250543', '3', 1),
('0973123131636250543', '5', 2),
('0527890881636250663', '2', 1),
('0823538281636251115', '5', 2),
('0823538281636251115', '8', 1),
('0333597771636457933', '1', 2),
('0570285731636458293', '4', 2),
('0337205771636498322', '2', 1),
('0337205771636498322', '5', 1),
('0293333111636784583', '1', 1),
('0293333111636784583', '2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productId` int(11) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` varchar(250) NOT NULL,
  `image` varchar(200) NOT NULL,
  `shopId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `productName`, `price`, `description`, `image`, `shopId`) VALUES
(1, 'Piper', '99.00', 'Christina Double Handle Tote Bag', '\\assets\\img\\bag1.jpg', 1),
(2, 'Basque', '378.00', 'Erin Bucket Nude Shoulder Bag', '\\assets\\img\\bag2.jpg', 1),
(3, 'Tommy Hilfiger', '269.00', 'Iconic Tommy Double Handle Tote', '\\assets\\img\\bag3.jpg', 2),
(4, 'Guess', '199.00', 'Paloma Stone Tote Bag ', '\\assets\\img\\bag4.jpg', 1),
(5, 'Review', '119.00', 'Lady Luck Top Handle Bag ', '\\assets\\img\\bag5.jpg', 2),
(7, 'Olga Berg', '99.00', 'Ob1671_Mnk Cambrie Studded Shoulder Bag', '\\assets\\img\\bag6.jpg', 2),
(8, 'Calvin Klein', '199.00', 'Zip Top CK Black Crossbody Bag', '\\assets\\img\\bag7.jpg', 2),
(9, 'Leona ', '119.00', 'True Love Mint Flapover Satchel', '\\assets\\img\\bag8.jpg', 1),
(10, 'DKNY', '359.00', 'Paige Satchel Small Zip-Top Multiway Bag', '\\assets\\img\\bag9.jpg', 1),
(14, 'Radley', '429.00', 'Chelsea Creek Camo Zip-Top Multiway Bag', '\\assets\\img\\bag10.jpg', 1),
(17, 'Fossil', '279.00', 'Fossil ZB1522189 White Wiley Crossbody Bag', '\\assets\\img\\bag11.jpg', 1),
(18, 'Cellini', '359.00', 'CLS025 Dawson Zip Top Satchel Bag', '\\assets\\img\\bag12.jpg', 2),
(19, 'Bella & Bloom', '249.00', 'WMG200MER Watch Me Go Tote Bag', '\\assets\\img\\bag13.jpg', 1),
(20, 'Joan Weisz', '149.00', 'JWR010 Jetty Zip Top Crossbody Bag', '\\assets\\img\\bag14.jpg', 1),
(21, 'Pixie Mood', '100.00', 'Bubbly Clutch Zip Top Vegan Crossbody Bag', '\\assets\\img\\bag15.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `purchaseorder`
--

CREATE TABLE `purchaseorder` (
  `customerId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `purchaseDate` date NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `shopId` int(11) NOT NULL,
  `shopName` varchar(50) NOT NULL,
  `shopAddress` varchar(200) NOT NULL,
  `latitude` varchar(30) NOT NULL,
  `longitude` varchar(30) NOT NULL,
  `description` varchar(200) NOT NULL,
  `dateStarted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`shopId`, `shopName`, `shopAddress`, `latitude`, `longitude`, `description`, `dateStarted`) VALUES
(1, 'Shop Adelaide', '100 Kings William St,\r\nAdelaide 5000', '-34.929079', '138.60652', 'Shop at Adelaide, South Australia', '1991-10-01'),
(2, 'Shop Sydney', '762 George St, \r\nSydney, NSW 2000', '-33.8688', '151.2093', 'Shop at Sydney, New South Wales, Australia', '1995-03-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerId`),
  ADD UNIQUE KEY `customerEmail` (`customerEmail`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`),
  ADD KEY `productAtShop` (`shopId`);

--
-- Indexes for table `purchaseorder`
--
ALTER TABLE `purchaseorder`
  ADD KEY `customer_order` (`customerId`),
  ADD KEY `product_order` (`productId`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`shopId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `shopId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `productAtShop` FOREIGN KEY (`shopId`) REFERENCES `shop` (`shopId`);

--
-- Constraints for table `purchaseorder`
--
ALTER TABLE `purchaseorder`
  ADD CONSTRAINT `customer_order` FOREIGN KEY (`customerId`) REFERENCES `customer` (`customerId`),
  ADD CONSTRAINT `product_order` FOREIGN KEY (`productId`) REFERENCES `product` (`productId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
