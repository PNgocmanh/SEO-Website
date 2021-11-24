-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2021 at 03:34 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `ho_ten` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `anh` varchar(50) DEFAULT NULL,
  `lien_he` varchar(500) NOT NULL,
  `quyen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `username`, `password`, `ho_ten`, `email`, `anh`, `lien_he`, `quyen`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin', 'admin@gmail.com', NULL, 'Việt Nam', 0),
(3, 'dathuynh', '4c45a38dfd23d60c2b4f47c8d23ed8f0', 'Đạt 12345', 'dathuynhyl91@gmail.com', NULL, 'Việt Nam 123', 1),
(6, 'dat1234', '4c45a38dfd23d60c2b4f47c8d23ed8f0', 'Đạt ABC', 'dat01685170741@gmail.com', NULL, 'TP. Hồ Chí Minh', 1),
(7, 'abcabc', 'e10adc3949ba59abbe56e057f20f883e', 'aaaaaa', 'dat1234@gmail.com', NULL, 'Vũng Tàu', 1),
(16, 'dathuynhyl91', '4c45a38dfd23d60c2b4f47c8d23ed8f0', 'Đạt Huỳnh', 'dathuynhyl91@gmail.com', 'E9fZoxxVIAIU2V8.jpg', 'Bến Tre', 1),
(17, 'dat01685170741', '4c45a38dfd23d60c2b4f47c8d23ed8f0', 'Đạt Huỳnh', 'dathuynhyl91@gmail.com', '104567.jpg', 'Mỏ Cày Nam', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
