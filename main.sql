CREATE TABLE IF NOT EXISTS `userstorage` (
    `user_id` int(100) unsigned NOT NULL AUTO_INCREMENT,
    `user_username` varchar(64) NOT NULL,
    `user_email` varchar(256) NOT NULL,
    `user_ingamename` varchar(256),
    `user_ingametag` varchar(10),
    `user_ingame_claimed` varchar(16),
    `user_passwordhash` varchar(1024) NOT NULL,
    `user_created_at` varchar(128) NOT NULL,
    `user_last_login` varchar(128) NOT NULL,
    `user_last_update` varchar(128),
    `user_passwordcode` varchar(256) DEFAULT NULL,
    PRIMARY KEY(`user_id`), UNIQUE(`user_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `user_securitytokens` (
  `token_id` int(10) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `user_id` int(100) NOT NULL,
  `token_identifier` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token_security` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `rankedstorage` (
    `ranked_gameid` int(255) unsigned NOT NULL AUTO_INCREMENT,
    `user_id` int(100) unsigned NOT NULL,
    `video_id` varchar(256) NOT NULL,
    `player_inputrank` varchar(32) DEFAULT NULL,
    `player_inputdivision` varchar(16) DEFAULT NULL,
    `player_review_start` varchar(256) NOT NULL,
    `player_review_end` varchar(256) DEFAULT NULL,
    PRIMARY KEY(`ranked_gameid`), UNIQUE(`ranked_gameid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/* EXTENDS `rankedstorage` by LP gained/lost, rank, devision etc */
CREATE TABLE IF NOT EXISTS `rankedhistorystorage` (
    `ranked_gameid` int(255) unsigned NOT NULL AUTO_INCREMENT,
    `player_startrank` varchar(64) NOT NULL,
    `player_startdivision` varchar(32) NOT NULL,
    `player_startlp` varchar(4) NOT NULL,
    `player_endrank` varchar(64) NOT NULL,
    `player_enddivision` varchar(32) NOT NULL,
    `player_endlp` varchar(4) NOT NULL,
    PRIMARY KEY(`ranked_gameid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `videostorage` (
    `video_id` int(255) NOT NULL AUTO_INCREMENT,
    `video_url` varchar(1024) NOT NULL,
    `video_uploaderrank` varchar(32) NOT NULL,
    `video_uploaderdivision` varchar(16) NOT NULL,
    `video_uploaded_at` varchar(256) NOT NULL,
    `video_deleted` varchar(256) DEFAULT NULL,
    `video_deleted_at` varchar(256) DEFAULT NULL,
    `video_deleted_by` varchar(256) DEFAULT NULL,
    `video_delete_reason` varchar(256) DEFAULT NULL,
    PRIMARY KEY(`video_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `videoratings` (
    `rating_id` int(255) NOT NULL AUTO_INCREMENT,
    `user_id` int(100) unsigned NOT NULL,
    `video_id` varchar(256) NOT NULL,
    `rating_quality` varchar(64) NOT NULL,
    `rating_fps` varchar(64) NOT NULL,
    `rating_smurf` varchar(32) NOT NULL,
    `rating_created_at` varchar(256) NOT NULL,
    PRIMARY KEY(`rating_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `uncheckedvideolinks` (
    `unchecked_id` int(255) NOT NULL AUTO_INCREMENT,
    `unchecked_video_url` varchar(1024) NOT NULL,
    `unchecked_video_uploaderrank` varchar(32) NOT NULL,
    `unchecked_video_uploaderdivision` varchar(16) NOT NULL,
    `unchecked_video_uploaded_at` varchar(256) NOT NULL,
    PRIMARY KEY(`unchecked_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;