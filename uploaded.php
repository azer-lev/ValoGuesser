<?php
require_once('inc/layouts/navbar.php');

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

//Wenn keine Id, liste hochgeladener Videos anzeigen
if(isset($_GET['uc_video_id'])) {
    $unchecked_video_id = $_GET['uc_video_id'];
    if(getUserIdByUncheckedVideoId($unchecked_video_id) != $user['user_id']) {
        //Error
        header("Location: index.php");
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
    <title>Valorant Rank Guesser - Upload submitted</title>
        <link rel="stylesheet" href="assets/css/navbar.css"/>
        <link rel="stylesheet" href="assets/css/upload.css"/>

        <!-- FONTS -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@500&family=Oswald&family=Source+Sans+Pro&display=swap" rel="stylesheet">
    </head>
    <body>

    </body>
</html>