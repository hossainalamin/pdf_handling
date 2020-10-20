-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2020 at 07:18 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pdf`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pdf`
--

CREATE TABLE `tbl_pdf` (
  `id` int(11) NOT NULL,
  `pdf_folder` varchar(255) NOT NULL,
  `pdf_name` varchar(255) NOT NULL,
  `pdf_content` varchar(255) NOT NULL,
  `timeStore` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pdf`
--

INSERT INTO `tbl_pdf` (`id`, `pdf_folder`, `pdf_name`, `pdf_content`, `timeStore`) VALUES
(69, 'uploads/239b45a597.pdf', 'Office', 'CEN_ALL_FACTURE_AME16050001.pdf', '2020-10-20 12:14:03'),
(70, 'uploads/d9e03274bb.pdf', 'Office', 'CEN_ALL_FACTURE_AME16050001.pdf', '2020-10-20 12:18:34'),
(71, 'uploads/1368098f00.pdf', 'Office', 'CEN_ALL_FACTURE_AME16050001.pdf', '2020-10-20 12:18:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_pdf`
--
ALTER TABLE `tbl_pdf`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_pdf`
--
ALTER TABLE `tbl_pdf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
