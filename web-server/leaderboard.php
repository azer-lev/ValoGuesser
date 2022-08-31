<?php
require_once('inc/layouts/navbar.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Valorant Rank Guesser - Leaderboard</title>
        <link rel="stylesheet" href="assets/css/navbar.css"/>
        <link rel="stylesheet" href="assets/css/leaderboard.css"/>

        <!-- FONTS -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@500&family=Oswald&display=swap" rel="stylesheet">
    </head>

    <body>

        <div class="leaderboard-container">
            <div class="static-background" id="static-background">
                <div class="leaderboard">
                    <div class="leaderboard-heading">
                        <div class="icon"><img src="assets/img/radiant-badge.png"></img></div>
                        <div class="episode">Wins</div>
                        <div class="tag">Leaderboard</div>
                    </div>
                    <div class="leaderboard-wrapper">
                        <ul>
                            <li id="leaderboard-first">
                                <div class="rank">1</div>
                                <div class="rating">1200</div>
                                <div class="playername">azer</div>
                                <div class="gameswon">1000</div>
                            </li>
                            <li id="leaderboard-top"></li>
                            <li id="leaderboard-top"></li>
                            <li id="leaderboard-top"></li>
                            <li id="leaderboard-top"></li>
                            <li id="leaderboard-top"></li>
                            <li id="leaderboard-top"></li>
                            <li id="leaderboard-top"></li>
                            <li id="leaderboard-top"></li>
                            <li id="leaderboard-top"></li>
                            <li id="leaderboard-top"></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <script src="assets/js/leaderboard.js"></script>
    </body>
</html>
    