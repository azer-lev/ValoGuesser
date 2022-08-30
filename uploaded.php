<?php
require_once('inc/layouts/navbar.php');
require_once('inc/helpers/VideoInformation.inc.php');


if($user == "no-login") {
    header("Location: login.php");
}
function getUserIdByUncheckedVideoId($id) {
    global $dbpdo;
    $stmt = $dbpdo->prepare("SELECT uploader_id FROM `uncheckedvideolinks` WHERE `unchecked_id` = :unchecked_id");
    $res = $stmt->execute(array("unchecked_id" => $id));
    $result = $stmt->fetch();
    return $result[0];
}

$userArr = getVideoThumbnails($user['user_id']);

function getVideoThumbnails($userid) {
    global $dbpdo;
    $stmt = $dbpdo->prepare("SELECT unchecked_video_url,unchecked_video_uploaded_at FROM `uncheckedvideolinks` WHERE `uploader_id` = :uploader_id LIMIT 10");
    $result = $stmt->execute(array("uploader_id" => $userid));
    $userThumbnails = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $videoObj = new VideoInformation($userid, $row['unchecked_video_url'], $row['unchecked_video_uploaded_at']);
        array_push($userThumbnails, $videoObj);
    }
    return $userThumbnails;
}

?>

<!DOCTYPE html>
<html>
    <head>
    <title>Valorant Rank Guesser - Upload submitted</title>
        <link rel="stylesheet" href="assets/css/navbar.css"/>
        <link rel="stylesheet" href="assets/css/uploaded.css"/>

        <!-- FONTS -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@500&family=Oswald&family=Source+Sans+Pro&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="uploaded-wrapper">
            <div class="uploaded-container">
                <div class="uploaded-text">
                    Your video has been submitted!
                </div>
                <div class="uploaded-table">
                    <ul>
                        <?php
                            foreach($userArr as $videoObject) {
                                echo('
                                        <li>
                                            <div class="video-thumbnail">
                                                <img src="'. $videoObject->getVideoThumbnail() .'"/>
                                            </div>
                                            <div class="video-name">
                                                <a href="' . $videoObject->getVideoLink() . '" target="_blank">'. $videoObject->getVideoName() . '</a>
                                            </div>
                                            <div class="status">
                                                Unchecked
                                            </div>
                                            <div class="upload-date">
                                                ' . $videoObject->getUploadDate() . '
                                            </div>
                                            <div class="video-rating">
                                            </div>
                                        </li>
                                ');
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </body>
</html>