-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2024 at 02:58 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datas`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `email`, `created_at`) VALUES
(1, 'Skyline Admin', 'admin', 'Skylineairways@gmail.com', '2024-03-19 22:30:01');

-- --------------------------------------------------------

--
-- Table structure for table `airport`
--

CREATE TABLE `airport` (
  `Id` int(50) NOT NULL,
  `Departure` varchar(255) DEFAULT NULL,
  `Arrival` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `airport`
--

INSERT INTO `airport` (`Id`, `Departure`, `Arrival`) VALUES
(148, 'Allah Valley Airport', 'Allah Valley Airport'),
(149, 'Bagabag Airport', 'Bagabag Airport'),
(150, 'Bacolod-Silay Airport', 'Bacolod-Silay Airport'),
(151, 'Baler Airport', 'Baler Airport'),
(152, 'Batanes Basco Airport', 'Batanes Basco Airport'),
(153, 'Bislig (Surigao del Sur) Airport', 'Bislig (Surigao del Sur) Airport'),
(154, 'Bohol-Panglao International Airport', 'Bohol-Panglao International Airport'),
(155, 'Borongan Airport', 'Borongan Airport'),
(156, 'Busuanga Airport', 'Busuanga Airport'),
(157, 'Butuan Bancasi Airport', 'Butuan Bancasi Airport'),
(158, 'Cagayan de Oro Laguindingan International Airport', 'Cagayan de Oro Laguindingan International Airport'),
(159, 'Cagayan De Sulu Airport', 'Cagayan De Sulu Airport'),
(160, 'Calbayog Airport', 'Calbayog Airport'),
(161, 'Camiguin Airport', 'Camiguin Airport'),
(162, 'Catarman National Airport', 'Catarman National Airport'),
(163, 'Catbalogan Airport', 'Catbalogan Airport'),
(164, 'Caticlan Malay (Boracay) Airport', 'Caticlan Malay (Boracay) Airport'),
(165, 'Cauayan Airport', 'Cauayan Airport'),
(166, 'Cotabato (AKA Awang) Airport', 'Cotabato (AKA Awang) Airport'),
(167, 'Cuyo Airport', 'Cuyo Airport'),
(168, 'Clark (Freeport Zone) International Airport', 'Clark (Freeport Zone) International Airport'),
(169, 'Daet (Camarines Norte) Airport', 'Daet (Camarines Norte) Airport'),
(170, 'Davao Francisco Bangoy International Airport', 'Davao Francisco Bangoy International Airport'),
(171, 'Dipolog Airport', 'Dipolog Airport'),
(172, 'Dumaguete Airport', 'Dumaguete Airport'),
(173, 'El Nido Airport', 'El Nido Airport'),
(174, 'General Santos International Airport', 'General Santos International Airport'),
(175, 'Guiuan Airport', 'Guiuan Airport'),
(176, 'Hilongos Airport', 'Hilongos Airport'),
(177, 'Iligan Maria Cristina Airport', 'Iligan Maria Cristina Airport'),
(178, 'Iloilo International Airport', 'Iloilo International Airport'),
(179, 'Ipil Airport', 'Ipil Airport'),
(180, 'Jolo Airport', 'Jolo Airport'),
(181, 'Kalibo (Boracay) International Airport', 'Kalibo (Boracay) International Airport'),
(182, 'Laoag International Airport', 'Laoag International Airport'),
(183, 'Bicol International Airport', 'Bicol International Airport'),
(184, 'Lubang Airport', 'Lubang Airport'),
(185, 'Maasin Airport', 'Maasin Airport'),
(186, 'Mactan-Cebu International Airport', 'Mactan-Cebu International Airport'),
(187, 'Malabang Airport', 'Malabang Airport'),
(188, 'Mamburao Airport', 'Mamburao Airport'),
(189, 'Manila Ninoy Aquino International Airport', 'Manila Ninoy Aquino International Airport'),
(190, 'Maramag Airport', 'Maramag Airport'),
(191, 'Marinduque Airport', 'Marinduque Airport'),
(192, 'Masbate Airport', 'Masbate Airport'),
(193, 'Mati Airport', 'Mati Airport'),
(194, 'Naga City (Camarines Sur) Airport', 'Naga City (Camarines Sur) Airport'),
(195, 'Ormoc Airport', 'Ormoc Airport'),
(196, 'Ozamiz City Labo Airport', 'Ozamiz City Labo Airport'),
(197, 'Pagadian Airport', 'Pagadian Airport'),
(198, 'Palanan Airport', 'Palanan Airport'),
(199, 'Puerto Princesa (Palawan) International Airport', 'Puerto Princesa (Palawan) International Airport'),
(200, 'Roxas City Airport', 'Roxas City Airport'),
(201, 'San Fernando Airport', 'San Fernando Airport'),
(202, 'San Jose Airport', 'San Jose Airport'),
(203, 'San Jose Antique Evelio Javier Airport', 'San Jose Antique Evelio Javier Airport'),
(204, 'San Vicente Airport', 'San Vicente Airport'),
(205, 'Sanga-Sanga (Tawi-Tawi) Airport', 'Sanga-Sanga (Tawi-Tawi) Airport'),
(206, 'Sangley Point NAF Airport', 'Sangley Point NAF Airport'),
(207, 'Sicogon Island Airport', 'Sicogon Island Airport'),
(208, 'Siocon Airport', 'Siocon Airport'),
(209, 'Subic Bay International Airport', 'Subic Bay International Airport'),
(210, 'Surigao Airport', 'Surigao Airport'),
(211, 'Tacloban D. Z. Romualdez Airport', 'Tacloban D. Z. Romualdez Airport'),
(212, 'Tagbita (Southern Palawan) Airport', 'Tagbita (Southern Palawan) Airport'),
(213, 'Tandag (Surigao del Sur) Airport', 'Tandag (Surigao del Sur) Airport'),
(214, 'Taytay-Sandoval CLR Airport', 'Taytay-Sandoval CLR Airport'),
(215, 'Tugdan Romblon Airport', 'Tugdan Romblon Airport'),
(216, 'Tuguegarao (Cagayan) Airport', 'Tuguegarao (Cagayan) Airport'),
(217, 'Virac (Catanduanes Island) Airport', 'Virac (Catanduanes Island) Airport'),
(218, 'Zamboanga International Airport', 'Zamboanga International Airport'),
(219, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `flight_id` int(11) NOT NULL,
  `passenger_id` int(11) NOT NULL,
  `booking_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `flights`
--

CREATE TABLE `flights` (
  `id` int(11) NOT NULL,
  `flight_number` varchar(20) NOT NULL,
  `departure_location` varchar(100) NOT NULL,
  `arrival_location` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flights`
--

INSERT INTO `flights` (`id`, `flight_number`, `departure_location`, `arrival_location`, `price`) VALUES
(2, '11', 'Clark International Airport (CRK)', 'Zamboanga Airport (ZAM)', 7000.00),
(3, '12', 'Clark International Airport (CRK)', 'Iloilo International Airport (ILO)', 7000.00),
(4, '13', 'Clark International Airport (CRK)', 'Daniel Z. Romualdez Airport (TAC)', 7000.00),
(5, '14', 'Clark International Airport (CRK)', 'Bacolod-Silay Airport (BCD)', 7000.00),
(6, '15', 'Clark International Airport (CRK)', 'Laguindingan Airport (CGY)', 7000.00),
(7, '16', 'Clark International Airport (CRK)', 'Puerto Princesa Airport (PPS)', 7000.00),
(8, '17', 'Clark International Airport (CRK)', 'Francisco Bangoy International Airport (DVO)', 7000.00),
(9, '18', 'Clark International Airport (CRK)', 'Mactan-Cebu Airport (CEB)', 7000.00),
(10, '19', 'Clark International Airport (CRK)', 'Manila Ninoy Aquino International Airport (MNL)', 7000.00);

-- --------------------------------------------------------

--
-- Table structure for table `logindata`
--

CREATE TABLE `logindata` (
  `Id` int(100) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logindata`
--

INSERT INTO `logindata` (`Id`, `firstname`, `lastname`, `password`, `Email`) VALUES
(29, 'Cloyd', 'Labininay ', '$2y$10$hgBxUQPOqWYY2kNWDGucGuqLeuL05hUfEBg3C7knEKbebuFW1/Rrm', 's@gmail.com'),
(30, 'Cloyd', 'Labininay ', '$2y$10$7kdaxQaxaXsaSbtg2GeF.ONMDcR.FshiEMxdFeb9oDxsKWbLABuJS', 'cloyd@gmail.com'),
(31, 'Cloyd', 'pelecio', '$2y$10$O9QbPIBqxwcZYdL3buKDaO7mbS7MArYyw4FOw6pYNJsyy6du28ZRC', 'pelecio@gmail.com'),
(32, 'Cloyd', 'labininay', '$2y$10$9b8w4XEUXKstm/gFNPjLIuIGUaeghkhPHJeuwvQBEipKbzRvA6yYS', 'labininay@gmail.com'),
(33, 'Cloyd', 'Labininay ', '$2y$10$G3M8/0AdCEbxnPskwmSraefedHQMyvEwWgjHv4QipQCasqTdUGaPG', 'labs@gmail.com'),
(34, 'Cloyd', 'Labininay ', '$2y$10$u0viZk.au.PyFspW69mCA.J62EmPaqcwdp/yEEOrq9cf/T24AFo3.', 'me@gmail.com'),
(35, 'Cloyd', 'Labininay ', '$2y$10$cankMymbA031XCMKSOjXBOSFjkIvCb34ItMsDcfPEOwh0eSBSvqfa', 'w@gmail.com'),
(36, 'Cloyd', 'Labininay', '$2y$10$8.tD7Qg33MPHpNi6op70eePbjkyXqDWaUJ/oobXNkaGnUN.bbCGYy', '1@gmail.com'),
(37, 'Cloyd', 'Labininay ', '$2y$10$Yf.Wu5KQx0tQ1G5XlYj0QubU0ro9SXpxORJo0B8IGNsJmmb9dDRxC', 'q@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `passengers`
--

CREATE TABLE `passengers` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `res_records`
--

CREATE TABLE `res_records` (
  `res_id` int(11) NOT NULL,
  `res_fname` varchar(100) NOT NULL,
  `res_lname` varchar(100) NOT NULL,
  `res_email` varchar(100) NOT NULL,
  `res_pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `res_records`
--

INSERT INTO `res_records` (`res_id`, `res_fname`, `res_lname`, `res_email`, `res_pass`) VALUES
(2, 'Earl', 'Sepida', 'earlsepida63@gmail.com', '$2y$10$gvggz01lgcQZ8dK9TABS0e1QISjhtUaE5fI91LUKbK0uepecisbAO'),
(3, 'Cloyd', 'Labininay ', 'm@gmail.com', '$2y$10$lhi7AUrCxZCuqTaFm78/xOmBxRcoAa6TQEtgr37JVQhQAUtXtJMxO'),
(4, 'Cloyd', 'Labininay ', 'Q@gmail.com', '$2y$10$T9GLRXkJYN5zKT3ILvBD9edi7qDSMRJ3PJonOUZ5T4.vvNZTvrsmi');

-- --------------------------------------------------------

--
-- Table structure for table `sf_records`
--

CREATE TABLE `sf_records` (
  `sf_id` int(11) NOT NULL,
  `sf_departure_location` varchar(200) NOT NULL,
  `sf_arrival_location` varchar(200) NOT NULL,
  `sf_departure_datetime` datetime NOT NULL,
  `sf_arrival_datetime` datetime NOT NULL,
  `sf_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sf_records`
--

INSERT INTO `sf_records` (`sf_id`, `sf_departure_location`, `sf_arrival_location`, `sf_departure_datetime`, `sf_arrival_datetime`, `sf_price`) VALUES
(1, 'Cagayan De Oro', 'Palawan', '2024-04-09 15:00:00', '2024-04-09 19:10:00', 4000.00),
(2, 'Cagayan De Oro', 'Palawan', '2024-04-09 04:00:00', '2024-04-09 06:00:00', 3500.00),
(3, 'Cagayan De Oro', 'Palawan', '2024-04-09 10:00:00', '2024-04-09 15:00:00', 5000.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `airport`
--
ALTER TABLE `airport`
  ADD UNIQUE KEY `PK` (`Id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `flight_id` (`flight_id`),
  ADD KEY `passenger_id` (`passenger_id`);

--
-- Indexes for table `flights`
--
ALTER TABLE `flights`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logindata`
--
ALTER TABLE `logindata`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `passengers`
--
ALTER TABLE `passengers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `res_records`
--
ALTER TABLE `res_records`
  ADD PRIMARY KEY (`res_id`);

--
-- Indexes for table `sf_records`
--
ALTER TABLE `sf_records`
  ADD PRIMARY KEY (`sf_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `airport`
--
ALTER TABLE `airport`
  MODIFY `Id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `flights`
--
ALTER TABLE `flights`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `logindata`
--
ALTER TABLE `logindata`
  MODIFY `Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `passengers`
--
ALTER TABLE `passengers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `res_records`
--
ALTER TABLE `res_records`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sf_records`
--
ALTER TABLE `sf_records`
  MODIFY `sf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`flight_id`) REFERENCES `flights` (`id`),
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`passenger_id`) REFERENCES `passengers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
