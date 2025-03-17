-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2025-03-17 09:30:37
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
-- 資料庫： `db33`
--

-- --------------------------------------------------------

--
-- 資料表結構 `movie`
--

CREATE TABLE `movie` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `rating` int(1) UNSIGNED NOT NULL,
  `length` int(10) UNSIGNED NOT NULL,
  `ondate` date NOT NULL,
  `publish` text NOT NULL,
  `director` text NOT NULL,
  `poster` text NOT NULL,
  `trailer` text NOT NULL,
  `intro` text NOT NULL,
  `sh` int(1) UNSIGNED NOT NULL DEFAULT 1,
  `rank` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `movie`
--

INSERT INTO `movie` (`id`, `name`, `rating`, `length`, `ondate`, `publish`, `director`, `poster`, `trailer`, `intro`, `sh`, `rank`) VALUES
(1, '院線片01', 1, 300, '2025-03-17', '發行商01', '導演01', '03B01.png', '03B01v.mp4', '劇情介紹01劇情介紹01劇情介紹01劇情介紹01劇情介紹01劇情介紹01', 1, 2),
(2, '院線片02', 2, 270, '2025-03-15', '發行商02', '導演02', '03B02.png', '03B02v.mp4', '劇情介紹01劇情介紹01劇情介紹01劇情介紹01劇情介紹01劇情介紹01', 1, 1),
(3, '院線片03', 3, 200, '2025-03-16', '發行商03', '導演03', '03B03.png', '03B03v.mp4', '院線片03院線片03院線片03院線片03院線片03', 1, 3),
(4, '院線片04', 4, 60, '2025-03-15', '發行商04', '導演04', '03B04.png', '03B04v.mp4', '院線片04院線片04院線片04', 1, 4),
(5, '院線片05', 1, 70, '2025-03-16', '發行商05', '導演05', '03B05.png', '03B05v.mp4', '院線片05院線片05院線片05院線片05\r\n院線片05院線片05', 1, 5),
(6, '院線片06', 2, 240, '2025-03-15', '發行商06', '導演06', '03B06.png', '03B06v.mp4', '院線片06院線片06院線片06院線片06院線片06院線片06院線片06院線片06院線片06院線片06院線片06院線片06\r\n院線片06院線片06', 1, 6),
(7, '院線片07', 4, 360, '2025-03-17', '發行商07', '導演07', '03B07.png', '03B07v.mp4', '院線片07院線片07院線片07', 1, 7);

-- --------------------------------------------------------

--
-- 資料表結構 `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `movie` text NOT NULL,
  `date` text NOT NULL,
  `session` text NOT NULL,
  `seat` text NOT NULL,
  `no` text NOT NULL,
  `qt` int(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `orders`
--

INSERT INTO `orders` (`id`, `movie`, `date`, `session`, `seat`, `no`, `qt`) VALUES
(1, '院線片01', '2025-03-17', '18:00~20:00', 'a:4:{i:0;s:1:\"4\";i:1;s:1:\"9\";i:2;s:2:\"13\";i:3;s:2:\"18\";}', '202503170001', 4),
(2, '院線片02', '2025-03-17', '18:00~20:00', 'a:4:{i:0;s:1:\"4\";i:1;s:1:\"9\";i:2;s:2:\"14\";i:3;s:2:\"19\";}', '202503170002', 4),
(3, '院線片02', '2025-03-17', '22:00~24:00', 'a:4:{i:0;s:1:\"8\";i:1;s:1:\"7\";i:2;s:1:\"6\";i:3;s:1:\"5\";}', '202503170003', 4),
(4, '院線片02', '2025-03-17', '18:00~20:00', 'a:4:{i:0;s:1:\"0\";i:1;s:1:\"5\";i:2;s:2:\"10\";i:3;s:2:\"15\";}', '202503170004', 4),
(5, '院線片02', '2025-03-17', '18:00~20:00', 'a:2:{i:0;s:1:\"7\";i:1;s:1:\"3\";}', '202503170005', 2);

-- --------------------------------------------------------

--
-- 資料表結構 `poster`
--

CREATE TABLE `poster` (
  `id` int(10) UNSIGNED NOT NULL,
  `poster` text NOT NULL,
  `name` text NOT NULL,
  `ani` int(1) UNSIGNED NOT NULL DEFAULT 1,
  `rank` int(10) UNSIGNED NOT NULL,
  `sh` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `poster`
--

INSERT INTO `poster` (`id`, `poster`, `name`, `ani`, `rank`, `sh`) VALUES
(1, '03A01.jpg', '預告片1', 1, 1, 1),
(2, '03A02.jpg', '預告片2', 2, 2, 1),
(3, '03A03.jpg', '預告片3', 3, 3, 1),
(4, '03A04.jpg', '預告片4', 1, 4, 1),
(5, '03A05.jpg', '預告片5', 2, 5, 1),
(6, '03A06.jpg', '預告片6', 1, 7, 1),
(7, '03A07.jpg', '預告片7', 2, 8, 1),
(8, '03A08.jpg', '預告片8', 3, 6, 1),
(9, '03A09.jpg', '預告片9', 3, 9, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `test`
--

CREATE TABLE `test` (
  `id` int(10) UNSIGNED NOT NULL,
  `text` text NOT NULL,
  `sh` int(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `test`
--

INSERT INTO `test` (`id`, `text`, `sh`) VALUES
(1, '你', 1),
(2, '你', 1),
(3, '你', 1),
(4, '你不', 1),
(5, '你不', 1),
(7, '你不', 2);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `poster`
--
ALTER TABLE `poster`
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
-- 使用資料表自動遞增(AUTO_INCREMENT) `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `poster`
--
ALTER TABLE `poster`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `test`
--
ALTER TABLE `test`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
