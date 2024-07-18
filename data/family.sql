-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2024-07-18 16:30:07
-- サーバのバージョン： 10.4.32-MariaDB
-- PHP のバージョン: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `kuratomi_fns`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `family`
--

CREATE TABLE `family` (
  `id` int(2) NOT NULL,
  `name` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `suspended` tinyint(1) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `last_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `family`
--

INSERT INTO `family` (`id`, `name`, `password`, `admin`, `suspended`, `created_at`, `last_updated`) VALUES
(1, 'Tamio', '$2y$10$c9GOVV9buf3EWTKfkwwVROKDS/ZExaIYw4jGh3ArTm5FN.2IrjRBi', 1, 0, '2024-07-18 11:30:17', '2024-07-18 11:30:17'),
(2, 'Olha', '$2y$10$FvRc2jlHcJidVJz09XY./OWAut.RqpdjK5jcJx/osmc9zjXk0RAD6', 1, 0, '2024-07-18 11:30:42', '2024-07-18 11:30:42'),
(3, 'Mariya', '$2y$10$sVb4NOz/KBX6Y3CLNi79HuUS6rdl/0/u1gFx.Way0c7LWG.M5LmzS', 0, 1, '2024-07-18 11:31:07', '2024-07-18 11:31:07'),
(4, 'Anna', '$2y$10$HWWDmxrbbX96NuYOzUkxrelABC66U3JeqmQEq5jgoBA9aMFpsIT1u', 0, 0, '2024-07-18 11:31:31', '2024-07-18 11:31:31'),
(6, 'ハム吉', '$2y$10$jKbu/VRpE2zfCLv98JsNE.xG0b1jxbB/186LQDD8dRe2HDdgyijdq', 0, 0, '2024-07-18 23:19:43', '2024-07-18 23:19:43');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `family`
--
ALTER TABLE `family`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `family`
--
ALTER TABLE `family`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
