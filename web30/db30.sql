-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2025-02-27 09:32:58
-- 伺服器版本： 10.4.32-MariaDB
-- PHP 版本： 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `db30`
--

-- --------------------------------------------------------

--
-- 資料表結構 `movies`
--

CREATE TABLE `movies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `level` int(1) UNSIGNED NOT NULL,
  `length` int(3) UNSIGNED NOT NULL,
  `ondate` date NOT NULL,
  `publish` text NOT NULL,
  `director` text NOT NULL,
  `trailer` text NOT NULL,
  `poster` text NOT NULL,
  `intro` text NOT NULL,
  `sh` int(1) UNSIGNED NOT NULL,
  `rank` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `movies`
--

INSERT INTO `movies` (`id`, `name`, `level`, `length`, `ondate`, `publish`, `director`, `trailer`, `poster`, `intro`, `sh`, `rank`) VALUES
(1, '木法沙', 4, 3000, '2025-01-12', '發行商000001', '導演000001', '03B01v.mp4', '03B01.png', 'vv', 1, 1),
(2, '院線片02', 1, 120, '2025-01-12', '發行商02', '導演02', '03B02v.mp4', '03B02.png', '院線片02院線片02院線片02院線片02院線片02院線片02院線片02院線片02院線片02院線片02院線片02院線片02院線片02院線片02院線片02院線片02院線片02院線片02院線片02院線片02院線片02院線片02院線片02院線片02院線片02院線片02院線片02院線片02院線片02院線片02院線片02院線片02院線片02院線片02院線片02院線片02院線片02院線片02院線片02院線片02院線片02院線片02院線片02院線片02院線片02院線片02院線片02院線片02院線片02院線片02院線片02院線片02', 1, 3),
(3, '院線片03', 3, 140, '2025-01-13', '發行商03', '導演03', '03B03v.mp4', '03B03.png', '院線片03院線片03院線片03院線片03院線片03院線片03院線片03院線片03院線片03院線片03院線片03院線片03', 1, 4),
(4, '院線片04', 2, 60, '2025-01-11', '發行商04', '導演04', '03B04v.mp4', '03B04.png', '導演04導演04導演04導演04導演04導演04', 1, 2),
(7, '院線片07', 3, 200, '2026-02-01', '發行商07', '導演07', '03B07v.mp4', '03B07.png', '院線片07院線片07', 1, 7),
(8, '院線片08', 2, 30, '2025-01-08', '發行商08', '導演08', '03B08v.mp4', '03B08.png', '院線片08院線片08院線片08院線片08院線片08院線片08院線片08院線片08院線片08院線片08院線片08院線片08院線片08院線片08院線片08院線片08院線片08院線片08院線片08院線片08院線片08院線片08院線片08院線片08院線片08院線片08院線片08院線片08院線片08院線片08院線片08院線片08院線片08院線片08院線片08院線片08院線片08', 1, 8),
(9, 'fff', 3, 222, '2025-01-09', '456ret', 'tresd', '03B18v.mp4', '03B18.png', 'fdsfds', 1, 9),
(10, 'wer', 4, 99, '2025-01-10', 'fdw', 'f', '03B20v.mp4', '03B20.png', 'fdsaf', 1, 10);

-- --------------------------------------------------------

--
-- 資料表結構 `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `no` text NOT NULL,
  `movie` text NOT NULL,
  `date` date NOT NULL,
  `session` text NOT NULL,
  `qt` int(10) UNSIGNED NOT NULL,
  `seats` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `orders`
--

INSERT INTO `orders` (`id`, `no`, `movie`, `date`, `session`, `qt`, `seats`) VALUES
(3, '202501140003', '木法沙', '2025-01-14', '14:00 ~ 16:00', 1, 'a:1:{i:0;s:2:\"16\";}'),
(4, '202501140004', '木法沙', '2025-01-14', '14:00 ~ 16:00', 2, 'a:2:{i:0;s:2:\"12\";i:1;s:2:\"17\";}'),
(5, '202501140005', '木法沙', '2025-01-14', '14:00 ~ 16:00', 2, 'a:2:{i:0;s:1:\"8\";i:1;s:2:\"13\";}'),
(6, '202501140006', '木法沙', '2025-01-14', '14:00 ~ 16:00', 2, 'a:2:{i:0;s:2:\"12\";i:1;s:2:\"13\";}'),
(7, '202501140007', '木法沙', '2025-01-14', '16:00~18:00', 4, 'a:4:{i:0;s:1:\"2\";i:1;s:1:\"7\";i:2;s:2:\"12\";i:3;s:2:\"17\";}');

-- --------------------------------------------------------

--
-- 資料表結構 `posters`
--

CREATE TABLE `posters` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `img` text NOT NULL,
  `sh` int(1) UNSIGNED NOT NULL,
  `rank` int(10) UNSIGNED NOT NULL,
  `ani` int(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `posters`
--

INSERT INTO `posters` (`id`, `name`, `img`, `sh`, `rank`, `ani`) VALUES
(1, '預告片1', '03A01.jpg', 1, 1, 2),
(2, '預告片2', '03A02.jpg', 1, 2, 2),
(3, '預告片3', '03A03.jpg', 1, 3, 2),
(4, '預告片4', '03A04.jpg', 1, 4, 1),
(5, '預告片5', '03A05.jpg', 1, 5, 1),
(6, '預告片6', '03A06.jpg', 1, 6, 3),
(7, '預告片7', '03A07.jpg', 1, 7, 2),
(8, '預告片8', '03A08.jpg', 1, 8, 3),
(9, '預告片9', '03A09.jpg', 1, 9, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `test`
--

CREATE TABLE `test` (
  `id` int(10) UNSIGNED NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `test`
--

INSERT INTO `test` (`id`, `text`) VALUES
(1, '你不好'),
(6, '2'),
(7, '2'),
(8, '2'),
(9, '2'),
(10, '2'),
(11, '2'),
(12, '2'),
(13, '2'),
(14, '2'),
(15, '2'),
(16, '2'),
(17, '2'),
(18, '2'),
(19, '2'),
(20, '2');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `posters`
--
ALTER TABLE `posters`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `posters`
--
ALTER TABLE `posters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `test`
--
ALTER TABLE `test`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
