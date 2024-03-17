-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2024 at 04:14 PM
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
-- Database: `ecommerce_megamall`
--

-- --------------------------------------------------------

--
-- Table structure for table `bproducts`
--

CREATE TABLE `bproducts` (
  `id` int(10) NOT NULL,
  `image` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `cost` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bproducts`
--

INSERT INTO `bproducts` (`id`, `image`, `name`, `cost`) VALUES
(401, '65f472483d056.jpg', 'LOreal Paris Shampoo, For Damaged and Weak Hair, W', 455),
(402, '65f47266ea074.jpg', 'Swiss Beauty Bold Matt Lip Liner | Long-lasting |M', 66),
(403, '65f4728755b94.jpg', 'Baked Beauty Layered In Love Beetroot Lip and Chee', 199),
(404, '65f472b45ffd4.jpg', 'Swiss Beauty Long Lasting Misty Finish Professiona', 217);

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

CREATE TABLE `customer_details` (
  `Cid` int(20) NOT NULL,
  `Full_Name` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Email` varchar(80) NOT NULL,
  `Phno` bigint(12) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Gender` enum('male','female','other') NOT NULL,
  `jwt_tokens` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_details`
--

INSERT INTO `customer_details` (`Cid`, `Full_Name`, `Username`, `Email`, `Phno`, `Password`, `Gender`, `jwt_tokens`) VALUES
(1, 'demo', 'demoname', 'demo@gmail.com', 12345567, '123', 'female', ''),
(25, 'Ramya Sri', 'ramyareddymrs', 'ramyareddymrs@gmail.com', 9160203634, '1', 'female', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyX2lkIjoyNSwidXNlcm5hbWUiOiJyYW15YXJlZGR5bXJzIn0.w-rS07AHNXHGQtiwtqlWAstFEPZ2cSUEuMMgeRKHT2s'),
(35, 'abc', 'abc', 'abc@gmail.com', 1234, '1', 'female', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyX2lkIjozNSwidXNlcm5hbWUiOiJhYmMifQ.6xvB4taF8ltsR3HEgpg8qy1oqiO4vcyzXtPIbrMN2Mg');

-- --------------------------------------------------------

--
-- Table structure for table `eproducts`
--

CREATE TABLE `eproducts` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(200) NOT NULL,
  `cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eproducts`
--

INSERT INTO `eproducts` (`id`, `image`, `name`, `cost`) VALUES
(1, '65edbcff38333.jpg', 'Sennheiser ACCENTUM Plus Wireless Bluetooth Over Ear Headphones - Quick-Charge, 50h Battery, Adaptive Hybrid ANC, Sound Personalization and 2 Yr Warranty - Black', 15990),
(2, '65edbdbe300ab.jpg', 'Sony WH-CH520, Wireless On-Ear Bluetooth Headphones with Mic, Upto 50 Hours Playtime, DSEE Upscale, Multipoint Connectivity/Dual Pairing,Voice Assistant App Support for Mobile Phones (Blue)', 4490),
(3, '65edbe159e9bd.jpg', 'ZEBRONICS Thunder Bluetooth 5.3 Wireless Over Ear Headphones with 60H Backup, Gaming Mode, Dual Pairing, ENC, AUX, Micro SD, Voice Assistant, Comfortable Earcups, Call Function(Sea Green)', 699),
(4, '65edbe5da8d66.jpg', 'Noise Buds VS402 in-Ear Truly Wireless Earbuds with 50H of Playtime, Low Latency, Quad Mic with ENC, Instacharge(10 min=120 min),10mm Driver, BT v5.3, Breathing LED Lights (Neon White)', 999),
(5, '65edbede84207.jpg', 'Boult Audio Z40 True Wireless in Ear Earbuds with 60H Playtime, Zen™ ENC Mic, Low Latency Gaming, Type-C Fast Charging, Made in India, 10mm Rich Bass Drivers, IPX5, Bluetooth 5.3 Ear Buds TWS (Blue)', 999),
(6, '65edbf204f0cf.jpg', 'Samsung Galaxy Buds2 Pro, with Innovative AI Features, Bluetooth Truly Wireless in Ear Earbuds with Noise Cancellation (White)', 16490),
(7, '65edbf875cf22.jpg', 'JBL C100SI Wired In Ear Headphones with Mic, JBL Pure Bass Sound, One Button Multi-function Remote, Angled Buds for Comfort fit (Black)', 599),
(8, '65edbfed368de.jpg', ' boAt Bassheads 105 Wired in Ear Earphones with Mic (Green, Spirit Lime)', 399),
(9, '65edc0444a69c.jpg', 'boAt Rockerz 255 Pro+ Bluetooth Neckband with Upto 60 Hours Playback, ASAP Charge, IPX7, Dual Pairing and Bluetooth v5.2(Teal Green)', 1099),
(10, '65edd709905c7.jpg', 'Sony Digital Vlog Camera ZV 1 (Compact, Video Eye AF, Flip Screen, in-Built Microphone, Bluetooth Shooting Grip, 4K Vlogging Camera for Content Creation) - Black', 69000),
(11, '65edd7d21c74e.jpg', 'Amazon Basics 2 X 3W Multimedia PC Gaming Speaker with Aux Connectivity, USB Support, Volume Control, and RGB Lights', 699),
(12, '65edd8a0108ea.jpg', 'HIKVISION Full HD 4 Channel DVR with 2 MP 4 Outdoor Cameras [COLOR NIGHT VISION + BUILT-IN AUDIO MIC + SMART DUAL LIGHT + MOTION DETECTION] + 1 TB HDD + 4 Ch SMPS, USEWELL CCTV Cable+BNC/DC Set, WHITE', 10490);

-- --------------------------------------------------------

--
-- Table structure for table `fproducts`
--

CREATE TABLE `fproducts` (
  `id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `cost` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fproducts`
--

INSERT INTO `fproducts` (`id`, `image`, `name`, `cost`) VALUES
(201, '65edf45d48587.jpg', 'Viluchi Baby Girls & Girls Velvet Semi Stitched Le', 649),
(202, '65edf9edc50bb.jpg', 'Ethinc Yard Lehanga Choli', 1299),
(203, '65edfa7016904.jpg', 'Neha Fashion womens satin', 499),
(204, '65edfab440c15.jpg', 'Nir Fashion Women Net Semi-Stitched Lehenga Choli (Anarkali-White_L-Gs_Pink_2Xl)', 865),
(205, '65edfaf7a15b6.jpg', 'RUDRAPRAYAG Womens Faux Georgette Semi-Stitched Dress Material (Red, Free Size)', 1699),
(206, '65ee9447154ad.jpg', 'CB-COLEBROOK Mens Regular Fit Solid Soft Touch Cotton Casual Shirt with Pocket Design with Spread Collar & Full Sleeves', 699),
(207, '65ee949146c29.jpg', 'Lymio Casual Shirt for Men|| Shirt for Men|| Men Stylish Shirt (Rib-Shirt)', 999),
(208, '65ee9516dd995.jpg', 'ABH LIFESTYLE Mens Rich Cotton Blind Short Kurta', 1099);

-- --------------------------------------------------------

--
-- Table structure for table `hkproducts`
--

CREATE TABLE `hkproducts` (
  `id` int(10) NOT NULL,
  `image` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `cost` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hkproducts`
--

INSERT INTO `hkproducts` (`id`, `image`, `name`, `cost`) VALUES
(301, '65f46e8352c65.jpg', 'Polycab Etira Plus 5 litre 3KW Electric Instant wa', 2699),
(302, '65f46eec75b60.jpg', 'nutripro Acrylonitrile Butadiene Styrene Juicer Mi', 1898),
(303, '65f46f429fe3a.jpg', 'Kintota Polyester Bathroom, Oval Door Mat, Floor, ', 199),
(304, '65f46fbf5f8f6.jpg', 'Casaliving Rolando Wood 4 Seater L Shape Sofa for ', 5999);

-- --------------------------------------------------------

--
-- Table structure for table `mproducts`
--

CREATE TABLE `mproducts` (
  `id` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `cost` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mproducts`
--

INSERT INTO `mproducts` (`id`, `image`, `name`, `cost`) VALUES
(101, '65ede39a609b3.jpg', 'Redmi 12 5G Jade Black 6GB RAM 128GB ROM', 12999),
(102, '65ede407cdf76.jpg', 'Apple iPhone 15 Pro (256 GB) - Natural Titanium', 137900),
(103, '65ede44b5a6b9.jpg', 'Samsung Galaxy S23 Ultra 5G (Green, 12GB, 256GB St', 109900),
(104, '65ede48ecaa3c.jpg', 'OnePlus Nord CE 3 Lite 5G (Pastel Lime, 8GB RAM, 2', 19999),
(105, '65ede5452d801.jpg', 'Apple 2022 MacBook Air Laptop with M2 chip: 34.46 ', 102900),
(106, '65ede60d88763.jpg', 'HP Laptop 15, AMD Ryzen 5 7520U, 15.6-inch (39.6 c', 42900),
(107, '65ede6575a247.jpg', 'ASUS TUF Gaming F15 (2023) 90WHr Battery, Intel Co', 99900),
(108, '65ede6a51b80d.jpg', 'ASUS Vivobook 15 (2023), Intel Core i3-1315U 13th ', 39900);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bproducts`
--
ALTER TABLE `bproducts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_details`
--
ALTER TABLE `customer_details`
  ADD PRIMARY KEY (`Cid`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Phno` (`Phno`);

--
-- Indexes for table `eproducts`
--
ALTER TABLE `eproducts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fproducts`
--
ALTER TABLE `fproducts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hkproducts`
--
ALTER TABLE `hkproducts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mproducts`
--
ALTER TABLE `mproducts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_details`
--
ALTER TABLE `customer_details`
  MODIFY `Cid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
