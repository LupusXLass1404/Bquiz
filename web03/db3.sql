-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2025-03-05 07:20:05
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
-- 資料庫： `db3`
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
  `trailer` text NOT NULL,
  `poster` text NOT NULL,
  `intro` text NOT NULL,
  `rank` int(10) UNSIGNED NOT NULL,
  `sh` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `movie`
--

INSERT INTO `movie` (`id`, `name`, `rating`, `length`, `ondate`, `publish`, `director`, `trailer`, `poster`, `intro`, `rank`, `sh`) VALUES
(1, '院線片01', 1, 300, '2025-03-04', '發行商01', '導演01', '03B01v.mp4', '03B01.png', '院線片01院線片01院線片01\r\n院線片01', 0, 1),
(2, '院線片02', 2, 120, '2025-03-03', '發行商02', '導演02', '03B02v.mp4', '03B02.png', '劇情簡介02劇情簡介02劇情簡介02劇情簡介02劇情簡介02劇情簡介02劇情簡介02劇情簡介02劇情簡介02劇情簡介02劇情簡介02劇情簡介02劇情簡介02劇情簡介02\r\n劇情簡介02劇情簡介02', 2, 1),
(9, '院線片03', 3, 150, '2025-03-05', '發行商03', '導演03', '03B03v.mp4', '03B03.png', '發行商03發行商03發行商03發行商03', 3, 1),
(10, '院線片04', 4, 30, '2025-03-02', '發行商04', '導演04', '03B04v.mp4', '03B04.png', '院線片04院線片04院線片04院線片04', 4, 1),
(11, '院線片05', 1, 240, '2025-03-02', '發行商05', '導演05', '03B05v.mp4', '03B05.png', '發行商05發行商05發行商05', 5, 1),
(12, '院線片06', 2, 120, '2025-03-02', '發行商06', '導演06', '03B06v.mp4', '03B06.png', '發行商06發行導演06導演06導演06導演06導演06導演06商06發行商06', 6, 1),
(13, '院線片07', 3, 540, '2025-03-02', '發行商07', '導演07', '03B15v.mp4', '03B15.png', '導演0發行商07發院線片07行商07發行商07發行商077導演07\r\n\r\n院線片07院線片07院線片07', 7, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `poster`
--

CREATE TABLE `poster` (
  `id` int(10) UNSIGNED NOT NULL,
  `img` text NOT NULL,
  `name` text NOT NULL,
  `rank` int(10) UNSIGNED NOT NULL,
  `sh` int(1) UNSIGNED NOT NULL DEFAULT 1,
  `ani` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `poster`
--

INSERT INTO `poster` (`id`, `img`, `name`, `rank`, `sh`, `ani`) VALUES
(1, '03A01.jpg', '預告片1', 1, 1, 2),
(6, '03A02.jpg', '預告片2', 2, 1, 2),
(7, '03A03.jpg', '預告片3', 7, 1, 2),
(8, '03A04.jpg', '預告片4', 8, 1, 1),
(9, '03A05.jpg', '預告片5', 9, 1, 2),
(10, '03A06.jpg', '預告片6', 10, 1, 3),
(11, '03A07.jpg', '預告片7', 11, 1, 1),
(12, '03A08.jpg', '預告片8', 13, 1, 2),
(13, '03A09.jpg', '預告片9', 12, 1, 3);

-- --------------------------------------------------------

--
-- 資料表結構 `ticket`
--

CREATE TABLE `ticket` (
  `id` int(10) UNSIGNED NOT NULL,
  `movie` int(10) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `no` text NOT NULL,
  `date` date NOT NULL,
  `session` text NOT NULL,
  `seat` text NOT NULL,
  `qt` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `ticket`
--

INSERT INTO `ticket` (`id`, `movie`, `name`, `no`, `date`, `session`, `seat`, `qt`) VALUES
(4, 9, '院線片03', '202503050004', '2025-03-05', '14:00~16:00', 'a:4:{i:0;s:1:\"4\";i:1;s:1:\"3\";i:2;s:1:\"7\";i:3;s:2:\"11\";}', 4);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `poster`
--
ALTER TABLE `poster`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `poster`
--
ALTER TABLE `poster`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
