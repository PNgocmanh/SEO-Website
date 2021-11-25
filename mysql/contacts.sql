-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 25, 2021 lúc 03:58 PM
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
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(40) CHARACTER SET utf8 NOT NULL,
  `email` varchar(40) CHARACTER SET utf8 NOT NULL,
  `sdt` int(11) NOT NULL,
  `diachi` varchar(100) CHARACTER SET utf8 NOT NULL,
  `chude` varchar(100) CHARACTER SET utf8 NOT NULL,
  `noidung` varchar(500) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `sdt`, `diachi`, `chude`, `noidung`) VALUES
(1, 'Phạm Ngọc Mạnh', 'manhpham170900@gmail.com', 971667308, 'dong nai', 'Cảm ơn', 'Cảm ơn đã ủng hộ'),
(4, 'Mạnh', 'manhpham170900@gmail.com', 971667308, 'dong nai', 'Cảm ơn', 'sdjhgfd'),
(6, 'sinhvien', 'manh.pham1709@hcmut.edu.com', 971667308, 'Dong Nai', 'Test', 'qeirweofhwhfidhfafdsfsvscmvnmcnvmz,nv,zxmnv,.zvnjhfieohrowierhfjkfjdnbfdnfbdsanmfbsmdfbdmsnbfnjfkjaffsdmnfbdnsmdkjhgjdhgk'),
(7, 'sinhvien', 'manh.pham1709@hcmut.edu.com', 971667308, 'Dong Nai', 'Test', 'qeirweofhwhfidhfafdsfsvscmvnmcnvmz,nv,zxmnv,.zvnjhfieohrowierhfjkfjdnbfdnfbdsanmfbsmdfbdmsnbfnjfkjaffsdmnfbdnsmdkjhgjdhgkqeirweofhwhfidhfafdsfsvscmvnmcnvmz,nv,zxmnv,.zvnjhfieohrowierhfjkfjdnbfdnfbdsanmfbsmdfbdmsnbfnjfkjaffsdmnfbdnsmdkjhgjdhgk'),
(8, 'Phạm Ngọc Mạnh', 'manhpham170900@gmail.com', 971667308, 'dong nai', 'Cảm ơn', 'ahhgw'),
(9, 'Phạm Ngọc Mạnh', 'manhpham170900@gmail.com', 971667308, 'dong nai', 'qưt', 'fdsg1g');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
