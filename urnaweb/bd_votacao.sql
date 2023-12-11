-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2023 at 03:29 AM
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
-- Database: `bd_votacao`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_candidato`
--

CREATE TABLE `tb_candidato` (
  `id_candidato` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `partido` varchar(100) NOT NULL,
  `Fkcargo` int(11) NOT NULL,
  `votos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_candidato`
--

INSERT INTO `tb_candidato` (`id_candidato`, `numero`, `nome`, `partido`, `Fkcargo`, `votos`) VALUES
(1, 1508, 'Jorge Luís Vieira Murilo', ' PDJ - Partido do Jorge', 1, 0),
(2, 1350, 'Arthur Francisco Pereira Carvalho', 'FPA - Frente Progressista do Arthur', 1, 0),
(3, 12, 'Ganesh Govinda Pritik', 'BJP - Bharat Janata Party', 1, 0),
(4, 0, 'Branco', 'Sem partido', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_cargo`
--

CREATE TABLE `tb_cargo` (
  `id_cargo` int(11) NOT NULL,
  `cargo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_cargo`
--

INSERT INTO `tb_cargo` (`id_cargo`, `cargo`) VALUES
(1, 'Presidente');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_candidato`
--
ALTER TABLE `tb_candidato`
  ADD PRIMARY KEY (`id_candidato`),
  ADD KEY `cargo_FKcandidato` (`Fkcargo`);

--
-- Indexes for table `tb_cargo`
--
ALTER TABLE `tb_cargo`
  ADD PRIMARY KEY (`id_cargo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_candidato`
--
ALTER TABLE `tb_candidato`
  MODIFY `id_candidato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_cargo`
--
ALTER TABLE `tb_cargo`
  MODIFY `id_cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_candidato`
--
ALTER TABLE `tb_candidato`
  ADD CONSTRAINT `cargo_FKcandidato` FOREIGN KEY (`Fkcargo`) REFERENCES `tb_cargo` (`id_cargo`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
