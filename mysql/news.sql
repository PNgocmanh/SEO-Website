-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 24, 2021 lúc 07:08 PM
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
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `description` varchar(60) CHARACTER SET utf8 DEFAULT NULL,
  `status` int(11) NOT NULL,
  `source` varchar(100) CHARACTER SET utf8 NOT NULL,
  `image` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `name`, `description`, `status`, `source`, `image`) VALUES
(1, '8 Financial Tips', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco l', 1, 'work-single.php', 'our-work-06.jpg'),
(2, 'Applications', 'Excepteur sint occaecat cupidatat non proident, sunt in culp', 1, 'work-single.php', 'our-work-04.jpg'),
(3, 'Corporate Branding', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, se', 1, 'work-single.php', 'our-work-02.jpg'),
(4, 'Digital Marketing', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, se', 1, 'work-single.php', 'our-work-01.jpg'),
(5, 'Leading Digital Solution', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, se', 1, 'work-single.php', 'our-work-03.jpg'),
(6, 'orporate Stationary', 'Excepteur sint occaecat cupidatat non proident, sunt in culp', 1, 'work-single.php', 'our-work-05.jpg'),
(7, 'Smart Applications', 'Excepteur sint occaecat cupidatat non proident, sunt in culp', 1, 'work-single.php', 'our-work-04.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
