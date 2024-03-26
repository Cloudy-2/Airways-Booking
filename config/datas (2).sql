-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2024 at 07:06 AM
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
(232, 'Manila - MNL - Ninoy Aquino International Airport.', 'Manila - MNL - Ninoy Aquino International Airport.'),
(233, 'Cebu- CEB - Mactan Cebu International Airport.', 'Cebu- CEB - Mactan Cebu International Airport.'),
(234, 'Davao - DVO - Francisco Bangoy International Airport.', 'Davao - DVO - Francisco Bangoy International Airport.'),
(235, 'Tacloban -TAC - Daniel Z Romualdez Airport.', 'Tacloban -TAC - Daniel Z Romualdez Airport.'),
(236, 'Iloilo - ILO - Iloilo International Airport.', 'Iloilo - ILO - Iloilo International Airport.'),
(237, 'Boracay - MPH - Boracay Airport.', 'Boracay - MPH - Boracay Airport.'),
(238, 'Bacolod - BCD - Bacolod Silay International Airport.', 'Bacolod - BCD - Bacolod Silay International Airport.'),
(239, 'Cagayan de Oro- CGY - Laguindingan Airport.', 'Cagayan de Oro- CGY - Laguindingan Airport.'),
(240, 'Tagbilaran - TAG - Bohol Panglao International Airport.', 'Tagbilaran - TAG - Bohol Panglao International Airport.'),
(241, 'Puerto Princesa City- PPS - Puerto Princesa International Airport.', 'Puerto Princesa City- PPS - Puerto Princesa International Airport.'),
(242, 'Angeles - CRK - Clark International Airport.', 'Angeles - CRK - Clark International Airport.'),
(243, 'Kalibo - KLO - Kalibo International Airport.', 'Kalibo - KLO - Kalibo International Airport.');

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
(11, 'FL001', 'Manila - MNL - Ninoy Aquino International Airport.', 'Cebu- CEB - Mactan Cebu International Airport.', 0.00),
(12, 'FL002', 'Manila - MNL - Ninoy Aquino International Airport.', 'Davao - DVO - Francisco Bangoy International Airport.', 0.00),
(13, 'FL003', 'Manila - MNL - Ninoy Aquino International Airport.', 'Tacloban -TAC - Daniel Z Romualdez Airport.', 0.00),
(14, 'FL004', 'Manila - MNL - Ninoy Aquino International Airport.', 'Iloilo - ILO - Iloilo International Airport.', 0.00),
(15, 'FL005', 'Manila - MNL - Ninoy Aquino International Airport.', 'Boracay - MPH - Boracay Airport.', 0.00),
(16, 'FL006', 'Manila - MNL - Ninoy Aquino International Airport.', 'Bacolod - BCD - Bacolod Silay International Airport.', 0.00),
(17, 'FL007', 'Manila - MNL - Ninoy Aquino International Airport.', 'Cagayan de Oro- CGY - Laguindingan Airport.', 0.00),
(18, 'FL008', 'Manila - MNL - Ninoy Aquino International Airport.', 'Tagbilaran - TAG - Bohol Panglao International Airport.', 0.00),
(19, 'FL009', 'Manila - MNL - Ninoy Aquino International Airport.', 'Puerto Princesa City- PPS - Puerto Princesa International Airport.', 0.00),
(20, 'FL010', 'Manila - MNL - Ninoy Aquino International Airport.', 'Angeles - CRK - Clark International Airport.', 0.00),
(21, 'FL011', 'Manila - MNL - Ninoy Aquino International Airport.', 'Kalibo - KLO - Kalibo International Airport.', 0.00),
(22, 'FL012', 'Cebu- CEB - Mactan Cebu International Airport.', 'Manila - MNL - Ninoy Aquino International Airport.', 0.00),
(23, 'FL013', 'Cebu- CEB - Mactan Cebu International Airport.', 'Davao - DVO - Francisco Bangoy International Airport.', 0.00),
(24, 'FL014', 'Cebu- CEB - Mactan Cebu International Airport.', 'Tacloban -TAC - Daniel Z Romualdez Airport.', 0.00),
(25, 'FL015', 'Cebu- CEB - Mactan Cebu International Airport.', 'Iloilo - ILO - Iloilo International Airport.', 0.00),
(26, 'FL016', 'Cebu- CEB - Mactan Cebu International Airport.', 'Boracay - MPH - Boracay Airport.', 0.00),
(27, 'FL017', 'Cebu- CEB - Mactan Cebu International Airport.', 'Bacolod - BCD - Bacolod Silay International Airport.', 0.00),
(28, 'FL018', 'Cebu- CEB - Mactan Cebu International Airport.', 'Cagayan de Oro- CGY - Laguindingan Airport.', 0.00),
(29, 'FL019', 'Cebu- CEB - Mactan Cebu International Airport.', 'Tagbilaran - TAG - Bohol Panglao International Airport.', 0.00),
(30, 'FL020', 'Cebu- CEB - Mactan Cebu International Airport.', 'Puerto Princesa City- PPS - Puerto Princesa International Airport.', 0.00),
(31, 'FL021', 'Cebu- CEB - Mactan Cebu International Airport.', 'Angeles - CRK - Clark International Airport.', 0.00),
(32, 'FL022', 'Cebu- CEB - Mactan Cebu International Airport.', 'Kalibo - KLO - Kalibo International Airport.', 0.00),
(33, 'FL023', 'Davao - DVO - Francisco Bangoy International Airport.', 'Manila - MNL - Ninoy Aquino International Airport.', 0.00),
(34, 'FL024', 'Davao - DVO - Francisco Bangoy International Airport.', 'Cebu- CEB - Mactan Cebu International Airport.', 0.00),
(35, 'FL025', 'Davao - DVO - Francisco Bangoy International Airport.', 'Tacloban -TAC - Daniel Z Romualdez Airport.', 0.00),
(36, 'FL026', 'Davao - DVO - Francisco Bangoy International Airport.', 'Iloilo - ILO - Iloilo International Airport.', 0.00),
(37, 'FL027', 'Davao - DVO - Francisco Bangoy International Airport.', 'Boracay - MPH - Boracay Airport.', 0.00),
(38, 'FL028', 'Davao - DVO - Francisco Bangoy International Airport.', 'Bacolod - BCD - Bacolod Silay International Airport.', 0.00),
(39, 'FL029', 'Davao - DVO - Francisco Bangoy International Airport.', 'Cagayan de Oro- CGY - Laguindingan Airport.', 0.00),
(40, 'FL030', 'Davao - DVO - Francisco Bangoy International Airport.', 'Tagbilaran - TAG - Bohol Panglao International Airport.', 0.00),
(41, 'FL031', 'Davao - DVO - Francisco Bangoy International Airport.', 'Puerto Princesa City- PPS - Puerto Princesa International Airport.', 0.00),
(42, 'FL032', 'Davao - DVO - Francisco Bangoy International Airport.', 'Angeles - CRK - Clark International Airport.', 0.00),
(43, 'FL033', 'Davao - DVO - Francisco Bangoy International Airport.', 'Kalibo - KLO - Kalibo International Airport.', 0.00),
(44, 'FL034', 'Tacloban -TAC - Daniel Z Romualdez Airport.', 'Manila - MNL - Ninoy Aquino International Airport.', 0.00),
(45, 'FL035', 'Tacloban -TAC - Daniel Z Romualdez Airport.', 'Cebu- CEB - Mactan Cebu International Airport.', 0.00),
(46, 'FL036', 'Tacloban -TAC - Daniel Z Romualdez Airport.', 'Davao - DVO - Francisco Bangoy International Airport.', 0.00),
(47, 'FL037', 'Tacloban -TAC - Daniel Z Romualdez Airport.', 'Iloilo - ILO - Iloilo International Airport.', 0.00),
(48, 'FL038', 'Tacloban -TAC - Daniel Z Romualdez Airport.', 'Boracay - MPH - Boracay Airport.', 0.00),
(49, 'FL039', 'Tacloban -TAC - Daniel Z Romualdez Airport.', 'Bacolod - BCD - Bacolod Silay International Airport.', 0.00),
(50, 'FL040', 'Tacloban -TAC - Daniel Z Romualdez Airport.', 'Cagayan de Oro- CGY - Laguindingan Airport.', 0.00),
(51, 'FL041', 'Tacloban -TAC - Daniel Z Romualdez Airport.', 'Tagbilaran - TAG - Bohol Panglao International Airport.', 0.00),
(52, 'FL042', 'Tacloban -TAC - Daniel Z Romualdez Airport.', 'Puerto Princesa City- PPS - Puerto Princesa International Airport.', 0.00),
(53, 'FL043', 'Tacloban -TAC - Daniel Z Romualdez Airport.', 'Angeles - CRK - Clark International Airport.', 0.00),
(54, 'FL044', 'Tacloban -TAC - Daniel Z Romualdez Airport.', 'Kalibo - KLO - Kalibo International Airport.', 0.00),
(55, 'FL045', 'Iloilo - ILO - Iloilo International Airport.', 'Manila - MNL - Ninoy Aquino International Airport.', 0.00),
(56, 'FL046', 'Iloilo - ILO - Iloilo International Airport.', 'Cebu- CEB - Mactan Cebu International Airport.', 0.00),
(57, 'FL047', 'Iloilo - ILO - Iloilo International Airport.', 'Davao - DVO - Francisco Bangoy International Airport.', 0.00),
(58, 'FL048', 'Iloilo - ILO - Iloilo International Airport.', 'Tacloban -TAC - Daniel Z Romualdez Airport.', 0.00),
(59, 'FL049', 'Iloilo - ILO - Iloilo International Airport.', 'Boracay - MPH - Boracay Airport.', 0.00),
(60, 'FL050', 'Iloilo - ILO - Iloilo International Airport.', 'Bacolod - BCD - Bacolod Silay International Airport.', 0.00),
(61, 'FL051', 'Iloilo - ILO - Iloilo International Airport.', 'Cagayan de Oro- CGY - Laguindingan Airport.', 0.00),
(62, 'FL052', 'Iloilo - ILO - Iloilo International Airport.', 'Tagbilaran - TAG - Bohol Panglao International Airport.', 0.00),
(63, 'FL053', 'Iloilo - ILO - Iloilo International Airport.', 'Puerto Princesa City- PPS - Puerto Princesa International Airport.', 0.00),
(64, 'FL054', 'Iloilo - ILO - Iloilo International Airport.', 'Angeles - CRK - Clark International Airport.', 0.00),
(65, 'FL055', 'Iloilo - ILO - Iloilo International Airport.', 'Kalibo - KLO - Kalibo International Airport.', 0.00),
(66, 'FL056', 'Boracay - MPH - Boracay Airport.', 'Manila - MNL - Ninoy Aquino International Airport.', 0.00),
(67, 'FL057', 'Boracay - MPH - Boracay Airport.', 'Cebu- CEB - Mactan Cebu International Airport.', 0.00),
(68, 'FL058', 'Boracay - MPH - Boracay Airport.', 'Davao - DVO - Francisco Bangoy International Airport.', 0.00),
(69, 'FL059', 'Boracay - MPH - Boracay Airport.', 'Tacloban -TAC - Daniel Z Romualdez Airport.', 0.00),
(70, 'FL060', 'Boracay - MPH - Boracay Airport.', 'Iloiloilo - ILO - Iloilo International Airport.', 0.00),
(71, 'FL061', 'Boracay - MPH - Boracay Airport.', 'Bacolod - BCD - Bacolod Silay International Airport.', 0.00),
(72, 'FL062', 'Boracay - MPH - Boracay Airport.', 'Cagayan de Oro- CGY - Laguindingan Airport.', 0.00),
(73, 'FL063', 'Boracay - MPH - Boracay Airport.', 'Tagbilaran - TAG - Bohol Panglao International Airport.', 0.00),
(74, 'FL064', 'Boracay - MPH - Boracay Airport.', 'Puerto Princesa City- PPS - Puerto Princesa International Airport.', 0.00),
(75, 'FL065', 'Boracay - MPH - Boracay Airport.', 'Angeles - CRK - Clark International Airport.', 0.00),
(76, 'FL066', 'Boracay - MPH - Boracay Airport.', 'Kalibo - KLO - Kalibo International Airport.', 0.00),
(77, 'FL067', 'Bacolod - BCD - Bacolod Silay International Airport.', 'Manila - MNL - Ninoy Aquino International Airport.', 0.00),
(78, 'FL068', 'Bacolod - BCD - Bacolod Silay International Airport.', 'Cebu- CEB - Mactan Cebu International Airport.', 0.00),
(79, 'FL069', 'Bacolod - BCD - Bacolod Silay International Airport.', 'Davao - DVO - Francisco Bangoy International Airport.', 0.00),
(80, 'FL070', 'Bacolod - BCD - Bacolod Silay International Airport.', 'Tacloban -TAC - Daniel Z Romualdez Airport.', 0.00),
(81, 'FL071', 'Bacolod - BCD - Bacolod Silay International Airport.', 'Iloilo - ILO - Iloilo International Airport.', 0.00),
(82, 'FL072', 'Bacolod - BCD - Bacolod Silay International Airport.', 'Boracay - MPH - Boracay Airport.', 0.00),
(83, 'FL073', 'Bacolod - BCD - Bacolod Silay International Airport.', 'Cagayan de Oro- CGY - Laguindingan Airport.', 0.00),
(84, 'FL074', 'Bacolod - BCD - Bacolod Silay International Airport.', 'Tagbilaran - TAG - Bohol Panglao International Airport.', 0.00),
(85, 'FL075', 'Bacolod - BCD - Bacolod Silay International Airport.', 'Puerto Princesa City- PPS - Puerto Princesa International Airport.', 0.00),
(86, 'FL076', 'Bacolod - BCD - Bacolod Silay International Airport.', 'Angeles - CRK - Clark International Airport.', 0.00),
(87, 'FL077', 'Bacolod - BCD - Bacolod Silay International Airport.', 'Kalibo - KLO - Kalibo International Airport.', 0.00),
(88, 'FL078', 'Cagayan de Oro- CGY - Laguindingan Airport.', 'Manila - MNL - Ninoy Aquino International Airport.', 0.00),
(89, 'FL079', 'Cagayan de Oro- CGY - Laguindingan Airport.', 'Cebu- CEB - Mactan Cebu International Airport.', 0.00),
(90, 'FL080', 'Cagayan de Oro- CGY - Laguindingan Airport.', 'Davao - DVO - Francisco Bangoy International Airport.', 0.00),
(91, 'FL081', 'Cagayan de Oro- CGY - Laguindingan Airport.', 'Tacloban -TAC - Daniel Z Romualdez Airport.', 0.00),
(92, 'FL082', 'Cagayan de Oro- CGY - Laguindingan Airport.', 'Iloilo - ILO - Iloilo International Airport.', 0.00),
(93, 'FL083', 'Cagayan de Oro- CGY - Laguindingan Airport.', 'Boracay - MPH - Boracay Airport.', 0.00),
(94, 'FL084', 'Cagayan de Oro- CGY - Laguindingan Airport.', 'Bacolod - BCD - Bacolod Silay International Airport.', 0.00),
(95, 'FL085', 'Cagayan de Oro- CGY - Laguindingan Airport.', 'Tagbilaran - TAG - Bohol Panglao International Airport.', 0.00),
(96, 'FL086', 'Cagayan de Oro- CGY - Laguindingan Airport.', 'Puerto Princesa City- PPS - Puerto Princesa International Airport.', 0.00),
(97, 'FL087', 'Cagayan de Oro- CGY - Laguindingan Airport.', 'Angeles - CRK - Clark International Airport.', 0.00),
(98, 'FL088', 'Cagayan de Oro- CGY - Laguindingan Airport.', 'Kalibo - KLO - Kalibo International Airport.', 0.00),
(99, 'FL089', 'Tagbilaran - TAG - Bohol Panglao International Airport.', 'Manila - MNL - Ninoy Aquino International Airport.', 0.00),
(100, 'FL090', 'Tagbilaran - TAG - Bohol Panglao International Airport.', 'Cebu- CEB - Mactan Cebu International Airport.', 0.00),
(101, 'FL091', 'Tagbilaran - TAG - Bohol Panglao International Airport.', 'Davao - DVO - Francisco Bangoy International Airport.', 0.00),
(102, 'FL092', 'Tagbilaran - TAG - Bohol Panglao International Airport.', 'Tacloban -TAC - Daniel Z Romualdez Airport.', 0.00),
(103, 'FL093', 'Tagbilaran - TAG - Bohol Panglao International Airport.', 'Iloilo - ILO - Iloilo International Airport.', 0.00),
(104, 'FL094', 'Tagbilaran - TAG - Bohol Panglao International Airport.', 'Boracay - MPH - Boracay Airport.', 0.00),
(105, 'FL095', 'Tagbilaran - TAG - Bohol Panglao International Airport.', 'Bacolod - BCD - Bacolod Silay International Airport.', 0.00),
(106, 'FL096', 'Tagbilaran - TAG - Bohol Panglao International Airport.', 'Cagayan de Oro- CGY - Laguindingan Airport.', 0.00),
(107, 'FL097', 'Tagbilaran - TAG - Bohol Panglao International Airport.', 'Puerto Princesa City- PPS - Puerto Princesa International Airport.', 0.00),
(108, 'FL098', 'Tagbilaran - TAG - Bohol Panglao International Airport.', 'Angeles - CRK - Clark International Airport.', 0.00),
(109, 'FL099', 'Tagbilaran - TAG - Bohol Panglao International Airport.', 'Kalibo - KLO - Kalibo International Airport.', 0.00),
(110, 'FL100', 'Puerto Princesa City- PPS - Puerto Princesa International Airport.', 'Manila - MNL - Ninoy Aquino International Airport.', 0.00),
(111, 'FL101', 'Puerto Princesa City- PPS - Puerto Princesa International Airport.', 'Cebu- CEB - Mactan Cebu International Airport.', 0.00),
(112, 'FL102', 'Puerto Princesa City- PPS - Puerto Princesa International Airport.', 'Davao - DVO - Francisco Bangoy International Airport.', 0.00),
(113, 'FL103', 'Puerto Princesa City- PPS - Puerto Princesa International Airport.', 'Tacloban -TAC - Daniel Z Romualdez Airport.', 0.00),
(114, 'FL104', 'Puerto Princesa City- PPS - Puerto Princesa International Airport.', 'Iloilo - ILO - Iloilo International Airport.', 0.00),
(115, 'FL105', 'Puerto Princesa City- PPS - Puerto Princesa International Airport.', 'Boracay - MPH - Boracay Airport.', 0.00),
(116, 'FL106', 'Puerto Princesa City- PPS - Puerto Princesa International Airport.', 'Bacolod - BCD - Bacolod Silay International Airport.', 0.00),
(117, 'FL107', 'Puerto Princesa City- PPS - Puerto Princesa International Airport.', 'Cagayan de Oro- CGY - Laguindingan Airport.', 0.00),
(118, 'FL108', 'Puerto Princesa City- PPS - Puerto Princesa International Airport.', 'Tagbilaran - TAG - Bohol Panglao International Airport.', 0.00),
(119, 'FL109', 'Puerto Princesa City- PPS - Puerto Princesa International Airport.', 'Angeles - CRK - Clark International Airport.', 0.00),
(120, 'FL110', 'Puerto Princesa City- PPS - Puerto Princesa International Airport.', 'Kalibo - KLO - Kalibo International Airport.', 0.00),
(121, 'FL111', 'Angeles - CRK - Clark International Airport.', 'Manila - MNL - Ninoy Aquino International Airport.', 0.00),
(122, 'FL112', 'Angeles - CRK - Clark International Airport.', 'Cebu- CEB - Mactan Cebu International Airport.', 0.00),
(123, 'FL113', 'Angeles - CRK - Clark International Airport.', 'Davao - DVO - Francisco Bangoy International Airport.', 0.00),
(124, 'FL114', 'Angeles - CRK - Clark International Airport.', 'Tacloban -TAC - Daniel Z Romualdez Airport.', 0.00),
(125, 'FL115', 'Angeles - CRK - Clark International Airport.', 'Iloilo - ILO - Iloilo International Airport.', 0.00),
(126, 'FL116', 'Angeles - CRK - Clark International Airport.', 'Boracay - MPH - Boracay Airport.', 0.00),
(127, 'FL117', 'Angeles - CRK - Clark International Airport.', 'Bacolod - BCD - Bacolod Silay International Airport.', 0.00),
(128, 'FL118', 'Angeles - CRK - Clark International Airport.', 'Cagayan de Oro- CGY - Laguindingan Airport.', 0.00),
(129, 'FL119', 'Angeles - CRK - Clark International Airport.', 'Tagbilaran - TAG - Bohol Panglao International Airport.', 0.00),
(130, 'FL120', 'Angeles - CRK - Clark International Airport.', 'Puerto Princesa City- PPS - Puerto Princesa International Airport.', 0.00),
(131, 'FL121', 'Angeles - CRK - Clark International Airport.', 'Kalibo - KLO - Kalibo International Airport.', 0.00),
(132, 'FL122', 'Kalibo - KLO - Kalibo International Airport.', 'Manila - MNL - Ninoy Aquino International Airport.', 0.00),
(133, 'FL123', 'Kalibo - KLO - Kalibo International Airport.', 'Cebu- CEB - Mactan Cebu International Airport.', 0.00),
(134, 'FL124', 'Kalibo - KLO - Kalibo International Airport.', 'Davao - DVO - Francisco Bangoy International Airport.', 0.00),
(135, 'FL125', 'Kalibo - KLO - Kalibo International Airport.', 'Tacloban -TAC - Daniel Z Romualdez Airport.', 0.00),
(136, 'FL126', 'Kalibo - KLO - Kalibo International Airport.', 'Iloilo - ILO - Iloilo International Airport.', 0.00),
(137, 'FL127', 'Kalibo - KLO - Kalibo International Airport.', 'Boracay - MPH - Boracay Airport.', 0.00),
(138, 'FL128', 'Kalibo - KLO - Kalibo International Airport.', 'Bacolod - BCD - Bacolod Silay International Airport.', 0.00),
(139, 'FL129', 'Kalibo - KLO - Kalibo International Airport.', 'Cagayan de Oro- CGY - Laguindingan Airport.', 0.00),
(140, 'FL130', 'Kalibo - KLO - Kalibo International Airport.', 'Tagbilaran - TAG - Bohol Panglao International Airport.', 0.00),
(141, 'FL131', 'Kalibo - KLO - Kalibo International Airport.', 'Puerto Princesa City- PPS - Puerto Princesa International Airport.', 0.00),
(142, 'FL132', 'Kalibo - KLO - Kalibo International Airport.', 'Angeles - CRK - Clark International Airport.', 0.00);

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
(37, 'Cloyd', 'Labininay ', '$2y$10$Yf.Wu5KQx0tQ1G5XlYj0QubU0ro9SXpxORJo0B8IGNsJmmb9dDRxC', 'q@gmail.com'),
(38, 'Cloyd', 'Labininay ', '$2y$10$Wr1e.mlmq0ntetgsYoHbOO7NiDism62UNqX0UvAiGI82Q06C57J5e', '123@gmail.com');

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
(4, 'Cloyd', 'Labininay ', 'Q@gmail.com', '$2y$10$T9GLRXkJYN5zKT3ILvBD9edi7qDSMRJ3PJonOUZ5T4.vvNZTvrsmi'),
(5, 'Cloyd', 'Labininay ', '123@gmail.com', '$2y$10$YCrvpyLUBB0mqChsIP35K.F8AP8nCkF1e2jnF4WGoUqQbQTJ9m5hK');

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
  MODIFY `Id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=244;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `flights`
--
ALTER TABLE `flights`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `logindata`
--
ALTER TABLE `logindata`
  MODIFY `Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `passengers`
--
ALTER TABLE `passengers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `res_records`
--
ALTER TABLE `res_records`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
