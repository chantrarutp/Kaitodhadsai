-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2024 at 12:11 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `addon`
--

CREATE TABLE `addon` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `addon`
--

INSERT INTO `addon` (`id`, `name`, `price`, `active`) VALUES
(1, 'หอมทอด', 39.00, 'Yes'),
(2, 'เฟรนซ์ฟรายส์', 39.00, 'Yes'),
(3, 'กิมจิ', 29.00, 'Yes'),
(4, 'ไชเท้าดอง', 19.00, 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `products` varchar(255) NOT NULL,
  `total` int(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `products`, `total`, `status`) VALUES
(1, 'สะโพกไก่ทอด ไชเท้าดอง ชีส', 89, 'served'),
(2, 'ไก่ป๊อป กิมจิ พิซซ่า', 158, 'served'),
(3, 'อกไก่ทอด ไม่รับ ปาปริก้า', 45, 'paid'),
(4, 'น่องไก่ทอด ไม่รับ ชีส\r\nปีกไก่ทอด ไชเท้าดอง ไม่ใส่ผง', 114, 'waiting'),
(5, 'น่องไก่ทอด หอมทอด ชีส\r\nสะโพกไก่ทอด กิมจิ ชีส', 183, 'waiting');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `detell` text NOT NULL,
  `imagfile` varchar(255) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `detell`, `imagfile`, `active`) VALUES
(1, 'น่องไก่ทอด', 45.00, 'ได้รับความนิยมมากที่สุด เนื้อนุ่ม ชุ่มฉ่ำ ไขมันน้อยกว่าส่วนปีก มีส่วนข้อกระดูกอ่อนให้เคี้ยวได้\r\n', 'ไก่ทอด.png', 'Yes'),
(2, 'ปีกไก่ทอด', 50.00, 'ได้รับความนิยมมาก เป็นปีกไก่ทั้งปีก เนื้อนุ่ม มีไขมันแทรกเยอะ ทอดกรอบกำลังดี พิเศษ*ซื้อปีกไก่ทอด 4 ชิ้น รับคูปองส่วนลด50 บาทสำหรับใช้ในครั้งถัดไป รับของแถมได้ที่แคชเชียร์', 'ปีก.png', 'No'),
(3, 'อกไก่ทอด', 45.00, 'เป็นส่วนที่เนื้อเยอะ เนื้อแน่น และไม่มีไขมันแทรกเลย เหมาะสำหรับคนที่ต้องการลดน้ำหนัก เพราะไขมันน้อย', 'อกก.png', 'Yes'),
(4, 'สะโพกไก่ทอด', 70.00, 'เป็นส่วนท่อนบนของปีกไก่ เป็นส่วนที่เนื้อนุ่มมาก และมีไขมันแทรกค่อนข้างเยอะ ', 'สพ.png', 'Yes'),
(5, 'ปีกบนไก่ทอด', 40.00, 'เป็นปีกไก่ส่วนบน เนื้อนุ่ม มีไขมันแทรกมากกว่าส่วนน่อง มีส่วนข้อกระดูกอ่อนให้เคี้ยว', 'ปีกไก่บน.png', 'Yes'),
(6, 'ไก่ป๊อป', 40.00, 'ได้รับความนิยมมาก เป็นเนื้อไก่ล้วนปั้นพอดีคำ ชุบแป้งทอดกรอบๆ เนื้อนุ่ม ชุ่มฉ่ำ\r\n', 'ไก่ป๊อป.png', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `productse`
--

CREATE TABLE `productse` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `detell` text NOT NULL,
  `imagfile` varchar(100) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productse`
--

INSERT INTO `productse` (`id`, `name`, `price`, `detell`, `imagfile`, `active`) VALUES
(1, 'Chicken Drumstick', 45.00, 'Most popular! Tender and juicy meat, lower fat content compared to wings and has soft bone for chewing.', 'ไก่ทอด.png', 'Yes'),
(2, 'Chicken Wings', 50.00, 'Highly popular! Includes both parts of the wing, tender meat with high fat content. Special*Buy 4 fried chicken wings and receive a 50% discount coupon. baht for use next time Receive free gifts at the cashier.', 'ปีก.png', 'Yes'),
(3, 'Chicken Breast Fillet', 45.00, 'A part with abundant meat, dense and virtually fat-free. Suitable for weight watchers due to low fat content and long-lasting satiety.', 'อกก.png', 'Yes'),
(4, 'Chicken Thigh', 70.00, 'The upper part of the chicken leg. Very tender meat with relatively high fat content.', 'สพ.png', 'Yes'),
(5, 'Chicken Drumette', 40.00, 'Upper part of the wing. Tender meat with more fat content than the drumstick and has soft bone for chewing.', 'ปีกไก่บน.png', 'Yes'),
(6, 'Chicken Pop', 40.00, 'Highly popular! Chicken meat molded into bite-sized pieces, coated in crispy batter, tender and juicy.', 'ไก่ป๊อป.png', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `toppings`
--

CREATE TABLE `toppings` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `toppings`
--

INSERT INTO `toppings` (`id`, `name`, `active`) VALUES
(1, 'ชีส', 'Yes'),
(2, 'ข้าวโพด', 'Yes'),
(3, 'ฮอตแอนด์สไปซี่', 'Yes'),
(4, 'พิซซ่า', 'No'),
(5, 'ปาปริก้า', 'No');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addon`
--
ALTER TABLE `addon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productse`
--
ALTER TABLE `productse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `toppings`
--
ALTER TABLE `toppings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addon`
--
ALTER TABLE `addon`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `toppings`
--
ALTER TABLE `toppings`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
