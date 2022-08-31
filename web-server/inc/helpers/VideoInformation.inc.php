<?php
class VideoInformation {
    public function __construct($user_id, $video_link, $uploaded_at) {
        $this->_userid = $user_id;
        $this->video_link = $video_link;
        $this->uploaded_at = $uploaded_at;
    }

    public function getUserId() {
        return $this->_userid;
    }

    public function getVideoId() {
        $pos = strrpos($this->video_link, '/');
        return ($pos === false ? $this->video_link : substr($this->video_link, $pos + 1));
    }

    public function getVideoLink() {
        return $this->video_link;
    }

    public function getVideoThumbnail() {
        $pos = strrpos($this->video_link, '/');
        $id = $pos === false ? $this->video_link : substr($this->video_link, $pos + 1);
        return "https://img.youtube.com/vi/" . $id . "/0.jpg";
    }

    public function getUploadDate() {
        return gmdate("d.m.Y H:i:s", $this->uploaded_at);
    }

    public function getVideoName(){
        return explode('</title>', explode('<title>', file_get_contents("https://www.youtube.com/watch?v=" . $this->getVideoId()))[1])[0];
    }
}
