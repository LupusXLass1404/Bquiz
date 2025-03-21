-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2025-03-12 09:26:37
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
-- 資料庫： `db20`
--

-- --------------------------------------------------------

--
-- 資料表結構 `log`
--

CREATE TABLE `log` (
  `id` int(10) UNSIGNED NOT NULL,
  `user` text NOT NULL,
  `news` int(19) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `log`
--

INSERT INTO `log` (`id`, `user`, `news`) VALUES
(20, 'mem01', 9),
(21, 'mem01', 10),
(22, 'mem01', 11),
(23, 'mem01', 2),
(24, 'admin', 2),
(25, 'admin', 12);

-- --------------------------------------------------------

--
-- 資料表結構 `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `news` text NOT NULL,
  `type` int(1) UNSIGNED NOT NULL,
  `likes` int(10) UNSIGNED NOT NULL,
  `sh` int(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `news`
--

INSERT INTO `news` (`id`, `title`, `news`, `type`, `likes`, `sh`) VALUES
(1, '缺乏運動已成為影響全球死亡率的第四大危險因子-國人無規律運動之比率高達72.2%（一）', '資料來源： 行政院衛生署國民健康局 \r\n發佈日期： 2012 / 10 / 07\r\n世界衛生組織指出運動不足已成全球第四大致死因素，每年有6%的死亡率與運動不足有關，僅次於高血壓（13％）、菸品使用（9％）及高血糖（6％）之後，有超過200萬死亡人數可歸因於靜態生活。世界上約60-85％的成人過著靜態生活，三分之二的兒童運動不足，未來都將影響健康並造成公共衛生問題。運動不足除了增加死亡率，還會使心血管疾病、糖尿病、肥胖的風險加倍，並增加大腸癌、高血壓、骨質疏鬆、脂質失調症（lipid disorders）、憂鬱、焦慮的風險。大約21-25％乳癌及大腸癌、27%糖尿病與30％的缺血性心臟病，係因運動不足所造成。許多國家運動不足的人口比率，也正不斷地增加，依據行政院體育委員會2011年運動城巿調查結果顯示，國人無規律運動習慣之比率高達72.2%。\r\n我國十大死因的危險因子皆與運動不足有關，運動的好處很多，可以預防慢性疾病，降低罹患癌症、跌倒的風險等。國家衛生研究院溫啟邦教授利用台灣一個大型的追蹤世代，分析各個不同運動量的健康效益。研究發現，與不運動的人相比，每天運動15分鐘(每週約90分鐘)是可以減少14%總死亡、10%癌症死亡及20%的心血管疾病死亡，延長3年壽命。這些好處不但適用於各個年齡層包括年青人、年老人，也適用於男性與女性，對有心血管疾病風險的人包括吸菸、肥胖者，也一樣有用。\r\n國民健康局鼓勵民眾養成規律運動習慣，對於預防心血管疾病、糖尿病、高血脂以及高血壓等，都有顯著的效益，並可降低罹患癌症的風險，加速代謝脂肪，強化肌肉組織與功能，維持健康體重，提高腦內啡的釋放，降低情緒壓力。一般而言，成人只要每週運動累積達150分鐘、兒童每日運動累積60分鐘，就能有足夠的運動量，建議成人每天運動30分鐘，可分段累積運動量，效果與一次做完一樣。例如上下班(學)通勤時間與中午休息時間分段進行，每次15分鐘分2次或是每次10分鐘分3次完成，只要每天持之以恆，健康體能就會大大地提昇。\r\n許多上班族時常抱怨沒時間或空間運動，國民健康局製作15分鐘「上班族健康操」，不受場地、服裝的限制，每天上、下午各跳15分鐘健康操，可消耗100大卡的熱量，持續1年，約可減少4公斤，不但消耗過多熱量，還能促進身體健康。國民健康局為幫助同仁達到規律運動，運用電腦提示系統，於每天上午9時45分及下午3時45分，電腦螢幕會自動跳出「上班族健康操」畫面，鼓勵同仁暫時放下手邊的工作，隨著音樂一起動一動。\r\n對於沒有運動習的民眾，「健走」也是很好的入門運動，衛生署國民健康局自91年起推動「每日一萬步 健康有保固」，「健走」是既簡單又輕鬆的運動，不需特殊裝備，只要穿著輕便服裝、運動鞋，運用「抬頭挺胸縮小腹、雙手微握放腰部、自然擺動肩放鬆、邁開腳步向前行」健走小口訣，以4公里/小時的速度，日行萬步，只要90分鐘，步行約6公里，就可以消耗約300大卡，走向健康。\r\n國民健康局並介紹運動生活化之小撇步，協助民眾落實生活化的運動。\r\n1. 從日常生活中找出時間來活動，例如：步行買午、晚餐、水果、日用品；步行去用餐；蹓狗。\r\n2. 外出或是上下班(學)不妨多多利用大眾運輸工具，讓自己提早出門提前一站下車，步行至目的地。\r\n3. 可以走樓梯就不要坐電梯，如果一下子沒辦法走這麼多樓梯，步行走上幾層樓後再搭乘電梯，慢慢增加自己的運動量。\r\n4. 多和家人到戶外活動，或騎腳踏車、打球等活動。\r\n5. 假日可以自己動手整理家裡、擦擦地板，也可以增加運動量!或利用掃地、拖地時加大動作幅度，那也是很好的身體活動。\r\n6. 在家裡、辦公室附近找方便的資源運動，包括公園、職場辦的課程、活動。\r\n7. 減少看電視、打電玩等靜態生活的時間。\r\n    民眾對運動如有疑問，可參考國民健康局肥胖防治網-「快樂動」(http://obesity.bhp.gov.tw)，亦可撥打免費市話健康體重管理電話諮詢服務，諮詢專線「0800-367-100（0800-瘦落去-要動動）」，也可利用國民健康局局網首頁或肥胖防治網問題諮詢專區的網路電話撥入功能，向客服人員諮詢關於運動、健康飲食及健康體重管理等相關疑問。', 1, 0, 0),
(2, '缺乏運動已成為影響全球死亡率的第四大危險因子-國人無規律運動之比率高達72.2%（二）', '資料來源： 行政院衛生署國民健康局 \r\n發佈日期： 2012 / 10 / 07\r\n世界衛生組織指出運動不足已成全球第四大致死因素，每年有6%的死亡率與運動不足有關，僅次於高血壓（13％）、菸品使用（9％）及高血糖（6％）之後，有超過200萬死亡人數可歸因於靜態生活。世界上約60-85％的成人過著靜態生活，三分之二的兒童運動不足，未來都將影響健康並造成公共衛生問題。運動不足除了增加死亡率，還會使心血管疾病、糖尿病、肥胖的風險加倍，並增加大腸癌、高血壓、骨質疏鬆、脂質失調症（lipid disorders）、憂鬱、焦慮的風險。大約21-25％乳癌及大腸癌、27%糖尿病與30％的缺血性心臟病，係因運動不足所造成。許多國家運動不足的人口比率，也正不斷地增加，依據行政院體育委員會2011年運動城巿調查結果顯示，國人無規律運動習慣之比率高達72.2%。\r\n我國十大死因的危險因子皆與運動不足有關，運動的好處很多，可以預防慢性疾病，降低罹患癌症、跌倒的風險等。國家衛生研究院溫啟邦教授利用台灣一個大型的追蹤世代，分析各個不同運動量的健康效益。研究發現，與不運動的人相比，每天運動15分鐘(每週約90分鐘)是可以減少14%總死亡、10%癌症死亡及20%的心血管疾病死亡，延長3年壽命。這些好處不但適用於各個年齡層包括年青人、年老人，也適用於男性與女性，對有心血管疾病風險的人包括吸菸、肥胖者，也一樣有用。\r\n國民健康局鼓勵民眾養成規律運動習慣，對於預防心血管疾病、糖尿病、高血脂以及高血壓等，都有顯著的效益，並可降低罹患癌症的風險，加速代謝脂肪，強化肌肉組織與功能，維持健康體重，提高腦內啡的釋放，降低情緒壓力。一般而言，成人只要每週運動累積達150分鐘、兒童每日運動累積60分鐘，就能有足夠的運動量，建議成人每天運動30分鐘，可分段累積運動量，效果與一次做完一樣。例如上下班(學)通勤時間與中午休息時間分段進行，每次15分鐘分2次或是每次10分鐘分3次完成，只要每天持之以恆，健康體能就會大大地提昇。\r\n許多上班族時常抱怨沒時間或空間運動，國民健康局製作15分鐘「上班族健康操」，不受場地、服裝的限制，每天上、下午各跳15分鐘健康操，可消耗100大卡的熱量，持續1年，約可減少4公斤，不但消耗過多熱量，還能促進身體健康。國民健康局為幫助同仁達到規律運動，運用電腦提示系統，於每天上午9時45分及下午3時45分，電腦螢幕會自動跳出「上班族健康操」畫面，鼓勵同仁暫時放下手邊的工作，隨著音樂一起動一動。\r\n對於沒有運動習的民眾，「健走」也是很好的入門運動，衛生署國民健康局自91年起推動「每日一萬步 健康有保固」，「健走」是既簡單又輕鬆的運動，不需特殊裝備，只要穿著輕便服裝、運動鞋，運用「抬頭挺胸縮小腹、雙手微握放腰部、自然擺動肩放鬆、邁開腳步向前行」健走小口訣，以4公里/小時的速度，日行萬步，只要90分鐘，步行約6公里，就可以消耗約300大卡，走向健康。\r\n國民健康局並介紹運動生活化之小撇步，協助民眾落實生活化的運動。\r\n1. 從日常生活中找出時間來活動，例如：步行買午、晚餐、水果、日用品；步行去用餐；蹓狗。\r\n2. 外出或是上下班(學)不妨多多利用大眾運輸工具，讓自己提早出門提前一站下車，步行至目的地。\r\n3. 可以走樓梯就不要坐電梯，如果一下子沒辦法走這麼多樓梯，步行走上幾層樓後再搭乘電梯，慢慢增加自己的運動量。\r\n4. 多和家人到戶外活動，或騎腳踏車、打球等活動。\r\n5. 假日可以自己動手整理家裡、擦擦地板，也可以增加運動量!或利用掃地、拖地時加大動作幅度，那也是很好的身體活動。\r\n6. 在家裡、辦公室附近找方便的資源運動，包括公園、職場辦的課程、活動。\r\n7. 減少看電視、打電玩等靜態生活的時間。\r\n    民眾對運動如有疑問，可參考國民健康局肥胖防治網-「快樂動」(http://obesity.bhp.gov.tw)，亦可撥打免費市話健康體重管理電話諮詢服務，諮詢專線「0800-367-100（0800-瘦落去-要動動）」，也可利用國民健康局局網首頁或肥胖防治網問題諮詢專區的網路電話撥入功能，向客服人員諮詢關於運動、健康飲食及健康體重管理等相關疑問。', 1, 2, 1),
(9, '資料（一）', '資料內容UwU', 2, 1, 1),
(10, '資料（二）', '資料內容UwU', 2, 1, 1),
(11, '資料（三）', '這是第三條資料的內容～！', 3, 1, 1),
(12, '資料（四）', '這是第四條資料的內容～！', 4, 1, 1),
(13, '資料（五）', '這是第五條資料的內容。', 1, 0, 1),
(14, '資料（六）', '這是第六條資料的內容，標題有點長～！', 2, 0, 1),
(15, '資料（七）', '這是第七條資料的內容，適合類型3的資料～！', 3, 0, 1),
(16, '資料（八）', '這是第八條資料的內容，適合類型4的資料。', 4, 0, 1),
(17, '資料（九）', '這是第九條資料的內容，屬於類型1。', 1, 0, 1),
(18, '資料（十）', '這是第十條資料，描述了其他重要資訊。', 2, 0, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `que`
--

CREATE TABLE `que` (
  `id` int(10) UNSIGNED NOT NULL,
  `text` text NOT NULL,
  `main_id` int(10) UNSIGNED NOT NULL,
  `vote` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `que`
--

INSERT INTO `que` (`id`, `text`, `main_id`, `vote`) VALUES
(13, '問題一：你最常做什麼運動來促進健康體能呢?', 0, 0),
(14, '1.健走或爬樓梯、慢跑等較不受時間、場地限制的運動。', 13, 0),
(15, '2.仰臥起坐、抬腿及伏地挺身、伸展操、瑜珈等室內運動。', 13, 0),
(16, '3.球類運動、游泳、跳舞、騎腳踏車等加強心肺功能的運動。', 13, 0),
(17, '4.舉重鍛鍊、彈力帶、啞鈴等運用輔助器材鍛鍊肌耐力的運動。', 13, 0),
(19, '二手菸沒有安全劑量，只要有暴露，就會有危險，請問它會造成身體上哪些危害?', 0, 2),
(20, ' 1.增加罹患冠狀動脈心臟病及罹病死亡之風險。', 19, 1),
(21, '2.對孩子的的健康會產生許多影響，例如容易咳嗽或打噴嚏、罹患氣喘或讓症狀更嚴重、會因刺激耳咽管，感染中耳炎、肺功能較差、容易罹患呼吸道疾病等。', 19, 0),
(22, '3.孕婦吸入二手菸易造成流產、早產、胎盤早期剝離、子宮感染等疾病。', 19, 0),
(23, '4.長期的暴露會造成更嚴重的胸腔問題和過敏症，還會增加心臟病和肺癌的罹患率。', 19, 0),
(24, '5.以上皆是。', 19, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `total`
--

CREATE TABLE `total` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `total` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `total`
--

INSERT INTO `total` (`id`, `date`, `total`) VALUES
(1, '2024-12-30', 5),
(2, '2024-12-31', 2),
(3, '2025-01-02', 1),
(4, '2025-01-03', 1),
(5, '2025-01-09', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `acc` text NOT NULL,
  `pw` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`id`, `acc`, `pw`, `email`) VALUES
(2, 'admin', '1234', 'admin@labor.gov.tw'),
(3, 'test', '5678', 'test@labor.gov.tw'),
(4, 'mem01', 'mem01', 'mem01@labor.gov.tw'),
(5, 'mem02', 'mem02', 'mem02@labor.gov.tw');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `que`
--
ALTER TABLE `que`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `total`
--
ALTER TABLE `total`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `log`
--
ALTER TABLE `log`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `que`
--
ALTER TABLE `que`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `total`
--
ALTER TABLE `total`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
