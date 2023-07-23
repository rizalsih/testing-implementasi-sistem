-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2023 at 04:19 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbkaryawan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbbio`
--

CREATE TABLE `tbbio` (
  `id` int(11) NOT NULL,
  `nik` varchar(7) NOT NULL,
  `nama` text NOT NULL,
  `jabatan` text NOT NULL,
  `bag` text NOT NULL,
  `tglmasuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbbio`
--

INSERT INTO `tbbio` (`id`, `nik`, `nama`, `jabatan`, `bag`, `tglmasuk`) VALUES
(3, '2023002', 'REZA', 'Manager', 'PPIC', '2023-07-15'),
(5, '2023001', 'RIZAL', 'Manager', 'Research and Development', '2023-07-15'),
(6, '2023010', 'NADIA', 'Manager', 'PPIC', '2023-07-15'),
(8, '2023011', 'RIZAL', '', '', '2023-07-15'),
(9, '2023009', 'IMRON', 'Manager', 'PPIC', '2023-07-15');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(5) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `pass`) VALUES
(8, 'rizal', '$2y$10$ascNYDE2xn6wsk8cBp4b5.vaatjUl6kF8JRsQDEIrmlwrYnNQUNsO'),
(13, 'user', '$2y$10$tKWRymdwe0wB.2YvUYWRHuGvQRxLzwhn96EfwY1CW8yMD37YCGgSi'),
(14, 'admin', '$2y$10$qfe7tSyvoufiIQSsNkMFYuEDK507CUKuOkeWCYD7Y.NSlvuMWP5H2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbbio`
--
ALTER TABLE `tbbio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbbio`
--
ALTER TABLE `tbbio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
