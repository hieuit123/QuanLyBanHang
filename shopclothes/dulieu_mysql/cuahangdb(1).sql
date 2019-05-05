-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 05, 2019 lúc 10:14 AM
-- Phiên bản máy phục vụ: 10.1.37-MariaDB
-- Phiên bản PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `cuahangdb`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `MA_DON_CT` int(11) NOT NULL,
  `MA_DON` int(11) NOT NULL,
  `MA_SAN_PHAM` int(11) NOT NULL,
  `SO_LUONG` int(11) NOT NULL,
  `TONG_TIEN` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`MA_DON_CT`, `MA_DON`, `MA_SAN_PHAM`, `SO_LUONG`, `TONG_TIEN`) VALUES
(1, 33, 13, 1, 6000000),
(2, 33, 12, 1, 9000000),
(3, 33, 14, 3, 4000000),
(4, 34, 2, 1, 1000000),
(5, 35, 2, 1, 1000000),
(6, 36, 2, 1, 1000000),
(7, 37, 11, 1, 2320000),
(8, 38, 40, 3, 600000),
(9, 38, 39, 2, 4000000),
(10, 38, 4, 2, 1000000),
(11, 39, 42, 3, 1569000),
(12, 39, 43, 6, 12000000),
(13, 39, 41, 4, 21380000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `MA_DON` int(11) NOT NULL,
  `MA_KHACH_HANG` int(13) NOT NULL,
  `THOI_GIAN` date NOT NULL,
  `TRANG_THAI` varchar(25) NOT NULL,
  `DIA_CHI` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`MA_DON`, `MA_KHACH_HANG`, `THOI_GIAN`, `TRANG_THAI`, `DIA_CHI`) VALUES
(33, 2, '2019-03-27', 'Đã xử lý', ''),
(34, 1, '2019-04-08', 'Đang xử lí', ''),
(35, 1, '2019-04-08', 'Đang xử lí', ''),
(36, 1, '2019-04-08', 'Đã xử lý', ''),
(37, 1, '2019-04-22', 'Đã xử lý', ''),
(38, 9, '2019-05-05', 'Đang xử lí', ''),
(39, 9, '2019-05-05', 'Đang xử lí', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `ID` int(13) NOT NULL,
  `TEN_DANG_NHAP` varchar(22) NOT NULL,
  `MAT_KHAU` varchar(18) NOT NULL,
  `HO_TEN` varchar(30) NOT NULL,
  `SDT` varchar(10) NOT NULL,
  `TRANG_THAI` varchar(20) NOT NULL,
  `DIA_CHI` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`ID`, `TEN_DANG_NHAP`, `MAT_KHAU`, `HO_TEN`, `SDT`, `TRANG_THAI`, `DIA_CHI`) VALUES
(1, 'tranminhhieu', 'hieu123', 'Trần Minh Hiếu', '0328729739', 'online', 'Phú Yên'),
(2, 'tranquocbao', 'bao123', 'Trần Quốc Bảo', '0328729739', 'online', 'TP.HCM'),
(3, 'nguyendinhsang', 'sang123', 'Nguyễn Đình Sang', '0328729739', 'offline', 'Phú Yên'),
(5, 'admin', 'admin', 'Trần Minh Hiếu', '0328729739', 'offline', 'Phú Yên'),
(9, 'tranthuyan', 'an123', 'Trần Thị Thúy An', '0328729739', 'online', 'Phú Yên'),
(11, 'hieumtp', '123456', 'Trần Minh Hiếu', '0328729739', 'offline', 'Phú Yên');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `MA_LOAI` varchar(15) NOT NULL,
  `TEN_LOAI` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `loaisanpham`
--

INSERT INTO `loaisanpham` (`MA_LOAI`, `TEN_LOAI`) VALUES
('ao', 'Áo'),
('aokhoac', 'Áo Khoác'),
('daynit', 'Dây nịt'),
('dongho', 'Đồng Hồ'),
('giay', 'Giày'),
('non', 'Nón'),
('quan', 'Quần');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phanquyen`
--

CREATE TABLE `phanquyen` (
  `MA_KHACH_HANG` int(11) NOT NULL,
  `QUYEN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `phanquyen`
--

INSERT INTO `phanquyen` (`MA_KHACH_HANG`, `QUYEN`) VALUES
(1, 0),
(2, 1),
(3, 1),
(5, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `MA` int(11) NOT NULL,
  `TEN_SANPHAM` varchar(50) NOT NULL,
  `THUONGHIEU` varchar(40) NOT NULL,
  `GIA` int(11) NOT NULL,
  `GIA_CU` int(11) NOT NULL,
  `MA_LOAI` varchar(15) NOT NULL,
  `ANH` text NOT NULL,
  `ANH_CHI_TIET` text NOT NULL,
  `SO_LUONG` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`MA`, `TEN_SANPHAM`, `THUONGHIEU`, `GIA`, `GIA_CU`, `MA_LOAI`, `ANH`, `ANH_CHI_TIET`, `SO_LUONG`) VALUES
(2, 'Áo thun Adidas mát mẻ', 'Adidas', 1000000, 1200000, 'ao', 'image/ao/ao2.jpg', 'image/ao/ao2-ct.jpg', 4),
(3, 'Áo thun sọc caro đơn giản', 'Adidas', 500000, 700000, 'ao', 'image/ao/ao3.jpg', 'image/ao/ao3-ct.jpg', 11),
(4, 'Quần Jean KaiO (Bạc)', 'OEM', 500000, 600000, 'quan', 'image/quan/quan1.jpg', 'image/quan/quan1.jpg', 4),
(5, 'Sơ mi trắng sọc đen', 'ODIN', 1230000, 1099000, 'ao', 'image/ao/ao4.jpg', 'image/ao/ao4-ct.jpg', 63),
(6, 'Sơ mi 3 sọc trẻ trung', 'Document', 200000, 230000, 'ao', 'image/ao/ao5.jpg', 'image/ao/ao5-ct.jpg', 44),
(7, 'Áo thun co dãn n chiều', 'Sang Đình', 900000, 1000000, 'ao', 'image/ao/ao6.jpg', 'image/ao/ao6-ct.jpg', 34),
(8, 'Áo thun Spiderman', 'Mavel', 1000000, 4000000, 'ao', 'image/ao/ao7.jpg', 'image/ao/ao7-ct.jpg', 44),
(9, 'Áo thun 3 ông sao', 'Chị Hằng', 2300000, 2500000, 'ao', 'image/ao/ao8.jpg', 'image/ao/ao8-ct.jpg', 43),
(10, 'Áo thun Nike thể thao', 'Nike', 2000000, 3000000, 'ao', 'image/ao/ao9.jpg', 'image/ao/ao9-ct.jpg', 54),
(11, 'Áo thun thể thao Adidas (Xanh)', 'Adidas', 2320000, 2500000, 'ao', 'image/ao/ao10.jpg', 'image/ao/ao10-ct.jpg', 87),
(12, 'Áo thun Iron Man', 'Mavel', 9000000, 10000000, 'ao', 'image/ao/ao11.jpg', 'image/ao/ao11-ct.jpg', 122),
(14, 'Quần thun đẹp', 'Nike', 4000000, 5000000, 'quan', 'image/ao/ao12.jpg', 'image/quan/quan2-ct.jpg', 29),
(26, 'Áo thun thể thao', 'Adidas', 200000, 400000, 'ao', 'image/ao/ao13.jpg', 'image/ao/ao13-ct.jpg', 23),
(31, 'Áo thun mùa hè', 'Nike', 200000, 400000, 'ao', 'image/ao/anh31.jpg', 'image/ao/anhchitiet31.jpg', 20),
(32, 'TTTA', 'TMH', 100000000, 100200000, 'ao', 'image/ao/anh32.jpg', 'image/ao/anhchitiet32.jpg', 100),
(38, 'Thúy An', 'MH', 100000000, 100200000, 'ao', 'image/ao/anh38.jpg', 'image/ao/anhchitiet38.jpg', 21),
(39, 'Váy thun đẹp', 'Gucci', 2000000, 2500000, 'quan', 'image/quan/quan6.jpg', 'image/quan/quan6-ct.jpg', 33),
(40, 'Nón snapback hai sừng', 'Buffterfly', 200000, 250000, 'non', 'image/non/non1.jpg', 'image/non/non1-ct.jpg', 23),
(41, 'Casio F273 chống sốc chống nước chất liệu hợp kim', 'Casio', 5345000, 6000000, 'dongho', 'image/dongho/dongho7.jpg', 'image/dongho/dongho7-ct.jpg', 10),
(42, 'Áo khoác dù bomber mát mẻ', 'Bomber', 523000, 600000, 'aokhoac', 'image/aokhoac/aokhoac11.jpg', 'image/aokhoac/aokhoac11-ct.jpg', 6),
(43, 'Giày boot cổ cao Vans ', 'Vans', 2000000, 2100000, 'giay', 'image/giay/giay6.jpg', 'image/giay/giay6-ct.jpg', 12);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`MA_DON_CT`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`MA_DON`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`MA_LOAI`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MA`),
  ADD KEY `MA_LOAI` (`MA_LOAI`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `MA_DON_CT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `MA_DON` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `ID` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`MA_LOAI`) REFERENCES `loaisanpham` (`MA_LOAI`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
