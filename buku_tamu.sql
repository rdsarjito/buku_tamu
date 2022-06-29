-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2022 at 10:37 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buku_tamu`
--

-- --------------------------------------------------------

--
-- Table structure for table `table_buku_tamu`
--

CREATE TABLE `table_buku_tamu` (
  `ID_BT` int(10) NOT NULL,
  `NAMA` varchar(200) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `ISI` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_buku_tamu`
--

INSERT INTO `table_buku_tamu` (`ID_BT`, `NAMA`, `EMAIL`, `ISI`) VALUES
(22, 'Ramadhani Nur Sarjito', 'rama09n@gmail.com', 'Rama sedang mengerjakan UAS'),
(23, 'Rambo', 'rambo@gmail.com', 'Rambo sedang berperang'),
(24, 'Eren', 'eren@gmail.com', 'Eren hampir mati');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `full_name` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `full_name`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Ramadhani Nur Sarjito');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_buku_tamu`
--
ALTER TABLE `table_buku_tamu`
  ADD PRIMARY KEY (`ID_BT`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_buku_tamu`
--
ALTER TABLE `table_buku_tamu`
  MODIFY `ID_BT` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
