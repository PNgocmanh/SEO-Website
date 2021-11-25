-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 25, 2021 lúc 06:12 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `seo-website`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `ho_ten` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `anh` varchar(100) DEFAULT NULL,
  `lien_he` varchar(500) NOT NULL,
  `quyen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`ID`, `username`, `password`, `ho_ten`, `email`, `anh`, `lien_he`, `quyen`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin', 'admin@gmail.com', 'admin.jpg', 'Việt Nam', 0),
(3, 'dathuynh', '4c45a38dfd23d60c2b4f47c8d23ed8f0', 'Đạt 12345', 'dathuynhyl91@gmail.com', NULL, 'Việt Nam 123', 1),
(6, 'dat1234', '4c45a38dfd23d60c2b4f47c8d23ed8f0', 'Đạt ABC', 'dat01685170741@gmail.com', NULL, 'TP. Hồ Chí Minh', 1),
(7, 'abcabc', 'e10adc3949ba59abbe56e057f20f883e', 'aaaaaa', 'dat1234@gmail.com', NULL, 'Vũng Tàu', 1),
(16, 'dathuynhyl91', '4c45a38dfd23d60c2b4f47c8d23ed8f0', 'Đạt Huỳnh', 'dathuynhyl91@gmail.com', 'E9fZoxxVIAIU2V8.jpg', 'Bến Tre', 1),
(20, 'ngocmanh', '4297f44b13955235245b2497399d7a93', 'Ngoc Manh', 'manhpham170900@gmail.com', 'z2435467908573_a5c2ec55bb543b13ea2f630249977d19.jpg', 'thanh pho thu duc', 1),
(21, 'tieumem', 'c8837b23ff8aaa8a2dde915473ce0991', 'Ngoc Manh', 'manhpham170900@gmail.com', 'dalat4.jpg', 'thanh pho thu duc', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
