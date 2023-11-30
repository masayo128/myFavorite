-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2023-11-30 06:10:53
-- サーバのバージョン： 10.4.28-MariaDB
-- PHP のバージョン: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `mountain`
--
CREATE DATABASE IF NOT EXISTS `mountain` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `mountain`;

-- --------------------------------------------------------

--
-- テーブルの構造 `form_list`
--

CREATE TABLE `form_list` (
  `id` int(11) NOT NULL,
  `name` varchar(15) DEFAULT NULL,
  `address` varchar(30) DEFAULT NULL,
  `tel` varchar(15) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `comment` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `form_list`
--

INSERT INTO `form_list` (`id`, `name`, `address`, `tel`, `email`, `comment`) VALUES
(1, 'nakano', '大阪市中央区', '12345678901', 'dfsfd@sdfa', ''),
(3, 'ｆｄｓ', '大阪府富田林市', '0905907539', 'kokjlk@h', 'ddd'),
(6, 'nakano', '大阪市中央区', '090590', 'dfsfd@sdfa', ''),
(8, 'nakano', '大阪市中央区', '', '', ''),
(10, 'nakano', '大阪市中央区', '12345678901', 'kokjlk@huih', 'fdsdfsfsdfs'),
(11, 'nakano', '大阪市中央区', '12345678901', 'dfsfd@sdfa', 'ffff'),
(12, 'nakano', '大阪府富田林市', '12345678901', 'kokjlk@huih', 'fffff'),
(15, 'nakano', '大阪市中央区', NULL, NULL, NULL),
(20, '仲野', '大阪府富田林市', NULL, NULL, NULL),
(21, '仲野', '大阪府富田林市', NULL, NULL, NULL),
(22, 'nakano', '大阪市中央区', '0905907539', 'kokjlk@huih', '2222'),
(23, 'masamasa', '富田林市東板持町', '12345678901', 'mamama@mamam', '123344444'),
(24, 'nakano', '大阪市中央区', '12345678901', 'kokjlk@huih', 'ggg'),
(25, 'nakano ', '大阪市中央区', '09012222222', 'dfsfd@sdfa', '99999999999999999');

-- --------------------------------------------------------

--
-- テーブルの構造 `ranking`
--

CREATE TABLE `ranking` (
  `rank` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `height` int(10) NOT NULL,
  `comment` text NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `ranking`
--

INSERT INTO `ranking` (`rank`, `name`, `height`, `comment`, `img`) VALUES
(1, '槍ヶ岳', 3180, '日本で５番目に高い山', 'img/yari.jpg'),
(2, '燕岳', 2763, '奇岩が多く、イルカ岩などがあります', 'img/tubakuro.jpg'),
(3, '黒部五郎岳', 2897, '北アルプスの中でも最奥部', 'img/kurobe.jpg');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `form_list`
--
ALTER TABLE `form_list`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `form_list`
--
ALTER TABLE `form_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
