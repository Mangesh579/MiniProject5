-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2023 at 04:58 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineshop`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getcat` (IN `cid` INT)   SELECT * FROM categories WHERE cat_id=cid$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(100) NOT NULL,
  `brand_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`) VALUES
(1, 'Gibson'),
(2, 'Harman Professional'),
(3, 'Shure'),
(4, 'Yamaha'),
(5, 'Fender Musical Instruments'),
(6, 'Sennheiser');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `c_id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `u_id` int(10) DEFAULT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`c_id`, `p_id`, `u_id`, `qty`) VALUES
(186, 1, 37, 1),
(191, 22, 38, 2);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`) VALUES
(1, 'Idiophones'),
(2, 'Membranophones'),
(3, 'Chordophones'),
(4, 'Aerophones'),
(5, 'Electrophones'),
(6, 'Accessories');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `o_id` int(10) NOT NULL,
  `u_id` int(11) NOT NULL,
  `u_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` int(10) NOT NULL,
  `cardname` varchar(255) NOT NULL,
  `cardnumber` varchar(20) NOT NULL,
  `expdate` varchar(255) NOT NULL,
  `prod_count` int(15) DEFAULT NULL,
  `total_amt` int(15) DEFAULT NULL,
  `cvv` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`o_id`, `u_id`, `u_name`, `email`, `address`, `state`, `zip`, `cardname`, `cardnumber`, `expdate`, `prod_count`, `total_amt`, `cvv`) VALUES
(1, 37, 'last', 'last@gmail.com', 'here', 'here', 560037, 'lastlastlast', '1234567890', '12/12/2024', 2, 13000, 1234),
(2, 38, 'Rahul', '1234@gmail.com', 'bangalore', 'karnataka', 560076, 'Rahul Moktan', '4561 2378 9', '02/12/2023', 2, 2400, 4567);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_id` int(100) NOT NULL,
  `p_cat` int(100) NOT NULL,
  `p_brand` int(100) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_price` int(100) NOT NULL,
  `p_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `p_cat`, `p_brand`, `p_name`, `p_price`, `p_img`) VALUES
(1, 1, 1, 'Bonang', 5000, 'product01.jpg'),
(2, 1, 2, 'Ghatam', 25000, 'product02.jpg'),
(3, 1, 3, 'Kouxian', 30000, 'product03.jpg'),
(4, 1, 4, 'Metronome', 32000, 'product04.jpg'),
(5, 3, 5, 'Celempung', 10000, 'product05.jpg'),
(6, 3, 6, 'Kamanja', 35000, 'product06.jpg'),
(7, 3, 1, 'Kora', 50000, 'product07.jpg'),
(8, 3, 2, 'Barrel piano', 40000, 'product08.jpg'),
(9, 2, 3, 'Dundun', 12000, 'product09.jpg'),
(10, 2, 4, 'Cuica', 1000, 'memb2.jpg'),
(11, 2, 5, 'Stagg', 1200, 'memb3.jpg'),
(12, 2, 6, 'Congas', 1500, 'memb4.jpg'),
(13, 4, 1, 'Shehnai', 1200, 'aero1.jpg'),
(14, 4, 2, 'Trumpet', 1400, 'aero2.jpg'),
(15, 4, 3, 'clarinet', 1500, 'aero3.jpg'),
(16, 4, 4, 'Flute', 600, 'aero4.jpg'),
(17, 5, 5, 'Electric guitar', 1000, 'elec1.jpg'),
(19, 5, 6, 'Electronic Organ', 3000, 'elec2.jpg'),
(20, 5, 1, 'Harmonium', 1600, 'elec3.jpg'),
(21, 5, 2, 'Mk3 Drum Controller', 800, 'elec4.jpg'),
(22, 6, 3, 'Tuning fork', 1300, 'acc1.jpg'),
(23, 6, 4, 'Music stand', 1900, 'acc2.jpg'),
(24, 6, 5, 'Guitar pick', 700, 'acc3.jpg'),
(25, 6, 6, 'Guitar capo', 750, 'acc4.jpg'),
(27, 6, 6, 'Drum Cymbal', 690, 'acc5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(10) NOT NULL,
  `u_name` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `p_no` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `u_name`, `email`, `password`, `p_no`, `address`) VALUES
(33, 'welp', 'welp@gmail.com', '123456789', '1234567890', 'home'),
(34, 'he', 'he@gmail.com', '123456789', '1234567890', 'home'),
(37, 'last', 'last@gmail.com', '123456789', '1234567890', 'here'),
(38, 'Rahul', '1234@gmail.com', 'uihou7@3423#hiu', '1245789865', 'bangalore');

--
-- Triggers `user`
--
DELIMITER $$
CREATE TRIGGER `user_back` AFTER INSERT ON `user` FOR EACH ROW BEGIN 
INSERT INTO user_back VALUES(new.u_id,new.u_name,new.email,new.password,new.p_no,new.address);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user_back`
--

CREATE TABLE `user_back` (
  `u_id` int(10) NOT NULL,
  `u_name` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `p_no` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_back`
--

INSERT INTO `user_back` (`u_id`, `u_name`, `email`, `password`, `p_no`, `address`) VALUES
(37, 'last', 'last@gmail.com', '123456789', '1234567890', 'here'),
(38, 'Rahul', '1234@gmail.com', 'uihou7@3423#hiu', '1245789865', 'bangalore');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `p_id` (`p_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`o_id`),
  ADD KEY `user_id` (`u_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `p_cat` (`p_cat`),
  ADD KEY `p_brand` (`p_brand`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `user_back`
--
ALTER TABLE `user_back`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `c_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `o_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `user_back`
--
ALTER TABLE `user_back`
  MODIFY `u_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `p_id` FOREIGN KEY (`p_id`) REFERENCES `products` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `u_id` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `p_brand` FOREIGN KEY (`p_brand`) REFERENCES `brands` (`brand_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `p_cat` FOREIGN KEY (`p_cat`) REFERENCES `categories` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
