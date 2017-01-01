-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2016 at 06:53 PM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pcpartdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `motherboard` int(11) DEFAULT NULL,
  `cpu` int(11) DEFAULT NULL,
  `ram` int(11) DEFAULT NULL,
  `hardisk` int(11) DEFAULT NULL,
  `total_price` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `customer_id`, `motherboard`, `cpu`, `ram`, `hardisk`, `total_price`, `status`) VALUES
(1, 5, 4, 3, 4, 6, 85900, 0),
(6, 4, 10, 1, 10, 1, 66500, 0),
(7, 6, 2, 1, NULL, NULL, 9500, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cpu`
--

CREATE TABLE `cpu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `company` varchar(50) NOT NULL,
  `inventory` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cpu`
--

INSERT INTO `cpu` (`id`, `name`, `price`, `company`, `inventory`) VALUES
(1, 'Intel 6th Generation Pentium Processor G4400', 5100, 'Intel', 14),
(3, 'IntelÂ® 4th Generation Coreâ„¢ i3-4160 Processor', 9100, 'Intel', 10),
(4, 'AMD FX-6300 PILEDRIVER 6-CORE Black Edition', 12200, 'AMD', 6),
(5, 'AMD A10-6800K Richland', 14400, 'AMD', 4),
(6, 'IntelÂ® 6th Generation Coreâ„¢ i5-6400 Processor', 15300, 'Intel', 4),
(7, 'Intel 6th Gen Core i5-6600K Processor', 20200, 'Intel', 7),
(8, 'Intel 6th Gen Core i7-6700 Processor', 25300, 'Intel', 8),
(9, 'Intel XEON E3-1270V5 QUAD CORE 3.60Ghz 8MB Cache 1151 Socket Processor', 31300, 'Intel', 15),
(10, 'IntelÂ® 6th Generation Coreâ„¢ i7-6800K Processor', 36300, 'Intel', 13),
(11, 'IntelÂ® 6th Generation Coreâ„¢ i7-6850K Processor', 53500, 'Intel', 17),
(12, 'IntelÂ® 6th Generation Coreâ„¢ i7-6900K Processor', 90000, 'Intel', 15);

-- --------------------------------------------------------

--
-- Table structure for table `hardisk`
--

CREATE TABLE `hardisk` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `company` varchar(50) NOT NULL,
  `inventory` int(11) NOT NULL,
  `storage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hardisk`
--

INSERT INTO `hardisk` (`id`, `name`, `price`, `company`, `inventory`, `storage`) VALUES
(1, 'CORSAIR 120GB SSD FORCE LE (F240GBLEB)', 4600, 'Corsair', 5, 120),
(2, 'Western Digital 6TB 3.5" RED Pro WD6001FFWX Hard Drive', 27500, 'WESTERN DIGITAL', 8, 6),
(3, 'Transcend 8TB StoreJet 35T3 External Hard Drive', 27000, 'Transcend', 4, 8),
(4, 'Western Digital 4TB 3.5" BLACK HDD WD4003FZEX', 21500, 'WESTERN DIGITAL', 23, 4),
(5, 'Western Digital WDBCTL0040HWT My Cloud 4TB', 17500, 'WESTERN DIGITAL', 16, 4),
(6, 'Toshiba MD04ACA500 5TB 7200RPM', 16300, 'Toshiba', 17, 5),
(7, 'Western Digital Blue WD40E31X 4TB 3.5" SSHD Hard Drive', 15500, 'WESTERN DIGITAL', 11, 4),
(8, 'Transcend J25H3P 3TB USB 3.0 Portable Hard Disk', 14600, 'Transcend', 10, 3),
(9, 'Western Digital Black 2TB SATA Hard Disk', 13500, 'WESTERN DIGITAL', 2, 2),
(10, 'Western Digital My Passport Ultra 4TB Black', 15200, 'WESTERN DIGITAL', 1, 4),
(11, 'WESTERN DIGITAL Red ( WD30EFRX) 3 TB SATA Hard Drives', 12000, 'WESTERN DIGITAL', 3, 3),
(12, 'Western Digital 3TB 3.5" PURPLE HDD WD30PURX Hard Disk', 8500, 'WESTERN DIGITAL', 8, 3),
(13, 'Western Digital My Passport Ultra 1TB', 5900, 'WESTERN DIGITAL', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `motherboard`
--

CREATE TABLE `motherboard` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `company` varchar(255) NOT NULL,
  `inventory` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `motherboard`
--

INSERT INTO `motherboard` (`id`, `name`, `price`, `company`, `inventory`) VALUES
(1, 'Gigabyte GA-H110M S2PH-DDR4', 5900, 'Gigabyte', 5),
(2, 'MSI H81M-P33 Chipset', 4400, 'msi', 4),
(3, 'Gigabyte H61M-S2PV', 5050, 'Gigabyte', 10),
(4, 'ASUS ROG Rampage V Edition 10 Motherboard', 50500, 'ASUS', 10),
(5, 'Gigabyte GA-Z170X-Gaming G1', 44000, 'Gigabyte', 9),
(6, 'ASUS RAMPAGE V Extreme Motherboard', 45200, 'ASUS', 4),
(7, 'ASUS MAXIMUS VIII EXTREME MOTHERBOARD', 42300, 'ASUS', 4),
(8, 'Gigabyte GA-X99-Designare EX Motherboard', 39500, 'Gigabyte', 7),
(9, 'ASUS ROG MAXIMUS VIII Formula Motherboard', 35300, 'ASUS', 8),
(10, 'ASUS SABERTOOTH X99 MOTHERBOARD', 31800, 'ASUS', 14),
(11, 'Gigabyte GA-X99-Ultra Gaming Motherboard', 29000, 'Gigabyte', 18),
(12, 'Gigabyte GA-X99-Gaming 5P Motherboard', 28500, 'Gigabyte', 19),
(13, 'MSI Z170A GAMING M7 Motherboard', 25000, 'MSI', 0),
(14, 'ASUS MAXIMUS VIII HERO', 23300, 'ASUS', 20),
(15, 'GIGABYTE GA-Z170X-Gaming 7', 20000, 'Gigabyte', 15),
(16, 'ASUS H81M-C Motherboard', 4900, 'ASUS', 5),
(17, 'ASUS B150-A Motherboard', 8100, 'ASUS', 14),
(18, 'ASUS B150 PRO GAMING/AURA MotherBoard', 11200, 'ASUS', 16),
(19, 'GIGABYTE GA-X150-PRO ECC DDR4', 12500, 'Gigabyte', 18),
(20, 'MSI Z170 GAMING M3 Motherboard', 16200, 'MSI', 18),
(21, 'ASUS P10S WS MotherBoard', 19800, 'ASUS', 19);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `motherboard` int(11) NOT NULL,
  `cpu` int(11) NOT NULL,
  `ram` int(11) NOT NULL,
  `hardisk` int(11) NOT NULL,
  `total_price` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `motherboard`, `cpu`, `ram`, `hardisk`, `total_price`) VALUES
(1, 0, 1, 1, 1, 1, 1),
(4, 5, 4, 3, 4, 6, 85900),
(3, 4, 10, 1, 10, 1, 66500);

-- --------------------------------------------------------

--
-- Table structure for table `ram`
--

CREATE TABLE `ram` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `company` varchar(50) NOT NULL,
  `inventory` int(11) NOT NULL,
  `storage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ram`
--

INSERT INTO `ram` (`id`, `name`, `price`, `company`, `inventory`, `storage`) VALUES
(1, 'G.SKILL 4GB 1600MHz DDR3 RAM', 2000, 'G.Skill', 20, 4),
(2, 'ADATA 4GB DDR3 1600 BUS', 2100, 'ADATA', 9, 4),
(3, 'ADATA XPG Z1 8GB DDR4 SDRAM', 6100, 'ADATA', 3, 8),
(4, 'Corsair Vengeance LPX 16GB (1 x 16GB) DDR4-3000MHz', 10000, 'Corsair', 10, 16),
(5, 'G.Skill TridentX 8GB DDR3 2400 Bus Desktop Ram', 5600, 'G.Skill', 3, 8),
(6, 'AVEXIR Raiden Series 4GB DDR4 3000 Mhz Blue Plasma Tube RAM', 3600, 'AVEXIR', 14, 4),
(7, 'AVEXIR 4GB DDR4 2400Mhz Blue LED RAM', 2500, 'AVEXIR', 1, 4),
(8, 'AVEXIR 8GB DDR3 1600MHz Desktop PC RAM', 3800, 'AVEXIR', 3, 8),
(9, 'Corsair Valueselect 4GB DDR3 1600 RAM', 4, 'Corsair', 16, 4),
(10, 'Corsair DominatorÂ® Platinum Series 64GB (2 x 16GB) DDR4 DRAM 3333MHz C16 Memory Kit', 25000, 'Corsair', 2, 16),
(11, 'AVEXIR ROG Series RED Tesla 16GB(8GBX2) DDR4 2666 MHz-Dual Channel Desktop RAM', 17000, 'AVEXIR', 4, 8),
(12, 'HP 8GB (1x8GB) DDR3-1866 ECC RAM', 13100, 'HP', 18, 8);

-- --------------------------------------------------------

--
-- Table structure for table `regcustomers`
--

CREATE TABLE `regcustomers` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `secret_key` varchar(12) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `regcustomers`
--

INSERT INTO `regcustomers` (`id`, `full_name`, `username`, `password`, `secret_key`, `phone_number`, `address`) VALUES
(1, 'adminName', 'admin', 'adminpass', '12', '0000', '0000'),
(3, 'Shouvik Shadman', 'shouvik', 'shou', 'cats', '01672550003', 'Shantinagar'),
(4, 'rupa', 'rupa', '123', 'cat', '123', 'address'),
(5, 'talha', 'talha', '123', 'dog', '555', 'address'),
(6, 'makamay', 'maka', '123', 'leopard', '666', 'pond');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cpu`
--
ALTER TABLE `cpu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Indexes for table `hardisk`
--
ALTER TABLE `hardisk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `motherboard`
--
ALTER TABLE `motherboard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ram`
--
ALTER TABLE `ram`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regcustomers`
--
ALTER TABLE `regcustomers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phone_number` (`phone_number`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `cpu`
--
ALTER TABLE `cpu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `hardisk`
--
ALTER TABLE `hardisk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `motherboard`
--
ALTER TABLE `motherboard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ram`
--
ALTER TABLE `ram`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `regcustomers`
--
ALTER TABLE `regcustomers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
