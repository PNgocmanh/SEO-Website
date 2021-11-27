-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 27, 2021 lúc 06:54 PM
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
-- Cơ sở dữ liệu: `mydb`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `product_ID` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`ID`, `user_ID`, `product_ID`, `so_luong`) VALUES
(3, 16, 4, 2),
(4, 16, 14, 1),
(5, 23, 9, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `product_ID` int(11) NOT NULL,
  `noi_dung` varchar(500) NOT NULL,
  `thoi_gian` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`ID`, `user_ID`, `product_ID`, `noi_dung`, `thoi_gian`) VALUES
(18, 1, 3, 'chào bạn tôi là admin', '2021-11-26 22:10:28'),
(20, 16, 2, 'xin chào tôi là Đạt', '2021-11-27 02:48:19'),
(23, 16, 3, 'sản phẩm chất lượng', '2021-11-27 17:13:37'),
(24, 16, 13, '10đ', '2021-11-27 17:13:46');

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
(10, 'Phạm Ngọc Mạnh', 'manhpham170900@gmail.com', 971667308, 'dong nai', 'Testing', 'hello admin');

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
(8, 'Góc Review Bang!', 'Review tất tần tật về Bang! phiên bản Việt hóa chính hãng đầ', 1, 'https://boardgame.vn/nv893/review-bang-phien-ban-viet-hoa', 'board game Bang.png'),
(9, 'Văn hóa Việt vào board game', 'Kể chuyện Việt Nam qua những bộ board game', 1, 'https://tuoitre.vn/ke-chuyen-viet-nam-qua-nhung-bo-board-game-20200213134928259.htm', 'game-hoi-pho-1581576217610607692535.jpg'),
(12, 'Game Vui Tết 2022', '', 1, 'https://boardgame.vn/nv892/12-board-game-choi-tet', 'board game choi Tết ma sói.jpg'),
(13, 'SPLENDOR', 'Top chiến thuật đỉnh cao không thể bỏ qua', 0, 'https://boardgame.vn/nv877/top-2-game-chien-thuat-dinh-cao-ma-ban-khong-the-bo-qua-splendor-gizmos', '1.jpg'),
(14, 'Werewolf', 'Hướng dẫn cách chơi ma sói', 1, 'https://hocvienboardgame.vn/huong-dan-board-game-soi-ultimate-chi-tiet-nhat/', 'soiultimate4-768x768.png'),
(15, 'Luật chơi UNO', NULL, 0, 'https://www.thegioididong.com/game-app/cach-choi-bai-uno-nhung-luat-choi-co-ban-1284714', 'a56c800514c7e279d063e033365b270f.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `ID` int(11) NOT NULL,
  `ten` varchar(50) NOT NULL,
  `gia` int(20) NOT NULL,
  `mo_ta` varchar(2000) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `anh` varchar(500) NOT NULL,
  `sale` int(11) NOT NULL,
  `age` text CHARACTER SET utf8 NOT NULL,
  `player` int(11) NOT NULL,
  `origin` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`ID`, `ten`, `gia`, `mo_ta`, `so_luong`, `anh`, `sale`, `age`, `player`, `origin`) VALUES
(1, 'Tam Quốc Sát', 1500000, 'Tam Quốc Sát được sáng tạo bởi tác giả Kayak và phát hành bởi hãng YOKA vào ngày 1 tháng 1 năm 2008. Trò chơi này nhanh chóng phát triển thêm 7 phiên bản mở rộng và bản Game Online là LTK Online và bản LTK Q dành cho trẻ em. Năm 2015, Tam Quốc Sát hay Huyền thoại Tam Quốc đã trở thành một hiện tượng Board Game và được độc giả bình chọn danh hiệu Board Game hay nhất năm.', 10, '1a-small.jpg', 10, '14+', 12, 'Trung Quốc'),
(2, 'Wingspans', 1490000, 'Trình làng đầu năm 2019 bởi 1Stonemaier Games, Wingspan được đánh giá là 1 sự pha trộn đầy nghệ thuật giữa cuốn hút, nhẹ nhàng song vẫn không kém phần gay cấn. Trong Wingspan, bạn sẽ đóng vai là những nhà nghiên cứu về các loài chim, tìm cách thu thập các thông tin, hình ảnh về các loài chim và nuôi dưỡng các chú chim này để giúp chúng sinh ra những quả trứng tuyệt đẹp.', 5, '2a.jpg', 0, '10+', 5, 'Mỹ'),
(3, 'Katamino', 990000, 'Katamino Family là sản phẩm mới nhất của dòng đồ chơi giải đố trí tuệ Katamino. Phiên bản này được phát triển các chế độ chơi dành cho 2 người. Để chiến thắng đối thủ, bạn phải cách xếp các mino* bằng gỗ dựa theo thẻ bài mô tả thử thách với các cấp độ khó tăng dần một cách nhanh nhất.', 2, '3a.jpg', 20, '3+', 4, 'Nhật Bản'),
(4, 'BANG!', 450000, 'Bài Bang! là một Board game lấy bối cảnh miền Viễn Tây, nơi luôn xảy ra các cuộc đấu súng nảy lửa, giữa một bên là những cảnh sát trưởng và một bên là các tên tội phạm. Với hệ thống gameplay thông minh và rõ ràng, nhiều nhân vật với vai trò và tính cách đa dạng; khi đã chơi 1 lần, bạn sẽ muốn chơi lại trò này thêm nhiều lần nữa.', 10, '4a.jpg', 0, '16+', 8, 'Việt Nam'),
(5, 'Root', 1200000, 'Root được xem như là bước tiếp theo của Leders Games từ sau Vast: The Crystal Caverns. Một tựa game thể loại phiêu lưu và chiến tranh tranh giành lãnh thổ của các chủng sinh vật sống trong rừng, trong đó những người chơi sẽ chiến đấu để giành quyền kiểm soát khu rừng rộng lớn.', 10, '5a-small.jpg', 0, '10+', 4, 'Mỹ'),
(6, 'Tang Garden', 890000, 'Đặt bối cảnh vào những năm Hoàng đế Huyền Tông trị vị, ông đã xây dựng khu vườn hoàng gia tráng lệ với những hồ nước trong vắt hùng vĩ tượng trưng cho sự tôn kính cho triều đại và nơi ông đang trị vì. Người chơi sẽ trở thành những nhà thiết kế vườn của Hoàng Gia và nhiệm vụ của họ là xây dựng những khu vườn bậc nhất thế gian bằng việc cân bằng các yếu tố tự nhiên.', 15, '6a.jpg', 0, '14+', 4, 'Trung Quốc'),
(7, 'Avalon', 190000, 'Avalon lấy bối cảnh thời trung cổ của Vương Quốc Anh, dưới sự trị vị của vua Arthur, trong gia đình tồn tại hai thế lực đối lập. Người chơi sẽ vào vai những thuộc hạ trung thành của vua Arthur, bảo vệ ngai vàng hoặc trở thành tay sai của kẻ phản bội Morded đang âm mưu lật đổ ngôi vua.', 10, '7a.jpg', 0, '14+', 4, 'Mỹ'),
(8, 'Werewolves', 490000, 'Ngày xưa, tại một ngôi làng cổ, nơi mà cuộc sống của con người vô cùng bình yên và hạnh phúc, bống nhiên một ngày nọ, một lời đồn đại về những con sói đội lốt người và trong làng có rất nhiều người bị mất tích bí ẩn sau mỗi đêm xuất hiện. Từ đó, người dân trong làng trở nên vô cùng lo lắng, khiếp sợ, họ bắt đầu nghi ngờ lẫn nhau và gây nên sự hỗn độn. Do đó, người dân trong làng phải tập hợp lại và tìm ra ai là loài sói đội lốt người?', 3, '8a.jpg', 0, '8+', 8, 'Việt Nam'),
(9, 'UNO', 99000, 'UNO là một trong những trò chơi bài đã quá nổi tiếng và quen thuộc trên thế giới cũng như Việt Nam, vừa dễ học lại vừa có thể chơi hàng giờ liên tục.', 3, '9a.jpg', 0, '8+', 4, 'Việt Nam'),
(10, 'Splendor', 690000, 'Trong Splendor, người chơi vào vai các thương nhân trung cổ với nhiệm vụ mua bán đá quý và mài dũa nó trở thành những trang sức đắt tiền. Splendor là một game thể loại card drafting và engine building không có cốt truyện, chơi trong vòng 30 phút dành cho 2 – 4 người. Liên tưởng tới 7 Wonders nhưng với tất cả lá bài của 3 thời kỳ đều lật ngửa để mọi người đều có thể mua.', 5, '10a-small.jpg', 0, '10+', 4, 'Mỹ'),
(11, 'Monopoly', 199000, 'Monopoly có nguồn gốc từ The Landlord\'s Game do Lizzie Magnesi ở Hoa Kỳ tạo ra vào năm 1903 như một cách để chứng minh rằng một nền kinh tế thưởng cho việc tạo ra của cải tốt hơn một nền kinh tế mà những người nắm độc quyền làm việc dưới một vài ràng buộc, và để quảng bá các lý thuyết kinh tế của Henry George - đặc biệt là các ý tưởng của ông về thuế.', 6, '11a-small.jpg', 5, '8+', 4, 'Việt Nam'),
(12, 'Coup', 380000, 'Coup lấy bối cảnh là một vương triều suy sụp, nơi tất cả mọi người vươn lên giành lấy quyền lực. Không ai là bạn, khắp nơi chỉ có kẻ thù. Bạn sẽ làm gì để sống sót? Bạn có những đồng minh nhưng những kẻ khác cũng vậy. Ai sẽ là người chiến thắng trò chơi quyền lực, đồng thời là kẻ sống sót cuối cùng.', 2, '12b-small.jpg', 0, '10+', 4, 'Mỹ');

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
  `anh` varchar(500) NOT NULL,
  `lien_he` varchar(500) NOT NULL,
  `quyen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`ID`, `username`, `password`, `ho_ten`, `email`, `anh`, `lien_he`, `quyen`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin', 'admin@gmail.com', 'default-avatar-profile-icon-vector-social-media-user-portrait-176256935.jpg', 'Việt Nam', 0),
(3, 'dathuynh', '4c45a38dfd23d60c2b4f47c8d23ed8f0', 'Đạt 12345', 'dathuynhyl91@gmail.com', '737317.jpg', 'Việt Nam 123', 1),
(6, 'dat1234', '4c45a38dfd23d60c2b4f47c8d23ed8f0', 'Đạt ABC', 'dat01685170741@gmail.com', 'default-avatar-profile-icon-vector-social-media-user-portrait-176256935.jpg', 'TP. Hồ Chí Minh', 1),
(7, 'abcabc', 'e10adc3949ba59abbe56e057f20f883e', 'aaaaaa', 'dat1234@gmail.com', 'default-avatar-profile-icon-vector-social-media-user-portrait-176256935.jpg', 'Vũng Tàu', 1),
(16, 'dathuynhyl91', '4c45a38dfd23d60c2b4f47c8d23ed8f0', 'Đạt Huỳnh', 'dathuynhyl91@gmail.com', 'E9fZoxxVIAIU2V8.jpg', 'Bến Tre', 1),
(17, 'dat01685170741', '4c45a38dfd23d60c2b4f47c8d23ed8f0', 'Đạt Huỳnh', 'dathuynhyl91@gmail.com', '104567.jpg', 'Mỏ Cày Nam', 1),
(20, 'databc', '4c45a38dfd23d60c2b4f47c8d23ed8f0', 'Đạt', 'dathuynhyl91@gmail.com', 'default-avatar-profile-icon-vector-social-media-user-portrait-176256935.jpg', 'ABC', 1),
(21, 'dat123', '4c45a38dfd23d60c2b4f47c8d23ed8f0', 'Đạt', 'dathuynhyl91@gmail.com', 'default-avatar-profile-icon-vector-social-media-user-portrait-176256935.jpg', 'ABC', 1),
(23, 'ngocmanh', '4297f44b13955235245b2497399d7a93', 'Ngoc Manh', 'manhpham170900@gmail.com', 'z2435467908573_a5c2ec55bb543b13ea2f630249977d19.jpg', 'thanh pho thu duc', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
