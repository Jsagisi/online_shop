-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2017 at 06:32 AM
-- Server version: 5.5.57-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `userId` varchar(20) NOT NULL,
  `orderId` varchar(20) NOT NULL,
  `totalPrice` float NOT NULL,
  `order_description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `productId` int(10) NOT NULL,
  `productName` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(5) NOT NULL,
  `type` varchar(15) NOT NULL,
  `imageLink` varchar(200) NOT NULL,
  PRIMARY KEY (`productId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `productName`, `description`, `price`, `quantity`, `type`, `imageLink`) VALUES
(1, 'Supreme Box Logo Hoodie L', 'Expensive Hoodie', 500, 2, 'Sweater', 'https://s-media-cache-ak0.pinimg.com/originals/ce/54/8d/ce548d83503dd206a29af9f7d9c58de5.jpg'),
(2, 'Adidas UltraBoost "Black/Grey" 11', 'Expensive Shoes', 200, 4, 'Shoes', 'https://www.flightclub.com/media/catalog/product/cache/1/image/800x570/9df78eab33525d08d6e5fb8d27136e95/6/3/63600908379-adidas-ultra-boost-m-black-white-201272_2.jpg'),
(3, 'Jordan 1 Sz: 12', 'Expensive Jordan Shoes', 3500, 2, 'Shoes', 'http://images.complex.com/complex/image/upload/c_limit,w_680/fl_lossy,pg_1,q_auto/air-jordan-1-bred-wishatl_busxyy.jpg'),
(4, 'Adidas NMD Black/Red 11', 'Cool Adidas Shoes', 225, 6, 'Shoes', 'https://www.flightclub.com/media/catalog/product/8/0/800255_1.jpg'),
(5, 'Jordan Hoodie "Logo" XL', 'Nice Jacket', 80, 5, 'Sweater', 'http://images.footlocker.com/pi/23064010/large/jordan-flight-fleece-full-zip-hoodie-mens'),
(7, 'Supreme Box Logo "Red" Hoodie M', 'Expensive Sweater', 500, 2, 'Sweater', 'https://s-media-cache-ak0.pinimg.com/originals/ce/54/8d/ce548d83503dd206a29af9f7d9c58de5.jpg'),
(8, 'Supreme Box Logo Hoodie "Blue" XL', 'Expensive Sweater', 500, 4, 'Sweater', 'https://s-media-cache-ak0.pinimg.com/originals/a7/66/1e/a7661e7df5ae5a990c1017c1844a38aa.jpg'),
(9, 'Adidas Superstar 11', 'Classic Shoe', 60, 9, 'Shoes', 'http://demandware.edgesuite.net/sits_pod20-adidas/dw/image/v2/aaqx_prd/on/demandware.static/-/Sites-adidas-products/en_US/dw16b5e856/zoom/C77153_01_standard.jpg?sw=2000&sfrm=jpg'),
(12, 'Nike Janoski''s Original "Black/White" 10.5', 'Classic Shoe', 80, 8, 'Shoes', 'http://picture-cdn.wheretoget.it/59csua-l-610x610-shoes-nike-nike+shoes-black-janoski.jpg'),
(13, 'Nike Roshe 12', 'Nice Shoe', 60, 8, 'Shoes', 'http://images2.nike.com/is/image/DotCom/PDP_HERO/511881_010_E_PREM/roshe-one-mens-shoe.jpg'),
(15, 'Jordan 11 "Concord" 12', 'Expensive Shoes', 450, 2, 'Shoes', 'https://www.flightclub.com/media/catalog/product/6/3/63611742997-air-jordan-11-retro-concord-2011-release-white-black-dark-concord-011518_1.jpg'),
(18, 'Nike Lebron Soldier 12', 'Lebrons Shoe', 200, 2, 'Shoes', 'http://ugc.nikeid.com/is/image/nike/ugc/679310780.tif?$DESKTOP_ID_PREBUILD$'),
(30, 'Air Jordan 12 Black White 12', 'Jordans ', 250, 2, 'Shoes', 'https://www.flightclub.com/media/catalog/product/cache/1/image/800x570/9df78eab33525d08d6e5fb8d27136e95/a/i/air-jordan-12-retro-taxi-2013-release-white-black-taxi-varsity-red-011844_1.jpg'),
(40, 'Air Jordan 30', 'New Shoes', 200, 5, 'Shoes', 'https://www.flightclub.com/media/catalog/product/cache/1/image/800x570/9df78eab33525d08d6e5fb8d27136e95/6/3/63611743071-air-jordan-30-q54-cosmos-black-white-012477_1.jpg'),
(80, 'Lavar Ball Z02 Size 10', 'Stupid Shoes', 4950, 2, 'Shoes', 'http://cdnph.upi.com/ph/st/th/7961494014027/2017/i/14940146499141/v1.5/OSU-coach-says-LaVar-Ball-stole-logo-for-sons-shoes.jpg?lg=5');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `adminId` int(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `id` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`adminId`, `email`, `id`, `password`) VALUES
(1, 'something@gmail.com', 'user', '25ab86bed149ca6ca9c1c0d5db7c9a91388ddeab'),
(2, 'jsagisi@csumb.edu', 'admin', '25ab86bed149ca6ca9c1c0d5db7c9a91388ddeab'),


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
