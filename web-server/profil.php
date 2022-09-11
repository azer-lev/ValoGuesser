<?php
require_once('inc/layouts/navbar.php');
require_once('inc/helpers/VideoInformation.inc.php');
require_once('inc/helpers/UserInformation.inc.php');
require_once('requests/functions/getUserIdByName.php');

if(!class_exists('UserInformation')) {
    die('Classes not loaded!');
}
$userId = 0;
$ownProfil = false;
$playerLevel = 0;
$playerName = NULL;

if(isset($_GET['name'])) {
    $playerName = trim($_GET['name']);
    if($user != "no-login" && $userId == $user['user_id']) {
        $ownProfil = true;
        $playerName = $user['user_username'];
    }else {
        $playerName = trim($_GET['name']);
        $userId = getUserIdByName($playerName);
    }
}else if($user == "no-login") {
    header("location: login.php");
}else if($user != "no-login") {
    $playerName = $user['user_username'];
    $userId = $user['user_id'];
}

$userInformation = new UserInformation($userId);

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
            <div class="container-stats">
                <div class="container-level">
                    <div class="stats-icon-level">

                    </div>
                    <div class="stats-text">
                        Current Level: <?php print_r(__DIR__); ?>
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