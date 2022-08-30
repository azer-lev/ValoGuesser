<?php
require_once('inc/layouts/navbar.php');
require_once("inc/config.inc.php");

if($user == "no-login") {
    header("Location: login.php");
}

if(isset($_GET['upload'])) {
    //Check if input is there
    if(isset($_POST['hidden-rank']) && isset($_POST['hidden-division']) && isset($_POST['yt-url'])) {
        $playerurl = trim($_POST['yt-url']);
        $playerrank = trim($_POST['hidden-rank']);
        $playerdivision= trim($_POST['hidden-division']);
        $uploaderId = $user['user_id'];
        $unixTime = time();
        $stmt = $dbpdo->prepare("INSERT INTO `uncheckedvideolinks` (`uploader_id`, `unchecked_video_url`, `unchecked_video_uploaderrank`, `unchecked_video_uploaderdivision`, `unchecked_video_uploaded_at`) VALUES (:uploader_id, :unchecked_video_url, :unchecked_video_uploaderrank, :unchecked_video_uploaderdivision, :unchecked_video_uploaded_at)");
        $result = $stmt->execute(array("uploader_id" => $uploaderId, "unchecked_video_url" => $playerurl, "unchecked_video_uploaderrank" => $playerrank, "unchecked_video_uploaderdivision" => $playerdivision, "unchecked_video_uploaded_at" => $unixTime));
        if($result) {
            $stmt = $dbpdo->prepare("SELECT unchecked_id FROM `uncheckedvideolinks` WHERE `uploader_id` = :uploader_id ORDER BY `unchecked_id` DESC LIMIT 1");
            $s_result = $stmt->execute(array("uploader_id" => $uploaderId));
            $answer = $stmt->fetch();
            header("Location: uploaded.php?uc_video_id=" . $answer[0]);
        }else {
            //Print error
        }
    }else {
        //Print error
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
    <title>Valorant Rank Guesser - Upload video</title>
        <link rel="stylesheet" href="assets/css/navbar.css"/>
        <link rel="stylesheet" href="assets/css/upload.css"/>

        <!-- FONTS -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@500&family=Oswald&family=Source+Sans+Pro&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="upload-container">
            <div class="upload-wrapper">
                <form action="?upload=1", method="post" id="uploadform">
                    <input type="hidden" name="hidden-rank" id="hidden-rank"/>
                    <input type="hidden" name="hidden-division" id="hidden-division"/>
                    <div class="upload-input-wrapper">
                        <div class="url-wrapper">
                            <input type="url" name="yt-url" id="yt-url" placeholder="Youtube-Url"/>
                        </div>
                    </div>
                    <div class="rank-wrapper">
                        <div class="rank-img-wrapper">
                            <div class="rank-wrapper-styling" id="rank-iron-img">
                            </div>
                        </div>
                        <div class="rank-img-wrapper">
                            <div class="rank-wrapper-styling" id="rank-bronze-img">
                            </div>
                        </div>
                        <div class="rank-img-wrapper">
                            <div class="rank-wrapper-styling" id="rank-silver-img">
                            </div>
                        </div>
                        <div class="rank-img-wrapper">
                            <div class="rank-wrapper-styling" id="rank-gold-img">
                            </div>
                        </div>
                        <div class="rank-img-wrapper">
                            <div class="rank-wrapper-styling" id="rank-platin-img">
                            </div>
                        </div>
                        <div class="rank-img-wrapper">
                            <div class="rank-wrapper-styling" id="rank-diamond-img">
                            </div>
                        </div>
                        <div class="rank-img-wrapper">
                            <div class="rank-wrapper-styling" id="rank-ascendant-img">
                            </div>
                        </div>
                        <div class="rank-img-wrapper">
                            <div class="rank-wrapper-styling" id="rank-immortal-img">
                            </div>
                        </div>
                        <div class="rank-img-wrapper">
                            <div class="rank-wrapper-styling" id="rank-radiant-img">
                            </div>
                        </div>
                    </div>
                    <div class="upload-input-wrapper2">
                        <button >
                            <div class="upload-input-innerbtn" id="submit-btn">Submit</div>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="division-wrapper" id="division-wrapper">
            <div class="division-info-text">
                Select the clip division
            </div>
            <div class="divison-selection">
                <div class="divisions"><div class="division-container" id="division-1"></div></div>
                <div class="divisions"><div class="division-container" id="division-2"></div></div>
                <div class="divisions"><div class="division-container" id="division-3"></div></div>
            </div>
        </div>
        <script src="assets/js/upload.js"></script>
    </body>
</html>