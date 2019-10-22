-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2019-10-22 03:23:22
-- 伺服器版本： 10.3.16-MariaDB
-- PHP 版本： 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `megboard`
--

-- --------------------------------------------------------

--
-- 資料表結構 `jing_meg`
--

CREATE TABLE `jing_meg` (
  `id` int(11) NOT NULL,
  `nickname` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `jing_meg`
--

INSERT INTO `jing_meg` (`id`, `nickname`, `comment`, `created_at`) VALUES
(1, 'John', '我沒有有去動物園', '2019-10-18 06:10:01'),
(2, 'Jing', '這是一本書', '2019-10-18 06:19:30'),
(3, 'Jing', '這不是一本書', '2019-10-18 06:19:30'),
(4, 'Peter', '貓在鋼琴上昏倒了', '2019-10-18 06:19:30'),
(5, 'John', '我沒有去動物園', '2019-10-18 07:35:38'),
(6, 'Peter', '你醒醒吧，你根本沒有去動物園', '2019-10-18 08:00:38'),
(7, 'John', '我有去動物園', '2019-10-21 05:46:41'),
(8, 'aaa', '有動物園嗎', '2019-10-21 06:38:55'),
(9, 'Jing', '我有兩本書', '2019-10-21 07:24:03'),
(10, 'Jing', '你又不是魚，怎知魚快樂？', '2019-10-22 01:06:04');

-- --------------------------------------------------------

--
-- 資料表結構 `jing_user`
--

CREATE TABLE `jing_user` (
  `uid` int(10) NOT NULL,
  `username` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nickname` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `jing_user`
--

INSERT INTO `jing_user` (`uid`, `username`, `nickname`, `password`) VALUES
(1, '陳小明', 'John', '12345'),
(2, '王小華', 'Peter', '54321'),
(3, '葉小芳', 'Fang', '12345'),
(4, '陳小雯', 'Jing', '12345'),
(5, 'aaa', 'aaa', 'aaa');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `jing_meg`
--
ALTER TABLE `jing_meg`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `jing_user`
--
ALTER TABLE `jing_user`
  ADD PRIMARY KEY (`uid`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `jing_meg`
--
ALTER TABLE `jing_meg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `jing_user`
--
ALTER TABLE `jing_user`
  MODIFY `uid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
