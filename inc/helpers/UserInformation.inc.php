<?php

class UserInformation {
    private $userUncheckedVideosLoaded = false;
    private $userCheckedVideosLoaded = false;
    public function __construct($user_id) {
        global $dbpdo;
        $this->_userid = $user_id;
        $stmt = $dbpdo->prepare("SELECT * FROM `userstorage` WHERE `user_id` = :user_id LIMIT 1");
        $result = $stmt->execute(array("user_id" => $user_id));
        $this->user = $stmt->fetch();
    }

    public function getUncheckedUserVideos() {
        if(class_exists('VideoInformation') && $this->userUncheckedVideosLoaded != true) {
            global $dbpdo;
            $stmt = $dbpdo->prepare("SELECT unchecked_video_url,unchecked_video_uploaded_at FROM `uncheckedvideolinks` WHERE `uploader_id` = :uploader_id LIMIT 10");
            $result = $stmt->execute(array("uploader_id" => $this->_userid));
            $userVideos = array();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $videoInformation = new VideoInformation($this->_userid, $row['unchecked_video_url'], $row['unchecked_video_uploaded_at']);
                array_push($userVideos, $videoInformation);
            }
            $this->userUncheckedVideoArr = $userVideos;
            $this->userUncheckedVideosLoaded = true;
        }else {
            //Error VideoInformation not included
            die('Fatal error: VideoInformation not included!');
        }
    }

    public function getCheckedUserVideos() {
        if(class_exists('VideoInformation') && $this->userCheckedVideosLoaded != true) {
            global $dbpdo;
            $stmt = $dbpdo->prepare("SELECT video_id FROM `videoratings` WHERE `user_id` = :user_id");
            $result = $stmt->execute(array("user_id" => $this->_userid));
            $userCheckedVideos = array();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $stmt2 = $dbpdo->prepare("SELECT video_url, video_uploaded_at FROM `videostorage` WHERE `video_id` = :video_id LIMIT 1");
                $result = $stmt2->execute(array("video_id" => $row['video_id']));
                $answer = $stmt2->fetch();
                $videoInformation = new VideoInformation($this->_userid, $answer['video_url'], $answer['video_uploaded_at']);
                array_push($userCheckedVideos, $videoInformation);
            }
            $this->userCheckedVideoArr = $userCheckedVideos;
            $this->userCheckedVideosLoaded = true;
        }
    }

    public function getNumberOfUploadedVideos() {
        global $dbpdo;
        $stmt = $dbpdo->prepare("SELECT COUNT(`video_id`) FROM `videoratings` WHERE `user_id` = :user_id");
        $result = $stmt->execute(array("user_id" => $this->_userid));
        return $stmt->fetch()[0];
    }

    public function getUsername() {
        return $this->user['user_username'];
    }

    /**
     * getProfilPicture
     *
     * @return profil_picture_url
     */
    public function getProfilPicture() {
        global $dbpdo;
        $stmt = $dbpdo->prepare("SELECT `picture_url` FROM user_profil_picture WHERE `user_id` = :user_id ORDER BY `picture_id` DESC LIMIT 1");
        $result = $stmt->execute(array("user_id" => $this->_userid));
        return $stmt->fetch()[0];
    }
}