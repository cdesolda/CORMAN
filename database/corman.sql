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
(5, 'Universit� degli Studi di Foggia', 'https://www.unifg.it', '2018-02-13 13:32:12', '2018-02-13 13:32:12'),
(6, 'Universit� Commerciale Bocconi Milano', 'https://www.unibocconi.it/wps/wcm/connect/Bocconi/SitoPubblico_IT/Albero+di+navigazione/Home/', '2018-02-13 13:32:12', '2018-02-13 13:32:12'),
(7, 'Universit� degli Studi di Bari', 'http://www.uniba.it', '2018-02-13 13:32:12', '2018-02-13 13:32:12'),
(8, 'Universit� degli Studi del Salento', 'https://www.unisalento.it/web/guest/home_page', '2018-02-13 13:32:12', '2018-02-13 13:32:12'),
(9, 'Universit� degli Studi di Catania', 'http://www.unict.it', '2018-02-13 13:32:12', '2018-02-13 13:32:12'),
(10, 'Universit� degli Studi di Roma Tor Vergata', 'https://web.uniroma2.it', '2018-02-13 13:32:12', '2018-02-13 13:32:12'),
(11, 'Universit� degli Studi di Parma', 'http://www.unipr.it', '2018-02-13 13:32:12', '2018-02-13 13:32:12'),
(12, 'University of Copenhagen', 'http://www.ku.dk/english/', '2018-02-13 13:32:12', '2018-02-13 13:32:12'),
(13, 'Harvard University', 'https://www.harvard.edu', '2018-02-13 13:32:13', '2018-02-13 13:32:13'),
(14, 'University of Cambridge', 'https://www.cam.ac.uk', '2018-02-13 13:32:13', '2018-02-13 13:32:13'),
(15, 'Universit� di Tokio', 'http://www.thejapanesedreams.com/universita-imperiale-di-tokyo/', '2018-02-13 13:32:13', '2018-02-13 13:32:13'),
(16, 'University of Toronto', 'https://www.utoronto.ca', '2018-02-13 13:32:13', '2018-02-13 13:32:13'),
(17, 'University of Munich', 'https://www.en.uni-muenchen.de/index.html', '2018-02-13 13:32:13', '2018-02-13 13:32:13'),
(18, 'Utrecht University', 'https://www.uu.nl/en', '2018-02-13 13:32:13', '2018-02-13 13:32:13'),
(19, 'University of Zurich', 'https://www.uzh.ch/en.html', '2018-02-13 13:32:13', '2018-02-13 13:32:13'),
(20, 'University of Bristol', 'http://www.bristol.ac.uk', '2018-02-13 13:32:13', '2018-02-13 13:32:13'),
(21, 'Universit� di Ginevra', 'https://www.unige.ch', '2018-02-13 13:32:13', '2018-02-13 13:32:13'),
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
(467, 4, 1, '2018-04-30 08:53:32'),
(468, 1, 4, '2018-04-30 08:53:32'),
(469, 4, 3, '2018-04-30 08:53:41'),
(470, 3, 4, '2018-04-30 08:53:41'),
(471, 1, 2, '2018-04-30 08:56:59'),
(472, 2, 1, '2018-04-30 08:56:59'),
(473, 1, 3, '2018-04-30 09:02:41'),
(474, 3, 1, '2018-04-30 09:02:41');

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
(423, 1, 2, 'Ciao', '2018-04-24 11:34:14', 1, NULL),
(424, 1, 2, 'Roger', '2018-04-24 11:34:18', 1, NULL),
(427, 1, 3, 'Ciao David', '2018-04-24 11:38:37', 1, NULL),
(428, 1, 4, 'Ciao Richard', '2018-04-24 11:38:46', 1, NULL),
(429, 1, 4, 'Ciao Richard, domani pomeriggio sei disponibile per un aperitivo', '2018-04-26 08:00:41', 1, NULL),
(448, 4, 1, 'ciao Paolo', '2018-04-27 14:27:30', 1, NULL),
(459, 4, 1, 'Paolo, non credo di esserci', '2018-04-30 08:53:18', 0, NULL),
(460, 4, 1, 'Chiamami', '2018-04-30 08:53:32', 0, NULL),
(461, 4, 3, 'Ciao David', '2018-04-30 08:53:41', 0, NULL),
(462, 1, 2, '', '2018-04-30 08:56:59', 0, 'prova_allegato.txt'),
(463, 1, 3, '', '2018-04-30 09:02:41', 0, 'prova_allegato.txt');

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
(5, 'Nick', 'Mason', '1944-01-01', 'nick.mason@uniba.it', '$2y$10$IdrDeZp2SKIgXLkjnLx8Cu5N/areM.zFjsWzVPKi6VbkWMxvFtKNG', 'hIUemMNqyV6VDeL6LPZord742z0u7BDs0uaIl4V5VdzRriUPmeGGbzxbQ9dt', 'images/profilePictures/097c139eb79aba0491382f7b34365cbc.jpg', 6, 4, NULL, '2018-02-13 13:46:44', '2018-02-13 13:46:44');

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