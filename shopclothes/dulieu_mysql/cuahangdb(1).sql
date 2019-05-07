-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 07, 2019 lúc 04:54 PM
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
(34, 1, '2019-04-08', 'Đã xử lý', ''),
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
(2, 'Áo thun Adidas mát mẻ', 'Adidas', 1000000, 1200000, 'ao', 'image/ao/ao2.jpg', 'image/ao/ao2-ct.jpg', 3),
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
(26, 'Áo thun thể thao', 'Adidas', 200000, 400000, 'ao', 'image/ao/ao13.jpg', 'image/ao/ao13-ct.jpg', 23),
(39, 'Váy thun đẹp', 'Gucci', 2000000, 2500000, 'quan', 'image/quan/quan6.jpg', 'image/quan/quan6-ct.jpg', 33),
(40, 'Nón snapback hai sừng', 'Buffterfly', 200000, 250000, 'non', 'image/non/non1.jpg', 'image/non/non1-ct.jpg', 23),
(41, 'Casio F273 chống sốc chống nước chất liệu hợp kim', 'Casio', 5345000, 6000000, 'dongho', 'image/dongho/dongho7.jpg', 'image/dongho/dongho7-ct.jpg', 10),
(42, 'Áo khoác dù bomber mát mẻ', 'Bomber', 523000, 600000, 'aokhoac', 'image/aokhoac/aokhoac11.jpg', 'image/aokhoac/aokhoac11-ct.jpg', 6),
(43, 'Giày boot cổ cao Vans ', 'Vans', 2000000, 2100000, 'giay', 'image/giay/giay6.jpg', 'image/giay/giay6-ct.jpg', 12),
(44, 'Áo thun đỏ mát mẻ', 'Nike', 1000000, 1500000, 'ao', 'image/ao/ao0.jpg', 'image/ao/ao0-ct.jpg', 30),
(45, 'Áo thun trắng', 'Guici', 15000000, 20000000, 'ao', 'image/ao/ao1.jpg', 'image/ao/ao1-ct.jpg', 30),
(46, 'Áo thun trắng thời trang', 'Dior', 1500000, 1700000, 'ao', 'image/ao/ao2.jpg', 'image/ao/ao2-ct.jpg', 30),
(47, 'Áo thun đen sành điệu', 'Versace', 1800000, 2000000, 'ao', 'image/ao/ao3.jpg', 'image/ao/ao3-ct.jpg', 30),
(48, 'Áo thun đen trơn', 'Adidas', 3000000, 4000000, 'ao', 'image/ao/ao4.jpg', 'image/ao/ao4-ct.jpg', 30),
(49, 'Áo thun đỏ trơn', 'Adidas', 1000000, 1500000, 'ao', 'image/ao/ao5.jpg', 'image/ao/ao5-ct.jpg', 30),
(50, 'Áo thun vàng trẻ trung', 'Nike', 1000000, 1500000, 'ao', 'image/ao/ao6.jpg', 'image/ao/ao6-ct.jpg', 30),
(51, 'Áo thun xanh mát mẻ', 'Nike', 1000000, 1500000, 'ao', 'image/ao/ao7.jpg', 'image/ao/ao7-ct.jpg', 30),
(52, 'Áo thun đen thời trang', 'Guici', 2000000, 2500000, 'ao', 'image/ao/ao8.jpg', 'image/ao/ao8-ct.jpg', 30),
(53, 'Áo thun xám thời thượng', 'Nike', 3000000, 3500000, 'ao', 'image/ao/ao9.jpg', 'image/ao/ao9-ct.jpg', 30),
(54, 'Áo thun trắng trẻ trung', 'Dior', 4000000, 4500000, 'ao', 'image/ao/ao10.jpg', 'image/ao/ao10-ct.jpg', 30),
(55, 'Áo thun trắng trơn', 'Nike', 1500000, 2500000, 'ao', 'image/ao/ao11.jpg', 'image/ao/ao11-ct.jpg', 30),
(56, 'Áo sơ mi xám', 'Adidas', 2000000, 2500000, 'ao', 'image/ao/ao12.jpg', 'image/ao/ao12-ct.jpg', 30),
(57, 'Áo sơ mi đen', 'Nike', 3000000, 3500000, 'ao', 'image/ao/ao13.jpg', 'image/ao/ao13-ct.jpg', 30),
(58, 'Áo sơ mi trắng', 'Dior', 4000000, 4500000, 'ao', 'image/ao/ao14.jpg', 'image/ao/ao14-ct.jpg', 30),
(59, 'Áo sơ mi trắng thời trang', 'Guici', 3000000, 3500000, 'ao', 'image/ao/ao15.jpg', 'image/ao/ao15-ct.jpg', 30),
(60, 'Áo sơ mi trắng sành điệu', 'Nike', 3000000, 3500000, 'ao', 'image/ao/ao16.jpg', 'image/ao/ao16-ct.jpg', 30),
(61, 'Áo sơ mi xám thời trang', 'Alibaba', 4000000, 4500000, 'ao', 'image/ao/ao17.jpg', 'image/ao/ao17-ct.jpg', 30),
(62, 'Áo sơ mi caro xanh', 'Nike', 3000000, 3500000, 'ao', 'image/ao/ao18.jpg', 'image/ao/ao18-ct.jpg', 30),
(63, 'Áo sơ mi caro đỏ', 'Alibaba', 3000000, 3500000, 'ao', 'image/ao/ao19.jpg', 'image/ao/ao19-ct.jpg', 30),
(64, 'Áo sơ mi caro hồng', 'Guici', 4000000, 4500000, 'ao', 'image/ao/ao20.jpg', 'image/ao/ao20-ct.jpg', 30),
(65, 'Áo khoác đen thời trang', 'Nike', 3000000, 3500000, 'aokhoac', 'image/aokhoac/aokhoac0.jpg', 'image/aokhoac/aokhoac0-ct.jpg', 30),
(66, 'Áo khoác đen trẻ trung', 'Bitis-Hunter', 4000000, 4500000, 'aokhoac', 'image/aokhoac/aokhoac1.jpg', 'image/aokhoac/aokhoac1-ct.jpg', 30),
(67, 'Áo khoác xanh thời trang', 'Adidas', 3000000, 3500000, 'aokhoac', 'image/aokhoac/aokhoac2.jpg', 'image/aokhoac/aokhoac2-ct.jpg', 30),
(68, 'Áo khoác đen sành điệu', 'Alibaba', 4000000, 4500000, 'aokhoac', 'image/aokhoac/aokhoac3.jpg', 'image/aokhoac/aokhoac3-ct.jpg', 30),
(69, 'Áo khoác xám thời trang', 'Nike', 3000000, 3500000, 'aokhoac', 'image/aokhoac/aokhoac4.jpg', 'image/aokhoac/aokhoac4-ct.jpg', 30),
(70, 'Áo khoác vàng trẻ trung', 'Dior', 3000000, 3500000, 'aokhoac', 'image/aokhoac/aokhoac5.jpg', 'image/aokhoac/aokhoac5-ct.jpg', 30),
(71, 'Áo khoác hồng năng động', 'Guici', 5000000, 5500000, 'aokhoac', 'image/aokhoac/aokhoac6.jpg', 'image/aokhoac/aokhoac6-ct.jpg', 30),
(72, 'Áo khoác xanh mát mẻ', 'Nike', 3000000, 3500000, 'aokhoac', 'image/aokhoac/aokhoac7.jpg', 'image/aokhoac/aokhoac7-ct.jpg', 30),
(73, 'Áo khoác hồng sành điệu', 'Alibaba', 4000000, 4500000, 'aokhoac', 'image/aokhoac/aokhoac8.jpg', 'image/aokhoac/aokhoac8-ct.jpg', 30),
(74, 'Áo khoác đỏ quyến rũ', 'Nike', 9000000, 9500000, 'aokhoac', 'image/aokhoac/aokhoac9.jpg', 'image/aokhoac/aokhoac9-ct.jpg', 30),
(75, 'Áo khoác cam trẻ trung', 'Nike', 6000000, 6500000, 'aokhoac', 'image/aokhoac/aokhoac10.jpg', 'image/aokhoac/aokhoac10-ct.jpg', 30),
(76, 'Áo khoác xanh rêu', 'Dior', 8000000, 9500000, 'aokhoac', 'image/aokhoac/aokhoac11.jpg', 'image/aokhoac/aokhoac11-ct.jpg', 30),
(77, 'Áo khoác hồng tươi mới', 'Alibaba', 5000000, 5500000, 'aokhoac', 'image/aokhoac/aokhoac12.jpg', 'image/aokhoac/aokhoac12-ct.jpg', 30),
(78, 'Áo khoác đen sành điệu', 'Nike', 3000000, 3500000, 'aokhoac', 'image/aokhoac/aokhoac13.jpg', 'image/aokhoac/aokhoac13-ct.jpg', 30),
(79, 'Áo khoác trắng thời thượng', 'Guici', 5000000, 5500000, 'aokhoac', 'image/aokhoac/aokhoac14.jpg', 'image/aokhoac/aokhoac14-ct.jpg', 30),
(80, 'Áo khoác đen mới mẻ', 'Lala', 3000000, 3500000, 'aokhoac', 'image/aokhoac/aokhoac15.jpg', 'image/aokhoac/aokhoac15-ct.jpg', 30),
(81, 'Áo khoác đen sành điệu', 'Yame', 6000000, 6500000, 'aokhoac', 'image/aokhoac/aokhoac16.jpg', 'image/aokhoac/aokhoac16-ct.jpg', 30),
(82, 'Áo khoác xanh tươi mới', 'Dior', 8000000, 8500000, 'aokhoac', 'image/aokhoac/aokhoac17.jpg', 'image/aokhoac/aokhoac17-ct.jpg', 30),
(83, 'Quần short đen', 'Nike', 3000000, 3500000, 'quan', 'image/quan/quan0.jpg', 'image/quan/quan0-ct.jpg', 30),
(84, 'Đầm hồng thời trang', 'Dior', 4000000, 4500000, 'quan', 'image/quan/quan1.jpg', 'image/quan/quan1-ct.jpg', 30),
(85, 'Đầm vàng năng động', 'Alibaba', 5000000, 5500000, 'quan', 'image/quan/quan2.jpg', 'image/quan/quan2-ct.jpg', 30),
(86, 'Đầm trắng trang nhã', 'Yame', 6000000, 6500000, 'quan', 'image/quan/quan3.jpg', 'image/quan/quan3-ct.jpg', 30),
(87, 'Đầm đen kỳ bí', 'Yame', 7000000, 7500000, 'quan', 'image/quan/quan4.jpg', 'image/quan/quan4-ct.jpg', 30),
(88, 'Đầm đen trẻ trung', 'Dior', 6000000, 6500000, 'quan', 'image/quan/quan5.jpg', 'image/quan/quan5-ct.jpg', 30),
(89, 'Đầm caro đen', 'Lala', 7000000, 7500000, 'quan', 'image/quan/quan6.jpg', 'image/quan/quan6-ct.jpg', 30),
(90, 'Đầm caro trắng', 'Lala', 4000000, 4500000, 'quan', 'image/quan/quan7.jpg', 'image/quan/quan7-ct.jpg', 30),
(91, 'Đầm suông hồng', 'Yame', 6000000, 6500000, 'quan', 'image/quan/quan8.jpg', 'image/quan/quan8-ct.jpg', 30),
(92, 'Đầm suông trắng', 'Yame', 5000000, 5500000, 'quan', 'image/quan/quan9.jpg', 'image/quan/quan9-ct.jpg', 30),
(93, 'Quần rin short nam', 'Dior', 6000000, 6500000, 'quan', 'image/quan/quan10.jpg', 'image/quan/quan10-ct.jpg', 30),
(94, 'Quần short nam thời trang', 'Yame', 3000000, 3500000, 'quan', 'image/quan/quan11.jpg', 'image/quan/quan11-ct.jpg', 30),
(95, 'Quần short Kaki nam', 'Yame', 6000000, 6500000, 'quan', 'image/quan/quan12.jpg', 'image/quan/quan12-ct.jpg', 30),
(96, 'Quần short nam xanh', 'Yame', 5000000, 5500000, 'quan', 'image/quan/quan13.jpg', 'image/quan/quan13-ct.jpg', 30),
(97, 'Quần short nam xám', 'Alibaba', 7000000, 7500000, 'quan', 'image/quan/quan14.jpg', 'image/quan/quan14-ct.jpg', 30),
(98, 'Quần short nam đen', 'Nike', 2000000, 3500000, 'quan', 'image/quan/quan15.jpg', 'image/quan/quan15-ct.jpg', 30),
(99, 'Quần short nam sành điệu', 'Lala', 6000000, 6500000, 'quan', 'image/quan/quan16.jpg', 'image/quan/quan16-ct.jpg', 30),
(100, 'Quần short nam tươi mới', 'Adidas', 5000000, 6500000, 'quan', 'image/quan/quan17.jpg', 'image/quan/quan17-ct.jpg', 30),
(101, 'Nón bucket hồng năng động', 'Dior', 2000000, 2500000, 'non', 'image/non/non0.jpg', 'image/non/non0-ct.jpg', 30),
(102, 'Nón bucket đen vàng', 'Dior', 3000000, 3500000, 'non', 'image/non/non1.jpg', 'image/non/non1-ct.jpg', 30),
(103, 'Nón Supreme đen huyền bí', 'Supreme', 2000000, 2500000, 'non', 'image/non/non2.jpg', 'image/non/non2-ct.jpg', 30),
(104, 'Nón Supreme đen vĩnh cữu', 'Supreme', 1000000, 1500000, 'non', 'image/non/non3.jpg', 'image/non/non3-ct.jpg', 30),
(105, 'Nón Supreme vàng tươi tắn', 'Supreme', 2000000, 2500000, 'non', 'image/non/non4.jpg', 'image/non/non4-ct.jpg', 30),
(106, 'Nón Yame đen huyền bí', 'Yame', 2000000, 2500000, 'non', 'image/non/non5.jpg', 'image/non/non5-ct.jpg', 30),
(107, 'Nón Yame đỏ trẻ trung', 'Yame', 3000000, 3500000, 'non', 'image/non/non6.jpg', 'image/non/non6-ct.jpg', 30),
(108, 'Nón Rasengan tím mộng mơ', 'Rasengan', 4000000, 4500000, 'non', 'image/non/non7.jpg', 'image/non/non7-ct.jpg', 30),
(109, 'Nón Rasengan đen vĩnh cữu', 'Rasengan', 4000000, 4500000, 'non', 'image/non/non8.jpg', 'image/non/non8-ct.jpg', 30),
(110, 'Nón Rasengan đỏ trẻ trung', 'Rasengan', 5000000, 5500000, 'non', 'image/non/non9.jpg', 'image/non/non9-ct.jpg', 30),
(111, 'Nón Rasengan vàng tươi tắn', 'Rasengan', 4000000, 4500000, 'non', 'image/non/non10.jpg', 'image/non/non10-ct.jpg', 30),
(112, 'Nón Rasengan hồng sành điệu', 'Rasengan', 4000000, 4500000, 'non', 'image/non/non11.jpg', 'image/non/non11-ct.jpg', 30),
(113, 'Nón Rinnegan tím mộng mơ', 'Rinnegan', 4000000, 4500000, 'non', 'image/non/non12.jpg', 'image/non/non12-ct.jpg', 30),
(114, 'Nón Rinnegan vàng tươi tắn', 'Rinnegan', 5000000, 5500000, 'non', 'image/non/non13.jpg', 'image/non/non13-ct.jpg', 30),
(115, 'Nón Rinnegan đen huyền bí', 'Rinnegan', 4000000, 4500000, 'non', 'image/non/non14.jpg', 'image/non/non14-ct.jpg', 30),
(116, 'Nón Just Never Mind vàng', 'Sharingan', 3000000, 3500000, 'non', 'image/non/non15.jpg', 'image/non/non15-ct.jpg', 30),
(117, 'Nón Just Never Minh đen', 'Sharingan', 2500000, 3000000, 'non', 'image/non/non16.jpg', 'image/non/non16-ct.jpg', 30),
(118, 'Nón PeaceOnlyOne trắng thanh nhã', 'Byakugan', 3000000, 3500000, 'non', 'image/non/non17.jpg', 'image/non/non17-ct.jpg', 30),
(119, 'Giày vải nâu cá tính', 'Converse', 5000000, 5500000, 'giay', 'image/giay/giay0.jpg', 'image/giay/giay0-ct.jpg', 30),
(120, 'Giày thể thao trắng tinh khôi', 'Nike', 6000000, 6500000, 'giay', 'image/giay/giay1.jpg', 'image/giay/giay1-ct.jpg', 30),
(121, 'Giày thể thao trắng xanh', 'Nike', 5000000, 5500000, 'giay', 'image/giay/giay2.jpg', 'image/giay/giay2-ct.jpg', 30),
(122, 'Giày vải nâu cổ cao', 'Converse', 7000000, 7500000, 'giay', 'image/giay/giay3.jpg', 'image/giay/giay3-ct.jpg', 30),
(123, 'Giày vải đen huyền bí', 'Converse', 5000000, 5500000, 'giay', 'image/giay/giay4.jpg', 'image/giay/giay4-ct.jpg', 30),
(124, 'Giày thể thao đen vĩnh cữu', 'Nike', 6000000, 6500000, 'giay', 'image/giay/giay5.jpg', 'image/giay/giay5-ct.jpg', 30),
(125, 'Giày vải đen cổ cao', 'Converse', 5000000, 5500000, 'giay', 'image/giay/giay6.jpg', 'image/giay/giay6-ct.jpg', 30),
(126, 'Giày vải nâu sành điệu', 'Converse', 7000000, 7500000, 'giay', 'image/giay/giay7.jpg', 'image/giay/giay7-ct.jpg', 30),
(127, 'Giày thể thao xám năng động', 'Nike', 9000000, 9500000, 'giay', 'image/giay/giay8.jpg', 'image/giay/giay8-ct.jpg', 30),
(128, 'Giày thể thao đen huyền bí', 'Nike', 9000000, 10500000, 'giay', 'image/giay/giay9.jpg', 'image/giay/giay9-ct.jpg', 30),
(129, 'Giày thể thao xanh năng động', 'Nike', 10000000, 10500000, 'giay', 'image/giay/giay10.jpg', 'image/giay/giay10-ct.jpg', 30),
(130, 'Giày Realize đen huyền bí', 'Realize', 6000000, 6500000, 'giay', 'image/giay/giay11.jpg', 'image/giay/giay11-ct.jpg', 30),
(131, 'Giày Realize đen vĩnh cữu', 'Realize', 6000000, 6500000, 'giay', 'image/giay/giay12.jpg', 'image/giay/giay12-ct.jpg', 30),
(132, 'Giày Realize xanh tươi mới', 'Realize', 7000000, 7500000, 'giay', 'image/giay/giay13.jpg', 'image/giay/giay13-ct.jpg', 30),
(133, 'Giày thể thao trắng tinh khôi', 'Bitis-Hunter', 8000000, 8500000, 'giay', 'image/giay/giay14.jpg', 'image/giay/giay14-ct.jpg', 30),
(134, 'Giày thể thao đen huyền bí', 'Bitis-Hunter', 7000000, 7500000, 'giay', 'image/giay/giay15.jpg', 'image/giay/giay15-ct.jpg', 30),
(135, 'Giày thể thao đỏ trẻ trung', 'Bitis-Hunter', 7000000, 7500000, 'giay', 'image/giay/giay16.jpg', 'image/giay/giay16-ct.jpg', 30),
(136, 'Giày Converse thể thao', 'Converse', 5000000, 5500000, 'giay', 'image/giay/giay17.jpg', 'image/giay/giay17-ct.jpg', 30),
(137, 'Giày thể thao xanh cá tính', 'Adidas', 7000000, 7500000, 'giay', 'image/giay/giay18.jpg', 'image/giay/giay18-ct.jpg', 30),
(138, 'Giày thể thao trắng thuần khiết', 'Bitis-Hunter', 6000000, 6500000, 'giay', 'image/giay/giay19.jpg', 'image/giay/giay19-ct.jpg', 30),
(139, 'Giày thể thao vàng sang trọng', 'Bitis-Hunter', 10000000, 10500000, 'giay', 'image/giay/giay20.jpg', 'image/giay/giay20-ct.jpg', 30),
(140, 'Đồng hồ dây da đen huyền bí', 'WD', 50000000, 5500000, 'dongho', 'image/dongho/dongho0.jpg', 'image/dongho/dongho0-ct.jpg', 30),
(141, 'Đồng hồ dây da nâu sang trọng', 'WD', 60000000, 6500000, 'dongho', 'image/dongho/dongho1.jpg', 'image/dongho/dongho1-ct.jpg', 30),
(142, 'Đồng hồ dây da đen vĩnh cữu', 'Halei', 40000000, 4500000, 'dongho', 'image/dongho/dongho2.jpg', 'image/dongho/dongho2-ct.jpg', 30),
(143, 'Đồng hồ dây da nâu quý phái', 'WD', 30000000, 3500000, 'dongho', 'image/dongho/dongho3.jpg', 'image/dongho/dongho3-ct.jpg', 30),
(144, 'Đồng hồ dây da đen cá tính', 'Halei', 20000000, 2500000, 'dongho', 'image/dongho/dongho4.jpg', 'image/dongho/dongho4-ct.jpg', 30),
(145, 'Đồng hồ nam cao cấp', 'Tada', 70000000, 7500000, 'dongho', 'image/dongho/dongho5.jpg', 'image/dongho/dongho5-ct.jpg', 30),
(146, 'Đồng hồ nam dây da cao cấp Halei', 'Halei', 60000000, 6500000, 'dongho', 'image/dongho/dongho6.jpg', 'image/dongho/dongho6-ct.jpg', 30),
(147, 'Đồng hồ nam Timer Seller', 'WD', 30000000, 3500000, 'dongho', 'image/dongho/dongho7.jpg', 'image/dongho/dongho7-ct.jpg', 30),
(148, 'Đồng hồ nam Halei HL168', 'Halei', 60000000, 6500000, 'dongho', 'image/dongho/dongho8.jpg', 'image/dongho/dongho8-ct.jpg', 30),
(149, 'Đồng hồ nam Halei đen huyền bí', 'Halei', 60000000, 6500000, 'dongho', 'image/dongho/dongho9.jpg', 'image/dongho/dongho9-ct.jpg', 30),
(150, 'Đồng hồ nam dây da cao cấp Skmei', 'Skmei', 30000000, 3500000, 'dongho', 'image/dongho/dongho10.jpg', 'image/dongho/dongho10-ct.jpg', 30),
(151, 'Đồng hồ nam Oukeshi Korea', 'Oukeshi', 50000000, 5500000, 'dongho', 'image/dongho/dongho11.jpg', 'image/dongho/dongho11-ct.jpg', 30),
(152, 'Đồng hồ nam Oukeshi đỏ trẻ trung', 'Oukeshi', 60000000, 6500000, 'dongho', 'image/dongho/dongho12.jpg', 'image/dongho/dongho12-ct.jpg', 30),
(153, 'Đồng hồ nam IBSO dây da', 'IBSO', 70000000, 7500000, 'dongho', 'image/dongho/dongho13.jpg', 'image/dongho/dongho13-ct.jpg', 30),
(154, 'Đồng hồ nam IBSO đen huyền bí', 'IBSO', 70000000, 7500000, 'dongho', 'image/dongho/dongho14.jpg', 'image/dongho/dongho14-ct.jpg', 30),
(155, 'Đồng hồ nam IBSO đen vĩnh cữu', 'IBSO', 70000000, 7500000, 'dongho', 'image/dongho/dongho15.jpg', 'image/dongho/dongho15-ct.jpg', 30),
(156, 'Đồng hồ nam IBSO đỏ sang trọng', 'IBSO', 80000000, 8500000, 'dongho', 'image/dongho/dongho16.jpg', 'image/dongho/dongho16-ct.jpg', 30),
(157, 'Đồng hồ dây IBSO Gold quý phái', 'IBSO', 100000000, 10500000, 'dongho', 'image/dongho/dongho17.jpg', 'image/dongho/dongho17-ct.jpg', 30),
(158, 'Thắt lưng nam cao cấp AT Leather P106', 'AT', 2000000, 2500000, 'daynit', 'image/daynit/daynit0.jpg', 'image/daynit/daynit0-ct.jpg', 30),
(159, 'Thắt lưng nam cao cấp AT Leather P101', 'AT', 3000000, 3500000, 'daynit', 'image/daynit/daynit1.jpg', 'image/daynit/daynit1-ct.jpg', 30),
(160, 'Thắt lưng nam da thật NT63', 'AA', 1000000, 1500000, 'daynit', 'image/daynit/daynit2.jpg', 'image/daynit/daynit2-ct.jpg', 30),
(161, 'Thắt lưng nam da bò - đen', 'Dior', 3000000, 3500000, 'daynit', 'image/daynit/daynit3.jpg', 'image/daynit/daynit3-ct.jpg', 30),
(162, 'Thắt lưng nam da bò trẻ trung', 'Dior', 2000000, 2500000, 'daynit', 'image/daynit/daynit4.jpg', 'image/daynit/daynit4-ct.jpg', 30),
(163, 'Thắt lưng nam AVAKA AV125', 'AVAKA', 3000000, 3500000, 'daynit', 'image/daynit/daynit5.jpg', 'image/daynit/daynit5-ct.jpg', 30),
(164, 'Thắt lưng nam AT Leather P103 - đen', 'AT', 4000000, 4500000, 'daynit', 'image/daynit/daynit6.jpg', 'image/daynit/daynit6-ct.jpg', 30),
(165, 'Thắt lưng nam AVAKA AV123', 'AVAKA', 3000000, 3500000, 'daynit', 'image/daynit/daynit7.jpg', 'image/daynit/daynit7-ct.jpg', 30),
(166, 'Thắt lưng nam lịch lãm AT Leather', 'AT', 3000000, 3500000, 'daynit', 'image/daynit/daynit8.jpg', 'image/daynit/daynit8-ct.jpg', 30),
(167, 'Thắt lưng da nam thời trang cao cấp', 'AA', 4000000, 4500000, 'daynit', 'image/daynit/daynit9.jpg', 'image/daynit/daynit9-ct.jpg', 30),
(168, 'Thắt lưng da nam HARAS NS006', 'HARAS', 2000000, 2500000, 'daynit', 'image/daynit/daynit10.jpg', 'image/daynit/daynit10-ct.jpg', 30),
(169, 'Thắt lưng nam khoá tự động TL006', 'AA', 3000000, 3500000, 'daynit', 'image/daynit/daynit11.jpg', 'image/daynit/daynit11-ct.jpg', 30),
(170, 'Thắt lưng da nam thời trang cao cấp TL020', 'AA', 3000000, 3500000, 'daynit', 'image/daynit/daynit12.jpg', 'image/daynit/daynit12-ct.jpg', 30),
(171, 'Thắt lưng da nam Hanama TG002 - đen', 'Hanama', 4000000, 4500000, 'daynit', 'image/daynit/daynit13.jpg', 'image/daynit/daynit13-ct.jpg', 30),
(172, 'Thắt lưng da nam mạ Crom', 'Hanama', 3000000, 3500000, 'daynit', 'image/daynit/daynit14.jpg', 'image/daynit/daynit14-ct.jpg', 30),
(173, 'Thắt lưng da bò Ý - đen', 'Hanama', 3000000, 3500000, 'daynit', 'image/daynit/daynit15.jpg', 'image/daynit/daynit15-ct.jpg', 30),
(174, 'Thắt lưng nam trơn lịch lãm - đen', 'Hanama', 2000000, 2500000, 'daynit', 'image/daynit/daynit16.jpg', 'image/daynit/daynit16-ct.jpg', 30),
(175, 'Thắt lưng nam NI2000HM', 'Hanama', 6000000, 6500000, 'daynit', 'image/daynit/daynit17.jpg', 'image/daynit/daynit17-ct.jpg', 30);

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
  MODIFY `MA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

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
