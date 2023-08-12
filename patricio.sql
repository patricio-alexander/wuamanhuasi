-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 01, 2023 at 07:20 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `patricio`
--

-- --------------------------------------------------------

--
-- Table structure for table `patricio_table`
--

CREATE TABLE `patricio_table` (
  `id` int(10) NOT NULL,
  `ciudad` varchar(30) DEFAULT NULL,
  `provincia` varchar(30) DEFAULT NULL,
  `estado_civil` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patricio_table`
--

INSERT INTO `patricio_table` (`id`, `ciudad`, `provincia`, `estado_civil`) VALUES
(1, 'Cuenca', 'Azuay', 'viudo'),
(2, 'Cariamanga', 'Loja', 'Casado'),
(3, 'Cariamanga', 'Loja', 'Casado'),
(4, 'Cariamanga', 'Loja', 'Casado'),
(7, 'Cariamanga', 'Loja', 'soltero'),
(8, 'Cariamanga', 'Loja', 'soltero'),
(9, 'Cariamanga', 'Loja', 'soltero'),
(10, 'Cariamanga', 'Loja', 'soltero'),
(11, 'Cariamanga', 'Loja', 'soltero'),
(12, 'Cariamanga', 'Loja', 'soltero'),
(13, 'Cariamanga', 'Loja', 'soltero');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `patricio_table`
--
ALTER TABLE `patricio_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `patricio_table`
--
ALTER TABLE `patricio_table`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
