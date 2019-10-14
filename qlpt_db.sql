-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 10, 2019 lúc 05:41 AM
-- Phiên bản máy phục vụ: 10.4.6-MariaDB
-- Phiên bản PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlpt_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `electric_water`
--

CREATE TABLE `electric_water` (
  `ID` int(11) NOT NULL,
  `PRICE_ELECTRIC` double NOT NULL,
  `PRICE_WATER` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `electric_water`
--

INSERT INTO `electric_water` (`ID`, `PRICE_ELECTRIC`, `PRICE_WATER`) VALUES
(1, 3500, 20000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `history_money`
--

CREATE TABLE `history_money` (
  `ID` int(11) NOT NULL,
  `ID_ROOM` int(11) NOT NULL,
  `ID_RENTER` int(11) NOT NULL,
  `DATE_PAY` varchar(50) NOT NULL,
  `DECRIPTION` text NOT NULL,
  `PRICE` int(11) NOT NULL,
  `PAY_OTHER` int(11) NOT NULL,
  `MONTH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `history_money`
--

INSERT INTO `history_money` (`ID`, `ID_ROOM`, `ID_RENTER`, `DATE_PAY`, `DECRIPTION`, `PRICE`, `PAY_OTHER`, `MONTH`) VALUES
(3, 2, 2, '05/09/2019', '', 1, 0, 1),
(4, 2, 2, '05/09/2019', '', 1, 0, 1),
(5, 2, 2, '06/09/2019', '', 1, 0, 1),
(6, 2, 2, '06/09/2019', '', 1123000, 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `list_room`
--

CREATE TABLE `list_room` (
  `ID` int(11) NOT NULL,
  `NAME_ROOM` varchar(50) NOT NULL,
  `PRICE` double NOT NULL,
  `NUMBER_ELECTRIC` int(11) NOT NULL,
  `NUMBER_WATER` int(11) NOT NULL,
  `DECRIPTION` text NOT NULL,
  `STATUS` tinyint(1) NOT NULL,
  `IS_DELETE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `list_room`
--

INSERT INTO `list_room` (`ID`, `NAME_ROOM`, `PRICE`, `NUMBER_ELECTRIC`, `NUMBER_WATER`, `DECRIPTION`, `STATUS`, `IS_DELETE`) VALUES
(1, 'Phòng 1', 1000000, 0, 0, 'phong moi', 1, 0),
(2, 'Phòng 2', 1100000, 7, 7, 'phong moi', 0, 0),
(3, 'Phòng 3', 1000000, 0, 0, 'phong moi', 0, 0),
(4, 'Phòng 4', 1100000, 0, 0, 'phong moi', 0, 0),
(5, 'Phòng 5', 1100000, 0, 0, 'phong moi', 0, 0),
(6, 'Phòng 6', 1100000, 0, 0, 'phong moi', 0, 0),
(7, 'Phòng 7', 1100000, 0, 0, 'phong moi', 0, 0),
(8, 'Phòng 8', 1100000, 0, 0, 'phong moi', 0, 0),
(9, 'Phòng 9', 1100000, 0, 0, 'phong moi', 0, 0),
(10, 'Phòng 10', 1100000, 0, 0, 'phong moi', 0, 0),
(11, 'Phong Thánh\r\n', 0, 0, 0, 'Phong Thanh', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lits_renter_rom`
--

CREATE TABLE `lits_renter_rom` (
  `ID` int(11) NOT NULL,
  `ID_ROOM` int(11) NOT NULL,
  `ID_RENTER` int(11) NOT NULL,
  `DAY_IN` varchar(10) DEFAULT NULL,
  `DAY_OUT` varchar(10) DEFAULT NULL,
  `ELECTRIC_OLD` int(11) DEFAULT NULL,
  `WATER_OLD` int(11) DEFAULT NULL,
  `ELECTRIC_NEW` int(11) DEFAULT NULL,
  `WATER_NEW` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `lits_renter_rom`
--

INSERT INTO `lits_renter_rom` (`ID`, `ID_ROOM`, `ID_RENTER`, `DAY_IN`, `DAY_OUT`, `ELECTRIC_OLD`, `WATER_OLD`, `ELECTRIC_NEW`, `WATER_NEW`) VALUES
(1, 1, 1, '05/09/2019', NULL, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `room_renter`
--

CREATE TABLE `room_renter` (
  `ID` int(11) NOT NULL,
  `Full_name` varchar(200) NOT NULL,
  `SCMND` varchar(50) NOT NULL,
  `PhoneNumber` varchar(50) NOT NULL,
  `Decription` text DEFAULT NULL,
  `Status` tinyint(1) NOT NULL,
  `IS_DELETE` int(11) NOT NULL,
  `RENTER_DAYIN` varchar(50) DEFAULT NULL,
  `RENTER_DAYOUT` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `room_renter`
--

INSERT INTO `room_renter` (`ID`, `Full_name`, `SCMND`, `PhoneNumber`, `Decription`, `Status`, `IS_DELETE`, `RENTER_DAYIN`, `RENTER_DAYOUT`) VALUES
(1, 'Nguyen Văn A', '123456789', '0123456789', 'độc thân, lm nghe lương thiện', 1, 0, NULL, NULL),
(2, 'NGUYỄN VĂN C', '987654310', '9638527410', 'người đặc biệt của công chúng', 0, 0, NULL, '07/09/2019'),
(4, 'Nguyen van C', '01123456789', '0123456789', 'thong tin nguoi thue', 0, 0, NULL, NULL),
(7, 'nguyen van @', '0147258369', '0123456789', 'thue tro', 0, 0, NULL, '07/09/2019'),
(8, 'nguyen van $', '8521324560', '0123456789', 'thue tro', 0, 0, NULL, '07/09/2019'),
(9, 'quang a tun', '012378946', '0147258369', 'đi thuê phòng', 0, 0, NULL, '06/09/2019'),
(12, 'Thanh Phông Tôm', '0123456789', '0123456789', 'Thánh thuê trọ', 0, 0, NULL, '06/09/2019'),
(13, 'nguyen van @@', '1234567890', '0123456789', 'cho thue phong', 0, 0, NULL, '07/09/2019');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$ugf/PdJsl6XVKW8R19iO6.TkHY7t5Iet9nm6qpSG.4GZVQx1Hcknm', NULL, NULL, NULL),
(5, 'tun', 'tun@gmail.com', NULL, '$2y$10$mH8YeJXQl.DW1IFw7phPVuyOpctz/tHWiUoWfSgzmTzcZgkn/XjdO', NULL, '2019-09-18 00:05:56', '2019-09-18 02:40:48');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `electric_water`
--
ALTER TABLE `electric_water`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `history_money`
--
ALTER TABLE `history_money`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `list_room`
--
ALTER TABLE `list_room`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `lits_renter_rom`
--
ALTER TABLE `lits_renter_rom`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `room_renter`
--
ALTER TABLE `room_renter`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `electric_water`
--
ALTER TABLE `electric_water`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `history_money`
--
ALTER TABLE `history_money`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `list_room`
--
ALTER TABLE `list_room`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `lits_renter_rom`
--
ALTER TABLE `lits_renter_rom`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `room_renter`
--
ALTER TABLE `room_renter`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
