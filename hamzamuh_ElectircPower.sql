-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 192.168.0.100
-- Generation Time: Jun 13, 2022 at 02:05 PM
-- Server version: 8.0.26-16
-- PHP Version: 7.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hamzamuh_ElectircPower`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `first_name` varchar(15) NOT NULL,
  `last_name` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_number` int NOT NULL,
  `address` varchar(50) NOT NULL,
  `description_probelm` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`first_name`, `last_name`, `email`, `phone_number`, `address`, `description_probelm`) VALUES
('Moath', 'barakat', 'Moath@gmail.com', 772739476, 'Irbid', 'Warning'),
('Obada', 'Bara', 'Obada@gmail.com', 776429765, 'Ajloun', 'The system is down!!'),
('Omar', 'Saleh', 'Omar@gmail.com', 783726937, 'Aqaba', ' Electricity issues'),
('Ahmad', 'Hadi', 'Ahmad@gmail.com', 793750296, 'Amman', 'Issues in the electricity in my house');

-- --------------------------------------------------------

--
-- Table structure for table `new_subscription`
--

CREATE TABLE `new_subscription` (
  `id` int NOT NULL,
  `subscription_type` varchar(15) NOT NULL,
  `first_name` varchar(15) NOT NULL,
  `last_name` varchar(15) NOT NULL,
  `nationality` varchar(15) NOT NULL,
  `national_num` bigint NOT NULL,
  `phone_number` int NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `new_subscription`
--

INSERT INTO `new_subscription` (`id`, `subscription_type`, `first_name`, `last_name`, `nationality`, `national_num`, `phone_number`, `address`) VALUES
(22, 'commercial', 'Ibrahim', 'Yousef', 'Jordanian', 9273947127, 772617394, 'Irbid'),
(23, 'personal', 'hamza', 'muhsen', 'Jordanian', 72937927329, 796873570, 'Amman'),
(24, 'personal', 'Moath', 'barakat', 'Jordanian', 39475937651, 782749776, 'Ajloun'),
(25, 'commercial', 'Obada', 'Bara', 'Jordanian', 49740967942, 786497645, 'Amman'),
(26, 'commercial', 'Wael', 'Radi', 'Jordanian', 19204794726, 793672921, 'Amman');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `first_name` varchar(15) NOT NULL,
  `last_name` varchar(15) NOT NULL,
  `subscription_number` bigint NOT NULL,
  `subscription_type` varchar(15) NOT NULL,
  `year` year NOT NULL,
  `month` int NOT NULL,
  `amount_to_paid` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`first_name`, `last_name`, `subscription_number`, `subscription_type`, `year`, `month`, `amount_to_paid`) VALUES
('hamza', 'muhsen', 1234567, 'Personal', 2022, 2, '200'),
('Mohammad', 'rahim', 2147474, 'Personal', 2022, 1, '500'),
('Obada', 'Bara', 5293769, 'commercial', 2021, 9, '700'),
('Wael', 'Radi', 7392765, 'commercial', 2022, 6, '175'),
('Ibrahim', 'Yousef', 7654321, 'commercial', 2021, 8, '400'),
('Moath', 'Barakat', 9273976, 'Personal', 2022, 12, '45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`phone_number`);

--
-- Indexes for table `new_subscription`
--
ALTER TABLE `new_subscription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`subscription_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `new_subscription`
--
ALTER TABLE `new_subscription`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
