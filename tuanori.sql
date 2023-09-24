-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th4 10, 2023 lúc 08:19 PM
-- Phiên bản máy phục vụ: 10.3.38-MariaDB-log-cll-lve
-- Phiên bản PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ggdmgprj_tuanori`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giftcode`
--

CREATE TABLE `giftcode` (
  `id` int(255) NOT NULL,
  `username` varchar(999) DEFAULT NULL,
  `action` varchar(999) DEFAULT NULL,
  `giftcode` varchar(999) DEFAULT NULL,
  `percent` varchar(999) NOT NULL DEFAULT '0',
  `status` varchar(999) NOT NULL DEFAULT 'true',
  `expire` varchar(999) NOT NULL DEFAULT '0',
  `time` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `napthe`
--

CREATE TABLE `napthe` (
  `id` int(255) NOT NULL,
  `username` varchar(999) NOT NULL,
  `type` varchar(999) NOT NULL,
  `amount` varchar(999) NOT NULL,
  `serial` varchar(999) NOT NULL,
  `pin` varchar(999) NOT NULL,
  `tranid` varchar(999) NOT NULL,
  `status` varchar(999) NOT NULL,
  `time` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nickff`
--

CREATE TABLE `nickff` (
  `id` int(255) NOT NULL,
  `taikhoan` varchar(999) NOT NULL,
  `matkhau` varchar(999) NOT NULL,
  `giatien` varchar(999) NOT NULL,
  `rank` varchar(999) NOT NULL,
  `nhanvat` varchar(999) NOT NULL,
  `dangky` varchar(999) NOT NULL,
  `pet` varchar(999) NOT NULL,
  `noibat` varchar(999) NOT NULL,
  `2fa` varchar(999) NOT NULL,
  `nguoimua` varchar(999) NOT NULL,
  `status` varchar(999) NOT NULL DEFAULT '0',
  `time` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `random_freefire`
--

CREATE TABLE `random_freefire` (
  `id` int(255) NOT NULL,
  `name` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cname` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumb` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `giatien` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `mota` varchar(999) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `status` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'true',
  `time` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `random_freefire`
--

INSERT INTO `random_freefire` (`id`, `name`, `cname`, `thumb`, `giatien`, `mota`, `status`, `time`) VALUES
(1, 'Thử Vận May 150K', 'thu-van-may-50k', 'https://i.imgur.com/D0x9SNp.gif', '150000', '', 'true', 1653989693);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `random_freefire_nick`
--

CREATE TABLE `random_freefire_nick` (
  `id` int(255) NOT NULL,
  `cname` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `2fa` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `status` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'true',
  `nguoimua` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rut_vat_pham`
--

CREATE TABLE `rut_vat_pham` (
  `id` int(255) NOT NULL,
  `type` varchar(225) NOT NULL,
  `username` varchar(999) DEFAULT NULL,
  `select` varchar(225) NOT NULL,
  `idgame` varchar(999) NOT NULL DEFAULT '0',
  `user` varchar(225) NOT NULL,
  `pass` varchar(225) NOT NULL,
  `vp` int(11) NOT NULL DEFAULT 0,
  `noidung` varchar(999) DEFAULT NULL,
  `status` varchar(999) NOT NULL DEFAULT '2',
  `time` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `settings`
--

CREATE TABLE `settings` (
  `id` int(255) NOT NULL,
  `key` varchar(999) NOT NULL,
  `value` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`) VALUES
(9, 'web_logo', '{\"url\":\"https:\\/\\/i.ibb.co\\/qnt4tRB\\/image.png\",\"height\":\"10\",\"width\":\"20\",\"icon\":\"\"}'),
(10, 'web_banner', '{\"url\":\"https:\\/\\/shopdat09.com\\/baner1111.gif\",\"image\":\"https:\\/\\/shopdat09.com\\/baner1111.gif\"}'),
(8, 'web_title', '{\"title\":\"TUANORI.VN\",\"name\":\"TUANORI.VN\",\"keywords\":\"TUANORI.VN - THI\\u1ebeT K\\u1ebe WEBSITE CHU\\u1ea8N SEO\"}'),
(12, 'web_admin', '{\"name\":\"PH\\u1ea0M HO\\u00c0NG TU\\u1ea4N\",\"phone\":\"0812665001\",\"facebook\":\"https:\\/\\/www.facebook.com\\/phamhoangtuan.ytb\\/\",\"youtube\":\"\"}'),
(13, 'thongbao', '<p><strong>SỰ KIỆN KHUYẾN MÃI KHỦNG DUY NHẤT NGÀY 25/05</strong></p><p>+ TĂNG 100% TỈ LỆ TRÚNG NICK VIP FULL SKIN SÚNG KHI THỬ VẬN MAY</p><p>+ QUAY VÒNG QUAY X3 TRỞ LÊN 90% NỔ HŨ 9999 KIM CƯƠNG</p><p><img src=\"https://i.imgur.com/5PSk8xs.png\"></p>'),
(16, 'hinhanh_game', '{\"banaccff\":\"https:\\/\\/shopbacgau.com\\/storage\\/images\\/BdqhZKELjg_1617497855.gif\",\"vanmayff\":null,\"homthinhff\":\"https:\\/\\/shopriki.vn\\/storage\\/images\\/KaSUn7bxBX_1617594856.gif\",\"lattheff\":null,\"sieucapff\":null,\"game1\":\"https:\\/\\/shopbacgau.com\\/storage\\/images\\/NTPdjHe1Ln_1617498796.gif\",\"game2\":\"https:\\/\\/shopbacgau.com\\/storage\\/images\\/V7BceJdbYJ_1617509030.gif\",\"game3\":\"https:\\/\\/shopbacgau.com\\/storage\\/images\\/2WObo7k74q_1617511113.gif\",\"game4\":\"https:\\/\\/rikaki.vn\\/storage\\/images\\/1XjmXuPiH7_1617448043.gif\",\"game5\":\"https:\\/\\/shopbacgau.com\\/storage\\/images\\/iGV4jm1lXk_1617498965.gif\",\"game6\":\"https:\\/\\/rikaki.vn\\/storage\\/images\\/KUqtNWovhj_1617448497.gif\",\"game7\":\"https:\\/\\/shopbacgau.com\\/storage\\/images\\/PxG34LKYl2_1617498998.gif\",\"game8\":\"https:\\/\\/shopbacgau.com\\/storage\\/images\\/5grLvtqwvq_1617497965.gif\",\"imgtop\":\"https:\\/\\/rikaki.vn\\/upload\\/userfiles\\/images\\/100w%20(5).gif\",\"buttonindexvq\":\"https:\\/\\/shopbacgau.com\\/storage\\/images\\/kdNVbKHIyQ_1610530256.png\"}'),
(11, 'web_color', '{\"color\":\"#ef0101\"}'),
(14, 'hienthi_game', '{\"banaccff\":\"1\",\"vanmayff\":\"1\",\"homthinhff\":\"1\",\"lattheff\":\"1\",\"homkimcuong\":\"1\",\"lienquan\":\"1\"}'),
(15, 'hienthi_web', '{\"napthe_mobile\":\"1\",\"napthe_pc\":\"1\",\"vongquay\":\"1\",\"dichvu\":\"1\",\"random\":\"1\"}'),
(17, 'web_napthe', '{\"kieunap\":null}'),
(18, 'web_brick', '{\"site\":null,\"ApiKey\":null,\"CallBack\":null}');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fbid` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `level` varchar(255) NOT NULL,
  `name` varchar(999) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `username` varchar(999) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(999) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(999) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `money` int(11) NOT NULL DEFAULT 0,
  `money_nap` int(11) NOT NULL DEFAULT 0,
  `kimcuong` varchar(999) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0',
  `quanhuy` varchar(225) NOT NULL DEFAULT '0',
  `token` varchar(999) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `auth` varchar(999) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ip` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0',
  `verify` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `verify_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `gg2fa` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `status_2fa` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `time` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `fbid`, `level`, `name`, `username`, `password`, `email`, `money`, `money_nap`, `kimcuong`, `quanhuy`, `token`, `auth`, `ip`, `verify`, `verify_code`, `gg2fa`, `status_2fa`, `time`) VALUES
(1, '0', 'administrator', '', 'tuanori', '80eacc8c2dbe54fa42d87bdd689040b6', '', 1200000, 0, '0', '0', 'e34962660d248cc738fddc0e57be8a99d1be64a32010565d98498460a1da', 'd8f8e430c6ce10ddbdc6e05cde24470b72f0ea5414de1f546e6f5c685828', '116.103.173.12', 'true', '44715', 'JD7BTDPE7EVTKNHO', '', 1681113965);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_history_system`
--

CREATE TABLE `user_history_system` (
  `id` int(255) NOT NULL,
  `username` varchar(999) NOT NULL,
  `action` varchar(999) DEFAULT NULL,
  `action_name` varchar(999) DEFAULT NULL,
  `sotien` varchar(999) NOT NULL DEFAULT '0',
  `mota` varchar(999) DEFAULT NULL,
  `time` int(255) NOT NULL,
  `history` int(11) NOT NULL DEFAULT 0,
  `hisnick` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vongquay_kimcuong`
--

CREATE TABLE `vongquay_kimcuong` (
  `id` int(255) NOT NULL,
  `type` varchar(225) NOT NULL,
  `name` varchar(999) DEFAULT NULL,
  `thumb` varchar(225) NOT NULL,
  `image` varchar(225) NOT NULL,
  `mota` varchar(999) DEFAULT NULL,
  `giatien` varchar(999) NOT NULL DEFAULT '0',
  `sudung` varchar(999) NOT NULL DEFAULT '0',
  `status` varchar(255) NOT NULL DEFAULT 'false',
  `time` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `vongquay_kimcuong`
--

INSERT INTO `vongquay_kimcuong` (`id`, `type`, `name`, `thumb`, `image`, `mota`, `giatien`, `sudung`, `status`, `time`) VALUES
(17, 'kc', 'VÒNG QUAY MÙA HÈ MÁT MẺ ( 19k )', 'https://i.imgur.com/DsMbRof.gif', 'https://i.imgur.com/K01m3wL.jpg', '', '19000', '22', 'true', 1654006817),
(18, 'kc', 'VÒNG QUAY BÃI BIỂN DIỆU KỲ 19K', 'https://i.imgur.com/JahGtEo.gif', 'https://i.imgur.com/GrGK0N7.png', 'ghjghj', '19000', '72', 'true', 1654006956),
(16, 'kc', 'VÒNG QUAY THIÊN THẦN BẠCH KIM', 'https://i.imgur.com/PFYE3mj.gif', 'https://i.imgur.com/1ZvLVuU.png', 'quá vjp luôn', '19000', '180', 'true', 1653921056);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vongquay_kimcuong_gift`
--

CREATE TABLE `vongquay_kimcuong_gift` (
  `id` int(255) NOT NULL,
  `id_vongquay` int(255) NOT NULL,
  `item_1` varchar(999) NOT NULL,
  `item_2` varchar(999) NOT NULL,
  `item_3` varchar(999) NOT NULL,
  `item_4` varchar(999) NOT NULL,
  `item_5` varchar(999) NOT NULL,
  `item_6` varchar(999) NOT NULL,
  `item_7` varchar(999) NOT NULL,
  `item_8` varchar(999) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `vongquay_kimcuong_gift`
--

INSERT INTO `vongquay_kimcuong_gift` (`id`, `id_vongquay`, `item_1`, `item_2`, `item_3`, `item_4`, `item_5`, `item_6`, `item_7`, `item_8`) VALUES
(16, 17, '{\"text\":\"Random Kim C\\u01b0\\u01a1ng\",\"kimcuong\":\"20\",\"tyle\":\"0\"}', '{\"text\":\"99 Kim C\\u01b0\\u01a1ng\",\"kimcuong\":\"99\",\"tyle\":\"0\"}', '{\"text\":\"499 Kim C\\u01b0\\u01a1ng\",\"kimcuong\":\"499\",\"tyle\":\"0\"}', '{\"text\":\"999 Kim C\\u01b0\\u01a1ng\",\"kimcuong\":\"999\",\"tyle\":\"0\"}', '{\"text\":\"3,999 Kim C\\u01b0\\u01a1ng\",\"kimcuong\":\"3999\",\"tyle\":\"0\"}', '{\"text\":\"5,999 Kim C\\u01b0\\u01a1ng\",\"kimcuong\":\"5999\",\"tyle\":\"0\"}', '{\"text\":\"7,999 Kim C\\u01b0\\u01a1ng\",\"kimcuong\":\"7999\",\"tyle\":\"0\"}', '{\"text\":\"9,999 Kim C\\u01b0\\u01a1ng\",\"kimcuong\":\"9999\",\"tyle\":\"100\"}'),
(17, 18, '{\"text\":\"Random Kim C\\u01b0\\u01a1ng\",\"kimcuong\":\"20\",\"tyle\":\"0\"}', '{\"text\":\"110 Kim C\\u01b0\\u01a1ng\",\"kimcuong\":\"110\",\"tyle\":\"0\"}', '{\"text\":\"800 Kim C\\u01b0\\u01a1ng\",\"kimcuong\":\"800\",\"tyle\":\"10\"}', '{\"text\":\"2,000 Kim C\\u01b0\\u01a1ng\",\"kimcuong\":\"2000\",\"tyle\":\"10\"}', '{\"text\":\"5,000 Kim C\\u01b0\\u01a1ng\",\"kimcuong\":\"5000\",\"tyle\":\"0\"}', '{\"text\":\"6,000 Kim C\\u01b0\\u01a1ng\",\"kimcuong\":\"6000\",\"tyle\":\"0\"}', '{\"text\":\"7,000 Kim C\\u01b0\\u01a1ng\",\"kimcuong\":\"7000\",\"tyle\":\"20\"}', '{\"text\":\"9,999 Kim C\\u01b0\\u01a1ng\",\"kimcuong\":\"9999\",\"tyle\":\"60\"}'),
(15, 16, '{\"text\":\"Random Kim C\\u01b0\\u01a1ng\",\"kimcuong\":\"56\",\"tyle\":\"30\"}', '{\"text\":\"99 Kim C\\u01b0\\u01a1ng\",\"kimcuong\":\"99\",\"tyle\":\"50\"}', '{\"text\":\"499 Kim C\\u01b0\\u01a1ng\",\"kimcuong\":\"499\",\"tyle\":\"35\"}', '{\"text\":\"1.999 Kim C\\u01b0\\u01a1ng\",\"kimcuong\":\"1999\",\"tyle\":\"35\"}', '{\"text\":\"3.999 Kim C\\u01b0\\u01a1ng\",\"kimcuong\":\"3999\",\"tyle\":\"0\"}', '{\"text\":\"5.999 Kim C\\u01b0\\u01a1ng\",\"kimcuong\":\"5999\",\"tyle\":\"0\"}', '{\"text\":\"7.999 Kim C\\u01b0\\u01a1ng\",\"kimcuong\":\"7999\",\"tyle\":\"0\"}', '{\"text\":\"11.999 Kim C\\u01b0\\u01a1ng\",\"kimcuong\":\"11999\",\"tyle\":\"0\"}');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `giftcode`
--
ALTER TABLE `giftcode`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `napthe`
--
ALTER TABLE `napthe`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nickff`
--
ALTER TABLE `nickff`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `random_freefire`
--
ALTER TABLE `random_freefire`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `random_freefire_nick`
--
ALTER TABLE `random_freefire_nick`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `rut_vat_pham`
--
ALTER TABLE `rut_vat_pham`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user_history_system`
--
ALTER TABLE `user_history_system`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `vongquay_kimcuong`
--
ALTER TABLE `vongquay_kimcuong`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `vongquay_kimcuong_gift`
--
ALTER TABLE `vongquay_kimcuong_gift`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `giftcode`
--
ALTER TABLE `giftcode`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `napthe`
--
ALTER TABLE `napthe`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `nickff`
--
ALTER TABLE `nickff`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `random_freefire`
--
ALTER TABLE `random_freefire`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `random_freefire_nick`
--
ALTER TABLE `random_freefire_nick`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `rut_vat_pham`
--
ALTER TABLE `rut_vat_pham`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `user_history_system`
--
ALTER TABLE `user_history_system`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `vongquay_kimcuong`
--
ALTER TABLE `vongquay_kimcuong`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `vongquay_kimcuong_gift`
--
ALTER TABLE `vongquay_kimcuong_gift`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
