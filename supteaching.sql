-- phpMyAdmin SQL Dump
-- version 4.5.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 06, 2016 at 09:34 PM
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
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(11) NOT NULL,
  `last_edit_date` int(11) NOT NULL,
  `last_edit_author` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `author`, `content`, `timestamp`, `last_edit_date`, `last_edit_author`) VALUES
(20, 'Bienvenue !', 'Alegzandr', 'Salut &agrave; tous, bienvenue sur le blog fait par mes p\'tites mains, j\'esp&egrave;re qu\'il vous plaira ! Le th&egrave;me &eacute;tait de se moquer des profs un peu mais c\'est relou de cr&eacute;er un compte &agrave; leur place, ils sont grands ils le fe', 1457297072, 1457297072, 'Alegzandr'),
(21, 'Ma biographie', 'Alegzandr', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In non lacinia risus. Etiam viverra sed neque quis bibendum. Mauris eget magna eget risus consequat cursus. Nunc dolor est, maximus at diam sit amet, varius interdum nunc. Vivamus dapibus, nibh vita', 1457297104, 1457297104, 'Alegzandr'),
(22, 'D&eacute;couverte', 'Somewhere', 'Bonjour &agrave; tous les enfants, je d&eacute;couvre actuellement les joies du blog. Je pense que je vais y mettre une note potable, apr&egrave;s tout &ccedil;a se voit qu\'il n\'y a pas 15 ans de PHP derri&egrave;re tout &ccedil;a ...', 1457298439, 1457298439, 'Somewhere'),
(23, 'J\'ai envie d\'&eacute;crire', 'Somewhere', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In non lacinia risus. Etiam viverra sed neque quis bibendum. Mauris eget magna eget risus consequat cursus. Nunc dolor est, maximus at diam sit amet, varius interdum nunc. Vivamus dapibus, nibh vita', 1457298467, 1457298484, 'Somewhere'),
(24, 'Alexandre tu es l&agrave; ?', 'Somewhere', 'Modifie mon article si tu es l&agrave; !\r\n- Julien\r\nOui quoi ?\r\n- Alexandre', 1457298565, 1457298588, 'Alegzandr'),
(25, 'Le texte sur la vie', 'Alegzandr', 'Aenean vitae tellus quis felis tincidunt mattis sit amet nec tellus. Cras ultricies, odio in interdum fringilla, ante turpis laoreet sapien, in consequat lectus tortor ut odio. Aliquam ex leo, viverra quis sodales id, fermentum ac elit. Nulla et ullamcorp', 1457298655, 1457298655, 'Alegzandr'),
(26, 'Il n\'y a pas assez d\'article ...', 'Alegzandr', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In non lacinia risus. Etiam viverra sed neque quis bibendum. Mauris eget magna eget risus consequat cursus. Nunc dolor est, maximus at diam sit amet, varius interdum nunc. Vivamus dapibus, nibh vita', 1457298685, 1457298685, 'Alegzandr'),
(27, 'La poo', 'Somewhere', 'La programmation orient&eacute;e objet (POO), ou programmation par objet, est un paradigme de programmation informatique &eacute;labor&eacute; par les Norv&eacute;giens Ole-Johan Dahl et Kristen Nygaard au d&eacute;but des ann&eacute;es 1960 et poursuivi par les travaux d\'Alan Kay dans les ann&eacute;es 1970. Il consiste en la d&eacute;finition et l\'interaction de briques logicielles appel&eacute;es objets ; un objet repr&eacute;sente un concept, une id&eacute;e ou toute entit&eacute; du monde physique, comme une voiture, une personne ou encore une page d\'un livre. Il poss&egrave;de une structure interne et un comportement, et il sait interagir avec ses pairs. Il s\'agit donc de repr&eacute;senter ces objets et leurs relations ; l\'interaction entre les objets via leurs relations permet de concevoir et r&eacute;aliser les fonctionnalit&eacute;s attendues, de mieux r&eacute;soudre le ou les probl&egrave;mes. D&egrave;s lors, l\'&eacute;tape de mod&eacute;lisation rev&ecirc;t une importance majeure et n&eacute;cessaire pour la POO. C\'est elle qui permet de transcrire les &eacute;l&eacute;ments du r&eacute;el sous forme virtuelle.\r\n\r\nOrthogonalement &agrave; la programmation par objet, afin de faciliter le processus d\'&eacute;laboration d\'un programme, existent des m&eacute;thodologies de d&eacute;veloppement logiciel objet dont la plus connue est USDP (Unified Software Development Process).\r\n\r\nIl est possible de concevoir par objet une application informatique sans pour autant utiliser des outils d&eacute;di&eacute;s. Il n\'en demeure pas moins que ces derniers facilitent de beaucoup la conception, la maintenance, et la productivit&eacute;. On en distingue plusieurs sortes :\r\n\r\nles langages de programmation (Java, C#, VB.NET, Vala, Objective C, Eiffel, Python, Ruby, C++, Ada, PHP, Smalltalk, LOGO, AS3&hellip;) ;\r\nles outils de mod&eacute;lisation qui permettent de concevoir sous forme de sch&eacute;mas semi-formels la structure d\'un programme (Objecteering, UMLDraw, Rhapsody, DBDesigner&hellip;) ;\r\nles bus distribu&eacute;s (DCOM, CORBA, RMI, Pyro&hellip;) ;\r\nles ateliers de g&eacute;nie logiciel ou AGL (Visual Studio pour des langages Dotnet, NetBeans pour le langage Java).\r\nIl existe actuellement deux cat&eacute;gories de langages &agrave; objets : les langages &agrave; classes et ceux &agrave; prototypes, que ceux-ci soient sous forme fonctionnelle (CLOS), imp&eacute;rative (C++, Java) ou les deux (Python, OCaml).', 1457298789, 1457298926, 'Somewhere'),
(28, 'La publi du jour', 'Alegzandr', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In non lacinia risus. Etiam viverra sed neque quis bibendum. Mauris eget magna eget risus consequat cursus. Nunc dolor est, maximus at diam sit amet, varius interdum nunc. Vivamus dapibus, nibh vitae mattis condimentum, lectus ipsum laoreet ligula, eu maximus metus justo id enim. Vivamus blandit porta velit, vel consectetur purus dapibus id. Phasellus vehicula purus imperdiet massa accumsan ullamcorper.\r\n\r\nDuis egestas metus et purus pharetra, non feugiat turpis imperdiet. Cras id pellentesque nibh. Nulla nec mi viverra ex tempor mattis. Phasellus dignissim est et purus iaculis, vel vehicula nisl luctus. Vestibulum bibendum leo nunc, sed feugiat risus elementum vel. Etiam bibendum consectetur ipsum ullamcorper malesuada. Pellentesque lacus massa, convallis at finibus id, semper eget velit. Sed mollis scelerisque ex vitae eleifend. Nam dapibus nunc nec arcu aliquet egestas.\r\n\r\nNunc in rhoncus metus. Integer efficitur a diam vitae condimentum. Donec ultrices, erat a cursus tincidunt, eros nisi imperdiet leo, vel lacinia dui sem et quam. Sed scelerisque dignissim turpis, in ultricies lacus consectetur et. Vivamus dui nunc, gravida nec hendrerit ut, consequat at arcu. Duis finibus egestas felis, at condimentum sem sagittis eu. Aliquam posuere leo at justo sodales imperdiet. Praesent a consequat felis, in lacinia ipsum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam vel sem eget ex euismod venenatis. Donec condimentum varius neque. Donec aliquet, diam quis imperdiet hendrerit, massa felis mollis nibh, vitae molestie neque purus quis neque. Suspendisse arcu nunc, egestas in enim quis, ullamcorper tincidunt nulla. Sed fringilla vel urna vitae pharetra. Pellentesque posuere mi ac erat varius commodo. Proin ac nibh quis leo semper iaculis a id dui.\r\n\r\nDonec sit amet dolor et magna ullamcorper egestas quis ac sapien. Fusce pretium dui sed vulputate volutpat. Nulla varius ligula in risus cursus rutrum. Aliquam erat volutpat. Fusce ultricies pharetra arcu ac vulputate. Quisque hendrerit id lorem vel vulputate. Praesent in ex nunc. Praesent blandit erat eu lacus convallis, nec sollicitudin diam ultricies. Donec auctor lectus quis risus ullamcorper vestibulum. Suspendisse et auctor enim. Nunc volutpat lobortis urna sit amet molestie. Proin sed sapien nibh. Vivamus velit orci, dictum a bibendum quis, molestie id ante. Praesent eget tincidunt nunc. Mauris et tortor nisi. Nulla euismod mi nec luctus luctus.\r\n\r\nAenean vitae tellus quis felis tincidunt mattis sit amet nec tellus. Cras ultricies, odio in interdum fringilla, ante turpis laoreet sapien, in consequat lectus tortor ut odio. Aliquam ex leo, viverra quis sodales id, fermentum ac elit. Nulla et ullamcorper magna, vitae efficitur nisi. Maecenas eget mattis urna. Vivamus suscipit pretium scelerisque. Quisque nec ipsum non nulla viverra ultrices. Quisque vestibulum hendrerit laoreet. Quisque ut dui commodo, placerat magna et, rutrum purus. Morbi feugiat nisi id odio volutpat, ut rutrum sapien convallis. Morbi sed mollis ante. Maecenas vulputate dolor nec ornare dignissim. Duis vitae rutrum tortor. Aliquam a velit fermentum, hendrerit massa fermentum, varius augue. Nunc bibendum, sapien in tincidunt congue, lorem ipsum dictum elit, sit amet facilisis eros ligula sit amet ex.', 1457298976, 1457298976, 'Alegzandr'),
(29, 'On passe au s&eacute;rieux', 'Alegzandr', 'Grosse lecture : Lorem ipsum dolor sit amet, consectetur adipiscing elit. In non lacinia risus. Etiam viverra sed neque quis bibendum. Mauris eget magna eget risus consequat cursus. Nunc dolor est, maximus at diam sit amet, varius interdum nunc. Vivamus dapibus, nibh vitae mattis condimentum, lectus ipsum laoreet ligula, eu maximus metus justo id enim. Vivamus blandit porta velit, vel consectetur purus dapibus id. Phasellus vehicula purus imperdiet massa accumsan ullamcorper.\r\n\r\nDuis egestas metus et purus pharetra, non feugiat turpis imperdiet. Cras id pellentesque nibh. Nulla nec mi viverra ex tempor mattis. Phasellus dignissim est et purus iaculis, vel vehicula nisl luctus. Vestibulum bibendum leo nunc, sed feugiat risus elementum vel. Etiam bibendum consectetur ipsum ullamcorper malesuada. Pellentesque lacus massa, convallis at finibus id, semper eget velit. Sed mollis scelerisque ex vitae eleifend. Nam dapibus nunc nec arcu aliquet egestas.\r\n\r\nNunc in rhoncus metus. Integer efficitur a diam vitae condimentum. Donec ultrices, erat a cursus tincidunt, eros nisi imperdiet leo, vel lacinia dui sem et quam. Sed scelerisque dignissim turpis, in ultricies lacus consectetur et. Vivamus dui nunc, gravida nec hendrerit ut, consequat at arcu. Duis finibus egestas felis, at condimentum sem sagittis eu. Aliquam posuere leo at justo sodales imperdiet. Praesent a consequat felis, in lacinia ipsum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam vel sem eget ex euismod venenatis. Donec condimentum varius neque. Donec aliquet, diam quis imperdiet hendrerit, massa felis mollis nibh, vitae molestie neque purus quis neque. Suspendisse arcu nunc, egestas in enim quis, ullamcorper tincidunt nulla. Sed fringilla vel urna vitae pharetra. Pellentesque posuere mi ac erat varius commodo. Proin ac nibh quis leo semper iaculis a id dui.\r\n\r\nDonec sit amet dolor et magna ullamcorper egestas quis ac sapien. Fusce pretium dui sed vulputate volutpat. Nulla varius ligula in risus cursus rutrum. Aliquam erat volutpat. Fusce ultricies pharetra arcu ac vulputate. Quisque hendrerit id lorem vel vulputate. Praesent in ex nunc. Praesent blandit erat eu lacus convallis, nec sollicitudin diam ultricies. Donec auctor lectus quis risus ullamcorper vestibulum. Suspendisse et auctor enim. Nunc volutpat lobortis urna sit amet molestie. Proin sed sapien nibh. Vivamus velit orci, dictum a bibendum quis, molestie id ante. Praesent eget tincidunt nunc. Mauris et tortor nisi. Nulla euismod mi nec luctus luctus.\r\n\r\nAenean vitae tellus quis felis tincidunt mattis sit amet nec tellus. Cras ultricies, odio in interdum fringilla, ante turpis laoreet sapien, in consequat lectus tortor ut odio. Aliquam ex leo, viverra quis sodales id, fermentum ac elit. Nulla et ullamcorper magna, vitae efficitur nisi. Maecenas eget mattis urna. Vivamus suscipit pretium scelerisque. Quisque nec ipsum non nulla viverra ultrices. Quisque vestibulum hendrerit laoreet. Quisque ut dui commodo, placerat magna et, rutrum purus. Morbi feugiat nisi id odio volutpat, ut rutrum sapien convallis. Morbi sed mollis ante. Maecenas vulputate dolor nec ornare dignissim. Duis vitae rutrum tortor. Aliquam a velit fermentum, hendrerit massa fermentum, varius augue. Nunc bibendum, sapien in tincidunt congue, lorem ipsum dictum elit, sit amet facilisis eros ligula sit amet ex.Lorem ipsum dolor sit amet, consectetur adipiscing elit. In non lacinia risus. Etiam viverra sed neque quis bibendum. Mauris eget magna eget risus consequat cursus. Nunc dolor est, maximus at diam sit amet, varius interdum nunc. Vivamus dapibus, nibh vitae mattis condimentum, lectus ipsum laoreet ligula, eu maximus metus justo id enim. Vivamus blandit porta velit, vel consectetur purus dapibus id. Phasellus vehicula purus imperdiet massa accumsan ullamcorper.\r\n\r\nDuis egestas metus et purus pharetra, non feugiat turpis imperdiet. Cras id pellentesque nibh. Nulla nec mi viverra ex tempor mattis. Phasellus dignissim est et purus iaculis, vel vehicula nisl luctus. Vestibulum bibendum leo nunc, sed feugiat risus elementum vel. Etiam bibendum consectetur ipsum ullamcorper malesuada. Pellentesque lacus massa, convallis at finibus id, semper eget velit. Sed mollis scelerisque ex vitae eleifend. Nam dapibus nunc nec arcu aliquet egestas.\r\n\r\nNunc in rhoncus metus. Integer efficitur a diam vitae condimentum. Donec ultrices, erat a cursus tincidunt, eros nisi imperdiet leo, vel lacinia dui sem et quam. Sed scelerisque dignissim turpis, in ultricies lacus consectetur et. Vivamus dui nunc, gravida nec hendrerit ut, consequat at arcu. Duis finibus egestas felis, at condimentum sem sagittis eu. Aliquam posuere leo at justo sodales imperdiet. Praesent a consequat felis, in lacinia ipsum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam vel sem eget ex euismod venenatis. Donec condimentum varius neque. Donec aliquet, diam quis imperdiet hendrerit, massa felis mollis nibh, vitae molestie neque purus quis neque. Suspendisse arcu nunc, egestas in enim quis, ullamcorper tincidunt nulla. Sed fringilla vel urna vitae pharetra. Pellentesque posuere mi ac erat varius commodo. Proin ac nibh quis leo semper iaculis a id dui.\r\n\r\nDonec sit amet dolor et magna ullamcorper egestas quis ac sapien. Fusce pretium dui sed vulputate volutpat. Nulla varius ligula in risus cursus rutrum. Aliquam erat volutpat. Fusce ultricies pharetra arcu ac vulputate. Quisque hendrerit id lorem vel vulputate. Praesent in ex nunc. Praesent blandit erat eu lacus convallis, nec sollicitudin diam ultricies. Donec auctor lectus quis risus ullamcorper vestibulum. Suspendisse et auctor enim. Nunc volutpat lobortis urna sit amet molestie. Proin sed sapien nibh. Vivamus velit orci, dictum a bibendum quis, molestie id ante. Praesent eget tincidunt nunc. Mauris et tortor nisi. Nulla euismod mi nec luctus luctus.\r\n\r\nAenean vitae tellus quis felis tincidunt mattis sit amet nec tellus. Cras ultricies, odio in interdum fringilla, ante turpis laoreet sapien, in consequat lectus tortor ut odio. Aliquam ex leo, viverra quis sodales id, fermentum ac elit. Nulla et ullamcorper magna, vitae efficitur nisi. Maecenas eget mattis urna. Vivamus suscipit pretium scelerisque. Quisque nec ipsum non nulla viverra ultrices. Quisque vestibulum hendrerit laoreet. Quisque ut dui commodo, placerat magna et, rutrum purus. Morbi feugiat nisi id odio volutpat, ut rutrum sapien convallis. Morbi sed mollis ante. Maecenas vulputate dolor nec ornare dignissim. Duis vitae rutrum tortor. Aliquam a velit fermentum, hendrerit massa fermentum, varius augue. Nunc bibendum, sapien in tincidunt congue, lorem ipsum dictum elit, sit amet facilisis eros ligula sit amet ex.', 1457298998, 1457298998, 'Alegzandr'),
(30, 'Je suis cool hein ?', 'Somewhere', 'Dites oui.', 1457299040, 1457299040, 'Somewhere'),
(31, 'Venez essayer les commentaires !', 'Somewhere', 'Allez soyez pas timides ...', 1457299061, 1457299061, 'Somewhere'),
(32, 'Essayez les commentaires !!', 'Somewhere', 'Soyez pas timides bande de shlags', 1457299091, 1457299091, 'Somewhere');

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
(18, 31, 'Somewhere', 'First', 'First', 1457299305, 1457299305),
(19, 31, 'Somewhere', 'Deuz', 'Deuz', 1457299507, 1457299507);

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
  `permissions` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `mail`, `password`, `timestamp`, `permissions`) VALUES
(19, 'Alegzandr', 'Alexandre', 'Farrenq', 'alexandre.farrenq@supinternet.fr', 'd9a782e0007bdf33c6a6e8c17028cc4e39625d4887fd63eb84f4e4eba69ff3bc', 1456598520, 'superadmin'),
(20, 'Tretiakoff', 'Clara', 'Fourcade', 'clara.fourcade@supinternet.fr', 'c9273eb9f863a49a59e0fe29d323d2ce219f710dda5882cfd4b74d9ace526cfc', 1456598588, 'user'),
(24, 'Somewhere', 'Julien', 'Zamor', 'troisyaourts@4yaourts.fr', '6c07bdaa0c60f92bfdcf4b6d89863a82fdcdb1c00b173a27b3b21b406684923a', 1456672586, 'blogger');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
