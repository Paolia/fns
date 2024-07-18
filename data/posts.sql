-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2024-07-18 16:29:52
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
-- テーブルの構造 `posts`
--

CREATE TABLE `posts` (
  `id` int(12) NOT NULL,
  `name` varchar(128) NOT NULL,
  `headline` varchar(16) NOT NULL,
  `post_content` varchar(256) NOT NULL,
  `pic_link` varchar(128) NOT NULL,
  `posted_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `posts`
--

INSERT INTO `posts` (`id`, `name`, `headline`, `post_content`, `pic_link`, `posted_at`, `updated_at`, `deleted`) VALUES
(1, 'Tamio', '最初の投稿', 'まずは生SQLのチェック。', '', '2024-07-18 13:48:06', '2024-07-18 13:48:06', 0),
(3, 'Anna', 'あんなの投稿', 'おもちにも投稿させます。', '', '2024-07-18 13:56:16', '2024-07-18 13:56:16', 0),
(4, 'Tamio', '不満たらたら愚痴ブリブリ', '今の会社の愚痴を言い出したらきりがない', '', '2024-07-18 18:17:27', '2024-07-18 18:17:27', 0),
(5, 'Anna', 'パパもママも', '私が何もやってないわけないじゃない。黙っててよ。', '', '2024-07-18 18:19:01', '2024-07-18 18:19:01', 0),
(7, 'Tamio', 'ただいまトイレ', '大便だっふんだ', '', '2024-07-18 21:25:29', '2024-07-18 22:07:03', 0),
(8, 'Tamio', 'ただいまトイレ', '汚いこと書かないの！', '', '2024-07-18 21:26:16', '2024-07-18 23:19:11', 0),
(9, 'Tamio', 'ただいま排便中', 'ブリブリびりびり', '', '2024-07-18 21:27:07', '2024-07-18 21:27:07', 0),
(10, 'Tamio', 'ウコン', '臭くないよ', '', '2024-07-18 21:29:35', '2024-07-18 21:29:35', 0),
(11, 'Tamio', '課題できた！', '頑張ったよ！でも提出方法がわからん。', '', '2024-07-18 23:18:44', '2024-07-18 23:18:44', 0);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
