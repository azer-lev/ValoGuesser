-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 31. Jul 2022 um 07:37
-- Server-Version: 10.4.14-MariaDB
-- PHP-Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `valoguesser_test1`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `rankedhistorystorage`
--

CREATE TABLE `rankedhistorystorage` (
  `ranked_gameid` int(255) UNSIGNED NOT NULL,
  `player_startrank` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `player_startdivision` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `player_startlp` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `player_endrank` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `player_enddivision` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `player_endlp` varchar(4) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `rankedstorage`
--

CREATE TABLE `rankedstorage` (
  `ranked_gameid` int(255) UNSIGNED NOT NULL,
  `user_id` int(100) UNSIGNED NOT NULL,
  `video_id` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `player_inputrank` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `player_inputdivision` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `player_review_start` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `player_review_end` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `uncheckedvideolinks`
--

CREATE TABLE `uncheckedvideolinks` (
  `unchecked_id` int(255) NOT NULL,
  `uploader_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `unchecked_video_url` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `unchecked_video_uploaderrank` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `unchecked_video_uploaderdivision` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `unchecked_video_uploaded_at` varchar(256) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `uncheckedvideolinks`
--

INSERT INTO `uncheckedvideolinks` (`unchecked_id`, `uploader_id`, `unchecked_video_url`, `unchecked_video_uploaderrank`, `unchecked_video_uploaderdivision`, `unchecked_video_uploaded_at`) VALUES
(1, '1', 'https://testing.com', 'gold', '2', '1659104417'),
(2, '1', 'https://testing.com', 'gold', '1', '1659104609'),
(3, '1', 'https://testing.com', 'gold', '1', '1659104619'),
(4, '1', 'https://testing.com', 'platin', '2', '1659104651'),
(5, '1', 'https://testing1.com', 'diamond', '2', '1659104667'),
(6, '1', 'https://testing123.com', 'gold', '2', '1659104699'),
(7, '1', 'https://testing.com', 'silver', '1', '1659105901'),
(8, '1', 'https://testing.com', 'bronze', '1', '1659105915'),
(9, '1', 'https://testindadag.com', 'silver', '1', '1659106183'),
(10, '1', 'https://testing.com', 'silver', '2', '1659107390'),
(11, '1', 'https://testing.com', 'silver', '2', '1659107392'),
(12, '1', 'https://testing.com', 'gold', '2', '1659175986'),
(13, '3', 'https://testing.com', 'gold', '2', '1659176087');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `userstorage`
--

CREATE TABLE `userstorage` (
  `user_id` int(100) UNSIGNED NOT NULL,
  `user_username` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `user_ingamename` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_ingametag` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_ingame_claimed` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_passwordhash` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `user_created_at` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `user_last_login` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `user_last_update` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_passwordcode` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `userstorage`
--

INSERT INTO `userstorage` (`user_id`, `user_username`, `user_email`, `user_ingamename`, `user_ingametag`, `user_ingame_claimed`, `user_passwordhash`, `user_created_at`, `user_last_login`, `user_last_update`, `user_passwordcode`) VALUES
(1, 'azer', 'azer@valoguesser.com', NULL, NULL, NULL, '$2y$10$RXhxHiB5EfpLblj/w4R.6.tZ5WMp1UWJN0LPPrqktwxoEMkT4stry', '1659012456', '1659012456', NULL, NULL),
(2, 'test', 'test@test.com', NULL, NULL, NULL, '$2y$10$rLeFehv/7ZXCYAN8ULxFXe6vW0Yo/qlRxXfEwqWY1r5nZ.TjcZVXC', '1659013511', '1659013511', NULL, NULL),
(3, 'test1', 'test1@test.com', NULL, NULL, NULL, '$2y$10$kmFUcaidPFBly4bDqQYTOu5aPz7bG29tGJW36HhVQhIuiKot8JDDu', '1659020193', '1659020193', NULL, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user_securitytokens`
--

CREATE TABLE `user_securitytokens` (
  `token_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(100) NOT NULL,
  `token_identifier` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token_security` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token_created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `videoratings`
--

CREATE TABLE `videoratings` (
  `rating_id` int(255) NOT NULL,
  `user_id` int(100) UNSIGNED NOT NULL,
  `video_id` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `rating_quality` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `rating_fps` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `rating_smurf` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `rating_created_at` varchar(256) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `videostorage`
--

CREATE TABLE `videostorage` (
  `video_id` int(255) NOT NULL,
  `video_url` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `video_uploaderrank` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `video_uploaderdivision` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `video_uploaded_at` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `video_deleted` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `video_deleted_at` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `video_deleted_by` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `video_delete_reason` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `video_checked` varchar(16) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `rankedhistorystorage`
--
ALTER TABLE `rankedhistorystorage`
  ADD PRIMARY KEY (`ranked_gameid`);

--
-- Indizes für die Tabelle `rankedstorage`
--
ALTER TABLE `rankedstorage`
  ADD PRIMARY KEY (`ranked_gameid`),
  ADD UNIQUE KEY `ranked_gameid` (`ranked_gameid`);

--
-- Indizes für die Tabelle `uncheckedvideolinks`
--
ALTER TABLE `uncheckedvideolinks`
  ADD PRIMARY KEY (`unchecked_id`);

--
-- Indizes für die Tabelle `userstorage`
--
ALTER TABLE `userstorage`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- Indizes für die Tabelle `user_securitytokens`
--
ALTER TABLE `user_securitytokens`
  ADD PRIMARY KEY (`token_id`);

--
-- Indizes für die Tabelle `videoratings`
--
ALTER TABLE `videoratings`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indizes für die Tabelle `videostorage`
--
ALTER TABLE `videostorage`
  ADD PRIMARY KEY (`video_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `rankedhistorystorage`
--
ALTER TABLE `rankedhistorystorage`
  MODIFY `ranked_gameid` int(255) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `rankedstorage`
--
ALTER TABLE `rankedstorage`
  MODIFY `ranked_gameid` int(255) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `uncheckedvideolinks`
--
ALTER TABLE `uncheckedvideolinks`
  MODIFY `unchecked_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT für Tabelle `userstorage`
--
ALTER TABLE `userstorage`
  MODIFY `user_id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `user_securitytokens`
--
ALTER TABLE `user_securitytokens`
  MODIFY `token_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `videoratings`
--
ALTER TABLE `videoratings`
  MODIFY `rating_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `videostorage`
--
ALTER TABLE `videostorage`
  MODIFY `video_id` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
