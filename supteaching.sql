-- phpMyAdmin SQL Dump
-- version 4.5.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 05, 2016 at 11:37 PM
-- Server version: 10.1.12-MariaDB
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `supteaching`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(11) NOT NULL,
  `last_edit_date` int(11) NOT NULL,
  `last_edit_author` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `author`, `content`, `timestamp`, `last_edit_date`, `last_edit_author`) VALUES
(1, 'Test', 'Alegzandr', 'Premier article', 1457133365, 1457133365, 'Alegzandr'),
(2, 'Deuxi&egrave;me test', 'Alegzandr', 'lorem coin coin coin', 1457133560, 1457133560, 'Alegzandr'),
(3, 'Test trois', 'Alegzandr', 'bksj,dzopcjls,isklcjsqpickl;qjcpoikqs;jcpqsikc,qspck,qscqs', 1457133985, 1457133985, 'Alegzandr'),
(4, 'Again', 'Alegzandr', 'cc', 1457134223, 1457134223, 'Alegzandr'),
(5, 'C\'est bon', 'Alegzandr', 'Ca devrait marcher', 1457134459, 1457134459, 'Alegzandr'),
(6, 'Coucou c\'est ju', 'Somewhere', 'Le php c\'est toute ma vieLe php c\'est toute ma vieLe php c\'est toute ma vieLe php c\'est toute ma vieLe php c\'est toute ma vieLe php c\'est toute ma vieLe php c\'est toute ma vieLe php c\'est toute ma vie', 1457141099, 1457141099, 'Somewhere'),
(7, 'Zefefzefze', 'Somewhere', 'fezfezfezfzefezf', 1457143885, 1457143885, 'Somewhere'),
(8, 'Azeazeazeaz', 'Somewhere', 'ezaeazgf z  qrs erfbvervetvs', 1457143909, 1457143909, 'Somewhere'),
(9, 'Azeazeazeazezrzer', 'Somewhere', 'ezaeazgf z  qrs erfbvervetvs', 1457143914, 1457143914, 'Somewhere'),
(10, 'Az', 'Somewhere', 'ezaeazgf z  qrs erfbvervetvs', 1457143919, 1457143919, 'Somewhere'),
(11, 'Azc  az ', 'Somewhere', 'ezaeazgf z  qrs erfbvervetvs', 1457143923, 1457143923, 'Somewhere'),
(12, 'Lorem i', 'Somewhere', 'ezaeazgf z  qrs erfbvervetvs', 1457143930, 1457143930, 'Somewhere'),
(13, 'Lorem ip', 'Somewhere', 'ezaeazgf z  qrs erfbvervetvs', 1457143933, 1457143933, 'Somewhere'),
(14, 'Lorem ipsuuuum', 'Somewhere', 'ezaeazgf z  qrs erfbvervetvs', 1457143937, 1457143937, 'Somewhere'),
(15, 'Lorem ipsuuuumok', 'Somewhere', 'ezaeazgf z  qrs erfbvervetvs okokok', 1457143941, 1457143941, 'Somewhere'),
(16, 'Coucou', 'Somewhere', 'MOI c\'est toi', 1457143954, 1457143954, 'Somewhere'),
(17, 'Coucou2', 'Somewhere', 'je test deux trois trucs', 1457143963, 1457143963, 'Somewhere'),
(18, 'Coucou2bla', 'Somewhere', 'BLABLALBALLBALLBAL', 1457143968, 1457143968, 'Somewhere'),
(19, 'De retour', 'Alegzandr', '&Ccedil;a fait d&eacute;j&agrave; pas mal d\'articles !', 1457156371, 1457156371, 'Alegzandr');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `edited_content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(11) NOT NULL,
  `edit_timestamp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `article_id`, `author`, `content`, `edited_content`, `timestamp`, `edit_timestamp`) VALUES
(2, 19, 'Alegzandr', 'Coucou c\'est moi', 'Coucou c\'est moi', 1457185782, 1457185782),
(3, 19, 'Alegzandr', 'qdsqd', 'qdsqd', 1457197519, 1457197519),
(4, 19, 'Alegzandr', 'qdsqdqsdqsdqsd', 'qdsqdqsdqsdqsd', 1457197520, 1457197520),
(5, 19, 'Alegzandr', 'qdsqdqsdqsdqsdqsdqsdqsdqsdqsdqs', 'qdsqdqsdqsdqsdqsdqsdqsdqsdqsdqs', 1457197521, 1457197521),
(6, 19, 'Alegzandr', 'xwwcwccwxc', 'xwwcwccwxc', 1457197524, 1457197524),
(7, 19, 'Alegzandr', 'qsdqdsqsdqsdqsd', 'qsdqdsqsdqsdqsd', 1457197526, 1457197526),
(8, 19, 'Alegzandr', 'wxcwxcwxcwxc', 'wxcwxcwxcwxc', 1457197529, 1457197529),
(9, 19, 'Alegzandr', 'qsdqdqdsqdqsdsqdq', 'qsdqdqdsqdqsdsqdq', 1457197531, 1457197531),
(10, 19, 'Alegzandr', 'WWWWW', 'WWWWW', 1457197540, 1457197540),
(11, 19, 'Alegzandr', 'hihiihihihihiih', 'hihiihihihihiih', 1457197543, 1457197543),
(12, 19, 'Alegzandr', 'LOL', 'LOL', 1457197547, 1457197547),
(13, 19, 'Alegzandr', 'HIHIHIHIHIHIH', 'HIHIHIHIHIHIH', 1457197555, 1457197555),
(14, 19, 'Alegzandr', 'regarde', 'regarde', 1457197558, 1457197558),
(15, 19, 'Alegzandr', 'ici', 'ici', 1457197566, 1457197566),
(16, 19, 'Alegzandr', 'test', 'test', 1457197873, 1457197873),
(17, 19, 'Somewhere', 'salut', 'salut', 1457207249, 1457207249);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(11) NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `permissions` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `mail`, `password`, `timestamp`, `avatar`, `permissions`) VALUES
(19, 'Alegzandr', 'Alexandre', 'Farrenq', 'alexandre.farrenq@supinternet.fr', 'd9a782e0007bdf33c6a6e8c17028cc4e39625d4887fd63eb84f4e4eba69ff3bc', 1456598520, 'default.jpg', 'superadmin'),
(20, 'Tretiakoff', 'Clara', 'Fourcade', 'clara.fourcade@supinternet.fr', 'c9273eb9f863a49a59e0fe29d323d2ce219f710dda5882cfd4b74d9ace526cfc', 1456598588, 'default.jpg', 'user'),
(24, 'Somewhere', 'Julien', 'Zamor', 'troisyaourts@4yaourts.fr', '6c07bdaa0c60f92bfdcf4b6d89863a82fdcdb1c00b173a27b3b21b406684923a', 1456672586, 'default.jpg', 'blogger'),
(25, 'Testuser', 'Test', 'User', 'test@test.fr', 'f9ab610d43d8282c9518e6116e2a492f0f9c39afb4f2d61b90c10d98a1b4c434', 1457120983, 'default.jpg', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `email` (`mail`),
  ADD KEY `id_2` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
