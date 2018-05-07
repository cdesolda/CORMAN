-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Feb 13, 2018 alle 17:05
-- Versione del server: 10.1.28-MariaDB
-- Versione PHP: 7.1.11

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cormanDump`
--

--
-- Dump dei dati per la tabella `affiliations`
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

--
-- Dump dei dati per la tabella `authors`
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
(9, 'Nick Mason', 5, '2018-02-13 13:46:44', '2018-02-13 13:46:44');

--
-- Dump dei dati per la tabella `author_publication`
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

--
-- Dump dei dati per la tabella `conferences`
--

INSERT INTO `conferences` (`publication_id`, `abstract`, `pages`, `days`, `key`, `doi`, `ee`, `url`, `created_at`, `updated_at`) VALUES
(1, NULL, '327-328', NULL, 'conf/um/ArditoBDM17', '10.1145/3099023.3099089', 'http://doi.acm.org/10.1145/3099023.3099089', 'http://dblp.org/rec/conf/um/ArditoBDM17', '2018-02-13 13:34:23', '2018-02-13 13:34:23'),
(2, NULL, '115-126', NULL, 'conf/avi/ArditoCDMB16', '10.1007/978-3-319-50070-6_9', 'https://doi.org/10.1007/978-3-319-50070-6_9', 'http://dblp.org/rec/conf/avi/ArditoCDMB16', '2018-02-13 13:34:24', '2018-02-13 13:34:24'),
(3, NULL, '348-349', NULL, 'conf/avi/Buono16', '10.1145/2909132.2926091', 'http://doi.acm.org/10.1145/2909132.2926091', 'http://dblp.org/rec/conf/avi/Buono16', '2018-02-13 13:34:24', '2018-02-13 13:34:24'),
(4, NULL, '210-659', NULL, 'conf/dms/Buono16', '10.18293/DMS2016-040', 'https://doi.org/10.18293/DMS2016-040', 'http://dblp.org/rec/conf/dms/Buono16', '2018-02-13 13:34:24', '2018-02-13 13:34:24'),
(6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-02-13 13:56:01', '2018-02-13 13:56:01'),
(9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-02-13 14:05:01', '2018-02-13 14:05:01'),
(10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-02-13 14:08:45', '2018-02-13 14:08:45');

--
-- Dump dei dati per la tabella `editorships`
--

INSERT INTO `editorships` (`publication_id`, `abstract`, `volume`, `publisher`, `key`, `doi`, `ee`, `url`, `created_at`, `updated_at`) VALUES
(7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-02-13 13:57:52', '2018-02-13 13:57:52');

--
-- Dump dei dati per la tabella `groups`
--

INSERT INTO `groups` (`id`, `name`, `subscribers_count`, `description`, `picture_path`, `public`, `created_at`, `updated_at`) VALUES
(1, 'UX Bari', 1, 'this is the first group about UX in Bari', 'images/groups/8c199ba437465f903788829512406cf3.jpg', 'public', '2018-02-13 13:38:13', '2018-02-13 13:38:40'),
(2, 'The dark side of the moon', 1, 'breathe, breathe in the air!', 'images/groups/9450582a1eb645bc7ee8bbdc6cb4a631.jpg', 'public', '2018-02-13 13:59:15', '2018-02-13 13:59:15'),
(3, 'Animals', 1, 'ahaaa charade you are!', 'images/groups/9bb6c89af9bd4467a7740421d0779ccd.jpeg', 'public', '2018-02-13 14:03:50', '2018-02-13 14:03:50');

--
-- Dump dei dati per la tabella `journals`
--

INSERT INTO `journals` (`publication_id`, `abstract`, `volume`, `number`, `pages`, `key`, `doi`, `ee`, `url`, `created_at`, `updated_at`) VALUES
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-02-13 13:50:11', '2018-02-13 13:50:11'),
(8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-02-13 14:02:02', '2018-02-13 14:02:02');

--
-- Dump dei dati per la tabella `notifications`
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

--
-- Dump dei dati per la tabella `publications`
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

--
-- Dump dei dati per la tabella `publication_groups`
--

INSERT INTO `publication_groups` (`id`, `publication_id`, `group_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 6, 2, 3, '2018-02-13 13:59:29', '2018-02-13 13:59:29'),
(2, 5, 2, 3, '2018-02-13 13:59:29', '2018-02-13 13:59:29'),
(3, 5, 3, 2, '2018-02-13 14:04:01', '2018-02-13 14:04:01'),
(4, 4, 3, 1, '2018-02-13 15:03:17', '2018-02-13 15:03:17'),
(5, 1, 3, 1, '2018-02-13 15:03:17', '2018-02-13 15:03:17'),
(6, 3, 3, 1, '2018-02-13 15:03:17', '2018-02-13 15:03:17');

--
-- Dump dei dati per la tabella `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Researcher', '2018-02-13 13:32:13', '2018-02-13 13:32:13'),
(2, 'Ordinary Professor', '2018-02-13 13:32:13', '2018-02-13 13:32:13'),
(3, 'Associate Professor', '2018-02-13 13:32:13', '2018-02-13 13:32:13'),
(4, 'Assistant Professor', '2018-02-13 13:32:13', '2018-02-13 13:32:13');

--
-- Dump dei dati per la tabella `topics`
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

--
-- Dump dei dati per la tabella `topic_group`
--

INSERT INTO `topic_group` (`id`, `topic_id`, `group_id`) VALUES
(1, 5, 1),
(2, 6, 1),
(3, 7, 1),
(4, 2, 2),
(5, 3, 2),
(6, 2, 3),
(7, 3, 3);

--
-- Dump dei dati per la tabella `topic_publication`
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

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `birth_date`, `email`, `password`, `remember_token`, `picture_path`, `affiliation_id`, `role_id`, `reference_link`, `created_at`, `updated_at`) VALUES
(1, 'Paolo', 'Buono', '1980-01-01', 'paolo.buono@uniba.it', '$2y$10$vWsZO6nB3BpK9ZpZ5mXoneRlScVy7/DTUXYxvgMv4lYhtQx4aA52W', 'AtJaeJCUPkfGE2Ff0lvyNHLCG4zGqfWhvsUNHlFlOCYnWmIQ7VdB9NKiVHlN', 'images/profilePictures/default.png', 7, 2, NULL, '2018-02-13 13:34:13', '2018-02-13 13:34:13'),
(2, 'Roger', 'Waters', '1944-01-01', 'roger.waters@uniba.it', '$2y$10$ce7htB3/UcSUDBpVGsI.JuL/nnewxH5KwhfgirexqGJKtL6uwN5Ki', '5jP85OwZm2aJ1qvRH43GlIJIrmPly61U4wWf2lbC5N9AzAF0wvvS0TVoNiZn', 'images/profilePictures/7f0c2415c36fd9b8f7e7f5fe362f9c62.jpg', 1, 1, NULL, '2018-02-13 13:41:17', '2018-02-13 13:41:17'),
(3, 'David', 'Gilmour', '1944-01-01', 'david.gilmour@uniba.it', '$2y$10$GD4VBDJmd0rFMfL.LGSPguFBqtbpbHcm0wfMnD7OpVOt30/A4.Wly', 'xsKi00GztiWZ8oHFTNUzEM7ScZSpJn6e1pal3nBqs2R4xMm3AuF3WB2S6eSc', 'images/profilePictures/b4537c6b85bf905d70494f74f0a6009f.jpg', 8, 2, NULL, '2018-02-13 13:42:56', '2018-02-13 13:42:56'),
(4, 'Richard', 'Wright', '1944-01-01', 'richard.wright@uniba.it', '$2y$10$rrQ.L2hFsFoJtu9LV5U0ruPm0lO4kx08wZTnzl5T5.DzGs7IowHdW', 'XGQoSMyr7ANSzuF348JkJve2c1GV3Bc1b1t1kRVyLW1gJNPCUbVJjnyNMyE9', 'images/profilePictures/caa683bc3c4b57c7c7c92053e9f6643d.jpg', 12, 4, NULL, '2018-02-13 13:44:44', '2018-02-13 13:44:44'),
(5, 'Nick', 'Mason', '1944-01-01', 'nick.mason@uniba.it', '$2y$10$IdrDeZp2SKIgXLkjnLx8Cu5N/areM.zFjsWzVPKi6VbkWMxvFtKNG', 'D4ekzgQ24w5LGHaRIdTeVuXnyavZukfi55U9Cx07fjpuV2etrI22v28ppEZ6', 'images/profilePictures/097c139eb79aba0491382f7b34365cbc.jpg', 6, 4, NULL, '2018-02-13 13:46:44', '2018-02-13 13:46:44');

--
-- Dump dei dati per la tabella `user_group`
--

INSERT INTO `user_group` (`id`, `user_id`, `group_id`, `role`, `state`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'admin', 'accepted', '2018-02-13 13:38:13', '2018-02-13 13:38:13'),
(2, 3, 2, 'admin', 'accepted', '2018-02-13 13:59:15', '2018-02-13 13:59:15'),
(3, 5, 2, 'member', 'pending', NULL, NULL),
(4, 2, 3, 'admin', 'accepted', '2018-02-13 14:03:50', '2018-02-13 14:03:50'),
(5, 1, 3, 'member', 'accepted', NULL, NULL);

--
-- Dump dei dati per la tabella `user_publication`
--

INSERT INTO `user_publication` (`id`, `user_id`, `publication_id`, `created_at`, `updated_at`) VALUES
(1, 5, 5, NULL, NULL),
(2, 5, 6, NULL, NULL),
(3, 5, 7, NULL, NULL),
(4, 3, 8, NULL, NULL),
(5, 2, 9, NULL, NULL),
(6, 4, 10, NULL, NULL);

--
-- Dump dei dati per la tabella `user_topic`
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
(9, 5, 21);
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
