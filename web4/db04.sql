-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2025-03-06 09:28:09
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
-- 資料庫： `db04`
--

-- --------------------------------------------------------

--
-- 資料表結構 `class`
--

CREATE TABLE `class` (
  `id` int(10) UNSIGNED NOT NULL,
  `text` text NOT NULL,
  `main_id` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `class`
--

INSERT INTO `class` (`id`, `text`, `main_id`) VALUES
(14, '流行皮件', 0),
(15, '流行鞋區', 0),
(16, '流行飾品', 0),
(17, '背包', 0),
(18, '男用皮件', 14),
(19, '女用皮件', 14),
(21, '少女鞋區', 15),
(22, '紳士流行鞋區', 15),
(23, '時尚手錶', 16),
(24, '時尚珠寶', 16),
(25, '背包', 17);

-- --------------------------------------------------------

--
-- 資料表結構 `good`
--

CREATE TABLE `good` (
  `id` int(10) UNSIGNED NOT NULL,
  `main` int(10) UNSIGNED NOT NULL,
  `sub` int(10) UNSIGNED NOT NULL,
  `no` text NOT NULL,
  `name` text NOT NULL,
  `price` int(10) NOT NULL,
  `size` text NOT NULL,
  `stock` int(10) NOT NULL,
  `img` text NOT NULL,
  `intro` text NOT NULL,
  `sh` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `good`
--

INSERT INTO `good` (`id`, `main`, `sub`, `no`, `name`, `price`, `size`, `stock`, `img`, `intro`, `sh`) VALUES
(1, 14, 18, '990108', '手工訂製長夾', 1200, '全牛皮', 2, '0403.jpg', '手工製作長夾卡片層6*2 鈔票層 *2 零錢拉鍊層 *1 \r\n採用愛馬仕相同的雙針縫法,皮件堅固耐用不脫線 \r\n材質:直革鞣(馬鞍皮)牛皮製作  \r\n手工染色 ', 1),
(4, 14, 18, '980965', '兩用式磁扣腰包', 685, '中型', 18, '0404.jpg', '材質:進口牛皮\r\n顏色:黑色荔枝紋+黑色珠光面皮(黑色縫線)\r\n尺寸:15cm*14cm(高)*6cm(前後)\r\n產地:臺灣', 1),
(5, 14, 18, '591073', '超薄設計男士長款真皮', 800, 'L號', 61, '0405.jpg', '基本:編織皮革對摺長款零錢包\r\n特色:最潮流最時尚的單品 \r\n顏色:黑色珠光面皮(黑色縫線)\r\n形狀:黑白格編織皮革對摺 ', 1),
(6, 15, 21, '549111', '經典牛皮少女帆船鞋', 1000, 'S號', 6, '0406.jpg', '以傳統學院派風格聞名，創始近百年工藝製鞋精神\r\n共用獨家專利氣墊技術，兼具紐約工藝精神，與舒適跑格靈魂', 1),
(7, 15, 22, '531775', '經典優雅時尚流行涼鞋', 2650, 'LL', 8, '0407.jpg', '優雅流線方型楦頭設計，結合簡潔線條綴飾，\r\n獨特的弧度與曲線美，突顯年輕優雅品味，\r\n是年輕上班族不可或缺的鞋款！\r\n全新美國運回，現貨附鞋盒', 1),
(8, 16, 24, '997890', '寵愛天然藍寶女戒', 28000, '1克拉', 1, '0408.jpg', '商品詳細介紹:\r\n◎典雅設計品味款\r\n◎藍寶為珍貴天然寶石之一，具有保值收藏\r\n◎專人設計製造，以貴重珠寶精緻鑲工製造', 1),
(9, 17, 25, '629454', '反折式大容量手提肩背包', 888, 'L號', 15, '0409.jpg', '特色:反折式的包口設計,釘釦的裝飾,讓簡單的包型更增添趣味性\r\n材質:棉布\r\n顏色:藍色\r\n尺寸:長50cm寬20cm高41cm\r\n產地:日本', 1),
(10, 17, 25, '433918', '男單肩包男', 650, '多功能', 7, '0410.jpg', '特色:男單肩包/電腦包/公文包/雙肩背包多用途\r\n材質:帆不\r\n顏色:黑色\r\n尺寸:深11cm寬42cm高33cm\r\n產地:香港\r\n', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `mem`
--

CREATE TABLE `mem` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `acc` text NOT NULL,
  `pw` text NOT NULL,
  `tel` text NOT NULL,
  `address` text NOT NULL,
  `email` text NOT NULL,
  `create_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `mem`
--

INSERT INTO `mem` (`id`, `name`, `acc`, `pw`, `tel`, `address`, `email`, `create_date`) VALUES
(1, 'mem01', 'mem01', 'mem01', '01010101', 'mem01的住址', 'mem01的電子信箱', '2025-03-06');

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
(4, '你', 1),
(5, '你', 1),
(6, '你', 1),
(7, '你', 1),
(8, '你步', 1),
(9, '你步', 1),
(10, '你步', 1),
(12, '你步', 2),
(13, '你', 3),
(14, '你5', 3),
(15, '你5', 3),
(16, '你5', 3),
(17, '你789', 3),
(18, '你789', 3),
(19, '你789', 3),
(20, '你789', 3),
(21, '你789', 3),
(22, '你789', 3),
(23, '你789', 4),
(25, '你789', 4),
(26, '你789', 4);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `good`
--
ALTER TABLE `good`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `mem`
--
ALTER TABLE `mem`
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
-- 使用資料表自動遞增(AUTO_INCREMENT) `class`
--
ALTER TABLE `class`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `good`
--
ALTER TABLE `good`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `mem`
--
ALTER TABLE `mem`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `test`
--
ALTER TABLE `test`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
