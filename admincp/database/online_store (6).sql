-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2024 at 05:28 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_don_hang`
--

CREATE TABLE `chi_tiet_don_hang` (
  `don_gia` int(20) NOT NULL,
  `so_luong` int(20) NOT NULL,
  `ma_don_hang` bigint(20) NOT NULL,
  `ma_san_pham` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `chi_tiet_don_hang`
--

INSERT INTO `chi_tiet_don_hang` (`don_gia`, `so_luong`, `ma_don_hang`, `ma_san_pham`) VALUES
(20000, 1, 1, 1),
(2, 1, 3, 8),
(27000000, 3, 3, 10);

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_phieu_nhap`
--

CREATE TABLE `chi_tiet_phieu_nhap` (
  `ma_phieu_nhap` bigint(20) NOT NULL,
  `ma_san_pham` bigint(20) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `don_gia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `chi_tiet_phieu_nhap`
--

INSERT INTO `chi_tiet_phieu_nhap` (`ma_phieu_nhap`, `ma_san_pham`, `so_luong`, `don_gia`) VALUES
(1, 1, 24, 20000);

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_san_pham`
--

CREATE TABLE `chi_tiet_san_pham` (
  `masp_chi_tiet` bigint(20) NOT NULL,
  `ma_sp` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `chi_tiet_san_pham`
--

INSERT INTO `chi_tiet_san_pham` (`masp_chi_tiet`, `ma_sp`) VALUES
(1, 1),
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `danh_muc`
--

CREATE TABLE `danh_muc` (
  `id_danh_muc` bigint(20) NOT NULL,
  `ten_danh_muc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `danh_muc`
--

INSERT INTO `danh_muc` (`id_danh_muc`, `ten_danh_muc`) VALUES
(1, 'MacBook'),
(2, 'Dell'),
(3, 'Gaming'),
(11, 'Dell8');

-- --------------------------------------------------------

--
-- Table structure for table `don_hang`
--

CREATE TABLE `don_hang` (
  `id_don_hang` bigint(20) NOT NULL,
  `dia_chi_nhan` varchar(255) DEFAULT NULL,
  `ghi_chu` varchar(255) DEFAULT NULL,
  `ho_ten_nguoi_nhan` varchar(255) DEFAULT NULL,
  `ngay_dat_hang` datetime DEFAULT NULL,
  `ngay_giao_hang` datetime DEFAULT NULL,
  `ngay_nhan_hang` datetime DEFAULT NULL,
  `sdt_nhan_hang` varchar(255) DEFAULT NULL,
  `trang_thai_don_hang` int(2) DEFAULT NULL,
  `ma_nguoi_dat` varchar(20) DEFAULT NULL,
  `ma_NV` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `don_hang`
--

INSERT INTO `don_hang` (`id_don_hang`, `dia_chi_nhan`, `ghi_chu`, `ho_ten_nguoi_nhan`, `ngay_dat_hang`, `ngay_giao_hang`, `ngay_nhan_hang`, `sdt_nhan_hang`, `trang_thai_don_hang`, `ma_nguoi_dat`, `ma_NV`) VALUES
(1, '11,phường 1,quận 1,HCM', 'asdf', 'aaa', '2018-12-01 14:38:26', NULL, NULL, 'dsf', 1, '1', '1'),
(2, '14,phường 2,quận 1,HCM', 'asdf', 'aaa', '2018-12-05 21:58:24', NULL, NULL, '13', 0, '2', '1'),
(3, 'ádasdasd', NULL, 'Hoang Hao', '2024-04-20 20:52:55', '2024-04-20 20:52:55', NULL, '0984292305', 0, 'KH01v', '');

-- --------------------------------------------------------

--
-- Table structure for table `nguoidung_vaitro`
--

CREATE TABLE `nguoidung_vaitro` (
  `ma_nguoi_dung` varchar(20) NOT NULL,
  `ma_vai_tro` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `nguoidung_vaitro`
--

INSERT INTO `nguoidung_vaitro` (`ma_nguoi_dung`, `ma_vai_tro`) VALUES
('KH01v', 4),
('KH11111', 4),
('KH12121', 4);

-- --------------------------------------------------------

--
-- Table structure for table `nguoi_dung`
--

CREATE TABLE `nguoi_dung` (
  `id_nguoi_dung` varchar(20) NOT NULL,
  `dia_chi` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `ho_ten` varchar(255) DEFAULT NULL,
  `so_dien_thoai` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `nguoi_dung`
--

INSERT INTO `nguoi_dung` (`id_nguoi_dung`, `dia_chi`, `email`, `ho_ten`, `so_dien_thoai`) VALUES
('a23213', '', 'khachhang@gmail.com', 'hao Hoang ', '0984292305'),
('KH01v', 'ádasdasd', 'haohoangn23dhat782@gmail.com', 'Hoang Hao', '0984292305'),
('KH12121', 'ádasdasd', 'haohoankignhat782@gmail.com', 'hao Hoang ', '0984292305'),
('KH12321', '23123123aasdasd', 'khachhang@gmail.com', 'hao Hoang ', '0984292309'),
('KH12421', '23123123aasdasd', 'haohoankignh2321at782@gmail.com', 'hao Hoang ', '0984292305'),
('KH16421', '23123123aasdasd', 'khachh23123ang@gmail.com', 'hao Hoang ', '0984292305'),
('KH18121', '23123123aasdasd', 'haohoankignhat782@gmail.com', 'Hoang Hao', '0984292305'),
('KH23213', '23123123aasdasd', 'khachhang@gmail.com', 'hao Hoang ', '0984292309'),
('KH24121', '23123123aasdasd', 'khachhan213123g@gmail.com', 'Hoang Hao', '0984292305'),
('KH29213', '23123123aasdasd', 'haohoanki23gnhat782@gmail.com', 'hao Hoang ', '0984292305');

-- --------------------------------------------------------

--
-- Table structure for table `nha_cung_cap`
--

CREATE TABLE `nha_cung_cap` (
  `ma_ncc` bigint(20) NOT NULL,
  `ten_ncc` varchar(255) NOT NULL,
  `dia_chi` varchar(255) NOT NULL,
  `sdt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phieu_nhap`
--

CREATE TABLE `phieu_nhap` (
  `ma_pn` bigint(20) NOT NULL,
  `ma_ncc` bigint(20) NOT NULL,
  `ma_NV` varchar(20) NOT NULL,
  `ngay_nhap` datetime NOT NULL,
  `tong_tien` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `phieu_nhap`
--

INSERT INTO `phieu_nhap` (`ma_pn`, `ma_ncc`, `ma_NV`, `ngay_nhap`, `tong_tien`) VALUES
(1, 1, '1', '2024-03-19 00:00:00', 255);

-- --------------------------------------------------------

--
-- Table structure for table `privilege`
--

CREATE TABLE `privilege` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url_match` varchar(255) NOT NULL,
  `created_time` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `privilege`
--

INSERT INTO `privilege` (`id`, `group_id`, `name`, `url_match`, `created_time`) VALUES
(1, 1, 'xem', 'action=quanlydanhmuc&&query=hienthi', '0000-00-00'),
(2, 2, 'xem', 'action=quanlysanpham&&query=hienthi', '0000-00-00'),
(3, 4, 'xem', 'action=quanlythanhvien&&query=hienthi', '2000-01-23'),
(4, 3, 'xem', 'action=quanlydonhang&&query=hienthi', '0000-00-00'),
(5, 5, 'Xem', 'action=quanlythongke&&query=hienthi', '0000-00-00'),
(6, 3, 'Duyệt đơn hàng', 'set_trang_thai=0&id_don_hang=\\d+$', '2024-04-24'),
(7, 3, 'Xem chi tiết đơn hàng', 'action=quanlydonhang&query=xemchitiet&id=\\d+$', '2024-04-24'),
(8, 1, 'Thêm danh mục', 'action=quanlydanhmuc&query=them', '2024-04-24'),
(9, 1, 'Sửa danh mục', 'action=quanlydanhmuc&query=sua&id=\\d+$', '2024-04-24'),
(10, 1, 'Xóa danh mục', 'action=quanlydanhmuc&query=xoa&id=\\d+$', '2024-04-24'),
(11, 4, 'Thêm thành viên', 'action=quanlythanhvien&query=them', '2024-04-24'),
(12, 4, 'Phân quyền thành viên', 'action=quanlythanhvien&query=phanquyenn&id=\\d+$', '2024-04-24'),
(13, 4, 'Sửa thành viên', 'action=quanlythanhvien&query=sua&id=\\d+$', '2024-04-24'),
(14, 4, 'Xóa thành viên', 'action=quanlythanhvien&query=xoa&id=\\d+$', '2024-04-24'),
(15, 2, 'Thêm sản phẩm', 'action=quanlysanpham&query=them', '2024-04-24'),
(16, 2, 'Xem chi tiết sản phẩm', 'action=quanlysanpham&query=xemchitiet&id=\\d+$', '2024-04-24'),
(17, 2, 'Sửa sản phẩm', 'action=quanlysanpham&query=sua&id=\\d+$', '2024-04-24'),
(18, 2, 'Xóa sản phẩm', 'action=quanlysanpham&query=xoa&id=\\d+$', '2024-04-24');

-- --------------------------------------------------------

--
-- Table structure for table `privilege_group`
--

CREATE TABLE `privilege_group` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` int(11) NOT NULL,
  `created_time` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `privilege_group`
--

INSERT INTO `privilege_group` (`id`, `name`, `position`, `created_time`) VALUES
(1, 'Danh mục', 1, '0000-00-00'),
(2, 'Sản phẩm', 2, '0000-00-00'),
(3, 'Đơn hàng', 3, '0000-00-00'),
(4, 'Thành viên', 6, '0000-00-00'),
(5, 'Thống kê', 5, '2024-04-24');

-- --------------------------------------------------------

--
-- Table structure for table `san_pham`
--

CREATE TABLE `san_pham` (
  `id_san_pham` bigint(20) NOT NULL,
  `don_gia` bigint(20) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `ten_san_pham` varchar(255) DEFAULT NULL,
  `ma_danh_muc` bigint(20) DEFAULT NULL,
  `dung_luong_pin` varchar(255) NOT NULL,
  `man_hinh` varchar(255) NOT NULL,
  `cpu` varchar(255) NOT NULL,
  `ram` varchar(255) NOT NULL,
  `thong_tin_chung` varchar(255) NOT NULL,
  `hinh_anh` varchar(255) NOT NULL,
  `bao_hanh` varchar(255) NOT NULL,
  `trang_thai` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `san_pham`
--

INSERT INTO `san_pham` (`id_san_pham`, `don_gia`, `so_luong`, `ten_san_pham`, `ma_danh_muc`, `dung_luong_pin`, `man_hinh`, `cpu`, `ram`, `thong_tin_chung`, `hinh_anh`, `bao_hanh`, `trang_thai`) VALUES
(1, 23990000, 100, 'Macbook te 1000dasdsvaksvkljsdkljasldjalsj ', 1, '5800mAh', ' 13.3 inch LED-backlit', 'Intel, Core i5, 1.8 Ghz', '8 GB, LPDDR3, 1600 Mhz', 'thiết kế không thay đổi, vỏ nhôm sang trọng, siêu mỏng và siêu nhẹ', 'gaminh.jpg', '12 tháng', 1),
(2, 28990000, 100, 'sadas', 1, '6000mAh', ' 12 inch LED-backlit', 'Intel, Core M3, 1.2 GHz', '8 GB, LPDDR3, 1866 MHz', 'Thiết kế hoàn mỹ tinh tế và sang trọng', 'gaminh.jpg', '12 tháng', 1),
(3, 2132, 123, 'MacBook', 1, '100%', '24x24in', '8gp', '16 ram', 'tot dep', 'gaminh.jpg', '12thang', 1),
(4, 200000, 12, 'macbook', 1, 'zv', 'vz', 'vz', 'vz', 'vz', 'gaminh.jpg', 'ádasd', 1),
(5, 45, 345, 'đa', 1, 'zxc', 'b', 'b', 'b', 'b', 'gaminh.jpg', 'b', 1),
(6, 4, 4, 'f', 1, 'v', 'f', 'f', 'f', 'f', 'gaminh.jpg', 'va', 1),
(7, 9000000, 1, 'b', 1, 'b', 'b', 'b', 'b', 'b', 'gaminh.jpg', 'v', 1),
(8, 2, 1, 'c', 1, 'v', 'b', 'b', 'b', 'b', 'gaminh.jpg', 'v', 1),
(10, 9000000, -1, 'v', 1, 'v', 'v', 'v', 'v', 'v', 'gaminh.jpg', 'v', 1),
(13, 9000000, 7, 'c', 2, 'd', 'c', 'v', 'b', 'b', 'gaminh.jpg', 'c', 1),
(14, 5, 5, 'v', 3, 'v', 'v', 'v', 'v', 'v', 'gaminh.jpg', 'v', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_taikhoan`
--

CREATE TABLE `tbl_taikhoan` (
  `MaTK` varchar(255) NOT NULL,
  `TenDN` varchar(255) NOT NULL,
  `Mat_khau` varchar(255) NOT NULL,
  `Ngay_tao` date NOT NULL,
  `TTTK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_taikhoan`
--

INSERT INTO `tbl_taikhoan` (`MaTK`, `TenDN`, `Mat_khau`, `Ngay_tao`, `TTTK`) VALUES
('KH01v', 'haohoangn23dhat782@gmail.com', '123123123H', '2024-04-13', 1),
('KH12121', 'haohoankignhat782@gmail.com', '123123123H', '2024-04-13', 1),
('KH12321', 'khachhang@gmail.com', 'Hao123123123123', '2024-04-21', 1),
('KH16421', 'khachh23123ang@gmail.com', 'Hao123123123123', '2024-04-21', 1),
('KH24121', 'khachhan213123g@gmail.com', '123123123H', '2024-04-21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `Ngay_tao` date NOT NULL DEFAULT current_timestamp(),
  `TTTK` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `fullname`, `Ngay_tao`, `TTTK`) VALUES
(1, 'admin', 'admin', 'admin', '2024-04-21', 1),
(2, 'hoanghao', 'h123123123', 'Hoàng Hào', '2024-04-21', 1),
(3, 'nhanvien1', 'nv123123123', 'Nguyễn Lộc', '2024-04-23', 1),
(6, 'nhanvien2', '12312323h', 'Lê Sơn', '2024-04-23', 1),
(7, 'quanli1', 'ql123123123', 'Nguyễn Minh', '2024-04-24', 1),
(8, 'quanli2', 'ql123123123', 'Nguyễn Huy', '2024-04-24', 1),
(9, 'nhanvien3', 'nv3123123123', 'Hoàng Thắng', '2024-04-24', 1),
(10, 'nv4', 'nv4123123123', 'Đức Sang', '2024-04-24', 1),
(11, 'nvien1124', 'nv123123123', 'Phạm Hà', '2024-04-24', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_privilege`
--

CREATE TABLE `user_privilege` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `privilege_id` int(11) NOT NULL,
  `created_time` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user_privilege`
--

INSERT INTO `user_privilege` (`id`, `user_id`, `privilege_id`, `created_time`) VALUES
(2, 1, 2, '0000-00-00'),
(3, 1, 3, '0000-00-00'),
(4, 1, 4, '0000-00-00'),
(5, 1, 1, '0000-00-00'),
(28, 6, 1, '0000-00-00'),
(29, 6, 2, '0000-00-00'),
(30, 1, 5, '2024-04-24'),
(31, 1, 6, '2024-04-24'),
(32, 1, 7, '2024-04-24'),
(33, 1, 8, '2024-04-24'),
(34, 1, 9, '2024-04-24'),
(35, 1, 10, '2024-04-24'),
(36, 1, 11, '2024-04-24'),
(37, 1, 12, '2024-04-24'),
(38, 1, 13, '2024-04-24'),
(39, 1, 14, '2024-04-24'),
(40, 1, 15, '2024-04-24'),
(41, 1, 16, '2024-04-24'),
(42, 1, 17, '2024-04-24'),
(43, 1, 18, '2024-04-24'),
(50, 2, 1, '2024-04-24'),
(51, 2, 10, '2024-04-24'),
(52, 2, 2, '2024-04-24'),
(53, 2, 18, '2024-04-24'),
(54, 2, 4, '2024-04-24'),
(55, 2, 7, '2024-04-24'),
(56, 2, 5, '2024-04-24'),
(57, 2, 3, '2024-04-24'),
(58, 2, 12, '2024-04-24');

-- --------------------------------------------------------

--
-- Table structure for table `vai_tro`
--

CREATE TABLE `vai_tro` (
  `id_vai_tro` bigint(20) NOT NULL,
  `ten_vai_tro` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `vai_tro`
--

INSERT INTO `vai_tro` (`id_vai_tro`, `ten_vai_tro`) VALUES
(1, 'ROLE_ADMIN'),
(2, 'ROLE_MANAGER'),
(3, 'ROLE_EMPLOYEE'),
(4, 'ROLE_customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD PRIMARY KEY (`ma_don_hang`,`ma_san_pham`),
  ADD KEY `FK9wl3houbukbxpixsut6uvojhy` (`ma_don_hang`),
  ADD KEY `FK3ry84nmdxgoarx53qjxd671tk` (`ma_san_pham`);

--
-- Indexes for table `chi_tiet_phieu_nhap`
--
ALTER TABLE `chi_tiet_phieu_nhap`
  ADD PRIMARY KEY (`ma_phieu_nhap`,`ma_san_pham`),
  ADD KEY `werewrwerwerf` (`ma_san_pham`);

--
-- Indexes for table `chi_tiet_san_pham`
--
ALTER TABLE `chi_tiet_san_pham`
  ADD PRIMARY KEY (`masp_chi_tiet`,`ma_sp`),
  ADD KEY `kjkjjkjkjasd` (`ma_sp`);

--
-- Indexes for table `danh_muc`
--
ALTER TABLE `danh_muc`
  ADD PRIMARY KEY (`id_danh_muc`);

--
-- Indexes for table `don_hang`
--
ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`id_don_hang`),
  ADD KEY `FKnwjiboxao1uvw1siemkvs1jb9` (`ma_nguoi_dat`),
  ADD KEY `wrsfdsfsdf` (`ma_NV`);

--
-- Indexes for table `nguoidung_vaitro`
--
ALTER TABLE `nguoidung_vaitro`
  ADD PRIMARY KEY (`ma_nguoi_dung`,`ma_vai_tro`),
  ADD KEY `FKig6jxd861mqv02a8pn68r43fr` (`ma_vai_tro`);

--
-- Indexes for table `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  ADD PRIMARY KEY (`id_nguoi_dung`);

--
-- Indexes for table `nha_cung_cap`
--
ALTER TABLE `nha_cung_cap`
  ADD PRIMARY KEY (`ma_ncc`);

--
-- Indexes for table `phieu_nhap`
--
ALTER TABLE `phieu_nhap`
  ADD PRIMARY KEY (`ma_pn`),
  ADD KEY `ma_NV` (`ma_NV`);

--
-- Indexes for table `privilege`
--
ALTER TABLE `privilege`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `privilege_group`
--
ALTER TABLE `privilege_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`id_san_pham`),
  ADD KEY `FKqss6n6gtx6lhb7flcka9un18t` (`ma_danh_muc`);

--
-- Indexes for table `tbl_taikhoan`
--
ALTER TABLE `tbl_taikhoan`
  ADD PRIMARY KEY (`MaTK`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_privilege`
--
ALTER TABLE `user_privilege`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `privilege_id` (`privilege_id`);

--
-- Indexes for table `vai_tro`
--
ALTER TABLE `vai_tro`
  ADD PRIMARY KEY (`id_vai_tro`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `danh_muc`
--
ALTER TABLE `danh_muc`
  MODIFY `id_danh_muc` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `id_don_hang` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `nha_cung_cap`
--
ALTER TABLE `nha_cung_cap`
  MODIFY `ma_ncc` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phieu_nhap`
--
ALTER TABLE `phieu_nhap`
  MODIFY `ma_pn` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `privilege`
--
ALTER TABLE `privilege`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `privilege_group`
--
ALTER TABLE `privilege_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `id_san_pham` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_privilege`
--
ALTER TABLE `user_privilege`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `vai_tro`
--
ALTER TABLE `vai_tro`
  MODIFY `id_vai_tro` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD CONSTRAINT `FK3ry84nmdxgoarx53qjxd671tk` FOREIGN KEY (`ma_san_pham`) REFERENCES `san_pham` (`id_san_pham`),
  ADD CONSTRAINT `dfdgvxvxcva` FOREIGN KEY (`ma_don_hang`) REFERENCES `don_hang` (`id_don_hang`);

--
-- Constraints for table `chi_tiet_phieu_nhap`
--
ALTER TABLE `chi_tiet_phieu_nhap`
  ADD CONSTRAINT `chi_tiet_phieu_nhap_ibfk_1` FOREIGN KEY (`ma_phieu_nhap`) REFERENCES `phieu_nhap` (`ma_pn`),
  ADD CONSTRAINT `werewrwerwerf` FOREIGN KEY (`ma_san_pham`) REFERENCES `san_pham` (`id_san_pham`);

--
-- Constraints for table `chi_tiet_san_pham`
--
ALTER TABLE `chi_tiet_san_pham`
  ADD CONSTRAINT `kjkjjkjkjasd` FOREIGN KEY (`ma_sp`) REFERENCES `san_pham` (`id_san_pham`);

--
-- Constraints for table `nha_cung_cap`
--
ALTER TABLE `nha_cung_cap`
  ADD CONSTRAINT `dewqe343gsdg` FOREIGN KEY (`ma_ncc`) REFERENCES `phieu_nhap` (`ma_pn`);

--
-- Constraints for table `privilege`
--
ALTER TABLE `privilege`
  ADD CONSTRAINT `privilege_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `privilege_group` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `FKqss6n6gtx6lhb7flcka9un18t` FOREIGN KEY (`ma_danh_muc`) REFERENCES `danh_muc` (`id_danh_muc`);

--
-- Constraints for table `user_privilege`
--
ALTER TABLE `user_privilege`
  ADD CONSTRAINT `user_privilege_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_privilege_ibfk_2` FOREIGN KEY (`privilege_id`) REFERENCES `privilege` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
