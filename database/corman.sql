-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2018 at 03:31 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `corman`
--

-- --------------------------------------------------------

--
-- Table structure for table `affiliations`
--

CREATE TABLE `affiliations` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `affiliations`
--

INSERT INTO `affiliations` (`id`, `name`, `link`, `created_at`, `updated_at`) VALUES
(1, 'University of Alabama', 'https://www.ua.edu', '2018-02-13 13:32:12', '2018-02-13 13:32:12'),
(2, 'University of California', 'http://www.berkeley.edu', '2018-02-13 13:32:12', '2018-02-13 13:32:12'),
(3, 'Yale University', 'https://www.yale.edu', '2018-02-13 13:32:12', '2018-02-13 13:32:12'),
(4, 'Massachusetts Institute of Technology', 'http://web.mit.edu', '2018-02-13 13:32:12', '2018-02-13 13:32:12'),
(5, 'Università degli Studi di Foggia', 'https://www.unifg.it', '2018-02-13 13:32:12', '2018-02-13 13:32:12'),
(6, 'Università Commerciale Bocconi Milano', 'https://www.unibocconi.it/wps/wcm/connect/Bocconi/SitoPubblico_IT/Albero+di+navigazione/Home/', '2018-02-13 13:32:12', '2018-02-13 13:32:12'),
(7, 'Università degli Studi di Bari', 'http://www.uniba.it', '2018-02-13 13:32:12', '2018-02-13 13:32:12'),
(8, 'Università degli Studi del Salento', 'https://www.unisalento.it/web/guest/home_page', '2018-02-13 13:32:12', '2018-02-13 13:32:12'),
(9, 'Università degli Studi di Catania', 'http://www.unict.it', '2018-02-13 13:32:12', '2018-02-13 13:32:12'),
(10, 'Università degli Studi di Roma Tor Vergata', 'https://web.uniroma2.it', '2018-02-13 13:32:12', '2018-02-13 13:32:12'),
(11, 'Università degli Studi di Parma', 'http://www.unipr.it', '2018-02-13 13:32:12', '2018-02-13 13:32:12'),
(12, 'University of Copenhagen', 'http://www.ku.dk/english/', '2018-02-13 13:32:12', '2018-02-13 13:32:12'),
(13, 'Harvard University', 'https://www.harvard.edu', '2018-02-13 13:32:13', '2018-02-13 13:32:13'),
(14, 'University of Cambridge', 'https://www.cam.ac.uk', '2018-02-13 13:32:13', '2018-02-13 13:32:13'),
(15, 'Università di Tokio', 'http://www.thejapanesedreams.com/universita-imperiale-di-tokyo/', '2018-02-13 13:32:13', '2018-02-13 13:32:13'),
(16, 'University of Toronto', 'https://www.utoronto.ca', '2018-02-13 13:32:13', '2018-02-13 13:32:13'),
(17, 'University of Munich', 'https://www.en.uni-muenchen.de/index.html', '2018-02-13 13:32:13', '2018-02-13 13:32:13'),
(18, 'Utrecht University', 'https://www.uu.nl/en', '2018-02-13 13:32:13', '2018-02-13 13:32:13'),
(19, 'University of Zurich', 'https://www.uzh.ch/en.html', '2018-02-13 13:32:13', '2018-02-13 13:32:13'),
(20, 'University of Bristol', 'http://www.bristol.ac.uk', '2018-02-13 13:32:13', '2018-02-13 13:32:13'),
(21, 'Università di Ginevra', 'https://www.unige.ch', '2018-02-13 13:32:13', '2018-02-13 13:32:13'),
(22, 'University of Helsinki', 'https://www.helsinki.fi/en', '2018-02-13 13:32:13', '2018-02-13 13:32:13'),
(23, 'Osaka University', 'http://www.osaka-u.ac.jp/en', '2018-02-13 13:32:13', '2018-02-13 13:32:13');

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Paolo Buono', 1, '2018-02-13 13:34:13', '2018-02-13 13:34:13'),
(2, 'Carmelo Ardito', NULL, '2018-02-13 13:34:23', '2018-02-13 13:34:23'),
(3, 'Giuseppe Desolda', NULL, '2018-02-13 13:34:23', '2018-02-13 13:34:23'),
(4, 'Maristella Matera', NULL, '2018-02-13 13:34:24', '2018-02-13 13:34:24'),
(5, 'Maria Francesca Costabile', NULL, '2018-02-13 13:34:24', '2018-02-13 13:34:24'),
(6, 'Roger Waters', 2, '2018-02-13 13:41:17', '2018-02-13 13:41:17'),
(7, 'David Gilmour', 3, '2018-02-13 13:42:56', '2018-02-13 13:42:56'),
(8, 'Richard Wright', 4, '2018-02-13 13:44:44', '2018-02-13 13:44:44'),
(9, 'Nick Mason', 5, '2018-02-13 13:46:44', '2018-02-13 13:46:44'),
(10, 'Aaa Aaa', 6, '2018-04-06 09:39:42', '2018-04-06 09:39:42'),
(11, 'Michelangelo Campanella', 6, '2018-04-13 10:53:59', '2018-04-13 10:53:59');

-- --------------------------------------------------------

--
-- Table structure for table `author_publication`
--

CREATE TABLE `author_publication` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(10) UNSIGNED NOT NULL,
  `publication_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `author_publication`
--

INSERT INTO `author_publication` (`id`, `author_id`, `publication_id`) VALUES
(1, 2, 1),
(2, 1, 1),
(3, 3, 1),
(4, 4, 1),
(5, 2, 2),
(6, 5, 2),
(7, 3, 2),
(8, 4, 2),
(9, 1, 2),
(10, 1, 3),
(11, 1, 4),
(12, 9, 5),
(13, 6, 5),
(14, 7, 5),
(15, 8, 5),
(16, 9, 6),
(17, 6, 6),
(18, 7, 6),
(19, 9, 7),
(20, 6, 7),
(21, 8, 7),
(22, 7, 8),
(23, 8, 8),
(24, 9, 8),
(25, 6, 9),
(26, 8, 10),
(27, 7, 10);

-- --------------------------------------------------------

--
-- Table structure for table `conferences`
--

CREATE TABLE `conferences` (
  `publication_id` int(10) UNSIGNED NOT NULL,
  `abstract` text COLLATE utf8_unicode_ci,
  `pages` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `days` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `doi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ee` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `conferences`
--

INSERT INTO `conferences` (`publication_id`, `abstract`, `pages`, `days`, `key`, `doi`, `ee`, `url`, `created_at`, `updated_at`) VALUES
(1, NULL, '327-328', NULL, 'conf/um/ArditoBDM17', '10.1145/3099023.3099089', 'http://doi.acm.org/10.1145/3099023.3099089', 'http://dblp.org/rec/conf/um/ArditoBDM17', '2018-02-13 13:34:23', '2018-02-13 13:34:23'),
(2, NULL, '115-126', NULL, 'conf/avi/ArditoCDMB16', '10.1007/978-3-319-50070-6_9', 'https://doi.org/10.1007/978-3-319-50070-6_9', 'http://dblp.org/rec/conf/avi/ArditoCDMB16', '2018-02-13 13:34:24', '2018-02-13 13:34:24'),
(3, NULL, '348-349', NULL, 'conf/avi/Buono16', '10.1145/2909132.2926091', 'http://doi.acm.org/10.1145/2909132.2926091', 'http://dblp.org/rec/conf/avi/Buono16', '2018-02-13 13:34:24', '2018-02-13 13:34:24'),
(4, NULL, '210-659', NULL, 'conf/dms/Buono16', '10.18293/DMS2016-040', 'https://doi.org/10.18293/DMS2016-040', 'http://dblp.org/rec/conf/dms/Buono16', '2018-02-13 13:34:24', '2018-02-13 13:34:24'),
(6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-02-13 13:56:01', '2018-02-13 13:56:01'),
(9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-02-13 14:05:01', '2018-02-13 14:05:01'),
(10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-02-13 14:08:45', '2018-02-13 14:08:45');

-- --------------------------------------------------------

--
-- Table structure for table `conversation`
--

CREATE TABLE `conversation` (
  `id` int(10) NOT NULL,
  `user_one` int(10) NOT NULL,
  `user_two` int(10) NOT NULL,
  `last_messages` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conversation`
--

INSERT INTO `conversation` (`id`, `user_one`, `user_two`, `last_messages`) VALUES
(783, 2, 4, '2018-04-27 12:55:03'),
(784, 4, 2, '2018-04-27 12:55:03'),
(785, 2, 3, '2018-04-27 12:55:57'),
(786, 3, 2, '2018-04-27 12:55:57'),
(825, 6, 3, '2018-04-28 09:32:08'),
(826, 3, 6, '2018-04-28 09:32:08'),
(837, 5, 4, '2018-04-28 09:44:46'),
(838, 4, 5, '2018-04-28 09:44:46'),
(853, 1, 4, '2018-04-28 09:59:09'),
(854, 4, 1, '2018-04-28 09:59:09'),
(897, 6, 4, '2018-04-28 11:09:40'),
(898, 4, 6, '2018-04-28 11:09:40'),
(907, 6, 2, '2018-04-28 11:15:05'),
(908, 2, 6, '2018-04-28 11:15:05'),
(909, 6, 5, '2018-04-28 11:16:03'),
(910, 5, 6, '2018-04-28 11:16:03'),
(913, 1, 6, '2018-05-02 09:17:17'),
(914, 6, 1, '2018-05-02 09:17:17'),
(917, 1, 5, '2018-05-02 09:20:02'),
(918, 5, 1, '2018-05-02 09:20:02'),
(921, 3, 1, '2018-05-03 16:08:06'),
(922, 1, 3, '2018-05-03 16:08:06'),
(923, 3, 5, '2018-05-07 10:53:23'),
(924, 5, 3, '2018-05-07 10:53:23');

-- --------------------------------------------------------

--
-- Table structure for table `editorships`
--

CREATE TABLE `editorships` (
  `publication_id` int(10) UNSIGNED NOT NULL,
  `abstract` text COLLATE utf8_unicode_ci,
  `volume` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `publisher` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `doi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ee` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `editorships`
--

INSERT INTO `editorships` (`publication_id`, `abstract`, `volume`, `publisher`, `key`, `doi`, `ee`, `url`, `created_at`, `updated_at`) VALUES
(7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-02-13 13:57:52', '2018-02-13 13:57:52');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subscribers_count` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `description` text COLLATE utf8_unicode_ci,
  `picture_path` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `public` enum('public','private') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'public',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `subscribers_count`, `description`, `picture_path`, `public`, `created_at`, `updated_at`) VALUES
(1, 'UX Bari', 1, 'this is the first group about UX in Bari', 'images/groups/8c199ba437465f903788829512406cf3.jpg', 'public', '2018-02-13 13:38:13', '2018-02-13 13:38:40'),
(2, 'The dark side of the moon', 1, 'breathe, breathe in the air!', 'images/groups/9450582a1eb645bc7ee8bbdc6cb4a631.jpg', 'public', '2018-02-13 13:59:15', '2018-02-13 13:59:15'),
(3, 'Animals', 1, 'ahaaa charade you are!', 'images/groups/9bb6c89af9bd4467a7740421d0779ccd.jpeg', 'public', '2018-02-13 14:03:50', '2018-02-13 14:03:50');

-- --------------------------------------------------------

--
-- Table structure for table `journals`
--

CREATE TABLE `journals` (
  `publication_id` int(10) UNSIGNED NOT NULL,
  `abstract` text COLLATE utf8_unicode_ci,
  `volume` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pages` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `doi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ee` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `journals`
--

INSERT INTO `journals` (`publication_id`, `abstract`, `volume`, `number`, `pages`, `key`, `doi`, `ee`, `url`, `created_at`, `updated_at`) VALUES
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-02-13 13:50:11', '2018-02-13 13:50:11'),
(8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-02-13 14:02:02', '2018-02-13 14:02:02');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user_from` int(10) NOT NULL,
  `user_to` int(10) NOT NULL,
  `msg` text CHARACTER SET utf8 COLLATE utf8_latvian_ci,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL,
  `attachment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_from`, `user_to`, `msg`, `date`, `status`, `attachment`) VALUES
(217, 6, 3, 'Ciao david, sono Michelangelo, quello nuovo.', NULL, 1, NULL),
(218, 6, 5, 'Ehi caro, tutto bene', NULL, 1, NULL),
(219, 6, 3, 'Ehi caro', NULL, 1, NULL),
(220, 6, 5, 'Ciao nick', NULL, 1, NULL),
(221, 6, 3, 'Ehi carissimo', NULL, 1, NULL),
(222, 6, 3, 'Davidinooo', NULL, 1, NULL),
(223, 5, 6, 'Ciao michelangelo', NULL, 1, NULL),
(224, 5, 1, 'Ehi ciao paolo!', NULL, 1, NULL),
(225, 1, 5, 'Ciao nick!', NULL, 1, NULL),
(226, 5, 6, 'Ehi michelangelo', NULL, 1, NULL),
(227, 6, 5, 'Ciao Mason, oggi suoni', NULL, 1, NULL),
(228, 5, 6, 'No oggi rimango a casa mik', NULL, 1, NULL),
(229, 6, 5, 'Perch?', NULL, 1, NULL),
(230, 5, 6, 'Cosi per sapere', NULL, 1, NULL),
(231, 6, 5, 'Come vuoi tu', NULL, 1, NULL),
(232, 3, 2, 'Ciao rogers, come stai', NULL, 1, NULL),
(233, 3, 2, 'Sei online', NULL, 1, NULL),
(234, 3, 2, 'Che stai facendo', NULL, 1, NULL),
(235, 6, 2, 'Ti stanno cercando', NULL, 1, NULL),
(236, 2, 6, 'Ciao caro', NULL, 1, NULL),
(237, 6, 2, 'Come stai', NULL, 1, NULL),
(238, 2, 6, 'Bene tu', NULL, 1, NULL),
(248, 5, 6, 'Mi ascolti', NULL, 1, NULL),
(249, 6, 3, 'Ci sei amico', NULL, 1, NULL),
(250, 3, 6, 'Mi sono appena collegato', NULL, 1, NULL),
(251, 3, 6, 'Tu che stai facendo', NULL, 1, NULL),
(252, 3, 6, 'Sono online', NULL, 1, NULL),
(256, 3, 6, 'Pensami', NULL, 1, NULL),
(257, 6, 3, 'Ciao david', NULL, 1, NULL),
(258, 6, 3, 'Ci sei', NULL, 1, NULL),
(259, 3, 6, 'Si sono qui michelangelo', NULL, 1, NULL),
(260, 6, 2, 'Anche io bene', NULL, 1, NULL),
(261, 6, 5, 'Ora non posso nick', NULL, 1, NULL),
(262, 5, 6, 'Ehi ciao caro', NULL, 1, NULL),
(263, 5, 6, 'Ti sto aspettando', NULL, 1, NULL),
(264, 6, 3, 'Ciao', NULL, 1, NULL),
(265, 6, 5, 'Ehi nick', NULL, 1, NULL),
(266, 6, 5, 'Ciao nick', NULL, 1, NULL),
(267, 6, 5, 'Ehi caro', NULL, 1, NULL),
(268, 5, 6, 'Ciao michelangelo', NULL, 1, NULL),
(269, 6, 5, 'Ciao mason', NULL, 1, NULL),
(270, 6, 3, 'david', NULL, 1, NULL),
(271, 6, 5, 'Ciao nick', NULL, 1, NULL),
(272, 6, 3, 'Ehi', NULL, 1, NULL),
(273, 6, 5, 'Mi senti', NULL, 1, NULL),
(274, 6, 2, 'Ehi roger', NULL, 1, NULL),
(275, 5, 1, 'Ehi paolo', NULL, 1, NULL),
(276, 1, 5, 'Ciao michelangelo', NULL, 1, NULL),
(277, 6, 5, 'Prova', NULL, 1, NULL),
(278, 5, 1, 'Ciao paolo', NULL, 1, NULL),
(279, 5, 6, 'Ehi nick', NULL, 1, NULL),
(280, 6, 5, 'Ehi nick', NULL, 1, NULL),
(281, 5, 6, 'Ehi', NULL, 1, NULL),
(282, 6, 5, 'Ciao nick', NULL, 1, NULL),
(283, 5, 6, 'Ciao mik', NULL, 1, NULL),
(284, 6, 3, 'David', NULL, 1, NULL),
(285, 6, 2, 'roger', NULL, 1, NULL),
(286, 6, 5, 'Cosa fai oggi nick mason', NULL, 1, NULL),
(287, 5, 1, 'Ci sei', NULL, 1, NULL),
(288, 5, 6, 'Niente tu', NULL, 1, NULL),
(289, 6, 5, 'Nulla di interessante', NULL, 1, NULL),
(290, 5, 6, 'Lo stesso per me', NULL, 1, NULL),
(291, 6, 5, 'Veramente nick', NULL, 1, NULL),
(292, 5, 6, 'E\' proprio cos?', NULL, 1, NULL),
(293, 6, 5, 'Funziona bene questa chat', NULL, 1, NULL),
(294, 5, 1, 'Non ti vedo', NULL, 1, NULL),
(295, 5, 6, 'Abbastanza, ha un solo problema', NULL, 1, NULL),
(296, 1, 5, 'Anche io', NULL, 1, NULL),
(297, 4, 6, 'Ciao michelangelo sono richard', NULL, 1, NULL),
(298, 4, 5, 'Ehi nick, questo il primo messaggio per te', NULL, 1, NULL),
(299, 4, 1, 'Come stai paolino', NULL, 1, NULL),
(300, 4, 2, 'Ehi roger', NULL, 1, NULL),
(301, 4, 2, 'Sei online, ti vedo', NULL, 1, NULL),
(302, 4, 6, 'Che stai facendo', NULL, 1, NULL),
(303, 4, 5, 'Non riesci a leggerlo forse', NULL, 1, NULL),
(304, 6, 5, 'Problema di che tipo', NULL, 1, NULL),
(305, 6, 4, 'Nulla per ora', NULL, 1, NULL),
(306, 4, 6, 'Sicuro', NULL, 1, NULL),
(307, 5, 1, 'Cosa', NULL, 1, NULL),
(308, 5, 4, 'Non ci posso credere', NULL, 1, NULL),
(309, 6, 4, 'Ciao richard', NULL, 1, NULL),
(310, 6, 5, 'Ci sei nick', NULL, 1, NULL),
(311, 4, 5, 'Ciao nick', NULL, 1, NULL),
(312, 6, 4, 'Ora sono online', NULL, 1, NULL),
(313, 6, 5, 'Ehi caro', NULL, 1, NULL),
(314, 6, 4, 'Prova', NULL, 1, NULL),
(315, 6, 2, 'Ehi ci sei', NULL, 1, NULL),
(316, 6, 3, 'Ciao david', NULL, 1, NULL),
(317, 6, 5, 'Nick', NULL, 1, NULL),
(318, 5, 6, 'Ciao michelangelo', NULL, 1, NULL),
(319, 5, 4, 'Ciao richard', NULL, 1, NULL),
(320, 5, 1, 'mi ascolti', NULL, 1, NULL),
(321, 5, 4, 'Ci sei', NULL, 1, NULL),
(322, 5, 4, 'Non mi sembra', NULL, 1, NULL),
(323, 5, 6, 'Ehi caro', NULL, 1, NULL),
(324, 5, 4, 'Ciao richard...', NULL, 1, NULL),
(325, 6, 4, 'Richard', NULL, 1, NULL),
(326, 6, 2, 'prova', '2018-04-17 18:26:21', 1, NULL),
(327, 6, 4, 'verifica orario messaggio', '2018-04-17 18:26:57', 1, NULL),
(328, 6, 3, 'ciao', '2018-04-17 18:30:26', 1, NULL),
(329, 6, 4, 'verifica ora', '2018-04-17 18:33:10', 1, NULL),
(330, 6, 5, 'Vediamo', '2018-04-17 18:34:33', 1, NULL),
(331, 6, 3, 'prova generale', '2018-04-17 18:39:25', 1, NULL),
(332, 6, 3, 'eeee', '2018-04-17 18:40:03', 1, NULL),
(333, 6, 3, 'yyy', '2018-04-17 18:41:44', 1, NULL),
(334, 6, 4, 'eeee', '2018-04-17 18:43:38', 1, NULL),
(335, 6, 4, 'brbrbr', '2018-04-17 18:44:05', 1, NULL),
(336, 6, 2, 'brwnwrn', '2018-04-17 18:44:21', 1, NULL),
(337, 6, 5, 'oplaeee', '2018-04-17 18:55:56', 1, NULL),
(338, 6, 4, 'bwrnwr', '2018-04-17 18:56:50', 1, NULL),
(339, 6, 3, 'fnsnw', '2018-04-17 18:56:56', 1, NULL),
(340, 6, 5, 'GUGBU', '2018-04-17 18:58:04', 1, NULL),
(341, 1, 5, 'Ciao nick', '2018-04-17 19:00:18', 1, NULL),
(342, 5, 4, 'Sono nick', '2018-04-17 19:02:03', 1, NULL),
(343, 4, 2, 'Scusami roger', '2018-04-17 19:02:26', 1, NULL),
(344, 4, 1, 'Ehi paolo', '2018-04-17 19:02:33', 1, NULL),
(345, 4, 6, 'Ero offline', '2018-04-17 19:02:45', 1, NULL),
(346, 4, 5, 'Weee', '2018-04-17 19:04:20', 1, NULL),
(347, 4, 6, '228', '2018-04-17 19:04:58', 1, NULL),
(348, 6, 5, 'SSSveb', '2018-04-17 19:07:04', 1, NULL),
(349, 3, 2, 'Rispondi', '2018-04-17 19:07:33', 1, NULL),
(350, 3, 6, 'Prova', '2018-04-17 19:08:16', 1, NULL),
(351, 5, 6, 'Ciao mik', '2018-04-17 19:10:38', 1, NULL),
(352, 5, 4, 'Nuooo', '2018-04-17 19:10:45', 1, NULL),
(353, 5, 3, 'ehi david', '2018-04-17 19:20:55', 1, NULL),
(354, 5, 1, 'Ehi paolo!', '2018-04-17 19:27:28', 1, NULL),
(355, 6, 3, 'Dimmi', '2018-04-17 19:49:03', 1, NULL),
(356, 6, 5, 'Ciao nick', '2018-04-17 19:49:14', 1, NULL),
(357, 6, 2, 'Sali al primo posto dai', '2018-04-17 19:50:54', 1, NULL),
(358, 6, 3, 'ehi', '2018-04-17 19:52:26', 1, NULL),
(359, 6, 2, '.....', '2018-04-17 19:52:38', 1, NULL),
(360, 6, 2, 'Prova', '2018-04-17 19:54:04', 1, NULL),
(361, 6, 4, 'gggg', '2018-04-17 19:54:52', 1, NULL),
(362, 6, 5, 'febwb', '2018-04-17 19:56:06', 1, NULL),
(363, 6, 2, 'come va', '2018-04-17 19:56:58', 1, NULL),
(364, 6, 3, 'ciao', '2018-04-17 20:02:09', 1, NULL),
(365, 6, 4, 'Ciao richard', '2018-04-17 20:02:51', 1, NULL),
(366, 6, 5, 'Ci sei', '2018-04-17 20:04:29', 1, NULL),
(367, 6, 4, 'Come stai', '2018-04-17 20:06:37', 1, NULL),
(368, 6, 5, 'Come stai', '2018-04-17 20:07:41', 1, NULL),
(369, 6, 3, 'Scusami', '2018-04-17 20:13:08', 1, NULL),
(370, 6, 4, 'sali dai', '2018-04-17 20:13:21', 1, NULL),
(371, 6, 2, 'Ciao richard. Come stai. sali dai', '2018-04-17 20:14:02', 1, NULL),
(372, 6, 2, 'Ciao richard.Mi vuoi bene', '2018-04-17 20:14:12', 1, NULL),
(373, 6, 5, 'Ehi nick', '2018-04-17 20:15:13', 1, NULL),
(374, 5, 4, 'egh', '2018-04-17 20:15:50', 1, NULL),
(375, 5, 3, 'Che fai', '2018-04-17 20:16:19', 1, NULL),
(376, 5, 1, 'mmm', '2018-04-17 20:16:52', 1, NULL),
(377, 6, 5, 'Ciao', '2018-04-18 09:55:31', 1, NULL),
(378, 6, 3, 'Come stai', '2018-04-18 09:56:16', 1, NULL),
(379, 6, 4, 'Come stai&', '2018-04-18 09:58:13', 1, NULL),
(380, 6, 5, 'Ci sei&', '2018-04-18 09:59:00', 1, NULL),
(381, 6, 2, 'ehi&', '2018-04-18 10:00:52', 1, NULL),
(382, 6, 5, 'Ehi nick', '2018-04-18 10:04:25', 1, NULL),
(383, 6, 2, 'qrhrqn', '2018-04-18 10:04:38', 1, NULL),
(384, 6, 3, 'ciao', '2018-04-18 10:05:52', 1, NULL),
(385, 6, 4, 'ci seiU+0026', '2018-04-18 10:06:25', 1, NULL),
(386, 6, 4, 'come staiU+0026', '2018-04-18 10:07:50', 1, NULL),
(387, 6, 5, 'eeiU+0026', '2018-04-18 10:09:15', 1, NULL),
(388, 6, 2, 'ehiU+0026', '2018-04-18 10:09:44', 1, NULL),
(389, 6, 3, 'eebU+0026', '2018-04-18 10:10:09', 1, NULL),
(390, 6, 4, 'rwnwrU+0026', '2018-04-18 10:10:36', 1, NULL),
(391, 6, 5, 'eii', '2018-04-18 10:11:26', 1, NULL),
(392, 6, 5, 'eii', '2018-04-18 10:11:30', 1, NULL),
(393, 6, 2, 'ehiii', '2018-04-18 10:11:48', 1, NULL),
(394, 6, 2, 'ehiii', '2018-04-18 10:11:53', 1, NULL),
(395, 6, 4, 'ehi&', '2018-04-18 10:12:21', 1, NULL),
(396, 6, 4, 'ciao', '2018-04-18 10:12:27', 1, NULL),
(397, 6, 4, 'urca&', '2018-04-18 10:13:28', 1, NULL),
(398, 6, 3, 'ciao', '2018-04-18 10:13:59', 1, NULL),
(399, 6, 5, 'ops', '2018-04-18 10:14:07', 1, NULL),
(400, 3, 6, 'ciao mik', '2018-04-23 08:52:06', 1, NULL),
(401, 3, 2, 'Ci sei', '2018-04-23 08:52:31', 1, NULL),
(402, 3, 5, 'ehi nick', '2018-04-23 08:52:49', 1, NULL),
(403, 3, 6, 'ehilà', '2018-04-23 08:53:55', 1, NULL),
(404, 3, 1, 'Ciao paolo', '2018-04-23 08:56:10', 1, NULL),
(405, 6, 4, 'Ciao', '2018-04-23 09:03:38', 1, NULL),
(406, 6, 4, 'ehi', '2018-04-23 09:03:49', 1, NULL),
(407, 6, 5, '1456', '2018-04-23 09:08:03', 1, NULL),
(408, 3, 2, 'ciao', '2018-04-24 08:11:21', 1, NULL),
(409, 3, 5, 'ehi', '2018-04-24 08:12:05', 1, NULL),
(410, 3, 5, 'parè', '2018-04-24 08:12:17', 1, NULL),
(411, 3, 5, 'rbfqenfiqni3ni4315', '2018-04-24 08:12:39', 1, NULL),
(412, 3, 5, 'rbfqenfiqni3ni4315', '2018-04-24 08:12:44', 1, NULL),
(413, 3, 6, 'eagqehqh', '2018-04-24 08:16:48', 1, NULL),
(414, 3, 1, 'qhqh', '2018-04-24 08:16:54', 1, NULL),
(415, 3, 2, '----$%£', '2018-04-24 08:33:16', 1, NULL),
(416, 3, 5, 'wgqg', '2018-04-24 08:50:06', 1, NULL),
(417, 6, 2, 'ciao', '2018-04-24 11:07:53', 1, NULL),
(418, 6, 4, 'ciao', '2018-04-24 11:08:00', 1, NULL),
(419, 6, 3, 'eeeeeee', '2018-04-24 11:08:09', 1, NULL),
(420, 6, 3, 'eeee', '2018-04-24 11:08:14', 1, NULL),
(421, 6, 5, 'ciao', '2018-04-24 11:17:18', 1, NULL),
(422, 6, 2, 'wjwjwj', '2018-04-24 11:17:54', 1, NULL),
(423, 6, 4, 'hwjwtj', '2018-04-24 11:18:03', 1, NULL),
(424, 6, 3, 'bbbb', '2018-04-24 11:18:10', 1, NULL),
(425, 6, 5, 'whwrj', '2018-04-24 11:19:17', 1, NULL),
(426, 6, 5, 'htjt3', '2018-04-24 11:19:25', 1, NULL),
(427, 6, 2, '....', '2018-04-24 11:22:55', 1, NULL),
(428, 6, 2, 'vhviviyvyi', '2018-04-24 11:23:18', 1, NULL),
(429, 6, 4, 'bubiud', '2018-04-24 11:24:03', 1, NULL),
(430, 6, 3, 'deee', '2018-04-24 11:24:45', 1, NULL),
(431, 6, 3, 'eeee', '2018-04-24 11:24:55', 1, NULL),
(432, 6, 5, 'ddddd', '2018-04-24 11:25:54', 1, NULL),
(433, 6, 5, 'ddeeee', '2018-04-24 11:26:37', 1, NULL),
(434, 3, 2, 'ciao', '2018-04-24 16:00:46', 1, NULL),
(435, 3, 6, 'ehi mik', '2018-04-24 16:00:54', 1, NULL),
(436, 3, 1, 'prova', '2018-04-24 16:01:01', 1, NULL),
(437, 3, 5, 'ciao', '2018-04-24 16:05:36', 1, NULL),
(512, 6, 5, 'cewh7', '2018-04-26 15:00:55', 1, NULL),
(513, 6, 5, '', '2018-04-26 15:08:42', 1, 'README.md'),
(514, 5, 6, '', '2018-04-26 15:09:32', 1, '.env.example'),
(515, 6, 5, 'ciao', '2018-04-26 15:11:22', 1, NULL),
(516, 6, 5, '{ciao}', '2018-04-26 15:11:41', 1, NULL),
(517, 6, 5, '{ciao', '2018-04-26 15:11:52', 1, NULL),
(518, 6, 5, 'ciao}', '2018-04-26 15:13:32', 1, NULL),
(519, 6, 5, 'che fai', '2018-04-26 15:16:32', 1, NULL),
(520, 3, 6, '', '2018-04-26 20:35:01', 1, 'artisan'),
(521, 6, 3, '', '2018-04-26 20:39:01', 1, 'Cattura.PNG'),
(522, 3, 6, '', '2018-04-26 20:41:52', 1, 'Esami.txt'),
(523, 3, 6, 'ciao@gmail.com', '2018-04-26 20:57:09', 1, NULL),
(524, 3, 6, '+32022225', '2018-04-26 20:57:19', 1, NULL),
(525, 3, 6, 'ciao', '2018-04-26 21:11:48', 1, NULL),
(526, 3, 6, 'ehi', '2018-04-26 21:13:10', 1, NULL),
(527, 3, 6, 'hto}', '2018-04-26 21:13:36', 1, NULL),
(528, 3, 6, 'Ciao amico!', '2018-04-26 21:15:04', 1, NULL),
(529, 6, 4, 'Ciao', '2018-04-27 09:13:24', 1, NULL),
(530, 6, 2, 'Ehi roger', '2018-04-27 09:15:11', 1, NULL),
(531, 6, 5, '', '2018-04-27 09:15:37', 1, 'message controller.txt'),
(532, 6, 3, '', '2018-04-27 09:16:10', 0, 'script live search.txt'),
(533, 6, 4, '', '2018-04-27 09:16:19', 1, 'ppw.txt'),
(534, 2, 4, 'Ehi richard, ti aspetto con ansia qui', '2018-04-27 09:24:47', 1, NULL),
(535, 2, 3, 'Ehi david', '2018-04-27 09:24:59', 0, NULL),
(536, 4, 1, 'Ciao paolo', '2018-04-27 09:25:37', 1, NULL),
(537, 4, 5, 'Ciao nick', '2018-04-27 09:26:12', 1, NULL),
(538, 4, 6, 'Ciao mik', '2018-04-27 09:26:35', 1, NULL),
(539, 4, 2, '', '2018-04-27 09:26:45', 1, 'Cattura.PNG'),
(540, 4, 1, '', '2018-04-27 09:27:07', 1, 'ppw.txt'),
(541, 6, 2, 'Ciao roger', '2018-04-27 09:30:02', 1, NULL),
(542, 6, 1, 'Ehi paolo tieni', '2018-04-27 09:35:44', 1, NULL),
(543, 6, 1, '', '2018-04-27 09:36:10', 1, 'message controller.txt'),
(544, 6, 5, 'Ciao nick', '2018-04-27 09:45:55', 1, NULL),
(545, 4, 5, '', '2018-04-27 09:47:15', 1, 'Cattura.PNG'),
(546, 6, 4, 'Ops...', '2018-04-27 09:49:04', 0, NULL),
(547, 6, 4, '', '2018-04-27 10:34:02', 0, 'PRE PARTITA.txt'),
(548, 6, 2, NULL, '2018-04-27 10:59:11', 1, NULL),
(549, 6, 2, 'ciao parè', '2018-04-27 10:59:15', 1, NULL),
(550, 6, 2, 'ciao parè?', '2018-04-27 10:59:35', 1, NULL),
(551, 6, 2, 'ciaooo', '2018-04-27 11:01:10', 1, NULL),
(552, 6, 2, 'ciaooo\r\nparè\r\ncome \r\nstai', '2018-04-27 11:01:17', 1, NULL),
(553, 6, 2, 'Come stai??', '2018-04-27 11:02:02', 1, NULL),
(554, 6, 5, 'feqegqeg', '2018-04-27 11:05:29', 1, NULL),
(555, 6, 3, 'Come stai?', '2018-04-27 11:06:11', 0, NULL),
(556, 6, 5, 'ciao nick, come stai?', '2018-04-27 11:16:07', 1, NULL),
(557, 6, 3, 'ehi david, che fai?', '2018-04-27 11:16:25', 0, NULL),
(560, 6, 5, 'Ciao', '2018-04-27 11:23:09', 1, NULL),
(561, 6, 2, 'ehi roger', '2018-04-27 11:23:15', 1, NULL),
(562, 6, 3, 'Ciao david, come stai?', '2018-04-27 11:23:27', 0, NULL),
(563, 6, 4, 'Ehi richard, come va?', '2018-04-27 11:23:46', 0, NULL),
(564, 6, 4, 'Ciao richard???!!!', '2018-04-27 11:26:37', 0, NULL),
(565, 6, 5, 'eh nick', '2018-04-27 11:51:43', 1, NULL),
(566, 6, 1, 'ciao', '2018-04-27 11:52:42', 1, NULL),
(567, 6, 2, 'ciao roger, che fai?', '2018-04-27 11:54:36', 1, NULL),
(568, 6, 2, 'ciao roger, che fai?', '2018-04-27 11:54:41', 1, NULL),
(569, 6, 2, 'ehi amico?', '2018-04-27 11:55:11', 1, NULL),
(570, 6, 2, 'ehi rogers?!??', '2018-04-27 11:56:27', 1, NULL),
(571, 6, 5, 'Ciao nick, come va?', '2018-04-27 11:56:53', 1, NULL),
(572, 6, 1, 'ciao', '2018-04-27 11:58:48', 1, NULL),
(573, 6, 5, 'ehi nick', '2018-04-27 11:58:56', 1, NULL),
(574, 6, 4, 'ciao richard', '2018-04-27 11:59:46', 0, NULL),
(575, 6, 2, 'ehi roger, come stai?', '2018-04-27 12:00:00', 1, NULL),
(576, 6, 3, 'ehi david', '2018-04-27 12:00:13', 0, NULL),
(577, 6, 5, 'Ciao nick', '2018-04-27 12:01:42', 1, NULL),
(578, 6, 4, 'ehi richard', '2018-04-27 12:03:30', 0, NULL),
(579, 6, 3, NULL, '2018-04-27 12:05:26', 0, NULL),
(580, 6, 3, NULL, '2018-04-27 12:05:28', 0, NULL),
(581, 6, 3, NULL, '2018-04-27 12:06:09', 0, NULL),
(582, 6, 4, NULL, '2018-04-27 12:10:07', 0, NULL),
(583, 6, 4, NULL, '2018-04-27 12:10:42', 0, NULL),
(584, 6, 3, 'ciao amico', '2018-04-27 12:15:14', 0, NULL),
(585, 6, 1, 'ehi paolo, come va?', '2018-04-27 12:15:23', 1, NULL),
(586, 6, 2, 'roges, ci sei?', '2018-04-27 12:16:57', 1, NULL),
(587, 6, 2, 'roges, ci sei?', '2018-04-27 12:17:03', 1, NULL),
(588, 6, 1, 'ehi paolinoooooo', '2018-04-27 12:19:31', 1, NULL),
(589, 6, 4, 'richard, ci sei?', '2018-04-27 12:20:00', 0, NULL),
(590, 6, 3, 'ehi david', '2018-04-27 12:21:17', 0, NULL),
(591, 6, 5, 'ehi nick', '2018-04-27 12:22:05', 1, NULL),
(592, 6, 2, 'ciao rogeeeee', '2018-04-27 12:22:15', 1, NULL),
(593, 6, 1, 'paollllooooooooooooooooooooooooooooooooooooooooooo', '2018-04-27 12:22:29', 1, NULL),
(594, 6, 4, 'we richardino', '2018-04-27 12:22:56', 0, NULL),
(595, 6, 3, 'ehilà', '2018-04-27 12:23:15', 0, NULL),
(596, 6, 5, 'ciao caro nick', '2018-04-27 12:23:32', 1, NULL),
(597, 6, 5, 'ciao caro nick', '2018-04-27 12:23:36', 1, NULL),
(598, 6, 2, 'ehi caro rogers', '2018-04-27 12:23:48', 1, NULL),
(599, 6, 5, 'ops', '2018-04-27 12:24:03', 1, NULL),
(600, 6, 1, 'wgwh', '2018-04-27 12:24:38', 1, NULL),
(601, 6, 3, 'wght', '2018-04-27 12:24:52', 0, NULL),
(602, 6, 1, 'rrrrrr', '2018-04-27 12:26:24', 1, NULL),
(603, 6, 3, 'ehhhyt', '2018-04-27 12:26:58', 0, NULL),
(604, 6, 3, 'ehhhyt', '2018-04-27 12:26:59', 0, NULL),
(605, 6, 3, 'ehhhyt', '2018-04-27 12:27:00', 0, NULL),
(606, 6, 3, 'wow', '2018-04-27 12:27:05', 0, NULL),
(607, 6, 3, 'wow', '2018-04-27 12:27:08', 0, NULL),
(608, 6, 1, 'ciao', '2018-04-27 12:29:44', 1, NULL),
(609, 6, 4, 'ceege', '2018-04-27 12:30:58', 0, NULL),
(610, 6, 4, 'fdefg', '2018-04-27 12:31:35', 0, NULL),
(611, 6, 3, 'grrwh', '2018-04-27 12:31:40', 0, NULL),
(612, 6, 3, 'grrwh', '2018-04-27 12:31:42', 0, NULL),
(613, 6, 2, 'egeq', '2018-04-27 12:32:07', 1, NULL),
(614, 6, 2, 'egeq', '2018-04-27 12:32:11', 1, NULL),
(616, 6, 2, 'wrnwrn', '2018-04-27 12:32:24', 1, NULL),
(617, 6, 2, 'en', '2018-04-27 12:33:32', 1, NULL),
(618, 6, 3, 'ciao', '2018-04-27 12:35:39', 0, NULL),
(619, 6, 3, 'ciao', '2018-04-27 12:36:22', 0, NULL),
(620, 6, 3, 'ciao', '2018-04-27 12:36:45', 0, NULL),
(621, 6, 2, 'grw', '2018-04-27 12:37:33', 1, NULL),
(622, 6, 2, 'ceg', '2018-04-27 12:37:58', 1, NULL),
(623, 6, 3, 'hola', '2018-04-27 12:38:10', 0, NULL),
(624, 6, 5, 'parè', '2018-04-27 12:38:49', 1, NULL),
(625, 6, 3, 'ciao', '2018-04-27 12:41:14', 0, NULL),
(626, 6, 3, 'rrr', '2018-04-27 12:42:04', 0, NULL),
(627, 6, 5, 'rg', '2018-04-27 12:42:10', 1, NULL),
(628, 6, 3, 'dehh', '2018-04-27 12:43:46', 0, NULL),
(629, 6, 2, 'ehhe', '2018-04-27 12:43:52', 1, NULL),
(630, 6, 5, 'qehtht', '2018-04-27 12:44:02', 1, NULL),
(631, 6, 5, 'Che fai?', '2018-04-27 12:45:02', 1, NULL),
(632, 6, 5, 'ciao?', '2018-04-27 12:45:22', 1, NULL),
(635, 6, 5, '', '2018-04-27 12:53:03', 1, 'Esami.txt'),
(636, 6, 2, '', '2018-04-27 12:53:49', 1, 'talk-example-master.zip'),
(637, 2, 3, 'Ciao david', '2018-04-27 12:54:25', 0, NULL),
(638, 2, 4, 'Ciao richard', '2018-04-27 12:55:03', 0, NULL),
(639, 2, 3, 'ehi david', '2018-04-27 12:55:58', 0, NULL),
(640, 6, 5, 'ciao amico', '2018-04-27 12:58:53', 1, NULL),
(641, 6, 4, 'ehi richard', '2018-04-27 12:59:04', 0, NULL),
(642, 6, 5, 'ehi nick', '2018-04-27 13:01:54', 1, NULL),
(643, 6, 1, 'eeee', '2018-04-27 13:03:07', 1, NULL),
(644, 6, 1, '', '2018-04-27 13:04:30', 1, 'Esami.txt'),
(645, 6, 3, '', '2018-04-27 13:04:42', 0, 'script live search.txt'),
(646, 6, 4, '', '2018-04-27 13:04:53', 0, 'PRE PARTITA.txt'),
(647, 6, 2, 'amico', '2018-04-27 13:07:13', 1, NULL),
(648, 6, 2, 'egegr', '2018-04-27 13:08:06', 1, NULL),
(649, 6, 5, '', '2018-04-27 13:08:28', 1, 'message controller.txt'),
(650, 6, 2, 'qeeee', '2018-04-27 13:08:36', 1, NULL),
(651, 6, 5, 'ciao nick', '2018-04-27 13:11:57', 1, NULL),
(652, 6, 5, 'ehi amo', '2018-04-27 13:12:15', 1, NULL),
(653, 6, 2, 'ciao', '2018-04-27 13:14:15', 1, NULL),
(654, 6, 2, 'fegwrh', '2018-04-27 13:15:10', 1, NULL),
(655, 6, 1, 'ciao paolo', '2018-04-27 13:15:35', 1, NULL),
(656, 6, 1, 'ege', '2018-04-27 13:16:30', 1, NULL),
(657, 6, 1, 'rgr', '2018-04-27 13:16:36', 1, NULL),
(658, 1, 6, 'Ciao mik', '2018-04-28 09:28:52', 1, NULL),
(659, 1, 4, 'Ehi richard', '2018-04-28 09:29:07', 0, NULL),
(660, 1, 3, 'David, come stai', '2018-04-28 09:29:16', 1, NULL),
(661, 6, 4, '', '2018-04-28 09:31:34', 0, 'message controller.txt'),
(662, 6, 3, 'Ciao', '2018-04-28 09:32:09', 0, NULL),
(663, 6, 5, 'Ciao nick', '2018-04-28 09:32:23', 1, NULL),
(664, 6, 5, '', '2018-04-28 09:32:33', 1, 'Nuovo Documento di Microsoft Word.docx'),
(665, 5, 6, 'Ciao', '2018-04-28 09:41:00', 1, NULL),
(666, 5, 1, '', '2018-04-28 09:44:16', 1, 'Cattura.PNG'),
(667, 5, 3, 'Ciao david', '2018-04-28 09:44:32', 1, NULL),
(668, 5, 4, '', '2018-04-28 09:44:46', 0, 'Esami.txt'),
(669, 6, 1, 'Ciao paolo', '2018-04-28 09:47:19', 1, NULL),
(670, 6, 2, '', '2018-04-28 09:47:40', 1, 'script live search.txt'),
(671, 6, 4, 'Gne gne gne', '2018-04-28 09:47:53', 0, NULL),
(672, 3, 1, 'Ciao caro', '2018-04-28 09:50:09', 1, NULL),
(673, 3, 5, 'Ehi nick', '2018-04-28 09:54:08', 0, NULL),
(674, 3, 1, '', '2018-04-28 09:57:50', 1, 'Esami.txt'),
(675, 1, 4, '', '2018-04-28 09:58:50', 0, '_FINALI_.rar'),
(676, 1, 4, '', '2018-04-28 09:59:09', 0, 'Esami.txt'),
(677, 1, 5, '', '2018-04-28 09:59:25', 0, 'talk-example-master.zip'),
(682, 6, 4, 'Ciao, che fai?', '2018-04-28 10:14:42', 0, NULL),
(683, 6, 4, 'Ciao, come va?', '2018-04-28 10:21:05', 0, NULL),
(684, 6, 4, 'Ciao, come va?', '2018-04-28 10:21:11', 0, NULL),
(686, 6, 4, NULL, '2018-04-28 10:23:50', 0, NULL),
(687, 6, 4, 'Ciao', '2018-04-28 10:24:23', 0, NULL),
(688, 6, 4, 'ciao', '2018-04-28 10:27:58', 0, NULL),
(689, 6, 4, 'ehi richard', '2018-04-28 10:28:04', 0, NULL),
(690, 6, 4, 'ehi', '2018-04-28 10:28:11', 0, NULL),
(691, 6, 4, 'Ci sei?', '2018-04-28 10:28:25', 0, NULL),
(692, 6, 4, 'Come stai?', '2018-04-28 10:29:03', 0, NULL),
(694, 6, 2, 'Come stai?', '2018-04-28 10:31:46', 0, NULL),
(695, 6, 1, 'Ehi paolo, ci sei?', '2018-04-28 10:31:59', 1, NULL),
(696, 6, 1, 'Ehi paolo', '2018-04-28 10:33:22', 1, NULL),
(697, 6, 2, 'Ciao roger, tutto bene?', '2018-04-28 10:33:43', 0, NULL),
(698, 6, 1, 'Che fai?', '2018-04-28 10:35:03', 1, NULL),
(699, 6, 2, 'ehi', '2018-04-28 10:35:17', 0, NULL),
(700, 6, 1, 'Paolo buono', '2018-04-28 10:35:57', 1, NULL),
(701, 6, 2, 'ciao', '2018-04-28 10:41:16', 0, NULL),
(702, 6, 2, 'ciao', '2018-04-28 10:42:25', 0, NULL),
(703, 6, 2, 'ciao', '2018-04-28 10:42:32', 0, NULL),
(704, 6, 2, 'ehi amo', '2018-04-28 10:44:13', 0, NULL),
(705, 6, 1, 'caro', '2018-04-28 10:45:17', 1, NULL),
(706, 6, 2, 'weee', '2018-04-28 10:45:32', 0, NULL),
(707, 6, 2, 'eqhe', '2018-04-28 10:46:15', 0, NULL),
(708, 6, 2, 'Ciao', '2018-04-28 10:52:51', 0, NULL),
(709, 6, 2, 'qeqeh', '2018-04-28 10:53:18', 0, NULL),
(710, 6, 2, 'qeqeh', '2018-04-28 10:53:24', 0, NULL),
(711, 6, 2, 'caro', '2018-04-28 10:53:32', 0, NULL),
(712, 6, 2, 'tjtjt', '2018-04-28 10:54:16', 0, NULL),
(713, 6, 2, 'rhwrh', '2018-04-28 10:54:41', 0, NULL),
(714, 6, 2, 'rrrr', '2018-04-28 10:55:41', 0, NULL),
(715, 1, 5, 'Ciao nick', '2018-04-28 10:57:45', 0, NULL),
(716, 1, 5, 'Ehi caro', '2018-04-28 10:58:06', 0, NULL),
(717, 6, 2, 'ciao', '2018-04-28 10:59:23', 0, NULL),
(718, 6, 1, 'Ehi paolo', '2018-04-28 10:59:44', 1, NULL),
(719, 6, 2, 'eqhqe', '2018-04-28 11:00:55', 0, NULL),
(720, 6, 2, 'Ciao?', '2018-04-28 11:01:37', 0, NULL),
(721, 6, 1, '???', '2018-04-28 11:03:16', 1, NULL),
(722, 6, 2, 'Ehi caro', '2018-04-28 11:04:48', 0, NULL),
(723, 6, 4, 'Mi ascolti?', '2018-04-28 11:05:37', 0, NULL),
(724, 6, 4, 'ciao', '2018-04-28 11:09:31', 0, NULL),
(725, 6, 4, 'ciao', '2018-04-28 11:09:40', 0, NULL),
(726, 6, 2, 'ehi roger', '2018-04-28 11:09:56', 0, NULL),
(727, 6, 1, 'Ehi paolo', '2018-04-28 11:11:56', 1, NULL),
(728, 6, 2, 'come stai caro?', '2018-04-28 11:12:38', 0, NULL),
(729, 6, 5, 'ciao nick', '2018-04-28 11:14:48', 0, NULL),
(730, 6, 2, 'ehi roger', '2018-04-28 11:15:05', 0, NULL),
(731, 6, 5, 'ehi nick', '2018-04-28 11:16:04', 0, NULL),
(732, 6, 1, 'hola, que tal?', '2018-04-28 11:16:17', 1, NULL),
(733, 1, 5, '', '2018-05-02 09:20:03', 0, 'Esami.txt'),
(734, 1, 3, '', '2018-05-02 09:20:33', 1, 'sport five - molfetta bull5.pdf'),
(735, 3, 1, '', '2018-05-03 16:08:06', 0, 'Esami.txt'),
(736, 3, 5, '', '2018-05-07 10:53:23', 0, 'Esami.txt');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2018_01_22_151400_create_roles_table', 1),
(3, '2018_01_22_151401_create_affiliations_table', 1),
(4, '2018_01_22_151402_create_users_table', 1),
(5, '2018_01_22_152151_create_publications_table', 1),
(6, '2018_01_22_155320_create_topics_table', 1),
(7, '2018_01_22_155432_create_groups_table', 1),
(8, '2018_01_22_174036_create_user_publication_table', 1),
(9, '2018_01_22_184314_create_user_group_table', 1),
(10, '2018_01_22_184439_create_user_topic_table', 1),
(11, '2018_01_22_184825_create_topic_group_table', 1),
(12, '2018_01_22_184904_create_topic_publication_table', 1),
(13, '2018_01_22_191136_create_publication_group_table', 1),
(14, '2018_01_27_113941_create_journals_table', 1),
(15, '2018_01_27_170741_create_conferences_table', 1),
(16, '2018_01_27_172113_create_editorships_table', 1),
(17, '2018_02_02_163220_create_authors_table', 1),
(18, '2018_02_02_165031_create_author_publication_table', 1),
(19, '2018_02_05_210928_create_notifications_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notifiable_id` int(10) UNSIGNED NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_id`, `notifiable_type`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('109bebaa-5853-4b58-a884-bb5d74dc0a2d', 'App\\Notifications\\PublicationNotification', 2, 'App\\User', '{\"publication\":{\"title\":\"The Dark Side Of The Moon\",\"year\":\"1970-12-12\",\"venue\":\"Abbey Road\",\"type\":\"editorship\",\"public\":1,\"multimedia_path\":\"\\/9298a235d20e4c128cb3ded230b9079b\",\"updated_at\":\"2018-02-13 14:57:52\",\"created_at\":\"2018-02-13 14:57:52\",\"id\":7},\"user\":{\"id\":2,\"first_name\":\"Roger\",\"last_name\":\"Waters\",\"birth_date\":\"1944-01-01\",\"email\":\"roger.waters@uniba.it\",\"picture_path\":\"images\\/profilePictures\\/7f0c2415c36fd9b8f7e7f5fe362f9c62.jpg\",\"affiliation_id\":1,\"role_id\":1,\"reference_link\":null},\"authUser\":{\"id\":5,\"first_name\":\"Nick\",\"last_name\":\"Mason\",\"birth_date\":\"1944-01-01\",\"email\":\"nick.mason@uniba.it\",\"picture_path\":\"images\\/profilePictures\\/097c139eb79aba0491382f7b34365cbc.jpg\",\"affiliation_id\":6,\"role_id\":4,\"reference_link\":null,\"author\":{\"id\":9,\"name\":\"Nick Mason\",\"user_id\":5,\"created_at\":\"2018-02-13 14:46:44\",\"updated_at\":\"2018-02-13 14:46:44\"}}}', NULL, '2018-02-13 13:57:52', '2018-02-13 13:57:52'),
('2c7c76cd-0213-4735-91db-dd63246e905b', 'App\\Notifications\\GroupNotification', 5, 'App\\User', '{\"group\":{\"name\":\"The dark side of the moon\",\"description\":\"breathe, breathe in the air!\",\"picture_path\":\"images\\/groups\\/9450582a1eb645bc7ee8bbdc6cb4a631.jpg\",\"public\":\"public\",\"subscribers_count\":1,\"updated_at\":\"2018-02-13 14:59:15\",\"created_at\":\"2018-02-13 14:59:15\",\"id\":2},\"authUser\":{\"id\":3,\"first_name\":\"David\",\"last_name\":\"Gilmour\",\"birth_date\":\"1944-01-01\",\"email\":\"david.gilmour@uniba.it\",\"picture_path\":\"images\\/profilePictures\\/b4537c6b85bf905d70494f74f0a6009f.jpg\",\"affiliation_id\":8,\"role_id\":2,\"reference_link\":null},\"user\":{\"id\":5,\"first_name\":\"Nick\",\"last_name\":\"Mason\",\"birth_date\":\"1944-01-01\",\"email\":\"nick.mason@uniba.it\",\"picture_path\":\"images\\/profilePictures\\/097c139eb79aba0491382f7b34365cbc.jpg\",\"affiliation_id\":6,\"role_id\":4,\"reference_link\":null}}', NULL, '2018-02-13 13:59:16', '2018-02-13 13:59:16'),
('38b21ed3-ea12-40dc-a0be-55fa628f4536', 'App\\Notifications\\PublicationNotification', 4, 'App\\User', '{\"publication\":{\"title\":\"The Wall\",\"year\":\"2018-02-07\",\"venue\":\"Abbey Road\",\"type\":\"journal\",\"public\":1,\"multimedia_path\":\"\\/3eadda1f9cddbd684c54078dd6e2e58a\",\"updated_at\":\"2018-02-13 14:50:11\",\"created_at\":\"2018-02-13 14:50:11\",\"id\":5},\"user\":{\"id\":4,\"first_name\":\"Richard\",\"last_name\":\"Wright\",\"birth_date\":\"1944-01-01\",\"email\":\"richard.wright@uniba.it\",\"picture_path\":\"images\\/profilePictures\\/caa683bc3c4b57c7c7c92053e9f6643d.jpg\",\"affiliation_id\":12,\"role_id\":4,\"reference_link\":null},\"authUser\":{\"id\":5,\"first_name\":\"Nick\",\"last_name\":\"Mason\",\"birth_date\":\"1944-01-01\",\"email\":\"nick.mason@uniba.it\",\"picture_path\":\"images\\/profilePictures\\/097c139eb79aba0491382f7b34365cbc.jpg\",\"affiliation_id\":6,\"role_id\":4,\"reference_link\":null,\"author\":{\"id\":9,\"name\":\"Nick Mason\",\"user_id\":5,\"created_at\":\"2018-02-13 14:46:44\",\"updated_at\":\"2018-02-13 14:46:44\"}}}', NULL, '2018-02-13 13:50:12', '2018-02-13 13:50:12'),
('84ada761-d9c6-49db-871e-e2398751da33', 'App\\Notifications\\PublicationNotification', 4, 'App\\User', '{\"publication\":{\"title\":\"The Dark Side Of The Moon\",\"year\":\"1970-12-12\",\"venue\":\"Abbey Road\",\"type\":\"editorship\",\"public\":1,\"multimedia_path\":\"\\/9298a235d20e4c128cb3ded230b9079b\",\"updated_at\":\"2018-02-13 14:57:52\",\"created_at\":\"2018-02-13 14:57:52\",\"id\":7},\"user\":{\"id\":4,\"first_name\":\"Richard\",\"last_name\":\"Wright\",\"birth_date\":\"1944-01-01\",\"email\":\"richard.wright@uniba.it\",\"picture_path\":\"images\\/profilePictures\\/caa683bc3c4b57c7c7c92053e9f6643d.jpg\",\"affiliation_id\":12,\"role_id\":4,\"reference_link\":null},\"authUser\":{\"id\":5,\"first_name\":\"Nick\",\"last_name\":\"Mason\",\"birth_date\":\"1944-01-01\",\"email\":\"nick.mason@uniba.it\",\"picture_path\":\"images\\/profilePictures\\/097c139eb79aba0491382f7b34365cbc.jpg\",\"affiliation_id\":6,\"role_id\":4,\"reference_link\":null,\"author\":{\"id\":9,\"name\":\"Nick Mason\",\"user_id\":5,\"created_at\":\"2018-02-13 14:46:44\",\"updated_at\":\"2018-02-13 14:46:44\"}}}', NULL, '2018-02-13 13:57:52', '2018-02-13 13:57:52'),
('b59ffccf-8c0a-43d5-b6a9-586ea0273b9e', 'App\\Notifications\\PublicationNotification', 2, 'App\\User', '{\"publication\":{\"title\":\"Astronomy Domine\",\"year\":\"1968-12-12\",\"venue\":\"Abbey Road\",\"type\":\"conference\",\"public\":1,\"multimedia_path\":\"\\/e867adc512ddb0569efa46ec73f4a7c1\",\"updated_at\":\"2018-02-13 14:56:01\",\"created_at\":\"2018-02-13 14:56:01\",\"id\":6},\"user\":{\"id\":2,\"first_name\":\"Roger\",\"last_name\":\"Waters\",\"birth_date\":\"1944-01-01\",\"email\":\"roger.waters@uniba.it\",\"picture_path\":\"images\\/profilePictures\\/7f0c2415c36fd9b8f7e7f5fe362f9c62.jpg\",\"affiliation_id\":1,\"role_id\":1,\"reference_link\":null},\"authUser\":{\"id\":5,\"first_name\":\"Nick\",\"last_name\":\"Mason\",\"birth_date\":\"1944-01-01\",\"email\":\"nick.mason@uniba.it\",\"picture_path\":\"images\\/profilePictures\\/097c139eb79aba0491382f7b34365cbc.jpg\",\"affiliation_id\":6,\"role_id\":4,\"reference_link\":null,\"author\":{\"id\":9,\"name\":\"Nick Mason\",\"user_id\":5,\"created_at\":\"2018-02-13 14:46:44\",\"updated_at\":\"2018-02-13 14:46:44\"}}}', NULL, '2018-02-13 13:56:02', '2018-02-13 13:56:02'),
('b89fd3e8-6c37-4970-a248-f649a2a92902', 'App\\Notifications\\PublicationNotification', 5, 'App\\User', '{\"publication\":{\"title\":\"The Final Cut\",\"year\":\"1999-12-12\",\"venue\":\"Abbey Road\",\"type\":\"journal\",\"public\":1,\"multimedia_path\":\"\\/c65e24020627cbb93e846fd1b2b053ef\",\"updated_at\":\"2018-02-13 15:02:02\",\"created_at\":\"2018-02-13 15:02:02\",\"id\":8},\"user\":{\"id\":5,\"first_name\":\"Nick\",\"last_name\":\"Mason\",\"birth_date\":\"1944-01-01\",\"email\":\"nick.mason@uniba.it\",\"picture_path\":\"images\\/profilePictures\\/097c139eb79aba0491382f7b34365cbc.jpg\",\"affiliation_id\":6,\"role_id\":4,\"reference_link\":null},\"authUser\":{\"id\":3,\"first_name\":\"David\",\"last_name\":\"Gilmour\",\"birth_date\":\"1944-01-01\",\"email\":\"david.gilmour@uniba.it\",\"picture_path\":\"images\\/profilePictures\\/b4537c6b85bf905d70494f74f0a6009f.jpg\",\"affiliation_id\":8,\"role_id\":2,\"reference_link\":null,\"author\":{\"id\":7,\"name\":\"David Gilmour\",\"user_id\":3,\"created_at\":\"2018-02-13 14:42:56\",\"updated_at\":\"2018-02-13 14:42:56\"}}}', NULL, '2018-02-13 14:02:03', '2018-02-13 14:02:03'),
('beefe5e5-3c3c-4de9-9aa8-4b49a62edccc', 'App\\Notifications\\PublicationNotification', 3, 'App\\User', '{\"publication\":{\"title\":\"Echoes\",\"year\":\"1968-12-12\",\"venue\":\"Abbey Road\",\"type\":\"conference\",\"public\":1,\"multimedia_path\":\"\\/1fbb1309e485d48f9c04e0667e962c3e\",\"updated_at\":\"2018-02-13 15:08:45\",\"created_at\":\"2018-02-13 15:08:45\",\"id\":10},\"user\":{\"id\":3,\"first_name\":\"David\",\"last_name\":\"Gilmour\",\"birth_date\":\"1944-01-01\",\"email\":\"david.gilmour@uniba.it\",\"picture_path\":\"images\\/profilePictures\\/b4537c6b85bf905d70494f74f0a6009f.jpg\",\"affiliation_id\":8,\"role_id\":2,\"reference_link\":null},\"authUser\":{\"id\":4,\"first_name\":\"Richard\",\"last_name\":\"Wright\",\"birth_date\":\"1944-01-01\",\"email\":\"richard.wright@uniba.it\",\"picture_path\":\"images\\/profilePictures\\/caa683bc3c4b57c7c7c92053e9f6643d.jpg\",\"affiliation_id\":12,\"role_id\":4,\"reference_link\":null,\"author\":{\"id\":8,\"name\":\"Richard Wright\",\"user_id\":4,\"created_at\":\"2018-02-13 14:44:44\",\"updated_at\":\"2018-02-13 14:44:44\"}}}', NULL, '2018-02-13 14:08:46', '2018-02-13 14:08:46'),
('d204db6c-b9b2-492f-8061-c2a81eb88667', 'App\\Notifications\\PublicationNotification', 2, 'App\\User', '{\"publication\":{\"title\":\"The Wall\",\"year\":\"2018-02-07\",\"venue\":\"Abbey Road\",\"type\":\"journal\",\"public\":1,\"multimedia_path\":\"\\/3eadda1f9cddbd684c54078dd6e2e58a\",\"updated_at\":\"2018-02-13 14:50:11\",\"created_at\":\"2018-02-13 14:50:11\",\"id\":5},\"user\":{\"id\":2,\"first_name\":\"Roger\",\"last_name\":\"Waters\",\"birth_date\":\"1944-01-01\",\"email\":\"roger.waters@uniba.it\",\"picture_path\":\"images\\/profilePictures\\/7f0c2415c36fd9b8f7e7f5fe362f9c62.jpg\",\"affiliation_id\":1,\"role_id\":1,\"reference_link\":null},\"authUser\":{\"id\":5,\"first_name\":\"Nick\",\"last_name\":\"Mason\",\"birth_date\":\"1944-01-01\",\"email\":\"nick.mason@uniba.it\",\"picture_path\":\"images\\/profilePictures\\/097c139eb79aba0491382f7b34365cbc.jpg\",\"affiliation_id\":6,\"role_id\":4,\"reference_link\":null,\"author\":{\"id\":9,\"name\":\"Nick Mason\",\"user_id\":5,\"created_at\":\"2018-02-13 14:46:44\",\"updated_at\":\"2018-02-13 14:46:44\"}}}', NULL, '2018-02-13 13:50:12', '2018-02-13 13:50:12'),
('dee7b63c-2f5c-45df-86ec-7b17313b9600', 'App\\Notifications\\PublicationNotification', 4, 'App\\User', '{\"publication\":{\"title\":\"The Final Cut\",\"year\":\"1999-12-12\",\"venue\":\"Abbey Road\",\"type\":\"journal\",\"public\":1,\"multimedia_path\":\"\\/c65e24020627cbb93e846fd1b2b053ef\",\"updated_at\":\"2018-02-13 15:02:02\",\"created_at\":\"2018-02-13 15:02:02\",\"id\":8},\"user\":{\"id\":4,\"first_name\":\"Richard\",\"last_name\":\"Wright\",\"birth_date\":\"1944-01-01\",\"email\":\"richard.wright@uniba.it\",\"picture_path\":\"images\\/profilePictures\\/caa683bc3c4b57c7c7c92053e9f6643d.jpg\",\"affiliation_id\":12,\"role_id\":4,\"reference_link\":null},\"authUser\":{\"id\":3,\"first_name\":\"David\",\"last_name\":\"Gilmour\",\"birth_date\":\"1944-01-01\",\"email\":\"david.gilmour@uniba.it\",\"picture_path\":\"images\\/profilePictures\\/b4537c6b85bf905d70494f74f0a6009f.jpg\",\"affiliation_id\":8,\"role_id\":2,\"reference_link\":null,\"author\":{\"id\":7,\"name\":\"David Gilmour\",\"user_id\":3,\"created_at\":\"2018-02-13 14:42:56\",\"updated_at\":\"2018-02-13 14:42:56\"}}}', NULL, '2018-02-13 14:02:03', '2018-02-13 14:02:03'),
('f313ac25-8318-408c-9556-7b9ae8e56f85', 'App\\Notifications\\PublicationNotification', 3, 'App\\User', '{\"publication\":{\"title\":\"Astronomy Domine\",\"year\":\"1968-12-12\",\"venue\":\"Abbey Road\",\"type\":\"conference\",\"public\":1,\"multimedia_path\":\"\\/e867adc512ddb0569efa46ec73f4a7c1\",\"updated_at\":\"2018-02-13 14:56:01\",\"created_at\":\"2018-02-13 14:56:01\",\"id\":6},\"user\":{\"id\":3,\"first_name\":\"David\",\"last_name\":\"Gilmour\",\"birth_date\":\"1944-01-01\",\"email\":\"david.gilmour@uniba.it\",\"picture_path\":\"images\\/profilePictures\\/b4537c6b85bf905d70494f74f0a6009f.jpg\",\"affiliation_id\":8,\"role_id\":2,\"reference_link\":null},\"authUser\":{\"id\":5,\"first_name\":\"Nick\",\"last_name\":\"Mason\",\"birth_date\":\"1944-01-01\",\"email\":\"nick.mason@uniba.it\",\"picture_path\":\"images\\/profilePictures\\/097c139eb79aba0491382f7b34365cbc.jpg\",\"affiliation_id\":6,\"role_id\":4,\"reference_link\":null,\"author\":{\"id\":9,\"name\":\"Nick Mason\",\"user_id\":5,\"created_at\":\"2018-02-13 14:46:44\",\"updated_at\":\"2018-02-13 14:46:44\"}}}', NULL, '2018-02-13 13:56:02', '2018-02-13 13:56:02'),
('f93f8d1f-03fd-472e-b9c2-657e48057266', 'App\\Notifications\\PublicationNotification', 3, 'App\\User', '{\"publication\":{\"title\":\"The Wall\",\"year\":\"2018-02-07\",\"venue\":\"Abbey Road\",\"type\":\"journal\",\"public\":1,\"multimedia_path\":\"\\/3eadda1f9cddbd684c54078dd6e2e58a\",\"updated_at\":\"2018-02-13 14:50:11\",\"created_at\":\"2018-02-13 14:50:11\",\"id\":5},\"user\":{\"id\":3,\"first_name\":\"David\",\"last_name\":\"Gilmour\",\"birth_date\":\"1944-01-01\",\"email\":\"david.gilmour@uniba.it\",\"picture_path\":\"images\\/profilePictures\\/b4537c6b85bf905d70494f74f0a6009f.jpg\",\"affiliation_id\":8,\"role_id\":2,\"reference_link\":null},\"authUser\":{\"id\":5,\"first_name\":\"Nick\",\"last_name\":\"Mason\",\"birth_date\":\"1944-01-01\",\"email\":\"nick.mason@uniba.it\",\"picture_path\":\"images\\/profilePictures\\/097c139eb79aba0491382f7b34365cbc.jpg\",\"affiliation_id\":6,\"role_id\":4,\"reference_link\":null,\"author\":{\"id\":9,\"name\":\"Nick Mason\",\"user_id\":5,\"created_at\":\"2018-02-13 14:46:44\",\"updated_at\":\"2018-02-13 14:46:44\"}}}', NULL, '2018-02-13 13:50:12', '2018-02-13 13:50:12');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `publications`
--

CREATE TABLE `publications` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `type` enum('journal','conference','editorship') COLLATE utf8_unicode_ci NOT NULL,
  `venue` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `year` date NOT NULL,
  `multimedia_path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `public` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `publications`
--

INSERT INTO `publications` (`id`, `title`, `type`, `venue`, `year`, `multimedia_path`, `public`, `created_at`, `updated_at`) VALUES
(1, 'Empowering CH Experts To Produce IoT-enhanced Visits.', 'conference', 'UMAP', '2017-01-01', '/1ac227860ec20074ea17d2a2f58b04a6', 1, '2018-02-13 13:34:23', '2018-02-13 13:34:23'),
(2, 'A Meta-design Approach To Support Information Access And Manipulation In Virtual Research Environments.', 'conference', 'BDA@AVI', '2016-01-01', '/e25f113cb9f10ef1c121535807e45eab', 1, '2018-02-13 13:34:24', '2018-02-13 13:34:24'),
(3, 'A Circular Visualization Technique For Collaboration And Quantifying Self.', 'conference', 'AVI', '2016-01-01', '/32def5f27a229e05a980dff9a0da7561', 1, '2018-02-13 13:34:24', '2018-02-13 13:34:24'),
(4, 'Visualizing Transportation Routes For Data Analysis In Logistics.', 'conference', 'DMS', '2016-01-01', '/9b97b5edea291bd634df67be9a3ff85e', 1, '2018-02-13 13:34:24', '2018-02-13 13:34:24'),
(5, 'The Wall', 'journal', 'Abbey Road', '2018-02-07', '/3eadda1f9cddbd684c54078dd6e2e58a', 1, '2018-02-13 13:50:11', '2018-02-13 13:50:11'),
(6, 'Astronomy Domine', 'conference', 'Abbey Road', '1968-12-12', '/e867adc512ddb0569efa46ec73f4a7c1', 1, '2018-02-13 13:56:01', '2018-02-13 13:56:01'),
(7, 'The Dark Side Of The Moon', 'editorship', 'Abbey Road', '1970-12-12', '/9298a235d20e4c128cb3ded230b9079b', 1, '2018-02-13 13:57:52', '2018-02-13 13:57:52'),
(8, 'The Final Cut', 'journal', 'Abbey Road', '1999-12-12', '/c65e24020627cbb93e846fd1b2b053ef', 1, '2018-02-13 14:02:02', '2018-02-13 14:02:02'),
(9, 'The Wall Pt2', 'conference', 'Abbey Road', '1980-12-12', '/67da86c2b89e0919bb368eee6181548b', 1, '2018-02-13 14:05:01', '2018-02-13 14:05:01'),
(10, 'Echoes', 'conference', 'Abbey Road', '1968-12-12', '/1fbb1309e485d48f9c04e0667e962c3e', 1, '2018-02-13 14:08:45', '2018-02-13 14:08:45');

-- --------------------------------------------------------

--
-- Table structure for table `publication_groups`
--

CREATE TABLE `publication_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `publication_id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `publication_groups`
--

INSERT INTO `publication_groups` (`id`, `publication_id`, `group_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 6, 2, 3, '2018-02-13 13:59:29', '2018-02-13 13:59:29'),
(2, 5, 2, 3, '2018-02-13 13:59:29', '2018-02-13 13:59:29'),
(3, 5, 3, 2, '2018-02-13 14:04:01', '2018-02-13 14:04:01'),
(4, 4, 3, 1, '2018-02-13 15:03:17', '2018-02-13 15:03:17'),
(5, 1, 3, 1, '2018-02-13 15:03:17', '2018-02-13 15:03:17'),
(6, 3, 3, 1, '2018-02-13 15:03:17', '2018-02-13 15:03:17');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Researcher', '2018-02-13 13:32:13', '2018-02-13 13:32:13'),
(2, 'Ordinary Professor', '2018-02-13 13:32:13', '2018-02-13 13:32:13'),
(3, 'Associate Professor', '2018-02-13 13:32:13', '2018-02-13 13:32:13'),
(4, 'Assistant Professor', '2018-02-13 13:32:13', '2018-02-13 13:32:13');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Politics', '2018-02-13 13:32:14', '2018-02-13 13:32:14'),
(2, 'Technology', '2018-02-13 13:32:14', '2018-02-13 13:32:14'),
(3, 'Human Computer Interaction', '2018-02-13 13:32:14', '2018-02-13 13:32:14'),
(4, 'Usability', '2018-02-13 13:32:14', '2018-02-13 13:32:14'),
(5, 'User Interface', '2018-02-13 13:32:14', '2018-02-13 13:32:14'),
(6, 'User Experience', '2018-02-13 13:32:14', '2018-02-13 13:32:14'),
(7, 'Interaction Design', '2018-02-13 13:32:14', '2018-02-13 13:32:14'),
(8, 'Artificial Intelligence', '2018-02-13 13:32:14', '2018-02-13 13:32:14'),
(9, 'IoT', '2018-02-13 13:32:14', '2018-02-13 13:32:14'),
(10, 'Design', '2018-02-13 13:32:14', '2018-02-13 13:32:14'),
(11, 'Accessibility', '2018-02-13 13:32:14', '2018-02-13 13:32:14'),
(12, 'Word Sense Disambiguation', '2018-02-13 13:32:14', '2018-02-13 13:32:14'),
(13, 'Automatic Reasoning', '2018-02-13 13:32:14', '2018-02-13 13:32:14'),
(14, 'Machine Learning', '2018-02-13 13:32:14', '2018-02-13 13:32:14'),
(15, 'Semantic Web', '2018-02-13 13:32:14', '2018-02-13 13:32:14'),
(16, 'Linked Open Data', '2018-02-13 13:32:14', '2018-02-13 13:32:14'),
(17, 'Software Engineering', '2018-02-13 13:32:15', '2018-02-13 13:32:15'),
(18, 'Prototyping', '2018-02-13 13:32:15', '2018-02-13 13:32:15'),
(19, 'Mobile app', '2018-02-13 13:32:15', '2018-02-13 13:32:15'),
(20, 'Developers', '2018-02-13 13:32:15', '2018-02-13 13:32:15'),
(21, 'Information Engineering', '2018-02-13 13:32:15', '2018-02-13 13:32:15');

-- --------------------------------------------------------

--
-- Table structure for table `topic_group`
--

CREATE TABLE `topic_group` (
  `id` int(10) UNSIGNED NOT NULL,
  `topic_id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `topic_group`
--

INSERT INTO `topic_group` (`id`, `topic_id`, `group_id`) VALUES
(1, 5, 1),
(2, 6, 1),
(3, 7, 1),
(4, 2, 2),
(5, 3, 2),
(6, 2, 3),
(7, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `topic_publication`
--

CREATE TABLE `topic_publication` (
  `id` int(10) UNSIGNED NOT NULL,
  `topic_id` int(10) UNSIGNED NOT NULL,
  `publication_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `topic_publication`
--

INSERT INTO `topic_publication` (`id`, `topic_id`, `publication_id`) VALUES
(1, 1, 5),
(2, 20, 5),
(3, 18, 5),
(4, 1, 6),
(5, 19, 6),
(6, 10, 6),
(7, 12, 7),
(8, 9, 7),
(9, 8, 7),
(10, 19, 8),
(11, 18, 8),
(12, 1, 9),
(13, 2, 10),
(14, 21, 10);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `picture_path` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'link/to/default/pic',
  `affiliation_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `reference_link` varchar(1620) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `birth_date`, `email`, `password`, `remember_token`, `picture_path`, `affiliation_id`, `role_id`, `reference_link`, `created_at`, `updated_at`) VALUES
(1, 'Paolo', 'Buono', '1980-12-01', 'paolo.buono@uniba.it', '$2y$10$vWsZO6nB3BpK9ZpZ5mXoneRlScVy7/DTUXYxvgMv4lYhtQx4aA52W', 'MMyIm7t3jqO9PwtwqhvdU9QrapZbUE2RkNy3K07kEZzQM0yHESQpVC7rGxU5', 'images/profilePictures/default.png', 7, 3, NULL, '2018-02-13 13:34:13', '2018-04-09 18:03:12'),
(2, 'Roger', 'Waters', '1944-01-01', 'roger.waters@uniba.it', '$2y$10$ce7htB3/UcSUDBpVGsI.JuL/nnewxH5KwhfgirexqGJKtL6uwN5Ki', 'TbuU2cxNLDT0KYho9DBa1F5ByS93FoZI8KtWNUCGRapf8sAXae9bTbwktYA1', 'images/profilePictures/7f0c2415c36fd9b8f7e7f5fe362f9c62.jpg', 1, 1, NULL, '2018-02-13 13:41:17', '2018-02-13 13:41:17'),
(3, 'David', 'Gilmour', '1944-01-01', 'david.gilmour@uniba.it', '$2y$10$GD4VBDJmd0rFMfL.LGSPguFBqtbpbHcm0wfMnD7OpVOt30/A4.Wly', 'hbolqjXUEmN6G9lnwHSgFPkppGlPJDDAfobKrTadjT294p99pVFTEA3Aqxuy', 'images/profilePictures/b4537c6b85bf905d70494f74f0a6009f.jpg', 8, 2, NULL, '2018-02-13 13:42:56', '2018-02-13 13:42:56'),
(4, 'Richard', 'Wright', '1944-01-01', 'richard.wright@uniba.it', '$2y$10$rrQ.L2hFsFoJtu9LV5U0ruPm0lO4kx08wZTnzl5T5.DzGs7IowHdW', '3sRVibAUDv6E1pv63Pl4YC5AGs6mAOzWswWmO7wUbaqiDvBtmz4AtOWsjAFg', 'images/profilePictures/caa683bc3c4b57c7c7c92053e9f6643d.jpg', 12, 4, NULL, '2018-02-13 13:44:44', '2018-02-13 13:44:44'),
(5, 'Nick', 'Mason', '1944-01-01', 'nick.mason@uniba.it', '$2y$10$IdrDeZp2SKIgXLkjnLx8Cu5N/areM.zFjsWzVPKi6VbkWMxvFtKNG', 'hIUemMNqyV6VDeL6LPZord742z0u7BDs0uaIl4V5VdzRriUPmeGGbzxbQ9dt', 'images/profilePictures/097c139eb79aba0491382f7b34365cbc.jpg', 6, 4, NULL, '2018-02-13 13:46:44', '2018-02-13 13:46:44'),
(6, 'Michelangelo', 'Campanella', '1997-04-13', 'campanella.michelangelo@gmail.com', '$2y$10$P7lOh5G/U7meFNG0MEhIbO4Go03z3agupN8E62/JBpE0BJcFL6b1C', 'IXghzhTFTqinQvDTG9PIIJesSLm21Na19BWkXU8b8ub53yGoQAgY61rRVURz', 'images/profilePictures/default.png', 7, 1, NULL, '2018-04-13 10:53:59', '2018-04-13 10:53:59');

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE `user_group` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `role` enum('admin','member') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'member',
  `state` enum('accepted','pending') COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`id`, `user_id`, `group_id`, `role`, `state`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'admin', 'accepted', '2018-02-13 13:38:13', '2018-02-13 13:38:13'),
(2, 3, 2, 'admin', 'accepted', '2018-02-13 13:59:15', '2018-02-13 13:59:15'),
(3, 5, 2, 'member', 'pending', NULL, NULL),
(4, 2, 3, 'admin', 'accepted', '2018-02-13 14:03:50', '2018-02-13 14:03:50'),
(5, 1, 3, 'member', 'accepted', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_publication`
--

CREATE TABLE `user_publication` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `publication_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_publication`
--

INSERT INTO `user_publication` (`id`, `user_id`, `publication_id`, `created_at`, `updated_at`) VALUES
(1, 5, 5, NULL, NULL),
(2, 5, 6, NULL, NULL),
(3, 5, 7, NULL, NULL),
(4, 3, 8, NULL, NULL),
(5, 2, 9, NULL, NULL),
(6, 4, 10, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_topic`
--

CREATE TABLE `user_topic` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `topic_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_topic`
--

INSERT INTO `user_topic` (`id`, `user_id`, `topic_id`) VALUES
(1, 1, 3),
(2, 2, 2),
(3, 2, 4),
(4, 3, 16),
(5, 3, 18),
(6, 4, 11),
(7, 4, 15),
(8, 5, 13),
(9, 5, 21),
(10, 6, 3),
(11, 6, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `affiliations`
--
ALTER TABLE `affiliations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `affiliations_name_unique` (`name`);

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `authors_name_unique` (`name`),
  ADD KEY `authors_user_id_foreign` (`user_id`);

--
-- Indexes for table `author_publication`
--
ALTER TABLE `author_publication`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_publication_author_id_foreign` (`author_id`),
  ADD KEY `author_publication_publication_id_foreign` (`publication_id`);

--
-- Indexes for table `conferences`
--
ALTER TABLE `conferences`
  ADD KEY `conferences_publication_id_foreign` (`publication_id`);

--
-- Indexes for table `conversation`
--
ALTER TABLE `conversation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_one` (`user_one`,`user_two`);

--
-- Indexes for table `editorships`
--
ALTER TABLE `editorships`
  ADD KEY `editorships_publication_id_foreign` (`publication_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `groups_name_unique` (`name`);

--
-- Indexes for table `journals`
--
ALTER TABLE `journals`
  ADD KEY `journals_publication_id_foreign` (`publication_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_id_notifiable_type_index` (`notifiable_id`,`notifiable_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `publications`
--
ALTER TABLE `publications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publication_groups`
--
ALTER TABLE `publication_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `publication_groups_publication_id_group_id_unique` (`publication_id`,`group_id`),
  ADD KEY `publication_groups_user_id_foreign` (`user_id`),
  ADD KEY `publication_groups_group_id_foreign` (`group_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `topics_name_unique` (`name`);

--
-- Indexes for table `topic_group`
--
ALTER TABLE `topic_group`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic_group_topic_id_foreign` (`topic_id`),
  ADD KEY `topic_group_group_id_foreign` (`group_id`);

--
-- Indexes for table `topic_publication`
--
ALTER TABLE `topic_publication`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic_publication_topic_id_foreign` (`topic_id`),
  ADD KEY `topic_publication_publication_id_foreign` (`publication_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_affiliation_id_foreign` (`affiliation_id`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_group_user_id_foreign` (`user_id`),
  ADD KEY `user_group_group_id_foreign` (`group_id`);

--
-- Indexes for table `user_publication`
--
ALTER TABLE `user_publication`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_publication_user_id_foreign` (`user_id`),
  ADD KEY `user_publication_publication_id_foreign` (`publication_id`);

--
-- Indexes for table `user_topic`
--
ALTER TABLE `user_topic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_topic_user_id_foreign` (`user_id`),
  ADD KEY `user_topic_topic_id_foreign` (`topic_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `affiliations`
--
ALTER TABLE `affiliations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `author_publication`
--
ALTER TABLE `author_publication`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `conversation`
--
ALTER TABLE `conversation`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=925;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=737;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `publications`
--
ALTER TABLE `publications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `publication_groups`
--
ALTER TABLE `publication_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `topic_group`
--
ALTER TABLE `topic_group`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `topic_publication`
--
ALTER TABLE `topic_publication`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_group`
--
ALTER TABLE `user_group`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_publication`
--
ALTER TABLE `user_publication`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_topic`
--
ALTER TABLE `user_topic`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `authors`
--
ALTER TABLE `authors`
  ADD CONSTRAINT `authors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `author_publication`
--
ALTER TABLE `author_publication`
  ADD CONSTRAINT `author_publication_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`),
  ADD CONSTRAINT `author_publication_publication_id_foreign` FOREIGN KEY (`publication_id`) REFERENCES `publications` (`id`);

--
-- Constraints for table `conferences`
--
ALTER TABLE `conferences`
  ADD CONSTRAINT `conferences_publication_id_foreign` FOREIGN KEY (`publication_id`) REFERENCES `publications` (`id`);

--
-- Constraints for table `editorships`
--
ALTER TABLE `editorships`
  ADD CONSTRAINT `editorships_publication_id_foreign` FOREIGN KEY (`publication_id`) REFERENCES `publications` (`id`);

--
-- Constraints for table `journals`
--
ALTER TABLE `journals`
  ADD CONSTRAINT `journals_publication_id_foreign` FOREIGN KEY (`publication_id`) REFERENCES `publications` (`id`);

--
-- Constraints for table `publication_groups`
--
ALTER TABLE `publication_groups`
  ADD CONSTRAINT `publication_groups_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`),
  ADD CONSTRAINT `publication_groups_publication_id_foreign` FOREIGN KEY (`publication_id`) REFERENCES `publications` (`id`),
  ADD CONSTRAINT `publication_groups_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `topic_group`
--
ALTER TABLE `topic_group`
  ADD CONSTRAINT `topic_group_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`),
  ADD CONSTRAINT `topic_group_topic_id_foreign` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`);

--
-- Constraints for table `topic_publication`
--
ALTER TABLE `topic_publication`
  ADD CONSTRAINT `topic_publication_publication_id_foreign` FOREIGN KEY (`publication_id`) REFERENCES `publications` (`id`),
  ADD CONSTRAINT `topic_publication_topic_id_foreign` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_affiliation_id_foreign` FOREIGN KEY (`affiliation_id`) REFERENCES `affiliations` (`id`),
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `user_group`
--
ALTER TABLE `user_group`
  ADD CONSTRAINT `user_group_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`),
  ADD CONSTRAINT `user_group_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_publication`
--
ALTER TABLE `user_publication`
  ADD CONSTRAINT `user_publication_publication_id_foreign` FOREIGN KEY (`publication_id`) REFERENCES `publications` (`id`),
  ADD CONSTRAINT `user_publication_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_topic`
--
ALTER TABLE `user_topic`
  ADD CONSTRAINT `user_topic_topic_id_foreign` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`),
  ADD CONSTRAINT `user_topic_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
