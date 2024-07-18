-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2024-07-18 16:29:28
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
-- テーブルの構造 `yoka_yoka`
--

CREATE TABLE `yoka_yoka` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `yoka_yoka`
--

INSERT INTO `yoka_yoka` (`id`, `user_id`, `post_id`, `updated_at`) VALUES
(12, 1, 8, '2024-07-18 22:56:04'),
(14, 1, 3, '2024-07-18 22:56:14'),
(20, 1, 1, '2024-07-18 22:57:36'),
(21, 2, 3, '2024-07-18 22:59:28'),
(22, 2, 5, '2024-07-18 22:59:30'),
(23, 2, 7, '2024-07-18 22:59:31'),
(24, 4, 3, '2024-07-18 23:00:06'),
(25, 4, 9, '2024-07-18 23:00:07'),
(26, 4, 7, '2024-07-18 23:00:09'),
(27, 4, 6, '2024-07-18 23:00:09'),
(29, 1, 4, '2024-07-18 23:17:16'),
(30, 1, 6, '2024-07-18 23:17:17'),
(31, 1, 11, '2024-07-18 23:18:48');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `yoka_yoka`
--
ALTER TABLE `yoka_yoka`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `yoka_yoka`
--
ALTER TABLE `yoka_yoka`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
