-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2025-02-27 09:33:03
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
-- 資料庫： `db03`
--

-- --------------------------------------------------------

--
-- 資料表結構 `movie`
--

CREATE TABLE `movie` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `rating` int(1) UNSIGNED NOT NULL,
  `lenght` int(10) UNSIGNED NOT NULL,
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

INSERT INTO `movie` (`id`, `name`, `rating`, `lenght`, `ondate`, `publish`, `director`, `trailer`, `poster`, `intro`, `rank`, `sh`) VALUES
(1, '院線片01', 1, 50, '2025-02-26', '院線片01的發行商', '院線片01的導演', '03B01v.mp4', '03B01.png', '院線片01的劇情簡介的劇情簡介的劇情簡介的劇情簡介\r\n的劇情簡介的劇情簡介的劇情簡介的劇情簡介的劇情簡介的劇情簡介的劇情簡介的劇情簡介的劇情簡介的劇情簡介的劇情簡介的劇情簡介的劇情簡介的劇情簡介的劇情簡介的劇情簡介的劇情簡介的劇情簡介', 3, 1),
(2, '院線片02', 2, 300, '2025-02-27', '發行商02', '導演02', '03B02v.mp4', '03B02.png', '發行商02發行商02發行商02發行商02發行商02發行商02發行商02發行商02發行商02發行商02', 2, 1),
(4, '院線片03', 3, 240, '2025-02-25', '發行商03', '導演03', '03B03v.mp4', '03B03.png', '導演03導演03導演03導演03導演03導演03導演03', 1, 1),
(5, '院線片04', 4, 540, '2025-02-26', '發行商04', '導演04', '03B04v.mp4', '03B04.png', '發行商04發行商04發行商04發行商04發行商04發行商04發行商04發行商04發行商04\r\n發行商04發行商04\r\n發行商04發行商04發行商04\r\n發行商04發行商04', 4, 1),
(6, '院線片05', 1, 120, '2025-02-26', '發行商05', '導演05', '03B05v.mp4', '03B05.png', '院線片05院線片05院線片05院線片05院線片05院線片05院線片05院線片05院線片05院線片05\r\n院線片05院線片05', 5, 1),
(7, '院線片06', 4, 220, '2025-02-26', '發行商06', '導演06', '03B06v.mp4', '03B06.png', '院線片06院線片06發行商06發行商06發行商06', 6, 1),
(8, '院線片07', 3, 20, '2025-02-26', '發行商07', '導演07', '03B10v.mp4', '03B10.png', '院線發行商07發行商07導演07導演07片07院線片07院線片07', 7, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `ticket`
--

CREATE TABLE `ticket` (
  `id` int(10) UNSIGNED NOT NULL,
  `movie` text NOT NULL,
  `date` date NOT NULL,
  `seat` text NOT NULL,
  `no` text NOT NULL,
  `qt` int(1) UNSIGNED NOT NULL,
  `schedule` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `ticket`
--

INSERT INTO `ticket` (`id`, `movie`, `date`, `seat`, `no`, `qt`, `schedule`) VALUES
(5, '院線片04', '2025-02-27', 'a:4:{i:0;s:1:\"4\";i:1;s:1:\"9\";i:2;s:2:\"14\";i:3;s:2:\"19\";}', '202502270005', 4, '18:00~20:00');

-- --------------------------------------------------------

--
-- 資料表結構 `trailer`
--

CREATE TABLE `trailer` (
  `id` int(10) UNSIGNED NOT NULL,
  `img` text NOT NULL,
  `name` text NOT NULL,
  `ami` int(1) UNSIGNED NOT NULL DEFAULT 1,
  `rank` int(10) UNSIGNED NOT NULL,
  `sh` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `trailer`
--

INSERT INTO `trailer` (`id`, `img`, `name`, `ami`, `rank`, `sh`) VALUES
(1, '03A01.jpg', '預告片1', 1, 2, 0),
(2, '03A02.jpg', '預告片2', 2, 1, 1),
(3, '03A03.jpg', '預告片3', 1, 4, 1),
(4, '03A04.jpg', '預告片4', 3, 3, 1),
(5, '03A05.jpg', '預告片5', 1, 5, 1),
(6, '03A06.jpg', '預告片6', 2, 7, 1),
(7, '03A07.jpg', '預告片7', 1, 7, 1),
(8, '03A08.jpg', '預告片8', 2, 8, 1),
(9, '03A09.jpg', '預告片9', 3, 10, 1);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `trailer`
--
ALTER TABLE `trailer`
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
-- 使用資料表自動遞增(AUTO_INCREMENT) `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `trailer`
--
ALTER TABLE `trailer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
