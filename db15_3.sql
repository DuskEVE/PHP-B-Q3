-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2024-03-11 08:17:45
-- 伺服器版本： 10.4.28-MariaDB
-- PHP 版本： 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `db15_3`
--

-- --------------------------------------------------------

--
-- 資料表結構 `booking`
--

CREATE TABLE `booking` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `movie_id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `time` text NOT NULL,
  `seat` text NOT NULL,
  `count` int(2) UNSIGNED NOT NULL,
  `no` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `booking`
--

INSERT INTO `booking` (`id`, `name`, `movie_id`, `date`, `time`, `seat`, `count`, `no`) VALUES
(6, '院線片05', 9, '2024-03-12', '14:00-16:00', '1-3', 1, '202403110006');

-- --------------------------------------------------------

--
-- 資料表結構 `level`
--

CREATE TABLE `level` (
  `id` int(2) UNSIGNED NOT NULL,
  `text` text NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `level`
--

INSERT INTO `level` (`id`, `text`, `img`) VALUES
(1, '普遍級', '03C01.png'),
(2, '保護級', '03C02.png'),
(3, '輔導級', '03C03.png'),
(4, '限制級', '03C04.png');

-- --------------------------------------------------------

--
-- 資料表結構 `movie`
--

CREATE TABLE `movie` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `level` int(2) UNSIGNED NOT NULL,
  `length` text NOT NULL,
  `date` date NOT NULL,
  `publish` text NOT NULL,
  `director` text NOT NULL,
  `movie` text NOT NULL,
  `poster` text NOT NULL,
  `intro` text NOT NULL,
  `display` int(1) UNSIGNED NOT NULL,
  `no` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `movie`
--

INSERT INTO `movie` (`id`, `name`, `level`, `length`, `date`, `publish`, `director`, `movie`, `poster`, `intro`, `display`, `no`) VALUES
(1, '院線片01', 3, '1:25', '2024-03-10', '發行商01', '導演01', '03B01v.mp4', '03B01.png', '院線片介紹01院線片介紹01院線片介紹01院線片介紹01院線片介紹01院線片介紹01院線片介紹01院線片介紹01院線片介紹01院線片介紹01院線片介紹01院線片介紹01院線片介紹01院線片介紹01院線片介紹01院線片介紹01院線片介紹01院線片介紹01', 0, 1),
(2, '院線片02', 1, '1:35', '2024-03-10', '發行商02', '導演02', '03B02v.mp4', '03B02.png', '院線片介紹02', 1, 3),
(3, '院線片03', 2, '1:35', '2024-03-11', '發行商03', '導演03', '03B03v.mp4', '03B03.png', '院線片介紹03', 0, 2),
(4, '院線片04', 3, '1:30', '2024-03-09', '發行商04', '導演04', '03B04v.mp4', '03B04.png', '院線片介紹04', 1, 4),
(9, '院線片05', 2, '1:35', '2024-03-10', '發行商05', '導演05', '03B05v.mp4', '03B05.png', '院線片介紹05', 1, 5),
(10, '院線片06', 2, '1:35', '2024-03-11', '發行商06', '導演06', '03B06v.mp4', '03B06.png', '院線片介紹06', 1, 6),
(11, '院線片07', 2, '1:35', '2024-03-09', '發行商07', '導演07', '03B07v.mp4', '03B07.png', '院線片介紹07', 1, 7);

-- --------------------------------------------------------

--
-- 資料表結構 `poster`
--

CREATE TABLE `poster` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `img` text NOT NULL,
  `no` int(10) UNSIGNED NOT NULL,
  `display` int(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `poster`
--

INSERT INTO `poster` (`id`, `name`, `img`, `no`, `display`) VALUES
(1, '預告片01', '03A01.jpg', 1, 1),
(2, '預告片02', '03A02.jpg', 2, 1),
(3, '預告片03', '03A03.jpg', 3, 1),
(4, '預告片04', '03A04.jpg', 4, 1),
(5, '預告片05', '03A05.jpg', 5, 1),
(6, '預告片06', '03A06.jpg', 6, 1),
(7, '預告片07', '03A07.jpg', 7, 1),
(8, '預告片08', '03A08.jpg', 8, 1);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

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
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `level`
--
ALTER TABLE `level`
  MODIFY `id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `poster`
--
ALTER TABLE `poster`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
