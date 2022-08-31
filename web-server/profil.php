<?php
require_once('inc/layouts/navbar.php');
require_once('inc/helpers/VideoInformation.inc.php');
require_once('inc/helpers/UserInformation.inc.php');

$userId_GET = 0;
$ownProfil = false;
if(isset($_GET['profil-id'])) {
    $userId_GET = trim($_GET['profil-id']);
    if($user != "no-login" && $userId_GET == $user['user_id']) {
        $ownProfil = true;
    }
}
if(!class_exists('UserInformation')) {
    die('Classes not loaded!');
}

if(isset($_GET['profil-id'])) {

}else {
    if($user == "no-login") {
        header("location: login.php");
    }
}

$userInformation = new UserInformation($user['user_id']);

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Valorant Rank Guesser - Profil Page</title>
        <link rel="stylesheet" href="assets/css/navbar.css"/>
        <link rel="stylesheet" href="assets/css/profil.css"/>

        <!-- FONTS -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@500&family=Oswald&family=Source+Sans+Pro&display=swap" rel="stylesheet">
    </head>

    <body>
        <div class="profil-container">
            <!--<div class="sidebar">
                <ul>
                    <li>ICON</li>
                    <li>ICON</li>
                    <li>ICON</li>
                    <li>ICON</li>
                </ul>
            </div>-->


            <div class="container-stats">
                <div class="container-level">
                    <div class="stats-icon-level">

                    </div>
                    <div class="stats-text">
                        Current Level:
                    </div>
                    <div class="stats-number">

                    </div>
                </div>

                <div class="container-num-videos">
                    <div class="stats-icon-videos">

                    </div>
                    <div class="stats-text">
                        Number of Videos:
                    </div>
                    <div class="stats-number">

                    </div>
                </div>

                <div class="container-games-won">
                    <div class="stats-icon-wins">

                    </div>
                    <div class="stats-text">
                        Games won:
                    </div>
                    <div class="stats-number">

                    </div>
                </div>
            </div>

            <div class="container-profil">

            </div>

            <div class="container-history">
                <div class="history-wrapper">
                    <div class="history-content">
                        
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>